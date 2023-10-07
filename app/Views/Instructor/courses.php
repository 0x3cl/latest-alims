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
        console.log(data);
        data.forEach((data) => {
            div += `
            <div class="col-12 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-capitalize fw-bold">${data.course_name}</h5>
                        <h6 class="mb-0 text-uppercase">${data.course_code}</h6>
                        <hr>
                        <small class="mb-0 d-block fw-bold text-muted text-uppercase">SATURDAY 10:00AM - 11:00AM</small>
                        <small class="mb-0 d-block fw-bold text-muted text-uppercase">${data.year_name} | ${data.section_name}</small>
                    </div>
                    <div class="card-footer w-100 d-flex justify-content-end gap-2">
                        <button class="btn btn-secondary">Masterlist</button>
                        <a href="/instructor/subjects?course=${data.course_id}&year=${data.year_id}&section=${data.section_id}" class="btn btn-primary">View Subjects</a>
                    </div>
                </div>
            </div>
            `;
        });

        $('#data-col').html(DOMPurify.sanitize(div));

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

</script>