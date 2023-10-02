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
                        <h3>Manage SMTP</h3>
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
                    </div>
                    <div class="card-body">
                        <form action="/api/single/update/smtp" method="post">
                            <div class="row mt-4">
                                <?php 
                                     if (!empty($response)) {
                                        echo show_alert($response);
                                    }
                                ?>
                                <div class="section-tle mb-3">
                                    <h5>SMTP Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-8 mb-3">
                                    <label>Server Address <span class="text-danger">*</span> </label>
                                    <input type="text" name="server" id="server" class="form-control ">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label>Port <span class="text-danger">*</span> </label>
                                    <input type="text" name="port" id="port" class="form-control" placeholder="eg. BSIT" value="">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username <span class="text-danger">*</span> </label>
                                    <input type="text" name="username" id="username" class="form-control " placeholder="eg. BSIT" value="">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Password <span class="text-danger">*</span> </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="eg. BSIT" value="">
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
