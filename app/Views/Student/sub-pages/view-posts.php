<div class="page-wrapper">
    <div class="main-container">
        <?php include(APPPATH . '/Views/Student/templates/sidebar-post.php'); ?>
        <div class="app-container">
            <?php include(APPPATH . '/Views/Student/templates/navbar.php'); ?>
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

<input type="hidden" name="eid" id="eid" value="<?= $requested_data['eid']; ?>">
<input type="hidden" name="sid" id="sid" value="<?= $requested_data['sid'] ?>">
<input type="hidden" name="pid" id="pid" value="<?= $requested_data['pid'] ?>">

<script type="module">
import {generateCSRFToken, generateRandomCode, toastMessage, 
        clearFields, formatFile, shortenFilename, ckeditor} from '/assets/js/Student/modules/utils.js';
import {getJWTtoken} from '/assets/js/Student/modules/dataUtils.js';
import {post_group, my_posts, my_assessments, all_posts, post_attachments, checkAssessmentRespond} from '/assets/js/Student/modules/dataUtils.js';
import {deleteModal } from '/assets/js/Student/modules/modal.js';

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
            console.log(data);
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
            
            if(data.is_assessment == 1) {
                checkAssessmentRespond(pid).then((response) => {
                    if(response.data == 0) {
                        my_assessments(eid, sid, pid).then((response) => {
                            const data = response.data;
                            const questions = data.questions;
                            const answers = data.answers;
                            const choices = data.choices;

                            const item_count = questions.length;

                            let item_div = '';
                            let choice_div = '';
                            let choice_count;
                            
                            questions.forEach((item, index) => {
                                if(item.assessment_type == 1) {
                                    item_div += `
                                    <div class="card mb-3">
                                        <div class="card-body p-4 mb-3">
                                            <div class="question q-item" data-id="${index+1}" data-aid="${item.id}">
                                                <h5>${index + 1}. ${item.question}</h5>
                                                <div class="choices mt-3" data-id="${index+1}">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                } else if(item.assessment_type == 2) {
                                    item_div += `
                                    <div class="card mb-3">
                                        <div class="card-body p-4 mb-3">
                                            <div class="question q-item" data-id="${index+1}" data-aid="${item.id}">
                                                <h5>${index + 1}. ${item.question}</h5>
                                                <div class="answer mt-3">
                                                    <input type="text" name="answer" id="answer" class="form-control" placeholder="Your answer here...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;  
                                } else if(item.assessment_type == 3) {
                                    item_div += `
                                    <div class="card mb-3">
                                        <div class="card-body p-4 mb-3">
                                            <div class="question q-item" data-id="${index+1}" data-aid="${item.id}">
                                                <h5>${index + 1}. ${item.question}</h5>
                                                <div class="answer mt-3">
                                                    <textarea class="form-control" rows="5" placeholder="Explain your answer here..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                } else if(item.assessment_type == 4) {
                                    item_div += `
                                    <div class="card mb-3">
                                        <div class="card-body p-4 mb-3">
                                            <div class="question q-item" data-id="${index+1}" data-aid="${item.id}">
                                                <h5>${index + 1}. ${item.question}</h5>
                                                <div class="choices mt-3" data-id="${index+1}">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                                } 
                            });

                            $('.post-assessment').html(item_div);
                            $('.post-assessment').append('<button id="submit-assessment" class="btn btn-primary ms-auto d-flex justify-content-end mb-3">Submit</button>');

                            questions.forEach((item, index) => {
                                if (item.assessment_type == 1) {
                                    item.choices.forEach((choice, choiceIndex) => {
                                        choice_div = `
                                            <div class="option-group">
                                                <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
                                                    <input class="form-check-input" type="radio" name="answer_${choice.qid}" value="${choiceIndex + 1}">
                                                    <p style="margin: 3px 0 0 0;" class="choice-text">${choice.name}</p>
                                                </div>
                                            </div>
                                        `;
                                        $(`.choices[data-id="${choice.qid}"]`).append(choice_div);
                                    });
                                } else if (item.assessment_type == 4) {
                                    item.choices.forEach((choice, choiceIndex) => {
                                        let isAnswer = item.answers.some(answer => parseInt(answer.name) - 1 == choiceIndex);
                                        choice_div = `
                                            <div class="option-group">
                                                <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
                                                    <input class="form-check-input" type="checkbox" name="answer_${choice.qid}" value="${choiceIndex + 1}">
                                                    <p style="margin: 3px 0 0 0;" class="choice-text">${choice.name}</p>
                                                </div>
                                            </div>
                                        `;
                                        $(`.choices[data-id="${choice.qid}"]`).append(choice_div);
                                    });     
                                }
                            });
                        });
                    } else {
                        $('.post-assessment').html(`
                            <div class="alert alert-info">
                                <h6 class="mb-0">You have already taken this assessment.</h6>
                            </div>
                        `);
                    }
                })
                
            } else {
                if(data.accept_submission == 1) {
                    $('.post-actions').append(DOMPurify.sanitize(`
                        <a class="btn btn-primary d-flex gap-2 align-items-center" href="/student/subjects/posts/add/submission?eid=${eid}&sid=${sid}&pid=${pid}">
                            <i class="bi bi-file-bar-graph"></i>
                            Add Submission
                        </a>
                    `));
                }
            }

            

        } else {
            $(' .post-title').text('No Posts Yet!');
            $('.post-content').text('To create a new post, click the plus sign button below.');
        }

    }
});

all_posts(eid, sid).then((response) => {
    let div = '';
    if (response.status === 200) {
        const data = response.data;
        console.log(data);
        
        // Define the desired order for groups
        const groupOrder = [
            "announcements",
            "syllabus",
            "prelim",
            "midterm",
            "semi-finals",
            "finals"
        ];
        
        let group = {};
        
        // Initialize group objects based on groupOrder
        groupOrder.forEach((groupKey) => {
            group[groupKey] = [];
        });

        if (data.length > 0) {
            data.forEach((item) => {
                group[item.group].push({
                    'id': item.id,
                    'title': item.title,
                });
            });

            let div = '';
            groupOrder.forEach((key) => {
                if (group[key].length > 0) {
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
                                <a href="/student/subjects/posts?eid=${eid}&sid=${sid}&pid=${item.id}">
                                    <i class="bi bi-card-heading"></i>
                                    <span class="menu-text">${item.title}</span>
                                </a>
                            </li>
                        `;
                    });
                }
            });

            $('.sidebar-menu.post-group').html(div);
        } else {
            div = `
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

$(document).on('click', '#submit-assessment', function() {
    const questions = $('.question.q-item');
    const post_id = <?= $requested_data['pid'] ?>;
    const data = [];

    questions.each(function() {
        const id = $(this).data('id');
        const aid = $(this).data('aid');
        
        const checkboxes = $(this).find('input[type="checkbox"]:checked');
        const radioChecked = $(this).find('input[type="radio"]:checked');
        const textInput = $(this).find('input[type="text"]');
        const textareaInput = $(this).find('textarea');

        if (checkboxes.length > 0) {
            // If checkboxes are checked, collect their values
            const checkboxValues = checkboxes.map(function() {
                return $(this).val();
            }).get();
            data.push({
                post_id: post_id,
                assessment_id: aid,
                response: checkboxValues.join(', '), // Combine values into a string
            });
        } else if (radioChecked.length > 0) {
            // If a radio button is checked, get its value
            const radioValue = radioChecked.val();
            data.push({
                post_id: post_id,
                assessment_id: aid,
                response: radioValue,
            });
        } else if (textInput.length > 0) {
            // If there are input fields, get the input value
            const textValue = textInput.val();
            data.push({
                post_id: post_id,
                assessment_id: aid,
                response: textValue,
            });
        } else if (textareaInput.length > 0) {
            // If there are textarea fields, get the textarea value
            const textareaValue = textareaInput.val();
            data.push({
                post_id: post_id,
                assessment_id: aid,
                response: textareaValue,
            });
        }
    });

    console.log(data);

    $.ajax({
        url: '/api/v1/submit/response',
        method: 'POST',
        data: {data},
        beforeSend: function(xhr) {
            $(this).attr('disabled', true);
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
                    window.location.reload();
                }, 1000);
                
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: response.message,
                });
            }
        }
    }).done(function() {
        $(this).attr('disabled', false);
        generateCSRFToken();
    })

});





$('#show-attachments').on('click', function() {
    $(this).toggleClass("active");
    $('.attachments-container').toggleClass('active');
});







</script>