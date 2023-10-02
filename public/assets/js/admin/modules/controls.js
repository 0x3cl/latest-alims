import {getJWTtoken} from './dataUtils.js';
import {generateCSRFToken, reloadCardData} from './utils.js';

export async function controls() {
    const response = await getJWTtoken();
    const token = response.token;

    $(document).on('click', '#control', function() {
        const type = $(this).data('type');
        const action = $(this).data('action');
        const id = [$(this).data('id')];
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());
        $.ajax({
            url: `/api/v1/controls/${action}/${type}`,
            method: 'POST',
            data: {
                ids: id
            }, beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', `Bearer ${token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                console.log(response);
            }
        }).done(function() {
            generateCSRFToken();
            reloadCardData();
        });
    });
}