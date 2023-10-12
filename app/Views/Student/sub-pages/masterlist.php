<div class="page-wrapper">
    <div class="main-container">
        <?php include(APPPATH . '/Views/Instructor/templates/sidebar.php'); ?>
        <div class="app-container">
            <?php include(APPPATH . '/Views/Instructor/templates/navbar.php'); ?>
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
                        Masterlist
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
            <div class="app-footer">
                <span>&copy; 2023 | ALIMS</span>
            </div>
        </div>
    </div>
</div>


<script type="module">
    
import {my_courses, my_subjects, masterlist} from '/assets/js/instructor/modules/dataUtils.js';

const id = <?= $current_userdata['id'] ?>;
const cid = <?= $requested_data['cid'] ?>;
const yid = <?= $requested_data['yid'] ?>;
const sid = <?= $requested_data['sid'] ?>;

my_courses(id).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        div = '';

        data.forEach((data) => {
            div += `
                
                <li>
                    <a href="/instructor/subjects?course=${data.course_id}&year=${data.year_id}&section=${data.section_id}">
                        <p class="d-block text-capitalize mb-1">${data.course_name}</p>
                        <small class="d-block text-uppercase">${data.course_code} </small>
                        <small class="d-block text-uppercase">${data.section_name} | ${data.year_name}</small>
                    </a>
                </li>
            `;
        });

        $('.treeview-menu.courses').append(DOMPurify.sanitize(div));

    }
});


my_subjects(id).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;

        data.forEach((data) => {
            div += `
                
                <li>
                    <a href="/instructor/subjects?course=${data.course_id}&year=${data.year_id}&section=${data.section_id}">
                        <p class="d-block text-capitalize mb-1">${data.subject_name}</p>
                        <small class="d-block text-uppercase">${data.course_code} - ${data.subject_code} </small>
                        <small class="d-block text-uppercase">${data.section_name} | ${data.year_name}</small>
                    </a>
                </li>
            `;
        });

        $('.treeview-menu.subjects').append(DOMPurify.sanitize(div));
    }
});

masterlist(cid, yid, sid).then((response) => {
    if(response.status == 200) {
        const data = response.data;
        let div = '';
        if(data.length > 0) {
            div = `
            <h1 class="text-uppercase fw-bold mb-4">${data[0].course_name}</h1>
            <h5 class="text-uppercase fw-bold mb-0">${data[0].course_code}</h5>
            <h5 class="text-uppercase fw-bold mb-0">Class Masterlist</h5>
            <hr class="my-4">
            <div class="table-responsive">
                <table class="table table align-middle table-hover m-0 nowrap" id="participants">
                    <thead>
                        <tr>
                            <th scope="col">Avatar</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            data.forEach((item) => {
               div += `
                    <tr>
                        <td><img src="/uploads/avatar/${item.avatar}"></td>
                        <td>${item.firstname + ' ' + item.lastname}</td>
                        <td>${item.username}</td>
                        <td>${item.email}</td>
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
});

</script>