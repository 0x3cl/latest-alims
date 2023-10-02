import {getCsrfToken} from './dataUtils.js';
import {datatablesData} from './datatables.js';

export async function generateCSRFToken() {
    const response = await getCsrfToken();
    if(response.status == 200) {
        const token = response.token;
        $('input[name="csrf_token"]').val(token);
    }
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

export function reloadCardData() {
    $( "#card-data" ).load(window.location.href + " #card-data" );
    datatablesData();
}