import {getCsrfToken} from './dataUtils.js';
// import {callAll} from './datatables.js';

export async function generateCSRFToken() {
    const response = await getCsrfToken();
    if(response.status == 200) {
        const token = response.token;
        $('input[name="csrf_token"]').val(token);
    }
}

export function generateRandomCode() {
    const length = Math.floor(Math.random() * 2) + 6;
    let code = '';
  
    for (let i = 0; i < length; i++) {
      const randomType = Math.floor(Math.random() * 3); 
  
      if (randomType === 0) {
        code += String.fromCharCode(Math.floor(Math.random() * 26) + 97);
      } else if (randomType === 1) {
        code += String.fromCharCode(Math.floor(Math.random() * 26) + 65);
      } else {
        code += Math.floor(Math.random() * 10); 
      }
    }
  
    return code;
}

export function accountStatus(status) {
    switch (status) {
        case '0':
            return '<div class="alert alert-danger p-2 mb-0">Not Active</div>';
        case '1':
            return '<div class="alert alert-success p-2 mb-0">Active</div>';
        default:
            return 'unknown';
    }
}

export function enrollStatus(status) {
    switch (status) {
        case '0':
            return '<div class="alert alert-danger p-2 mb-0">Not Enrolled</div>';
        case '1':
            return '<div class="alert alert-success p-2 mb-0">Enrolled</div>';
        default:
            return 'unknown';
    }
}

export function userRole(role) {
    switch (role) {
        case '1':
            return 'instructor';
        case '2':
            return 'student';
        default:
            return 'administrator';
    }
}

export function reloadTableContent() {
    $( "#card-data" ).load(window.location.href + " #card-data" );
    callAll();
}

export function multiSelectTable() {
    $('#multi-select-all').on("change", function() {
        if($(this).is(':checked')) {
            $('.multi-select-single').prop('checked', true);
        } else {
            $('.multi-select-single').prop('checked', false);
        }
    });
}

export function get_date() {
    const currentDate = new Date();
    const formattedDate = currentDate.toLocaleString('en-US', { month: 'long' }) + ' ' +
                ('0' + currentDate.getDate()).slice(-2) + ', ' +
                currentDate.getFullYear();
    return formattedDate;
}


export function toastMessage(status, message) {
    $.toast({
        heading: "System Message",
        text: `${message}`,
        showHideTransition: "fade",
        icon: `${status}`,
        position: "top-right",
        allowToastClose: true,
        hideAfter: 3500,
        stack: 5,
        loaderBg: `${status === "error" ? "red" : "green"}`
    });   
}

export function isEmpty(data) {
    if (data === undefined || data === null) {
        return 'Not yet updated';
    }

    const trimmedData = data.trim();
    return trimmedData === '' ? 'Not yet updated' : trimmedData;
}

export function clearFields() {
    $('input, select').val('');
}

export function formatFile(type, name) {
    let icon;
    switch(type) {
        case 'doc':
        case 'docx':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-docx"></i>`;
            break;
        case 'pdf':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-pdf"></i>`;
            break;
        case 'xlsx':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-xlsx"></i>`;
            break;
        case 'xls':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-xls"></i>`;
            break;
        case 'txt':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-txt"></i>`;
            break;
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            icon = `<i style="font-size: 25px" class="bi bi-image"></i>`;
            break;
        case 'html':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-html"></i>`;
            break;
        case 'css':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-css"></i>`;
            break;
        case 'js':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-js"></i>`;
            break;
        case 'json':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-json"></i>`;
            break;
        case 'jsx':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-jsx"></i>`;
            break;
        case 'php':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-php"></i>`;
            break;
        case 'sql':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-sql"></i>`;
            break;
        case 'ppt':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-ppt"></i>`;
            break;
        case 'pptx':
            icon = `<i style="font-size: 25px" class="bi bi-filetype-pptx"></i>`;
            break;
        default:
            icon = `<i style="font-size: 25px" class="bi bi-file-earmark-richtext"></i>`;
            break;
    }

    return `<div class="d-flex align-items-center gap-2">
                ${icon} ${name}
            </div>`;

}

export function shortenFilename(filename, prefixLength, suffixLength) {
    if (filename.length <= prefixLength + suffixLength) {
      return filename; // No need to shorten if the filename is already shorter than prefix + suffix
    }
    
    const prefix = filename.slice(0, prefixLength);
    const suffix = filename.slice(-suffixLength);
    
    return prefix + '..' + suffix;
  }
  export function ckeditor(classSelector, name) {
    if (!window.editor) {
        window.editor = {};
      }
    // Initialize the array for the specified name if it doesn't exist
    if (!window.editor[name]) {
      window.editor[name] = [];
    }
  
    const elements = document.querySelectorAll(classSelector);
  
    elements.forEach((element) => {
      ClassicEditor
        .create(element, {
          placeholder: `What's your thoughts?`,
          ckfinder: {
            uploadUrl: '/api/v1/upload/image'
          },
        })
        .then(ckeditor => {
          // Add each CKEditor instance to the array associated with its name
          window.editor[name].push(ckeditor);
          window.editorz = ckeditor;

        })
        .catch((err) => {
          // Handle errors if needed
          console.error(err);
        });
    });
  }
  
  export function submissionStatus(status) {
    if(status == 1) {
        return `
            <div class="alert alert-success mb-0">Done</div>
        `;
    } else {
        return `
            <div class="alert alert-danger mb-0">No Submission</div>
        `;
    }
  }