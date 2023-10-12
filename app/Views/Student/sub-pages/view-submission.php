<div class="page-wrapper">
    <div class="main-container">
        <?php include(APPPATH . '/Views/student/templates/sidebar-post.php'); ?>
        <div class="app-container">
            <?php include(APPPATH . '/Views/student/templates/navbar.php'); ?>
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
                 <div class="card">
                    <div class="card-body p-4" id="content">
                        <div class="header">
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
            </div>
            <div class="app-footer d-flex align-items-center">
                <div class="post-actions mt-2 d-flex gap-2">
                    <a href="/student/subjects/posts/submission?eid=<?= $requested_data['eid']?>&sid=<?= $requested_data['sid'] ?>&pid=<?= $requested_data['pid'] ?>" class="btn btn-primary"><i class="bi bi-arrow-left me-1"></i> Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="eid" id="eid" value="<?= $requested_data['eid']; ?>">
<input type="hidden" name="sid" id="sid" value="<?= $requested_data['sid'] ?>">
<input type="hidden" name="pid" id="pid" value="<?= $requested_data['pid'] ?>">


<script type="module">
import {
    generateCSRFToken, generateRandomCode, 
    submissionStatus, formatFile, shortenFilename
} from '/assets/js/student/modules/utils.js';
import {getJWTtoken, all_posts, getSubmission} from '/assets/js/student/modules/dataUtils.js';
import {deleteModal } from '/assets/js/student/modules/modal.js';

const response = await getJWTtoken();
const jwt_token = response.token;


const id = <?= $current_userdata['id'] ?>;
const eid = <?= $requested_data['eid'] ?>;
const cid = <?= $requested_data['cid'] ?>;
const yid = <?= $requested_data['yid'] ?>;
const sid = <?= $requested_data['sid'] ?>;
const pid = <?= $requested_data['pid'] ?>;
const subid = <?= $requested_data['subid'] ?>;


const csrf_token = DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());


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
                        <a href="/student/subjects/posts?eid=${eid}&sid=${sid}&pid=${item.id}">
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

getSubmission(eid, sid, pid, subid).then((response) => {
    if(response.status == 200) {
       const submission = response.data.submission;
       const files = response.data.files;
       let div = '';
       div = `
        <div class="py-3">
            <h3 class="text-uppercase mb-1 fw-bold">${submission.course_name}</h3>
            <h5 class="text-uppercase m-0 fw-bold">${submission.course_code}</h5>
            <h5 class="text-uppercase m-0 fw-bold">${submission.section_name + ' | ' + submission.year_name}</h5>
            <hr class="my-3">
            <h5 class="text-uppercase m-0 fw-bold">${submission.subject_name}</h5>
            <h5 class="text-uppercase m-0 fw-bold">${submission.subject_code}</h5>
            <hr class="my-3">
            <div class="d-flex align-items-center gap-2">
                <img src="/uploads/avatar/${submission.avatar}" style="width: 50px; height: 50px; border: 3px solid #3eb489; border-radius: 50%; object-fit: contain; object-position:center">
                <div>
                    <h5 class="m-0 text-capitalize m-0 fw-bold">${submission.firstname + ' ' + submission.lastname}</h5>
                    <h6 class="text-uppercase fw-bold m-0">Student</h6>
                </div>
            </div>
            <div class="mt-4">
                <label>SUBMISSION:</label>
                <div>
                    ${submission.content}
                </div>
            </div>
            <div class="mt-3" id="files">
            
            </div>
        </div>
       `;

       files.forEach((item) => {
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

            $('#content #files').html(div);
            
       })

       $('#content').html(div);
    }
})

</script>