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
                    <a class="btn btn-primary d-flex gap-2 align-items-center" href="/student/subjects/posts?eid=<?= urlencode($requested_data["eid"]) ?>&sid=<?= urlencode($requested_data["sid"]) ?>&pid=<?= urlencode($requested_data["pid"]) ?>">
                        <i class="bi bi-arrow-left"></i>
                        Go Back
                    </a>
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
import {post_group, my_posts, my_assessments, all_posts, post_attachments, checkSubmissionRespond} from '/assets/js/Student/modules/dataUtils.js';
import {deleteModal } from '/assets/js/Student/modules/modal.js';

const response = await getJWTtoken();
const jwt_token = response.token;
const eid = DOMPurify.sanitize($('#eid').val().trim());
const sid = DOMPurify.sanitize($('#sid').val().trim());
const pid = DOMPurify.sanitize($('#pid').val().trim());

const id = <?= $current_userdata['id']?>;
const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

my_posts(eid, sid, pid).then((response) => {
    console.log(response);
    if(response.status == 200) {
        const data = response.data;
        console.log(data);
        
        if(data != null) {
            if(data.is_assessment == 0) {
                checkSubmissionRespond(pid).then((response) => {
                    console.log(response);
                    if(response.result_count == 0) {
                        let div = `
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <label class="mb-1" for="title">Content <span class="text-danger">*</span></label>
                                <div class="form-group mb-3">
                                    <textarea id="p-editor" name="content"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="files">

                            </div>
                            <div class="uploads">
                                <label class="mb-2" for="title">File Uploads <span class="text-danger">*</span></label>
                                <div class="droparea">
                                    <input type="file" name="attachment[]" id="attachment" class="attachment" multiple>
                                </div>
                                <div class="attachment-preview">

                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary ms-auto d-flex mb-3" id="upload-submission">Submit</button>
                    `;
                    $('.post-content').html(div);
                    ckeditor('#p-editor', 'peditor');
                    } else {
                        let div = `
                            <div class="alert alert-info m-0">
                                <h5 class="mb-0">You already submitted your responses.</h6>
                            </div>
                            <div class="mt-3">
                                <div class="card">
                                    <div class="card-body" id="content">
                                        <label>Your Submission:</label>
                                        <div class="content mt-4">
                                            ${response.data.content}
                                        </div>
                                        <div class="files">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;                    
                        $('.post-content').html(div);

                        div = '';
                        response.data.files.forEach((item) => {
                            const raw_filename = item.filename;
                            const shortened_filename = shortenFilename(raw_filename, 10, 10);
                            let ext = shortened_filename.split('.');
                            ext = ext[ext.length - 1];

                            div += `
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center me-3">
                                        <a href="/uploads/files/${raw_filename}" style="font-size:18px;" class="text-success" download><i class="bi bi-download"></i></a>
                                    </div>
                                    <p style="font-size:18px;">${formatFile(ext, shortened_filename)}</p>
                                </div>
                            `;

                            $('.files').html(div);
            
                        });

                    }
                });
            }
            
        } else {
            $(' .post-title').text('No Posts Yet!');
            $('.post-content').text('To create a new post, click the plus sign button below.');
        }

    }
});

all_posts(eid, sid).then((response) => {
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




$(document).on('change', '.attachment', function() {
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

$(document).on('click', '#upload-submission', function() {
    const content = DOMPurify.sanitize(window.editor['peditor'][0].getData());
    const form_data = new FormData();
    const attachments = $('.attachment').prop('files');
    form_data.append('pid', pid);
    form_data.append('content', content);
   
    $.each(attachments, ((index, value) => {
        form_data.append('attachments[]', value);
    }));


    $.ajax({
        url: '/api/v1/posts/assessment/respond',
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
            console.log(response);
            const pid = response.pid;
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/student/subjects/posts?eid=${eid}&sid=${sid}&pid=${pid}`;
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




</script>