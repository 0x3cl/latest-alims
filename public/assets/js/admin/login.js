import {generateCSRFToken} from './modules/utils.js';

$(document).ready(function() {
    $('#login-form').on('submit', function(e) {
        
        // PREVENT FROM SUBMITTING
        e.preventDefault();
    
        // STORE INPUT DATA TO VARIABLES
        const username = DOMPurify.sanitize($('#username').val().trim());
        const password = DOMPurify.sanitize($('#password').val().trim());
        const csrf_token = DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());
        
        // PERFORM VALIDATION
    
        // AJAX POST REQUEST
        $.ajax({
            url: '/api/v1/admin/login',
            method: 'POST',
            dataType: 'JSON',
            data: {
                username: username,
                password: password
            }, beforeSend: function(xhr) {
                $('#btn-login').attr('disabled', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status != 200) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops..',
                        text: response.message,
                      });
                } else {
                    console.log(response)
                    window.location.href = '/admin/dashboard'
                }
            }
        }).done(function() {
            generateCSRFToken();
            $('#btn-login').attr('disabled', false);
            $('#password').val('');
        }) 
    
    })
});