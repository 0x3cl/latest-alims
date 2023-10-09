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
                        <div class="inner-title"></div>
                    </li>
                </ol>
            </div>
            <div class="app-body">
                <div class="post my-3">
                    <div class="post-title mt-5">
                        <h1 class="inner-title">
                            <div class="skeleton-text" style="width: 40%"></div>
                        </h1>
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
                </div>
            </div>
            <div class="app-footer">
                <span>© Bootstrap Gallery 2023</span>
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
                                <select name="group" id="post-group" class="form-control">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="mb-1" for="title">Content <span class="text-danger">*</span></label>
                            <div class="form-group mb-3">
                                <textarea id="editor" name="content"></textarea>
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
                                <input type="file" name="attachment" id="attachment" multiple>
                            </div>
                            <input type="hidden" name="eid" id="eid" value="<?= $requested_data['eid']; ?>">
                            <input type="hidden" name="sid" id="sid" value="<?= $requested_data['sid'] ?>">
                            <input type="hidden" name="pid" id="pid" value="<?= $requested_data['pid'] ?>">
                            <div class="attachment-preview">

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
import {generateCSRFToken, toastMessage, clearFields, formatFile} from '/assets/js/instructor/modules/utils.js';
import {getJWTtoken} from '/assets/js/instructor/modules/dataUtils.js';
import {post_group, my_posts, all_posts} from '/assets/js/instructor/modules/dataUtils.js';

const response = await getJWTtoken();
const jwt_token = response.token;
const eid = DOMPurify.sanitize($('#eid').val().trim());
const sid = DOMPurify.sanitize($('#sid').val().trim());
const pid = DOMPurify.sanitize($('#pid').val().trim());

const id = <?= $current_userdata['id']?>;
const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

my_posts(eid, sid, pid).then((response) => {
    let div;
    console.log(response);
    if(response.status == 200) {
        const data = response.data;
        if(data != null) {
            $(' .inner-title').text(data.title);
            $('.post-content').html(data.content);
        } else {
            $(' .inner-title').text('No Posts Yet!');
            $('.post-content').text('To create a new post, click the plus sign button below.');
        }

    }
});

all_posts(eid, sid).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        let group = [];
        console.log(data);
        
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
                    <li>
                        <a href="/instructor/subjects/posts?eid=${eid}&sid=${sid}&pid=${item.id}">
                            <i class="bi bi-info-square"></i>
                            <span class="menu-text">${item.title}</span>
                        </a>
                    </li>
                    `;
                });
            }

            $('.sidebar-menu.post-group').html(div);
        } else {
            div += `
                <li>
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
        $('#post-group').append(DOMPurify.sanitize(div));
    }
});

let editor;

ClassicEditor
.create( document.querySelector( '#editor' ), {
    placeholder: `What's your thoughts?`,
    ckfinder: {
      uploadUrl: '/api/v1/upload/image'
    },
    
} )
.then( ckeditor => {
    editor = ckeditor;
} )
.catch((err) => {
    console.log(err)
});

$('#attachment').on('change', function() {
    const files = $(this)[0].files;
    let preview = '';
    $.each(files, (index, value) => {
        // preview += formatFile(value);
        const filename = value.name;
        let ext = filename.split('.');
        ext = ext[ext.length - 1]

        preview += formatFile(ext, filename);

    });

    $('.attachment-preview').html(DOMPurify.sanitize(preview));

});

$('#create-post').on('submit', function(e) {
    e.preventDefault();
    const title = DOMPurify.sanitize($('#title').val().trim());
    const group = DOMPurify.sanitize($('#post-group').val().trim());
    const content = DOMPurify.sanitize(editor.getData());
    const date_avail = DOMPurify.sanitize($('#date').val());
    const time_avail = DOMPurify.sanitize($('#time').val());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    const form_data = new FormData();
    const attachments = $('#attachment').prop('files');
    form_data.append('eid', eid);
    form_data.append('sid', sid);
    form_data.append('title', title);
    form_data.append('group', group);
    form_data.append('content', content);
    form_data.append('date_avail', date_avail);
    form_data.append('time_avail', time_avail);

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
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
                setTimeout(() => {
                    window.location = `/instructor/subjects/posts?eid=${eid}&sid=${sid}`;
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
    }).done(function() {
        $('#btn-proceed').attr('disabled', false);
        clearFields();
        generateCSRFToken();
    });

});

</script>