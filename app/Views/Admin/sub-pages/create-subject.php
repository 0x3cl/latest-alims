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
                        <h3>Add Subject</h3>
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
                        <a href="/admin/subjects/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/subjects/add/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/subjects" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form action="/api/single/add/subject" method="post">
                            <div class="row mt-4">
                                <?php 
                                     if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Subject Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Code <span class="text-danger">*</span> </label>
                                    <input type="text" name="code" id="code" class="form-control <?php echo (!empty($response["message"]["code"]) ? 'is-invalid' : '') ?>" placeholder="eg. ITC 001" value="<?php echo (!empty($response) && isset($response["fields"]["code"]) ? $response["fields"]["code"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["code"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["code"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Course <span class="text-danger">*</span> </label>
                                    <select name="course" id="course" class="form-control <?php echo (!empty($response["message"]["course"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select Course</option>
                                        <?php 
                                            if(empty($course)) {
                                                echo '<option value="" disabled>create course first</option>';
                                            } else {
                                                foreach($course as $course) {
                                                echo '<option value="' . $course->id . '" name="role" ' . (!empty($response) && isset($response["fields"]["role"]) && $response["fields"]["id"] == $course->id ? 'selected' : '') . '>' . ucwords($course->name) . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php echo (!empty($response["message"]["course"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["course"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Year <span class="text-danger">*</span> </label>
                                    <select name="year" id="year" class="form-control <?php echo (!empty($response["message"]["year"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select Year</option>
                                        <?php 
                                            if(empty($year)) {
                                                echo '<option value="" disabled>create year first</option>';
                                            } else {
                                                foreach($year as $year) {
                                                echo '<option value="' . $year->id . '" name="role" ' . (!empty($response) && isset($response["fields"]["role"]) && $response["fields"]["id"] == $year->id ? 'selected' : '') . '>' . ucwords($year->name) . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php echo (!empty($response["message"]["year"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["year"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Section <span class="text-danger">*</span> </label>
                                    <select name="section" id="section" class="form-control <?php echo (!empty($response["message"]["section"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select Section</option>
                                        <?php 
                                            if(empty($section)) {
                                                echo '<option value="" disabled>create section first</option>';
                                            } else {
                                                foreach($section as $section) {
                                                echo '<option value="' . $section->id . '" name="role" ' . (!empty($response) && isset($response["fields"]["role"]) && $response["fields"]["id"] == $section->id ? 'selected' : '') . '>' . ucwords($section->name) . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php echo (!empty($response["message"]["section"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["section"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control <?php echo (!empty($response["message"]["code"]) ? 'is-invalid' : '') ?>" placeholder="eg. Introduction to Web Design" value="<?php echo (!empty($response) && isset($response["fields"]["name"]) ? $response["fields"]["name"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["name"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["name"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Description <span class="text-danger"></span> </label>
                                    <textarea name="description" id="description" class="form-control <?php echo (!empty($response["message"]["description"]) ? 'is-invalid' : '') ?>" placeholder="..." value="<?php echo (!empty($response) && isset($response["fields"]["description"]) ? $response["fields"]["description"] : ''); ?>"></textarea>
                                    <?php echo (!empty($response["message"]["description"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["description"]).'</small>' : '') ?>
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
