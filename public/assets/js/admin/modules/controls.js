import {getJWTtoken} from './dataUtils.js';
import {generateCSRFToken, generateRandomCode, reloadTableContent, multiSelectTable, toastMessage} from './utils.js';
import {deleteModal } from './modal.js';

export async function controls(table) {

    const response = await getJWTtoken();
    const jwt_token = response.token;

    multiSelectTable();

    $(document).on('click', '#control', function() {
        const type = $(this).data('type');
        const action = $(this).data('action');
        const ids = $(this).data('id') ? [$(this).data('id')] : getAllSectedID();
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        if($.isArray(ids) && ids.length > 0) {
            if(action === 'delete') {
                const code = generateRandomCode();
                deleteModal(code);
                $('#control-delete-proceed').on('click', function() {
                    let user_code = $('#confirmDeleteModal #code').val().trim();
                    user_code = DOMPurify.sanitize(user_code);
                    if(code === user_code) {
                        $.ajax({
                            url: `/api/v1/controls/${action}/${type}`,
                            method: 'POST',
                            data: {
                                ids: ids
                            }, beforeSend: function(xhr) {
                                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
                            }, success: function(response) {
                                console.log(response);
                            }
                        }).done(function() {
                            generateCSRFToken();
                            reloadTableContent();
                        });
                        $('#confirmDeleteModal').modal('hide');
                    } else {
                        $('#confirmDeleteModal').modal('hide');
                        setTimeout(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops..',
                                text: 'Incorrect captcha code',
                            });
                        }, 600)
                    }
                });
            } else {
                $.ajax({
                    url: `/api/v1/controls/${action}/${type}`,
                    method: 'POST',
                    data: {
                        ids: ids
                    }, beforeSend: function(xhr) {
                        xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                        xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
                    }, success: function(response) {
                        console.log(response);
                    }
                }).done(function() {
                    generateCSRFToken();
                    reloadTableContent();
                    table();
                });
            }            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Ooops..',
                text: 'No item selected',
            });
        }
    });

    $('#create-user').on('submit', function(e) {
        e.preventDefault();
        
        const type = DOMPurify.sanitize($(this).data('type'));

        const firstname = DOMPurify.sanitize($('#firstname').val().trim());
        const lastname = DOMPurify.sanitize($('#lastname').val().trim());
        const email = DOMPurify.sanitize($('#email').val().trim());
        const contact = DOMPurify.sanitize($('#contact').val().trim());
        const address = DOMPurify.sanitize($('#address').val().trim());
        const state = DOMPurify.sanitize($('#state').val().trim());
        const city = DOMPurify.sanitize($('#city').val().trim());
        const birthday = DOMPurify.sanitize($('#birthday').val().trim());
        const gender = DOMPurify.sanitize($('#gender').val().trim());
        const username = DOMPurify.sanitize($('#username').val().trim());
        const password = DOMPurify.sanitize($('#password').val().trim());
        const password_repeat = DOMPurify.sanitize($('#password-repeat').val().trim());

        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: `/api/v1/users/create/${type}`,
            method: 'POST',
            dataType: 'json',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                contact: contact,
                address: address,
                state: state,
                city: city,
                birthday: birthday,
                gender: gender,
                username: username,
                password: password,
                password_repeat: password_repeat,
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            $('input, select').val('');
            generateCSRFToken();
        });
        

    });

    $('#create-admin').on('submit', function(e) {
        e.preventDefault();
        
        const type = DOMPurify.sanitize($(this).data('type'));

        const firstname = DOMPurify.sanitize($('#firstname').val().trim());
        const lastname = DOMPurify.sanitize($('#lastname').val().trim());
        const email = DOMPurify.sanitize($('#email').val().trim());
        const gender = DOMPurify.sanitize($('#gender').val().trim());
        const username = DOMPurify.sanitize($('#username').val().trim());
        const password = DOMPurify.sanitize($('#password').val().trim());
        const password_repeat = DOMPurify.sanitize($('#password-repeat').val().trim());

        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: `/api/v1/users/create/${type}`,
            method: 'POST',
            dataType: 'json',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                gender: gender,
                username: username,
                password: password,
                password_repeat: password_repeat,
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            $('input, select').val('')
            generateCSRFToken();
        });
    });

    $('#create-course').on('submit', function(e) {
        e.preventDefault();
        
        const type = DOMPurify.sanitize($(this).data('type'));
        const code = DOMPurify.sanitize($('#code').val().trim());
        const name = DOMPurify.sanitize($('#name').val().trim());
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: '/api/v1/courses/create',
            method: 'POST',
            dataType: 'json',
            data: {
                code: code,
                name: name,
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            $('input, select').val('');
            generateCSRFToken();
        });
        

    });

    $('#create-subject').on('submit', function(e) {
        e.preventDefault();
        const code = DOMPurify.sanitize($('#code').val().trim());
        const course = DOMPurify.sanitize($('#course').val().trim());
        const year = DOMPurify.sanitize($('#year').val().trim());
        const section = DOMPurify.sanitize($('#section').val().trim());
        const name = DOMPurify.sanitize($('#name').val().trim());
        const description = DOMPurify.sanitize($('#description').val().trim());
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: '/api/v1/subjects/create',
            method: 'POST',
            dataType: 'json',
            data: {
                code: code,
                course: course,
                year: year,
                section: section,
                name: name,
                description: description
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            $('input, select').val('');
            generateCSRFToken();
        });
        

    });

    $('#create-section').on('submit', function(e) {
        e.preventDefault();
       
        const name = DOMPurify.sanitize($('#name').val().trim());
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: '/api/v1/sections/create',
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            $('input, select').val('')
            generateCSRFToken();
        });
        

    });

    $('#create-year').on('submit', function(e) {
        e.preventDefault();
       
        const name = DOMPurify.sanitize($('#name').val().trim());
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: '/api/v1/years/create',
            method: 'POST',
            dataType: 'json',
            data: {
                name: name,
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                console.log(response);
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            generateCSRFToken();
        });
        

    });

    $('#update-smtp').on('submit', function(e) {
        e.preventDefault();
       
        const server = DOMPurify.sanitize($('#server').val().trim());
        const port = DOMPurify.sanitize($('#port').val().trim());
        const username = DOMPurify.sanitize($('#username').val().trim());
        const password = DOMPurify.sanitize($('#password').val().trim());
        
        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: '/api/v1/smtp/update',
            method: 'POST',
            dataType: 'json',
            data: {
                server: server,
                port: port,
                username: username,
                password: password,
            }, beforeSend: function(xhr) {
                $('#btn-proceed').attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $('#btn-proceed').attr('disabled', false);
            generateCSRFToken();
        });
    });

    $('#change-password').on('submit', function(e) {
        e.preventDefault();
        const old_password = DOMPurify.sanitize($('#old-password').val().trim());
        const new_password = DOMPurify.sanitize($('#new-password').val().trim());
        const password_repeat = DOMPurify.sanitize($('#password-repeat').val().trim());

        const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

        $.ajax({
            url: '/api/v1/my/password',
            method: 'POST',
            dataType: 'json',
            data: {
               old_password: old_password,
                new_password: new_password,
                password_repeat: password_repeat,
            }, beforeSend: function(xhr) {
                $(this).attr('disabled', true);
                xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            }, success: function(response) {
                if(response.status == 200) {
                    toastMessage('success', response.message);
                } else {
                    const err = response.message;
                    if(typeof err == 'object') {
                        for(const key in err) {
                            toastMessage('error', err[key]);
                        }
                    } else if(typeof err == 'string') {
                        toastMessage('error', err);
                    }
                }
            }
        }).done(function(){
            $(this).attr('disabled', false);
            $('input').val('');
            generateCSRFToken();
        });
    })


    function getAllSectedID() {
        const single = $('.multi-select-single');        
        const ids = single.filter(':checked')
        .map(function () {
          return $(this).data('id');
        })
        .get();

        return ids;
    }
}