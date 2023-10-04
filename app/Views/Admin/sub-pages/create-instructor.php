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
                        <h3>Add Instructor Account</h3>
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
                        <a href="/admin/account/instructors/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/bulk/upload/instructors" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/account/instructors/" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="create-user" data-type="instructor" method="post">
                        <div class="row mt-4">
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Personal Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Firstname <span class="text-danger">*</span> </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Carl">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Last Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Llemos">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Email <span class="text-danger">*</span> </label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="eg. carlllemos@example.com" value="">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label>Contact <span class="text-danger">*</span> </label>
                                    <input type="text" name="contact" id="contact" class="form-control" placeholder="(09)">
                                </div>
                                <div class="col-12 col-md-8 mb-3">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Block / Lot / Street / Building">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>District/Province <span class="text-danger">*</span> </label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>City/Municipality <span class="text-danger">*</span> </label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="">Select District / Province</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Birthday <span class="text-danger">*</span> </label>
                                    <input type="date" name="birthday" id="birthday"  min="1995-01-01" max="2005-12-31" class="form-control" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="Birthday" value="">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Gender <span class="text-danger">*</span> </label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Choose</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
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
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="password" id="password" class="form-control <?php echo (!empty($response["message"]["password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="<?php echo (!empty($response) && isset($response["fields"]["password"]) ? $response["fields"]["password"] : ''); ?>">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Repeat Password <span class="text-danger">*</span> </label>    
                                    <input type="password" name="password-repeat" id="password-repeat" class="form-control <?php echo (!empty($response["message"]["repeat-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="<?php echo (!empty($response) && isset($response["fields"]["repeat-password"]) ? $response["fields"]["repeat-password"] : ''); ?>">
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
import { address } from "/assets/js/admin/modules/address.js";
address();
</script>