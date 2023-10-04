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
                        <h3>Update <?php echo user_role($user[0]->role) ?> Account</h3>
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
                        <a href="/admin/account/<?php echo strtolower(user_role($user[0]->role).'s') ?>/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/account/<?php echo strtolower(user_role($user[0]->role).'s') ?>/update/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/account/<?php echo strtolower(user_role($user[0]->role).'s') ?>/" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form action="/api/single/update/user/<?php echo strtolower(user_role($user[0]->role).'s')?>/<?php echo $user[0]->user_id ?>" method="post">
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
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username <span class="text-danger">*</span> </label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo strtoupper($user[0]->username) ?>" disabled>
                                    <?php echo (!empty($response["message"]["username"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["username"]).'</small>' : '') ?>
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
                                    <label>Email <span class="text-danger">*</span> </label>
                                    <input type="text" name="email" id="email" class="form-control <?php echo (!empty($response["message"]["email"]) ? 'is-invalid' : '') ?>" placeholder="carlllemos@example.com" value="<?php echo $user[0]->email?>">
                                    <?php echo (!empty($response["message"]["email"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["email"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label>Contact <span class="text-danger">*</span> </label>
                                    <input type="text" name="contact" id="contact" class="form-control <?php echo (!empty($response["message"]["contact"]) ? 'is-invalid' : '') ?>" placeholder="(09)" value="<?php echo $user[0]->contact?>">
                                    <?php echo (!empty($response["message"]["contact"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["contact"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-8 mb-3">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" name="address" id="address" class="form-control <?php echo (!empty($response["message"]["address"]) ? 'is-invalid' : '') ?>" placeholder="Building, Block, Lot, Barangay" value="<?php echo $user[0]->address?>">
                                    <?php echo (!empty($response["message"]["address"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["address"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>District/Province</label>
                                    <select name="state" id="state" class="form-control <?php echo (!empty($response["message"]["state"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Choose</option>
                                    </select>
                                    <?php echo (!empty($response["message"]["state"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["state"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>City/Municipality</label>
                                    <select name="city" id="city" class="form-control <?php echo (!empty($response["message"]["city"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Select District / Province</option>
                                    </select>
                                    <?php echo (!empty($response["message"]["city"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["city"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Birthday <span class="text-danger">*</span> </label>
                                    <input type="date" name="birthday" id="birthday"  min="1995-01-01" max="2005-12-31" class="form-control <?php echo (!empty($response["message"]["birthday"]) ? 'is-invalid' : '') ?>" placeholder="Birthday" value="<?php echo $user[0]->birthday ?>">
                                    <?php echo (!empty($response["message"]["birthday"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["birthday"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Gender <span class="text-danger">*</span> </label>
                                    <select name="gender" id="gender" class="form-control <?php echo (!empty($response["message"]["gender"]) ? 'is-invalid' : '') ?>">
                                        <option value="">Choose</option>
                                        <option value="male" <?php echo (strtolower($user[0]->gender) === 'male' ? 'selected' : '')?>>Male</option>
                                        <option value="female <?php echo (strtolower($user[0]->gender) === 'female' ? 'selected' : '')?>">Female</option>
                                    </select>
                                    <?php echo (!empty($response["message"]["gender"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["gender"]).'</small>' : '') ?>
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
<script>
    const username = '<?php echo $user[0]->username; ?>'
</script>
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>To proceed, please type <code style="font-size: inherit;"><?php echo $user[0]->username; ?></code></p>
                <div class="input-group">
                    <span class="input-group-text"><code>Open3LMS/delete/</code></span>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user[0]->id; ?>">
                    <input type="text" name="code" id="code" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="process-delete">Continue</button>
            </div>
        </div>
    </div>
</div>