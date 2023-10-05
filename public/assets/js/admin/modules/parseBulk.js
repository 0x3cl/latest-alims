import {getJWTtoken} from './dataUtils.js';
import {generateCSRFToken, toastMessage, clearFields} from './utils.js';

export async function parseBulk() {

    const response = await getJWTtoken();
    const jwt_token = response.token;

    // IF INPUT FILE HAS CHANGED OR A FILE HAS BEEN UPLOADED
    // THEN PERFORM THE FOLLOWING ACTIONS
    $('#bulk_file').on('change', function() {
        const formData = new FormData();
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());
        // THE FILE UPLOADED WILL BE TEMPORARILY STORED TO FORM DATA OBJECT
        // TOGETHER WIH AN OPTION
        // OPTIONS ARE DEFINED BASED ON WHAT ROUTES YOU'RE IN
        // IT CAN BE IN INSTRUCTORS | STUDENTS | COURSES | SUBJECTS | YEARS | SECTIONS | CATEGORIES
        // OR ANY ROUTE THAT NEEDS BULK FILE UPLOAD
        // IT WILL SERVE AS A PARAMETER FOR FURTHER VALIDATION IN THE BACKEND
        formData.append('file', $(this)[0].files[0]);
        formData.append('type', DOMPurify.sanitize($('#type').val().trim()));
        // PREPARE AJAX POST REQUEST TO SERVER SIDE
        // CONTAINING THE FORM DATA CREATED ABOVE
        $.ajax({
            url: '/api/v1/bulk/parse/file',
            method: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
                // SHOW LOADING ICON BEFORE AJAX POST REQUEST IS SENT TO SERVER
                $('.preview-bulk').html('<i class="bx bx-loader-circle bx-spin" ></i>');
            }, 
            success: function(response) {
                // CREATE DOM MANIPULATION TO DISPLAY NECESSARRY INFORMATION
                // IF RESPONSE IS SUCCESSFULL THEN DISPLAY PARSED DATA FROM FILE UPLOADED               
                 // CAN BE PREVIEWED THROUGH TABLE OR RAW JSON / ARRAY FORMAT
                
                // IF RESPONSE IS UNSUCCESSFULL THROW A TOAST ERROR MESSAGE
                // DISPLAYING SPECIFIC ERRORS ENCOUNTERED DURING PROCESS
                // ERRORS CAN BE THE FOLLOWING:
                // FILE UPLOADED ALREADY EXISTS OR ALREADY ADDED BEFORE
                // THE CONTENT OF THE UPLOADED FILE DOES NOT MATCHED TO KIND OF FILE IT SHOULD BE
                // INVALID FILE (ONLY ACCEPTS CSV JSON XLS XLSX FILES)

                // IF SOME OF THE FILE CONTENTS UPLOADED ARE ALREADY ADDED
                // A SUGGESTED FILE WILL BE GENERATED AND CAN BE DOWNLOADED FILTERING
                // OR REMOVING THE DATA THAT'S BEEN ALREADY ADDED
                if(response.status == 200) {
                    $('.preview-bulk').html(embedParentDiv());
                    formatTable(response.title, response.data);
                    formatRaw(response.data);
                } else {
                    toastMessage('error', response.message);
                    $('.preview-bulk').html(DOMPurify.sanitize(
                        `
                        <div class="status" id="bulk_status">
                            <div>
                                <code>// no file is currently parsed</code>
                            </div>
                            <div>
                                <code>// upload a file</code>
                            </div>
                        </div>
                    `
                    ));
                }
            }
        }).done(function() {
            clearFields();
            generateCSRFToken();
        });

    });

    // START BUTTON CLICK EVENT LISTENERS FOR UPLOADING FILE

    $(document).on('click', '#upload-bulk', function() {
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());
        $.ajax({
            url: '/api/v1/bulk/parse/file/upload',
            method: 'POST',
            dataType: 'json',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            },
            success: function(response) {
                console.log(response);
                if (response.status == 200) {
                    response.data.forEach(function(data, index) {
                        setTimeout(function() {
                            const name = data.name ? data.name : data.username;
                            toastMessage('success', `${name} created`);
                        }, index * 800);
                    });
                } else {
                    toastMessage('error', 'failed to import bulk file, please see error report');
                }
            }
        }).done(function(response) {
            bulkReposponseDom(response);
            generateCSRFToken();
         })
    });

    // END OF BUTTON EVENT LISTENERS FOR UPLOADING FILE

    // GET CURRENT ROUTES 


    // EMBEDD PARENT DIV FOR TABLE PREVIEW DIV
    function embedParentDiv() {
        return `
        <ul class="nav nav-pills mt-4 mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-table" type="button" role="tab">Table</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-array" type="button" role="tab">Raw</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-table" role="tabpanel">

            </div>
            <div class="tab-pane fade" id="pills-array" role="tabpanel">

            </div>
        </div>
        <button type="button" class="btn btn-primary float-end mt-5" id="upload-bulk">Import Bulk</button>
        `;
    }

    // HANDLING OF BULK RESPONSES
    function bulkReposponseDom(response) {
        if(response.status == 200) {
            $('.preview-bulk').html(`
                <div class="status" id="bulk_status">
                    <div>
                        <code>// no file is currently parsed</code>
                    </div>
                    <div>
                        <code>// upload a file</code>
                    </div>
                </div>
            `);
        } else {
            $('.preview-bulk').html(`
                <div class="status" id="bulk_status">
                    <div>
                        <code>// failed to import bulk file</code>
                    </div>
                    <div class="section-tle mt-3 mb-3">
                        <small class="text-muted">Error Report</small>
                    </div>
                    <div class="error-report">
                    
                    </div>
                    <div class="section-tle mt-3 mb-3">
                        <small class="text-muted">Suggested Data</small>
                    </div>
                    <div class="suggested-download">
    
                    </div>
                </div>
            `);
            
            formatErrorTable(response.error);
    
            if(response.suggested_data == null) {
                $('.suggested-download').html(`<a href="javascript:void(0)" class="nav-link d-flex gap-2 align-items-center" style="font-size: 14px;"><i class='bx bx-download'></i>No Suggested Data</a>`)
            } else {
                $('.suggested-download').html(`<a href="/uploads/suggested-data/${response.suggested_data}" class="nav-link d-flex gap-2 align-items-center" style="font-size: 14px;" download><i class='bx bx-download'></i>${response.suggested_data}</a>`)
            }
        }
    }

    // SHOW ERROR IN TABLES INCLUDING FIELD NAME, VALUE AND ERROR MESSAGE
    // SHOW ALSO SUGGESTED DATA IF CAPABLE OF FILTERING DUPLICATES
    function formatErrorTable(error) {
        let table = `
            <table class="table nowrap" id="parsed-table">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
            `;
        error.forEach(function(data) {
            table += `
            <tr>
                <td>${data["field"]}</td>
                <td>${data["value"]}</td>
                <td>${data["message"]}</td>
            </tr>
            `;
        });
    
        table += `
            </tbody>
        </table>
        `;
    
        $('.error-report').html(table);

        $('#parsed-table').DataTable({
            "responsive": true,
            "scrollX": true,
            "autoWidth": true,
            "stateSave": true,
            "scrollY": '500px',
            'scrollCollapse': true,
            "paging": true,
            "stateSave": true
        });

    
    }

    // FORMAT TABLE PREVIEW TO DATATABLES CONTAINING ALL PARSED DATA
    function formatTable(title, data) {
        let count = title.length;
        let table = `
            <table class="table nowrap" id="parsed-table">
                <thead>
                    <tr>
                        `;
    
        title.forEach(function(title) {
            table += `
            <th>${title}</th>
            `;
        });
    
        table += `
                    </tr>
                </thead>
                <tbody>
            `;
    
        data.forEach(function(data) {
            table += `
            <tr>
            `;
    
            for (let i = 0; i < count; i++) {
                table += `
                    <td>${data[i]}</td>
                `;
            }
    
            table += `
            </tr>
            `;
        });
    
        table += `
                </tbody>
            </table>
        `;
    
        $('#pills-table').html(table);

        $('#parsed-table').DataTable({
            "responsive": true,
            "scrollX": true,
            "autoWidth": true,
            "stateSave": true,
            "scrollY": '500px',
            'scrollCollapse': true,
            "paging": true,
            "stateSave": true
        });

    }

    // FORMAT RAW PREVIEW CONTAINING PARSED DATA
    // CONVERTED TO JSON / ARRAY
    
    function formatRaw(data) {
        const fomattedString = '<pre>' + JSON.stringify(data, null, 3) + '</pre>';
        $('#pills-array').html(fomattedString);
    }

}