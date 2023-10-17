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
                    <a href="/student/subjects/posts?eid=<?= $requested_data['eid']?>&sid=<?= $requested_data['sid'] ?>&pid=<?= $requested_data['pid'] ?>" class="btn btn-primary"><i class="bi bi-arrow-left me-1"></i> Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" name="eid" id="eid" value="<?= $requested_data['eid']; ?>">
<input type="hidden" name="sid" id="sid" value="<?= $requested_data['sid'] ?>">
<input type="hidden" name="pid" id="pid" value="<?= $requested_data['pid'] ?>">


<script type="module">
import {generateCSRFToken, generateRandomCode, submissionStatus} from '/assets/js/student/modules/utils.js';
import {getJWTtoken, all_posts, getSubmissionList} from '/assets/js/student/modules/dataUtils.js';
import {deleteModal } from '/assets/js/student/modules/modal.js';

const response = await getJWTtoken();
const jwt_token = response.token;


const id = <?= $current_userdata['id'] ?>;
const eid = <?= $requested_data['eid'] ?>;
const cid = <?= $requested_data['cid'] ?>;
const yid = <?= $requested_data['yid'] ?>;
const sid = <?= $requested_data['sid'] ?>;
const pid = <?= $requested_data['pid'] ?>;
const secid = <?= $requested_data['secid'] ?>;


const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());


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


getSubmissionList(cid, sid, yid, secid).then((response) => {
    if(response.status == 200) {
        const data = response.data;
        let div = '';
        if(data.length > 0) {
            div = `
            <h1 class="text-uppercase fw-bold m-0">${data[0].course_name}</h1>
            <h5 class="text-uppercase fw-bold mb-4">${data[0].course_code}</h5>
            <h5 class="text-uppercase fw-bold mb-0">${data[0].subject_name}</h5>
            <h5 class="text-uppercase fw-bold mb-0">${data[0].subject_code}</h5>
            <hr class="my-4">
            <div class="table-responsive">
                <table class="table table align-middle table-hover m-0 display nowrap" id="participants" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">Avatar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            data.forEach((item) => {
               div += `
                    <tr>
                        <td>
                            <div class="ps-3 me-5">
                                <img src="/uploads/avatar/${item.avatar}">  
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                            ${submissionStatus(item.has_submission)}
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                                ${item.firstname + ' ' + item.lastname}
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                                ${item.username}
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                                ${item.email}
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                            ${item.has_submission == 1 ? `<a href="/student/subjects/posts/submission?eid=${eid}&sid=${sid}&pid=${pid}&submission=${item.submission_id}" class="btn btn-outline-primary">View Response</a>` : '<a href="javascript:void(0)" class="btn btn-outline-danger">No Response</a>'
}
                            </div>
                        </td>
                    </tr>
                `;
            });
            div += `
                </tbody>
            </table>
            `;
            $('#content').html(div);
        } else {
            div += `
                <h5 class="text-uppercase text-muted fw-bold my-4">No students currently enrolled</h5>
            `;
            $('#content').html(div);
        }
    }
})

</script>