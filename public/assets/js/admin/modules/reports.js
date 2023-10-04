import { get_date, toastMessage } from "./utils.js";

export function reportDom() {

let report_category = '';
let report_item = '';
let report_date = '';
let specific_date = '';
let timespan_date_from = '';
let timespan_date_to = '';
let filteredText = '';

function userReportDiv() {
    const div = `
        <div class="row">
            <div class="col-12 col-md-12 mb-3">
                <label for="select-item">What kind of user do you want to generate the report for? <span class="text-danger">*</span></label>
                <select name="select-item" id="select-item" class="form-control w-100">
                    <option value="">Choose</option>
                    <option value="instructors">Instructors</option>
                    <option value="students">Students</option>
                    <option value="admins">Administrators</option>
                </select>
            </div>
            <div class="col-12 col-md-12 mb-3">
                <label for="select-date">From which date do you want to generate the data? <span class="text-danger">*</span></label>
                <select name="select-date" id="select-date" class="form-control w-100">
                    <option value="">Choose</option>
                    <option value="default">Use default</option>
                    <option value="specific">Specify a specific date</option>
                    <option value="timespan">Specify a timespan</option>
                </select>
            </div>
        </div>
        <div id="report-date-dom"></div>
    `;
    $('#report-select-dom').html(div);
}

function classCourseReportDiv() {
    const div = `
        <div class="row">
            <div class="col-12 col-md-12 mb-3">
                <label for="select-item">What kind of class course do you want to generate the report for? <span class="text-danger">*</span></label>
                <select name="select-item" id="select-item" class="form-control w-100">
                    <option value="">Choose</option>
                    <option value="courses">Courses</option>
                    <option value="subjects">Subjects</option>
                    <option value="sections">Sections</option>
                    <option value="years">Years</option>
                    <option value="categories">Categories</option>
                </select>
            </div>
            <div class="col-12 col-md-12 mb-3">
                <label for="select-date">From which date do you want to generate the data? <span class="text-danger">*</span></label>
                <select name="select-date" id="select-date" class="form-control w-100">
                    <option value="">Choose</option>
                    <option value="default">Use default</option>
                    <option value="specific">Specify a specific date</option>
                    <option value="timespan">Specify a timespan</option>
                </select>
            </div>
        </div>
        <div id="report-date-dom"></div>
    `;
    $('#report-select-dom').html(div);
}

function specificDate() {
    const div = `
        <div class="row">
            <div class="col-12 col-md-12 mb-3">
                <label for="specific-date">Choose date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="specific-date">
            </div>
        </div>
        <div id="report-action-dom"></div>
    `;
    $('#report-date-dom').html(div);
}

function timespanDate() {
    const div = `
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <label for="timespan-date-from">Choose date (from) <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="timespan-date-from">
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="timespan-date-to">Choose date (to) <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="timespan-date-to">
            </div>
        </div>
        <div id="report-action-dom"></div>
    `;
    $('#report-date-dom').html(div);
}

function defaultDate() {
    const div = `
        <button class="btn btn-primary float-end" id="btn-generate-report">Continue</button>
    `;
    $('#report-date-dom').html(div);
}

function ifComplete() {
    const isComplete = report_category !== '' || report_item !== '' || report_date !== '';

    const div = `
        <button class="btn btn-primary float-end" id="btn-generate-report">Continue</button>
    `;

    if (isComplete) {
        $('#report-action-dom').html(div);
    }  else {
        $('#report-action-dom').empty();
    }

    

}

function skeletonLoading() {
    const div = `
    <ul class="list-unstyled skeleton-loading">
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text sm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text xsm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text sm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text sm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text xsm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text sm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text xsm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text xsm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text sm-w"></div>
                </div>
            </div>
        </li>
        <li class="list-unstyled-item">
            <div class="d-flex align-items-center gap-2 skeleton-with-icon">
                <div class="w-100">
                    <div class="skeleton-text xsm-w"></div>
                </div>
            </div>
        </li>
    </ul>
    `;
    $('#report-data').html(div);
}

function dataTablesOptionDefault(title, filename) {
    return {
        responsive: true,
        scrollX: true,
        autoWidth: true,
        stateSave: true,
        scrollY: '',
        scrollCollapse: true,
        paging: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
            },
            {
                extend: 'csv',
                filename: get_date() + '_' + filename,
            },
            {
                extend: 'excelHtml5',
                filename: get_date() + '_' + filename,
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                title: `ALIM-s - ${title.toLocaleUpperCase()}`,
                customize: function(doc) {
                var table = $('#report-table').DataTable();

                var header = table.columns().header().toArray().map(function(element) {
                    return $(element).text().trim().toLocaleUpperCase();
                });
                    
                // Customized code for the formal report
                // Create a new document definition
                if(report_date === 'default') {
                    filteredText = `Default / All`;
                } else if (report_date === 'specific') {
                    filteredText = `${specific_date}`;
                  } else if (report_date === 'timespan') {
                    filteredText = `From ${timespan_date_from} to ${timespan_date_to}`;
                }

                var docDefinition = {
                    content: [
                    // Title section
                    {
                        text: `ALIM-S - USERS DATA REPORT`,
                        style: 'title'
                    },
                    {
                        text: `Report Date: ${get_date()}`,
                        style: 'subtitle',
                    },
                    {
                        text: `Type of Report: ${report_category.toLocaleUpperCase()}`,
                        style: 'overview',
                    },
                    {
                        text: `Report for:  ${report_item.toLocaleUpperCase()}`,
                        style: 'overview',
                    },
                    {
                        text: `Filtered by:  ${filteredText}`,
                        style: 'overview',
                    },
                    {
                        text: `Generated by: Admin [Role]`,
                        style: 'overview',
                    },
                    // Table section
                    // Table section
                    {
                        style: 'table',
                            alignment: 'center',
                            table: {
                                headerRows: 1,
                                width: '100%',
                                body: [
                                    header,
                                    // Populate table rows with DataTables data
                                    ...$('#report-table').DataTable().rows().data().toArray().map(row =>
                                        row.map(cell => cell.replace(/(<([^>]+)>)/gi, ''))
                                    )
                                ]
                            },
                            layout: {
                                hLineColor: function(i, node) {
                                    if (i === node.table.body.length - 0) {
                                    return '#434343'; // Set the color of the last horizontal line
                                    } else if (i === 0 || i === 1) {
                                    return '#000'; // Set the color of the first and second horizontal lines
                                    } else if (i > 1) {
                                    return '#fff'; // Set the color of other horizontal lines
                                    } else {
                                    return 'transparent'; // Set the color of remaining horizontal lines
                                    }
                                },
                            },
                            tableHeader: {
                                fillColor: '#000' // Set the background color of the table header
                            },
                            width: '100%', // Set table width to 100%
                            margin: [0, 10, 0, 20] // Add margin to create space after the table
                    }
        
                    // Add more sections and content as needed
                    ],
                    styles: {
                        title: {
                            fontSize: 14,
                            bold: true,
                            alignment: 'center',
                            margin: [0, 0, 0, 5] // Add margin to create space after the title
                        },
                        subtitle: {
                            fontSize: 10,
                            alignment: 'center',
                            margin: [0, 0, 0, 20] // Add margin to create space after the subtitle
                        },
                        overview: {
                            fontSize: 9,
                            bold: true,
                            margin: [0, 0, 0, 3] // Add margin to create space after the subtitle
                        },
                        table: {
                            fontSize: 8,
                            bold: true,
                            border: [false, true, false, false],
                            margin: [0, 0, 0, 10] // Add margin to create space after the table
                        }
                        // Define more styles for different sections and content as needed
                        }
                };

                // Apply the customized document definition to the exported PDF document
                doc.content = docDefinition.content;
                doc.styles = docDefinition.styles;
                },
                filename: get_date() + '_' + filename,
            }
        ]
      };
  }

function showReport(data) {
    let headers = [];
    Object.keys(data[0]).forEach(function(key) {
        headers.push(key.charAt(0).toUpperCase() + key.slice(1));
    });

    let div = `
      <table class="table nowrap mt-3" id="report-table">
        <thead>
          <tr>
    `;

    headers.forEach(function(header) {
        div += `
            <th>${header}</th>
        `;
    });

    div += `
          </tr>
        </thead>
        <tbody>
    `;

    data.forEach(function(data) {
        div += `
          <tr>
        `;

        headers.forEach(function(header) {
            div += `
                <td>${(data[header.toLowerCase()])}</td>
            `;
        });

        div += `
          </tr>
        `;
    });

    div += `
        </tbody>
      </table>
    `;

    setTimeout(function() {
        const title = 'Users Report';
        const filename = 'users_report';
        $('#report-data').html(div);
        $('#report-table').DataTable({
            ...dataTablesOptionDefault(title, filename) 
        });
    }, 2000);
}

$(document).on('change', '#select-item', function() {
    report_item = $(this).val().trim();
    ifComplete();
});

$(document).on('change', '#select-report', function() {
    const value = $(this).val().trim();
    switch (value) {
        case 'user-report':
            report_category = value;
            userReportDiv();
            break;
        case 'class-course-report':
            report_category = value;
            classCourseReportDiv();
            break;
        default:
            $('#report-select-dom').empty();
    }
    ifComplete();
});

$(document).on('change', '#select-date', function() {
    const value = $(this).val().trim();
    switch (value) {
        case 'default':
            report_date = value;
            defaultDate();
            break;
        case 'specific':
            report_date = value;
            specificDate();
            break;
        case 'timespan':
            report_date = value;
            timespanDate();
            break;
        default:
            $('#report-date-dom').empty();
    }
    ifComplete();
});

$(document).on('change', '#specific-date', function() {
    specific_date = $(this).val().trim();
});

$(document).on('change', '#timespan-date-from', function() {
    timespan_date_from = $(this).val().trim();
});

$(document).on('change', '#timespan-date-to', function() {
    timespan_date_to = $(this).val().trim();
});

$(document).on('click', '#btn-generate-report', function() {
    console.log(report_item);
    $.ajax({
        url: '/api/v1/generate/report',
        method: 'POST',
        dataType: 'json',
        data: {
            report_category: report_category,
            report_item: report_item,
            report_date: report_date,
            default_date: 'default',
            specific_date: specific_date,
            timespan_date_from: timespan_date_from,
            timespan_date_to: timespan_date_to
        }, beforeSend: function() {
            $('#report-modal').modal('show');
        }, success: function(response) {
            if(response.status === 200) {
                skeletonLoading();
                if(response.data.length === 0) {
                    setTimeout(function() {
                        $('#report-modal').modal('hide');
                        toastMessage('error', 'no records found');
                    }, 1500);
                } else {
                    showReport(response.data);
                }
            }
        }
    });

});


}