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
                        <h3>Update Admin Account</h3>
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
                        <a href="/admin/account/administrators/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/account/administrators/update/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/account/administrators" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form action="/api/single/update/user/admins/<?php echo $user[0]->id ?>" method="post">
                            <div class="row">
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
                                    <input type="text" name="firstname" id="firstname" class="form-control <?php echo (!empty($response["message"]["firstname"]) ? 'is-invalid' : '') ?>" placeholder="eg. Carl" value="<?php echo ucwords($user[0]->firstname); ?>">
                                    <?php echo (!empty($response["message"]["firstname"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["firstname"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Last Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control <?php echo (!empty($response["message"]["firstname"]) ? 'is-invalid' : '') ?>" placeholder="eg. Llemos" value="<?php echo ucwords($user[0]->lastname); ?>">
                                    <?php echo (!empty($response["message"]["lastname"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["lastname"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username <span class="text-danger">*</span> </label>
                                    <input type="text" name="username" id="username" class="form-control mt-3" placeholder="Username" value="<?php echo $user[0]->username ?>" disabled>
                                    <?php echo (!empty($response["message"]["username"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["username"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12">
                                    <label>Admin Role <span class="text-danger">*</span> </label>
                                    <select name="role" id="role" class="form-control mt-3">
                                        <option value="">Select</option>
                                        <?php 
                                            foreach($roles as $role) {
                                                echo '<option value="'.$role->role.'" name="role" '.($user[0]->role == $role->role ? 'selected' : '').'>'.ucwords($role->role_name).'</option>';
                                            }
                                        ?>
                                    </select>
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
