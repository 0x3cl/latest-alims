<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Views/Admin/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Views/Admin/templates/navbar.php');
            ?>
            <div class="container">
                <div class="mt-5">
                    <div class="text-banner">
                        <h3>Add Course</h3>
                        <?php 
                            include(APPPATH . 'Views/Admin/templates/text-banner.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="card">
                    <div class="card-header d-flex justify-content-end gap-2">
                        <a href="/admin/courses/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/bulk/upload" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/courses" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="create-course" method="post">
                            <div class="row mt-4">
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Course Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Code <span class="text-danger">*</span> </label>
                                    <input type="text" name="code" id="code" class="form-control" placeholder="eg. BSIT" value="">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="eg. Bachelor of Science in Information Technology" value="">
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3 float-end" id="btn-proceed">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
import {controls} from '/assets/js/admin/modules/controls.js';
controls();
</script>