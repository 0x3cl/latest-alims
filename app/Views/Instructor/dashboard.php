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
            <div class="app-body">
                <div class="row gx-3">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-2">
                                    <i class="bi bi-bar-chart fs-1 text-primary lh-1"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="m-0 text-secondary fw-normal">Sales</h5>
                                    <h3 class="m-0 text-primary">3500</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-2">
                                    <i class="bi bi-bag-check fs-1 text-primary lh-1"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="m-0 text-secondary fw-normal">Orders</h5>
                                    <h3 class="m-0 text-primary">2900</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="arrow-label">+18%</div>
                                <div class="mb-2">
                                    <i class="bi bi-box-seam fs-1 text-primary lh-1"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="m-0 text-secondary fw-normal">Items</h5>
                                    <h3 class="m-0 text-primary">6500</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="arrow-label">+21%</div>
                                <div class="mb-2">
                                    <i class="bi bi-check-circle fs-1 text-danger lh-1"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="m-0 text-secondary fw-normal">Signups</h5>
                                    <h3 class="m-0 text-danger">7200</h3>
                                </div>
                            </div>
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