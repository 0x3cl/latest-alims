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
                        <h3>Change Password</h3>
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
                    <div class="card-body">
                        <form action="/api/single/update/password" method="post">
                            <div class="row mt-4">
                                <?php 
                                    if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <?= csrf_field() ?>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Old Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="old-password" id="old-password" class="form-control <?php echo (!empty($response["message"]["old-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="">
                                    <?php echo (!empty($response["message"]["old-password"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["old-password"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>New Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="new-password" id="new-password" class="form-control <?php echo (!empty($response["message"]["new-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="">
                                    <?php echo (!empty($response["message"]["new-password"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["new-password"]).'</small>' : '') ?>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Repeat Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="repeat-password" id="repeat-password" class="form-control <?php echo (!empty($response["message"]["repeat-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="">
                                    <?php echo (!empty($response["message"]["repeat-password"]) ? '<small class="invalid-feedback">'.ucfirst($response["message"]["repeat-password"]).'</small>' : '') ?>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3 float-end">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include(APPPATH . 'Views/Admin/templates/modals.php');
?>