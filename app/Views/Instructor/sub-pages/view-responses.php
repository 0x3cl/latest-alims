<div class="page-wrapper">
    <div class="main-container">
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
        clearFields, formatFile, shortenFilename, ckeditor} from '/assets/js/instructor/modules/utils.js';
import {getJWTtoken} from '/assets/js/instructor/modules/dataUtils.js';
import {post_group, my_posts, my_assessments, all_posts, post_attachments, getResponses} from '/assets/js/instructor/modules/dataUtils.js';
import {deleteModal } from '/assets/js/instructor/modules/modal.js';

const response = await getJWTtoken();
const jwt_token = response.token;
const eid = DOMPurify.sanitize($('#eid').val().trim());
const sid = DOMPurify.sanitize($('#sid').val().trim());
const pid = DOMPurify.sanitize($('#pid').val().trim());

const id = <?= $current_userdata['id']?>;
const cid = <?= $requested_data['cid'] ?>;
const yid = <?= $requested_data['yid'] ?>;
const secid = <?= $requested_data['secid'] ?>;
const uid = <?= $requested_data['uid'] ?>;
const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());


ckeditor('#a-editor', 'aeditor');
ckeditor('#p-editor', 'peditor');

my_posts(eid, sid, pid).then((response) => {
    console.log(response);
    if(response.status == 200) {
        const data = response.data;
        
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
                        <i class="bi bi-arrow-left me-1"></i>
                        Go Back
                    </a>
                `));
                } else if(data.is_assessment == 1) {
                    $('.post-actions').append(DOMPurify.sanitize(`
                    <a class="btn btn-primary d-flex gap-2 align-items-center" href="/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${pid}">
                        <i class="bi bi-arrow-left me-1"></i>
                        Go Back
                    </a>
                `));
                }
            }

            if(data.is_assessment == 1) {
                getResponses(eid, sid, pid, uid).then((response) => {
                    console.log(response);
                    const data = response.data;
                    const user_info = data.user_info;
                    const questions = data.questions;

                    const item_count = questions.length;

                    let item_div = '';

                    $('.post-content').append(`
                        <div class="card mb-3 rounded-4">
                            <div class="card-body p-4">
                                <h5>Name: <span class="text-capitalize">${user_info.firstname + ' ' +  user_info.lastname}</span></h5>
                                <h5>Course: <span class="text-uppercase">${user_info.course_name}</span></h5>
                                <hr>
                                <h5>Year: <span class="text-capitalize">${user_info.year_name}</span></h5>
                                <h5>Section: <span class="text-capitalize">${user_info.section_name}</span></h5>
                            </div>
                        </div>
                    `);
                    
                    questions.forEach((item, index) => {
                        if (item.assessment_type == 1 || item.assessment_type == 4) {
                            item_div += `
                            <div class="card mb-3 rounded-4">
                                <div class="card-body p-4 mb-3">
                                    <div class "question">
                                        <h5>${index + 1}. ${item.question}</h5>
                                        <div class="choices mt-3" data-id="${index + 1}">
                                            
                                        </div>
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
                                            <input type="text" name="answer" id="answer_${index}" class="form-control" placeholder="Student's answers go here" readonly value="${item.student_response}" disabled>
                                            <hr class="mt-4 mb-3">
                                            <div class="alert ${item.student_response === item.correct_answers[0].name ? 'alert-success' : 'alert-danger'} mt-4">
                                                ${item.student_response === item.correct_answers[0].name ? 'Correct answer is: ' : 'Correct answer is: '} ${item.correct_answers[0].name}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        }
                    });

                    $('.post-assessment').html(item_div);

                    questions.forEach((item, index) => {
                        console.log(item);
                        if (item.assessment_type == 1 || item.assessment_type == 4) {
                            const isCorrectAnswer = item.student_response === item.correct_answers[0].name;

                            item.choices.forEach((choice, choiceIndex) => {
                                const isChecked = choiceIndex === parseInt(item.student_response) - 1;

                                const choice_div = `
                                <div class="option-group">
                                    <div class="form-check d-flex align-items-center gap-3 mb-2" id="item">
                                        <input class="form-check-input" type="radio" name="answer_${item.qid}" value="${choiceIndex + 1}" ${(isChecked ? 'checked' : '')} disabled>
                                        <p style="margin: 3px 0 0 0;" class="choice-text">${choice.name}</p>
                                        <span class="${isChecked && !isCorrectAnswer ? 'text-danger' : 'text-success'}">
                                            ${isChecked ? (isCorrectAnswer ? '<i class="bi bi-check-lg fw-bold fs-3"></i>' : '<i class="bi bi-x-lg fw-bold fs-3"></i>') : ''}
                                        </span>
                                    </div>
                                </div>
                                `;
                                $(`.choices[data-id="${item.qid}"]`).append(choice_div);
                            });
                            $(`.choices[data-id="${item.qid}"]`).append(`
                                <div class="alert ${isCorrectAnswer ? 'alert-success' : 'alert-danger'} mt-4">
                                    ${isCorrectAnswer ? 'Correct answer is: ' : 'Correct answer is: '} ${item.choices[parseInt(item.correct_answers[0].name) - 1].name}
                                </div>
                            `);
                        }
                    });
                });
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




</script>