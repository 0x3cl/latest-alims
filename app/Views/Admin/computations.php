<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Modules/Admin/Views/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Modules/Admin/Views/templates/navbar.php');
            ?>
            <div class="container">
                <div class="mt-5">
                    <div class="text-banner">
                        <h3>Manage Computations</h3>
                        <?php 
                            include(APPPATH . 'Modules/Admin/Views/templates/text-banner.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="card">
                    <div class="card-header d-flex justify-content-end gap-2">
                        
                    </div>
                    <div class="card-body">
                        <form action="/api/single/update/course/" method="post">
                            <div class="row mt-4">
                                <?php 
                                     if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <div class="section-tle mb-3">
                                    <h5>Formulations</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Assessments (Quiz, Exam) <span class="text-danger">*</span> </label>
                                    <input type="text" name="quiz" id="quiz" class="form-control <?php echo (!empty($response["message"]["quiz"]) ? 'is-invalid' : '') ?>" placeholder="(ts / ms) * 100" value="<?php echo '' ?>">
                                    <?php echo (!empty($response["message"]["quiz"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["quiz"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Prelim Grade<span class="text-danger">*</span> </label>
                                    <input type="text" name="prelim" id="prelim" class="form-control <?php echo (!empty($response["message"]["prelim"]) ? 'is-invalid' : '') ?>" placeholder="" value="<?php echo '' ?>">
                                    <?php echo (!empty($response["message"]["prelim"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["prelim"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Midterm Grade<span class="text-danger">*</span> </label>
                                    <input type="text" name="midterm" id="midterm" class="form-control <?php echo (!empty($response["message"]["midterm"]) ? 'is-invalid' : '') ?>" placeholder="" value="<?php echo '' ?>">
                                    <?php echo (!empty($response["message"]["midterm"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["midterm"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Semi-Final Grade<span class="text-danger">*</span> </label>
                                    <input type="text" name="semis" id="semis" class="form-control <?php echo (!empty($response["message"]["semis"]) ? 'is-invalid' : '') ?>" placeholder="" value="<?php echo '' ?>">
                                    <?php echo (!empty($response["message"]["semis"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["semis"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Final Grade<span class="text-danger">*</span> </label>
                                    <input type="text" name="final" id="final" class="form-control <?php echo (!empty($response["message"]["final"]) ? 'is-invalid' : '') ?>" placeholder="" value="<?php echo '' ?>">
                                    <?php echo (!empty($response["message"]["final"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["final"]).'</small>' : '') ?>
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
