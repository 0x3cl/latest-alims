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
                        <h3>Update Enrolled Account</h3>
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
                        <a href="/admin/account/enroll/<?php echo strtolower(user_role($user[0]->role) . 's') ?> " class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form action="/api/single/update/enroll/<?php echo $user[0]->user_id; ?>" method="post">
                            <div class="row mt-4">
                                <?php 
                                     if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Account Information</h5>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username </label>
                                    <input type="text" name="username" id="username" class="form-control mt-3" placeholder="Username" value="<?php echo strtoupper($user[0]->username); ?>" disabled>
                                    <?php echo (!empty($response["message"]["username"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["username"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Firstname </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control <?php echo (!empty($response["message"]["firstname"]) ? 'is-invalid' : '') ?>" placeholder="eg. Eren" value="<?php echo ucwords($user[0]->firstname); ?>" disabled>
                                    <?php echo (!empty($response["message"]["firstname"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["firstname"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Last Name </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control <?php echo (!empty($response["message"]["firstname"]) ? 'is-invalid' : '') ?>" placeholder="eg. Yeager" value="<?php echo ucwords($user[0]->lastname); ?>" disabled>
                                    <?php echo (!empty($response["message"]["lastname"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["lastname"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Email </label>
                                    <input type="text" name="email" id="email" class="form-control <?php echo (!empty($response["message"]["email"]) ? 'is-invalid' : '') ?>" placeholder="eren_yeager@example.com" value="<?php echo $user[0]->email?>" disabled>
                                    <?php echo (!empty($response["message"]["email"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["email"]).'</small>' : '') ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="section-tle mb-3">
                                    <h5>Enroll To</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Course <span class="text-danger">*</span> </label>
                                    <select name="course" id="course" class="form-control <?php echo (!empty($response["message"]["course"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select Course</option>
                                        <?php 
                                            foreach($course as $course) {
                                                echo '<option value="' . $course->id . '" name="course" ' . (!empty($enroll) && isset($enroll[0]->course_id) && $enroll[0]->course_id == $course->id ? 'selected' : '') . '>' . ucwords($course->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <?php echo (!empty($response["message"]["course"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["course"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Section <span class="text-danger">*</span> </label>
                                    <select name="section" id="section" class="form-control <?php echo (!empty($response["message"]["section"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select Section</option>
                                        <?php 
                                            foreach($section as $section) {
                                                echo '<option value="' . $section->id . '" name="role" ' . (!empty($enroll) && isset($enroll[0]->section) && $enroll[0]->section == $section->id ? 'selected' : '') . '>' . ucwords($section->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <?php echo (!empty($response["message"]["section"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["section"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Grade or Year <span class="text-danger">*</span> </label>
                                    <select name="year" id="year" class="form-control <?php echo (!empty($response["message"]["year"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select Grade or Year</option>
                                        <?php 
                                            foreach($year as $year) {
                                                echo '<option value="' . $year->id . '" name="year" ' . (!empty($enroll) && isset($enroll[0]->year) && $enroll[0]->year == $year->id ? 'selected' : '') . '>' . ucwords($year->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                    <?php echo (!empty($response["message"]["year"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["year"]).'</small>' : '') ?>
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
