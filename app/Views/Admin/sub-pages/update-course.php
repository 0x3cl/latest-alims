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
                        <h3>Update Courses</h3>
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
                        <a href="/admin/courses/add/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/courses" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form action="/api/single/update/course/<?php echo $course[0]->id; ?>" method="post">
                            <div class="row mt-4">
                                <?php 
                                     if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Course Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Code <span class="text-danger">*</span> </label>
                                    <input type="text" name="code" id="code" class="form-control <?php echo (!empty($response["message"]["code"]) ? 'is-invalid' : '') ?>" placeholder="eg. BSIT" value="<?php echo strtoupper($course[0]->code) ?>">
                                    <?php echo (!empty($response["message"]["code"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["code"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control <?php echo (!empty($response["message"]["name"]) ? 'is-invalid' : '') ?>" placeholder="eg. Bachelor of Science in Information Technology" value="<?php echo ucwords($course[0]->name) ?>">
                                    <?php echo (!empty($response["message"]["name"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["name"]).'</small>' : '') ?>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3 float-end">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
