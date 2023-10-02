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
                        <h3>Add Student Account</h3>
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
                        <a href="/admin/account/students/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/account/students/add/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/account/students/" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form action="/api/single/add/user/students" method="post">
                            <div class="row mt-4">
                                <?php 
                                    if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Personal Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Firstname <span class="text-danger">*</span> </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control <?php echo (!empty($response["message"]["firstname"]) ? 'is-invalid' : '') ?>" placeholder="eg. Carl" value="<?php echo (!empty($response) && isset($response["fields"]["firstname"]) ? $response["fields"]["firstname"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["firstname"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["firstname"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Last Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control <?php echo (!empty($response["message"]["lastname"]) ? 'is-invalid' : '') ?>" placeholder="eg. Llemos" value="<?php echo (!empty($response) && isset($response["fields"]["lastname"]) ? $response["fields"]["lastname"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["lastname"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["lastname"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Email <span class="text-danger">*</span> </label>
                                    <input type="text" name="email" id="email" class="form-control <?php echo (!empty($response["message"]["email"]) ? 'is-invalid' : '') ?>" placeholder="eg. carlllemos@example.com" value="<?php echo (!empty($response) && isset($response["fields"]["email"]) ? $response["fields"]["email"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["email"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["email"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label>Contact <span class="text-danger">*</span> </label>
                                    <input type="text" name="contact" id="contact" class="form-control <?php echo (!empty($response["message"]["contact"]) ? 'is-invalid' : '') ?>" placeholder="(09)" value="<?php echo (!empty($response) && isset($response["fields"]["contact"]) ? $response["fields"]["contact"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["contact"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["contact"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-8 mb-3">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" name="address" id="address" class="form-control <?php echo (!empty($response["message"]["address"]) ? 'is-invalid' : '') ?>" placeholder="Building, Block, Lot, Barangay" value="<?php echo (!empty($response) && isset($response["fields"]["address"]) ? $response["fields"]["address"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["address"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["address"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>District/Province <span class="text-danger">*</span> </label>
                                    <select name="state" id="state" class="form-control <?php echo (!empty($response["message"]["state"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Choose</option>
                                    </select>
                                    <?php echo (!empty($response["message"]["state"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["state"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>City/Municipality <span class="text-danger">*</span> </label>
                                    <select name="city" id="city" class="form-control <?php echo (!empty($response["message"]["city"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select District / Province</option>
                                    </select>
                                    <?php echo (!empty($response["message"]["city"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["city"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Birthday <span class="text-danger">*</span> </label>
                                    <input type="date" name="birthday" id="birthday"  min="1995-01-01" max="2005-12-31" class="form-control <?php echo (!empty($response["message"]["birthday"]) ? 'is-invalid' : '') ?>" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="Birthday" value="<?php echo (!empty($response) && isset($response["fields"]["birthday"]) ? $response["fields"]["birthday"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["birthday"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["birthday"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Gender <span class="text-danger">*</span> </label>
                                    <select name="gender" id="gender" class="form-control <?php echo (!empty($response["message"]["gender"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Choose</option>
                                        <option value="male" <?php echo (!empty($response) && isset($response["fields"]["gender"]) && $response["fields"]["gender"] === 'male' ? 'selected' : ''); ?>>Male</option>
                                        <option value="female" <?php echo (!empty($response) && isset($response["fields"]["gender"]) && $response["fields"]["gender"] === 'female' ? 'selected' : ''); ?>>Female</option>
                                    </select>
                                    <?php echo (!empty($response["message"]["gender"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["gender"]).'</small>' : '') ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="section-tle mb-3">
                                    <h5>Account Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username <span class="text-danger">*</span> </label>
                                    <input type="text" name="username" id="username" class="form-control <?php echo (!empty($response["message"]["username"]) ? 'is-invalid' : '') ?>" placeholder="eg. carl01" value="<?php echo (!empty($response) && isset($response["fields"]["username"]) ? $response["fields"]["username"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["username"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["username"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="password" id="password" class="form-control <?php echo (!empty($response["message"]["password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="<?php echo (!empty($response) && isset($response["fields"]["password"]) ? $response["fields"]["password"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["password"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["password"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Repeat Password <span class="text-danger">*</span> </label>    
                                    <input type="password" name="repeat-password" id="repeat-password" class="form-control <?php echo (!empty($response["message"]["repeat-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="<?php echo (!empty($response) && isset($response["fields"]["repeat-password"]) ? $response["fields"]["repeat-password"] : ''); ?>">
                                    <?php echo (!empty($response["message"]["repeat-password"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["repeat-password"]).'</small>' : '') ?>
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
