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
                        Dashboard
                    </li>
                </ol>
            </div>
            <div class="app-body mt-3">
                <h4>Welcome Back! </h4>
                <h1><?= ucwords($current_userdata['firstname'] . ' ' . $current_userdata['lastname']) ?></h1>
            </div>
            <div class="app-footer">
                <span>&copy; 2023 | ALIMS</span>
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