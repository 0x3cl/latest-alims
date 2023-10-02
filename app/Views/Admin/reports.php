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
                        <h3>Manage Reports</h3>
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
                        <div class="row mt-4">
                            <?php 
                                if (!empty($response)) {
                                    echo show_alert($response);
                                }
                            ?>
                            <div class="section-tle mb-3">
                                <h5>Generation Config</h5>
                                <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <label for="select-report">What type of report would you like to generate? <span class="text-danger">*</span></label>
                                <select name="select-report" id="select-report" class="form-control w-100">
                                    <option value="">Choose</option>
                                    <option value="user-report">User Report</option>
                                    <option value="class-course-report">Class Course Report</option>
                                </select>
                            </div>
                        </div>
                        <div id="report-select-dom"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include(APPPATH . 'Views/Admin/templates/modals.php');
?>