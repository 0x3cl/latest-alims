<div class="page-wrapper">
    <div class="main-container">
        <div class="floating-container">
            <div class="floating-menu-content shadow-lg">
                <ul class="list-unstyled">
                    <li>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-post-modal" class="d-flex align-items-center gap-2 nav-link">
                            <i class="bi bi-pencil-square" style="font-size: 18px; margin-bottom: 6px"></i>
                            <h5>Create Post</h5>
                        </a> 
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-assessment-modal" class="d-flex align-items-center gap-2 nav-link">
                            <i class="bi bi-lightbulb" style="font-size: 18px; margin-bottom: 6px"></i>
                            <h5>Create Assessment</h5>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="floating-icon">
                <i class="bi bi-plus-lg"></i>
            </div>
        </div>
        <?php include(APPPATH . '/Views/Instructor/templates/sidebar-post.php'); ?>
        <div class="app-container">
            <?php include(APPPATH . '/Views/Instructor/templates/navbar.php'); ?>
            <?= csrf_field(); ?>
            <div class="app-hero-header d-flex align-items-center">
                <ol class="breadcrumb d-none d-lg-flex">
                    <li class="breadcrumb-item">
                        <i class="bi bi-house lh-1"></i>
                        <a href="index.html" class="text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item text-secondary" aria-current="page">
                        Courses
                    </li>
                    <li class="breadcrumb-item text-secondary" aria-current="page">
                        Subjects
                    </li>
                    <li class="breadcrumb-item text-secondary" aria-current="page">
                        <div class="post-title"></div>
                    </li>
                </ol>
            </div>
            <div class="app-body">
                <div class="post my-3">
                    <h1 class="post-title mb-4">
                        <div class="skeleton-text" style="width: 40%"></div>
                    </h1>
                    <div class="post-others mt-5 mb-4">
                    
                    </div>
                    <div class="post-content">
                        <div class="skeleton-text" style="width: 60%"></div>
                        <div class="skeleton-text" style="width: 30%"></div>
                        <div class="skeleton-text" style="width: 50%"></div>
                        <div class="skeleton-text" style="width: 40%"></div>
                        <div class="skeleton-text" style="width: 90%"></div>
                        <div class="skeleton-text" style="width: 75%"></div>
                        <div class="skeleton-text" style="width: 80%"></div>
                    </div>
                    <div class="post-assessment"></div>
                </div>
                <div class="attachments-container">
                    <div class="toggle-icon" id="show-attachments">
                        <i class="bi bi-arrow-left-square"></i>
                    </div>
                    <div class="attachments-content">
                        <p>File Attachments</p>
                        <div class="post-attachments">
                            <div class="files">

                            </div>
                            <div class="uploads">
                                <div class="droparea">
                                    <input type="file" name="attachment[]" id="attachment" class="attachment" multiple>
                                </div>
                                <button class="btn btn-primary float-end mt-3" id="upload-attachment">Submit</button>
                                <div class="attachment-preview">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-footer d-flex align-items-center">
                <div class="post-actions mt-2 d-flex gap-2">
                   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create-post-modal">
    <form id="create-post" method="post">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="exampleModalXlLabel">
                        Create Post
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="eid" id="eid" value="<?= $requested_data['eid']; ?>">
                    <input type="hidden" name="sid" id="sid" value="<?= $requested_data['sid'] ?>">
                    <input type="hidden" name="pid" id="pid" value="<?= $requested_data['pid'] ?>">
                    <div class="row">
                        <h5 class="my-4"><em>Note: All <span class="text-danger">*</span> is required</em></h5>
                        <div class="col-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="What's this post is about?">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="title">Group <span class="text-danger">*</span></label>
                                <select name="group" id="post-group" class="post-group-select form-control">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="mb-1" for="title">Content <span class="text-danger">*</span></label>
                            <div class="form-group mb-3">
                                <textarea id="p-editor" name="content"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <h5 class="mb-3">Set Timestamp Availability (Optional)</h5>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="title">Date</label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="title">Time</label>
                                <input type="time" name="time" id="time" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="droparea" class="mb-1">Attachments</label>
                            <div class="droparea">
                                <input type="file" name="attachment" id="attachment" class="post-attachment" multiple>
                            </div>
                            <div class="attachment-preview">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <h5 class="mb-3">Settings (Optional)</h5>
                        <div class="col-4">
                            <div class="form-check d-flex align-items-center gap-3">
                                <input class="form-check-input" type="checkbox" id="accept-submission" name="accept-submission" value="true">
                                <small class="form-check-label mt-1 m-0">Accept Submissions</small>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="schedule">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary d-flex align-items-center gap-2" id="btn-proceed">Proceed <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="create-assessment-modal">
    <form id="create-assessment" method="post">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4" id="exampleModalXlLabel">
                        Create Assessment
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="eid" id="eid" value="<?= $requested_data['eid']; ?>">
                    <input type="hidden" name="sid" id="sid" value="<?= $requested_data['sid'] ?>">
                    <input type="hidden" name="pid" id="pid" value="<?= $requested_data['pid'] ?>">
                    <div class="row">
                        <h5 class="my-4"><em>Note: All <span class="text-danger">*</span> is required</em></h5>
                        <div class="col-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="a-title"  class="form-control" placeholder="What's this post is about?">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="title">Group <span class="text-danger">*</span></label>
                                <select name="group" id="a-group" class="post-group-select form-control">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="type">Type <span class="text-danger">*</span></label>
                                <select name="type" id="a-type" class="form-control">
                                    <option value="">Choose</option>
                                    <option value="1">Quiz</option>
                                    <option value="2">Examination</option>
                                    <option value="3">Practice</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group mb-3">
                                <label class="mb-1" for="instruction">Content</label>
                                <textarea name="content" id="a-editor" class="editor" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-end my-5 me-4">
                                <button type="button" class="btn btn-primary" id="add-q-item">Add Item</button>
                            </div>
                            <div class="q-item-container">
                                <div class="card shadow-lg mb-3 q-item" id="q-item-1" data-id="1">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>Q1.</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-4 py-5">
                                        <div class="row">
                                            <div class="col-12 col-md-7">
                                                <div class="form-group mb-3">
                                                    <label class="mb-1" for="question">Question</label>
                                                    <input type="text" name="question" id="question" class="form-control" placeholder="Question...">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-5">
                                                <div class="form-group mb-3">
                                                    <label class="mb-1" for="type">Type</label>
                                                    <select name="answer-type" id="answer-type" class="form-control" data-id="1">
                                                        <option value="">Choose Answer Type</option>
                                                        <option value="1">Multiple Choice</option>
                                                        <option value="2">Identification</option>
                                                        <!-- <option value="3">Explanatory</option> -->
                                                        <!-- <option value="4">Multiple Select</option> -->
                                                        <!-- <option value="5">File Upload</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="chosen-answer-type" data-id="1">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary d-flex align-items-center gap-2" id="btn-proceed">Proceed <i class="bi bi-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="module">
import {generateCSRFToken, generateRandomCode, toastMessage, 
        clearFields, formatFile, shortenFilename, ckeditor} from '/assets/js/instructor/modules/utils.js';
import {getJWTtoken} from '/assets/js/instructor/modules/dataUtils.js';
import {post_group, my_posts, my_assessments, all_posts, post_attachments} from '/assets/js/instructor/modules/dataUtils.js';
import {deleteModal } from '/assets/js/instructor/modules/modal.js';

const response = await getJWTtoken();
const jwt_token = response.token;
const eid = DOMPurify.sanitize($('#eid').val().trim());
const sid = DOMPurify.sanitize($('#sid').val().trim());
const pid = DOMPurify.sanitize($('#pid').val().trim());

const id = <?= $current_userdata['id']?>;
const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());


ckeditor('#a-editor', 'aeditor');
ckeditor('#p-editor', 'peditor');

my_posts(eid, sid, pid).then((response) => {
    console.log(response);
    if(response.status == 200) {
        const data = response.data;
        console.log(data);
        
        if(data != null) {
            $('.post-title').text(data.title);
            $('.post-others').append(DOMPurify.sanitize(
                `
                <div class="col-12 col-md-12">
                    <div class="form-group mb-3">
                        <label class="mb-1" for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="up-title" class="form-control" placeholder="What's this post is about?" value="${data.title}">
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group mb-3">
                        <label class="mb-1" for="title">Group <span class="text-danger">*</span></label>
                        <select name="group" id="post-group" class="form-control">
                            <option value="${data.post_group}">${data.group.toUpperCase()}</option>
                        </select>
                    </div>
                </div>
                `
            )).hide();
            $('.post-content').html(data.content);
                
            if(data.accept_submission == 1) {
                if(data.is_assessment == 0) {
                    $('.post-actions').append(DOMPurify.sanitize(`
                    <a class="btn btn-primary d-flex gap-2 align-items-center" href="/instructor/subjects/posts/submission?eid=${eid}&sid=${sid}&pid=${pid}&is_assessment=false">
                        <i class="bi bi-file-bar-graph"></i>
                        View Submissions
                    </a>
                `));
                } else if(data.is_assessment == 1) {
                    $('.post-actions').append(DOMPurify.sanitize(`
                    <a class="btn btn-primary d-flex gap-2 align-items-center" href="/instructor/subjects/posts/submission?eid=${eid}&sid=${sid}&pid=${pid}&is_assessment=true">
                        <i class="bi bi-file-bar-graph"></i>
                        View Submissions
                    </a>
                `));
                }
            }

            if(data.is_assessment == 1) {
                my_assessments(eid, sid, pid).then((response) => {
                    console.log(response);
                    const data = response.data;
                    const questions = data.questions;
                    const answers = data.answers;
                    const choices = data.choices;

                    const item_count = questions.length;

                    let item_div = '';
                    let choice_div = '';
                    let choice_count;
                    
                    questions.forEach((item, index) => {
                        if(item.assessment_type == 1 || item.assessment_type == 4 ) {
                            item_div += `
                            <div class="card mb-3">
                                <div class="card-body p-4 mb-3">
                                    <div class="question">
                                        <h5>${index + 1}. ${item.question}</h5>
                                        <div class="choices mt-3" data-id="${index+1}">
                                        
                                        </div>
                                    </div>
                                    <div class="note mt-5">
                                        <p class="text-muted"><em>Correct answer is the selected</em></p>
                                    </div>
                                </div>
                            </div>
                            `;
                        } else {
                            item_div += `
                            <div class="card mb-3">
                                <div class="card-body p-4 mb-3">
                                    <div class="question">
                                        <h5>${index + 1}. ${item.question}</h5>
                                        <div class="answer mt-3">
                                            <input type="text" name="answer" id="answer" class="form-control" placeholder="Students answers goes here" readonly>
                                            <hr class="mt-4 mb-3">
                                            <p class="text-muted"><em>Correct answer is: ${item.answers[0].name}</e></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        }
                    });

                    $('.post-assessment').html(item_div);

                    questions.forEach((item, index) => {
                        if (item.assessment_type == 1 || item.assessment_type == 4) {
                            item.choices.forEach((choice, choiceIndex) => {
                                choice_div = `
                                    <div class="option-group">
                                        <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
                                            <input class="form-check-input" type="radio" name="answer_${choice.qid}" value="${choiceIndex + 1}" ${(choiceIndex === parseInt(item.answers[0].name) - 1) ? 'checked' : ''}>
                                            <p style="margin: 3px 0 0 0;" class="choice-text">${choice.name}</p>
                                            <span class="text-success">${(choiceIndex === parseInt(item.answers[0].name) - 1) ? '<i class="bi bi-check-lg fw-bold fs-3"></i>' : ''}</span>
                                        </div>
                                    </div>
                                `;
                                $(`.choices[data-id="${choice.qid}"]`).append(choice_div);
                            });
                        }
                    });
                });
                $('.post-actions').append(DOMPurify.sanitize(`
                    <button class="d-flex gap-1 align-items-center btn btn-danger" id="post-delete"><i class="bi bi-trash3"></i> Delete</button>
                `))
            } else {
                $('.post-actions').append(DOMPurify.sanitize(`
                    <div class="first-group d-flex gap-2">
                        <button class="d-flex gap-1 align-items-center btn btn-secondary" id="post-edit"><i class="bi bi-pencil-square"></i> Edit</button>
                    </div>
                    <button class="d-flex gap-1 align-items-center btn btn-danger" id="post-delete"><i class="bi bi-trash3"></i> Delete</button>
                `))
            }
        } else {
            $(' .post-title').text('No Posts Yet!');
            $('.post-content').text('To create a new post, click the plus sign button below.');
        }

    }
});

all_posts(eid, sid).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        let group = [];        
        if(data.length > 0) {
            data.forEach((item) => {
                if (!group.hasOwnProperty(item.group)) {
                    group[item.group] = [];
                }
                group[item.group].push({
                    'id': item.id,
                    'title': item.title,
                });
            });

            for(const key in group) {
                div += `
                    <li>
                        <div class="post-group ms-4 mt-4 mb-2 text-uppercase" style="font-size: 12px; font-weight: 700">
                            ${key}
                        </div>
                    </li>
                `;
                group[key].forEach((item) => {
                    div += `
                    <li class="${item.id == pid ? 'active current-page' : ''}">
                        <a href="/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${item.id}">
                            <i class="bi bi-card-heading"></i>
                            <span class="menu-text">${item.title}</span>
                        </a>
                    </li>
                    `;
                });
            }

            $('.sidebar-menu.post-group').html(div);
        } else {
            div += `
                <li class="active current-page">
                    <a href="#">
                        <i class="bi bi-info-square"></i>
                        <span class="menu-text">No posts yet</span>
                    </a>
                </li>
            `;
            $('.sidebar-menu.post-group').html(div);
        }

    }
});

post_group().then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        data.forEach((data) => {
            div += `
                <option class="text-uppercase" value="${data.id}">${data.name}</option>
            `;
        });
        $('.post-group-select').append(DOMPurify.sanitize(div));
    }
});

post_attachments(eid, sid, pid).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        console.log(data);
        if(data.length > 0) {
            data.forEach((item) => {
                const raw_filename = item.filename;
                const shortened_filename = shortenFilename(raw_filename, 10, 10);
                let ext = shortened_filename.split('.');
                ext = ext[ext.length - 1];
                div += `
                    <div class="d-flex align-items-center gap-3">
                        ${formatFile(ext, shortened_filename)}
                        <div class="d-flex align-items-center gap-3">
                            <a style="font-size: 15px" href="/uploads/files/${raw_filename}" class="text-success" download><i class="bi bi-download"></i></a>
                            <a style="font-size: 15px" href="javascript:void(0)" id="delete-attachment" data-id="${item.id}" class="text-danger"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                `;
            })
            $('.post-attachments .files').html(DOMPurify.sanitize(div));
        } else {
            $('.post-attachments .files').html(DOMPurify.sanitize(`
                <small class="text-muted"><em>No attachments</em></small>
            `));
        }
    }
});

$('.attachment').on('change', function() {
    const files = $(this)[0].files;
    let preview = '';
    $.each(files, (index, value) => {

        const filename = value.name;
        let ext = filename.split('.');
        ext = ext[ext.length - 1]

        preview += formatFile(ext, filename);

    });

    $('.attachment-preview').html(DOMPurify.sanitize(preview));
});

$('#upload-attachment').on('click', function() {
    const form_data = new FormData();
    const attachments = $('#attachment').prop('files');
    $.each(attachments, ((index, value) => {
        form_data.append('attachments[]', value);
    }));

    form_data.append('pid', pid);

    $.ajax({
        url: '/api/v1/create/upload/attachment',
        method: 'POST',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function(xhr) {
            $(this).attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${response.pid}`;
                }, 1000);
            } else {
                let err = response.message;
                if(typeof err === 'object') {
                    err = Object.values(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops..',
                        text: err[0],
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops..',
                        text: err,
                    });
                }
            }
        },
    }).done(function() {
        $(this).attr('disabled', false);
        clearFields();
        generateCSRFToken();
    });
});

$('#show-attachments').on('click', function() {
    $(this).toggleClass("active");
    $('.attachments-container').toggleClass('active');
});

let is_edit = false;

$(document).on('click', '#post-edit', function() {
    if(!is_edit) {
        ckeditor('.post-content');
        $('.post-title').hide();
        $('.post-others').show();
        $('#post-edit').html(DOMPurify.sanitize(
            `<i class="bi bi-x"></i> Cancel`
        ));
        $('.post-actions .first-group').append(DOMPurify.sanitize(
            `<button class="d-flex gap-1 align-items-center btn btn-success" id="post-save"><i class="bi bi-check-lg"></i> Save</button>`
        ));
        is_edit = true;
    } else {
        const content = window.editorz.getData();
        window.editorz.destroy();
        $('.post-title').show();
        $('.post-others').hide();
        $('.post-content').html(DOMPurify.sanitize(content));
        $('#post-save').remove();
        $('#post-edit').html(DOMPurify.sanitize(
            `<i class="bi bi-pencil-square"></i> Edit`
        ));
        is_edit = false;
    }
});

$(document).on('click', '#post-save', function(e) {
    e.preventDefault();
    const title = DOMPurify.sanitize($('#up-title').val().trim());
    const group = DOMPurify.sanitize($('#post-group').val().trim());
    const content = DOMPurify.sanitize(window.editorz.getData());
    const date_avail = DOMPurify.sanitize($('#date').val());
    const time_avail = DOMPurify.sanitize($('#time').val());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    $.ajax({
        url: '/api/v1/update/post',
        method: 'POST',
        dataType: 'JSON',
        data: {
            pid: pid,
            title: title,
            group: group,
            content: content,
        },
        beforeSend: function(xhr) {
            $('#btn-proceed').attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${pid}`;
                }, 1000);
            } else {
                let err = response.message;
                err = Object.values(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops..',
                    text: err[0],
                });
            }
        }
    });
});

let is_submission = 0;

$('#create-post').on('submit', function(e) {
    e.preventDefault();
    const title = DOMPurify.sanitize($('#title').val().trim());
    const group = DOMPurify.sanitize($('.post-group-select').val().trim());
    const content = DOMPurify.sanitize(window.editor['peditor'][0].getData());
    const date_avail = DOMPurify.sanitize($('#date').val());
    const time_avail = DOMPurify.sanitize($('#time').val());
    const restrict_submission = DOMPurify.sanitize($('#restrict-submission').val());
    const date_submission = DOMPurify.sanitize($('#date-submission').val());
    const time_submission = DOMPurify.sanitize($('#time-submission').val());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    const form_data = new FormData();
    const attachments = $('.post-attachment').prop('files');
    form_data.append('eid', eid);
    form_data.append('sid', sid);
    form_data.append('title', title);
    form_data.append('group', group);
    form_data.append('content', content);
    form_data.append('date_avail', date_avail);
    form_data.append('time_avail', time_avail);
    form_data.append('is_submission', is_submission);
    form_data.append('restrict_submission', restrict_submission);
    form_data.append('date_submission', date_submission);
    form_data.append('time_submission', time_submission);

    $.each(attachments, ((index, value) => {
        form_data.append('attachments[]', value);
    }));
    
    $.ajax({
        url: '/api/v1/create/post',
        method: 'POST',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        data: form_data,
        beforeSend: function(xhr) {
            $('#btn-proceed').attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            const pid = response.pid;
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${pid}`;
                }, 1000);
                clearFields();
            } else {
                let err = response.message;
                err = Object.values(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops..',
                    text: err[0],
                });
            }
        }
    }).done(function() {
        $('#btn-proceed').attr('disabled', false);
        generateCSRFToken();
    });

});

$(document).on('click', '#post-delete', function() {
    const code = generateRandomCode();
    deleteModal(code);
    $('#control-delete-proceed').on('click', function() {
        let user_code = $('#confirmDeleteModal #code').val().trim();
        user_code = DOMPurify.sanitize(user_code);
        if(code === user_code) {
            $.ajax({
                url: `/api/v1/delete/post`,
                method: 'POST',
                data: {
                    pid: pid
                }, beforeSend: function(xhr) {
                    xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
                }, success: function(response) {
                    if(response.status == 200) {
                        const message = response.message
                        Swal.fire({
                            icon: 'success',
                            title: 'Yey..',
                            text: response.message,
                        });
                        setTimeout(() => {
                            window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${response.pid}`;
                    }, 1000);
                    }
                }
            }).done(function() {
                generateCSRFToken();
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
});

$(document).on('click', '#delete-attachment', function() {
    const aid = DOMPurify.sanitize($(this).data('id'));
    $.ajax({
        url: '/api/v1/delete/attachment',
        method: 'POST',
        dataType: 'JSON',
        data: {
            aid: aid
        }, beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            if(response.status == 200) {
                const message = response.message
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${response.pid}`;
            }, 1000);
            }
        }
    }).done(function() {
        generateCSRFToken();
    });
});


let accept_submission = false;

$('#accept-submission').on('change', function() {
    const isChecked = $(this).is(':checked');
    if(isChecked) {
        is_submission = 1;
        let div = `
        <div class="row">
            <div class="col-12">
                <div class="form-group mb-3">
                    <label class="mb-1" for="title">Restrict Submission?</label>
                    <select name="restrict-submission" id="restrict-submission" class="form-control">
                        <option value="">Choose</option>
                        <option value="1">Yes - You can't receive submissions after the due date.</option>
                        <option value="2">No - Still can receive submissions but marked as late.</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="mb-1" for="title">Date Submission</label>
                    <input type="date" name="date-submission" id="date-submission" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-3">
                    <label class="mb-1" for="title">Time Submission</label>
                    <input type="time" name="time-submission" id="time-submission" class="form-control">
                </div>
            </div>
        </div>
        `;
        $('.schedule').html(DOMPurify.sanitize(div));
    } else {
        is_submission = 0;
        $('.schedule').empty();
    }
});

let choice_count = 1;
let q_item = 1;
let div;

$(document).on('click', '#add-q-item', function() {
    q_item += 1;
    div = `
    <div class="card shadow-lg mb-3 q-item" id="q-item-${q_item}" data-id="${q_item}">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h5>Q${q_item}.</h5>
            </div>
            <div class="q-item-action" data-id="${q_item}">
               
            </div>
        </div>
        <div class="card-body px-4 py-5">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="form-group mb-3">
                        <label class="mb-1" for="question">Question</label>
                        <input type="text" name="question" id="question" class="form-control" placeholder="Question...">
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group mb-3">
                    <label class="mb-1" for="type">Type</label>
                        <select name="answer-type" id="answer-type" class="form-control" data-id="${q_item}">
                            <option value="">Choose Answer Type</option>
                            <option value="1">Multiple Choice</option>
                            <option value="2">Identification</option>
                            <option value="3">Explanatory</option>
                            <option value="4">Multiple Select</option>
                            <option value="5">File Upload</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="chosen-answer-type" data-id="${q_item}">

                </div>
            </div>
        </div>
    </div>
    `;    
    $('.q-item-container').append(DOMPurify.sanitize(div))

    $('.q-item-action').empty();
    $(`.q-item-action[data-id="${q_item}"]`).html(DOMPurify.sanitize(`
        <button class="btn btn-danger" id="delete-q-item" data-id="${q_item}">
            <i class="bi bi-trash"></i>
        </button>
    `));
});

$(document).on('click', '#delete-q-item', function() {
    const id = $(this).data('id');
    $(`#q-item-${id}`).remove();
    q_item -= 1;
    $('.q-item-action').empty();
    $(`.q-item-action[data-id="${q_item}"]`).html(DOMPurify.sanitize(`
        <button class="btn btn-danger" id="delete-q-item" data-id="${q_item}">
            <i class="bi bi-trash"></i>
        </button>
    `));
});

$(document).on('change', '#answer-type', function() {
    const selected = $(this).val();
    const id = $(this).data('id');
    console.log(id); 
    if (selected == 1) {
        div = `
        <div class="option-actions d-flex justify-content-end gap-3 mt-4 mb-3">
            <button type="button" class="btn btn-secondary" id="remove-option-radio">Remove</button>
            <button type="button" class="btn btn-primary" id="add-option-radio">Add</button>
        </div>
        <div class="option-group">
            <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
                <input class="form-check-input" type="radio" name="answer-${id}" id="answer" value="1">
                <input type="text" name="option" id="option" class="form-control" placeholder="Option 1">
            </div>
        </div>
       `
    } else if (selected == 2) {
        div = `
            <input type="text" name="answer" id="answer" class="form-control" placeholder="Type correct answer">
        `
    } else if (selected == 3) {
        div = `
            <textarea class="form-control" name="answer" placeholder="Student's answer goes here" readonly></textarea>
        `
    } else if (selected == 4) {
        div = `
        <div class="option-actions d-flex justify-content-end gap-3 mt-4 mb-3">
            <button type="button" class="btn btn-secondary" id="remove-option-checkbox">Remove</button>
            <button type="button" class="btn btn-primary" id="add-option-checkbox">Add</button>
        </div>
        <div class="option-group">
            <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
                <input class="form-check-input" type="checkbox" value="1" class="answer" id="answer" name="answer-${id}">
                <input type="text" name="option" id="option" class "form-control" placeholder="Option 1">
            </div>
        </div>
        `;
    }

    $(`.chosen-answer-type[data-id="${id}"]`).html(DOMPurify.sanitize(div));
});


$(document).on('click', '#add-option-radio', function() {
    choice_count += 1;
    const id = $(this).closest('.q-item').data('id');
    const length = $(this).closest(`.q-item[data-id="${id}"]`).find('#item').length;
    $(`.q-item[data-id="${id}"] .option-group`).append(DOMPurify.sanitize(
        `
        <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
            <input class="form-check-input" type="radio" name="answer" id="answer" value="${length+1}">
            <input type="text" name="option" id="option" class="form-control" placeholder="Option ${length+1}">
        </div>
        `
    ));
   
});

$(document).on('click', '#remove-option-radio', function() {
    const id = $(this).closest('.q-item').data('id');
    const item = $(`#q-item-${q_item} .option-group #item`).length;
    if(item > 1) {
        $(`.q-item[data-id="${id}"] .option-group div:last-child`).remove();
        choice_count -= 1;
    }
});

$(document).on('click', '#add-option-checkbox', function() {
    choice_count += 1;
    $(`#q-item-${q_item} .option-group`).append(DOMPurify.sanitize(
        `
        <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
            <input class="form-check-input" type="checkbox" value="${choice_count}" id="answer">
            <input type="text" name="option" id="option" class="form-control" placeholder="Option 1">
        </div>
        `
    ));
});

$(document).on('click', '#remove-option-checkbox', function() {
    const item = $('.option-group #item').length;
    if(item > 1) {
        $('.option-group div:last-child').remove();
        choice_count -= 1;
    }
});

$('#create-assessment').on('submit', function(e) {
    e.preventDefault();
    const total_question = $('.q-item').length;
    const title = DOMPurify.sanitize(($('#a-title').val()));
    const group = DOMPurify.sanitize($('#a-group').val());
    const type = DOMPurify.sanitize($('#a-type').val());
    const content = DOMPurify.sanitize(window.editor['aeditor'][0].getData());

    let questions = [];
    let types = [];
    let answers = [];
    let options = [];

    console.log(group);


    // Iterate through the questions and gather data
    $('.q-item').each((index, qItem) => {
        const questionInput = $(qItem).find('#question');
        const typeInput = $(qItem).find('#answer-type');
        const answerInput = typeInput.val() == 1 || typeInput.val() == 4 ? 
        $(qItem).find('#answer:checked') : $(qItem).find('#answer');
        const optionInputs = $(qItem).find('.option-group #option');

        const question = questionInput.val();
        const type = typeInput.val();
        const qid = typeInput.data('id');
        const answer = answerInput.val() ;
        const typeValue = parseInt(type);


        // Validate required fields
        if (!question) {
            Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: 'Question is required for item ' + (index + 1),
            });
            return;
        }

        if (typeValue !== 2 && !type) {
            Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: 'Question type required for item ' + (index + 1),
            });
            return;
        }

        if (!answer) {
            Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: 'Answer is required for question ' + (index + 1),
            });
            return;
        }

        if (typeValue === 1) {
            if (optionInputs.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: 'For multiple-choice questions, at least one option is required for question ' + (index + 1),
                });
                return;
            }

            optionInputs.each((optionIndex, optionValue) => {
                const option = $(optionValue).val();
                if (!option) {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: 'Option is required for question ' + (index + 1) + ', option ' + (optionIndex + 1)
                });
                    return;
                }

                options.push({
                    qid: qid,
                    id: optionIndex + 1,
                    option: option
                });
            });

            answers.push({
                qid: qid,
                answer: answer
            });
        } else if (typeValue === 2) {
            answers.push({
                qid: qid,
                answer: answer
            });
        }

        // Push data into respective arrays
        questions.push({
            id: index + 1,
            question: question
        });

        types.push({
            id: qid,
            type: typeValue
        });
    });

    // Combining the arrays
    let data = [];

    questions.forEach(question => {
        const qid = question.id;
        const type = types.find(type => type.id === qid);
        const answer = answers.find(answer => answer.qid === qid);
        const option = options.filter(option => option.qid === qid);

        if (type) {
            const dataItem = {
                qid,
                question: question.question,
                type: type.type,
                answer: answer.answer,
            };

            if (type.type === 1) {
                dataItem.options = option;
            }

            data.push(dataItem);
        }
    });

    $.ajax({
        url: '/api/v1/create/assessment',
        method: 'POST',
        type: 'JSON',
        data: {
            eid: eid,
            sid: sid,
            title: title,
            group: group,
            type: type,
            content: content,
            data: data
        }, beforeSend: function(xhr) {
            // $(this).attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            const pid = response.pid;
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${pid}`;
                }, 1000);
            } else {
                let err = response.message;
                err = Object.values(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops..',
                    text: err[0],
                });
            }
        },
    }).done(function() {
        $(this).attr('disabled', false);
        clearFields();
        generateCSRFToken();
    });
});





</script>