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
                        Course
                    </li>
                    <li class="breadcrumb-item text-secondary" aria-current="page">
                        Subjects
                    </li>
                </ol>
            </div>
            <div class="app-body">
                <div class="row" id="data-col">
                    
                </div>
            </div>
            <div class="app-footer">
                <span>© Bootstrap Gallery 2023</span>
            </div>
        </div>
    </div>
</div>

<script type="module">
import {my_courses, my_subjects} from '/assets/js/instructor/modules/dataUtils.js';

const id = <?= $current_userdata['id']?>

my_courses(id).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        div = `
            <li>
                <a class=" py-0">
                    <hr class="m-0">
                </a>    
            </li>
        `;

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

const params = <?= json_encode($requested_data['param_ids']) ?>


my_subjects(params).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        if(data.length > 0) {
            console.log(data);
            data.forEach((data) => {
            div += `
                <div class="col-12 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-capitalize fw-bold">${data.subject_name}</h5>
                            <h6 class="mb-0 text-uppercase">${data.subject_code}</h6>
                            <hr>
                            <small class="mb-0 d-block fw-bold text-muted text-uppercase">SATURDAY 10:00AM - 11:00AM</small>
                            <small class="mb-0 d-block fw-bold text-muted text-uppercase">${data.year_name} | ${data.section_name}</small>
                        </div>
                        <div class="card-footer w-100 d-flex justify-content-end gap-2">
                            <button class="btn btn-secondary">Masterlist</button>
                            <a href="/instructor/subjects/posts?eid=${data.id}&subj_id=${data.subject_id}" class="btn btn-primary">View Posts</a>
                        </div>
                    </div>
                </div>
                `;
            });

            $('#data-col').html(DOMPurify.sanitize(div));
        } else {
            div = `
                <div class="col-12 mb-3">
                    <div class="alert alert-light">
                        <div class="card-body">
                            <h5 class="text-uppercase text-center mb-0 py-3 fw-bold">Currently no subjects in this course</h5>
                        </div>
                    </div>
                </div>
            `;

            $('#data-col').html(DOMPurify.sanitize(div));
        }
    }
});

</script>