import {getCsrfToken} from './dataUtils.js';
import {callAll} from './datatables.js';

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


export function toastMessage(icon, message) {
    $.toast({
        heading: "System Message",
        text: `${message}`,
        showHideTransition: "fade",
        icon: `${icon}`,
        position: "top-right",
        allowToastClose: true,
        hideAfter: 3500,
        stack: 5,
        loaderBg: `${icon === "error" ? "red" : "green"}`
      });
      
}

export function isEmpty(data) {
    if (data === undefined || data === null) {
        return 'Not yet updated';
    }

    const trimmedData = data.trim();
    return trimmedData === '' ? 'Not yet updated' : trimmedData;
}