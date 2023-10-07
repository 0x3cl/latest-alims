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

<div class="modal fade" id="create-post-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalXlLabel">
                    Create Post
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
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