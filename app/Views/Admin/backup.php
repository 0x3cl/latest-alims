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
                        <h3>System Back Up</h3>
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
                            <div class="col-12 col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label>Database Backups</label>
                                        <div>
                                            <p style="font-size: 12px;">The database backups include essential data such as student information, course details, assessments, grades, and other relevant data. Automated backups are scheduled at regular intervals to ensure the safety of the data and minimize the risk of data loss.</p>
                                            <div class="dropdown dropup">
                                                <button class="btn btn-custom-dark d-flex align-items-center gap-2 nav-link text-white" data-bs-toggle="dropdown">
                                                    Download <i class='bx bx-download bx-tada' ></i>
                                                </button>
                                                <div class="dropdown-menu mt-3 p-2">
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/all/download" class="nav-link text-dark">
                                                            All Tables
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/admin_roles/download" class="nav-link text-dark">
                                                            Admin Roles Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/user_roles/download" class="nav-link text-dark">
                                                            User Roles Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/admins/download" class="nav-link text-dark">
                                                            Admin Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/users/download" class="nav-link text-dark">
                                                            Users Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/instructors/download" class="nav-link text-dark">
                                                            Instructors Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/students/download" class="nav-link text-dark">
                                                            Students Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/enroll/download" class="nav-link text-dark">
                                                            Enroll Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/courses/download" class="nav-link text-dark">
                                                            Courses Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/sections/download" class="nav-link text-dark">
                                                            Sections Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/years/download" class="nav-link text-dark">
                                                            Years Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="backups/database/smtp/download" class="nav-link text-dark">
                                                            SMTP Table
                                                        </a>
                                                    </div>
                                                    <div class="d-flex dropdown-sm-text">
                                                        <a href="javascript:void(0)" class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#customize-modal">
                                                            Customize
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label>Activity Logs</label>
                                        <div>
                                            <p style="font-size: 12px;">These backups serve purposes such as retaining historical data, enabling disaster recovery, ensuring compliance, and aiding security monitoring. Activity logs backups are crucial for maintaining data integrity, security, and compliance.</p>
                                            <div class="dropdown dropup">
                                                <button class="btn btn-custom-dark d-flex align-items-center gap-2 nav-link text-white" data-bs-toggle="dropdown">
                                                    Download <i class='bx bx-download bx-tada' ></i>
                                                </button>
                                                <div class="dropdown-menu mt-3 p-2">
                                                    <?php 
                                                        if(empty($logs)) {

                                                        } else {
                                                            foreach($logs as $log) {
                                                                echo '
                                                                <div class="d-flex dropdown-sm-text">
                                                                    <a href="backups/logs/'.$log.'/download" class="nav-link text-dark">
                                                                        '.$log.'
                                                                    </a>
                                                                </div>
                                                            ';
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="customize-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Customize Table Download</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/settings/backups/database/customize/download" method="post">
                <div class="modal-body">
                    <div class="row">
                        <?= csrf_field() ?>
                        <div class="col-12 col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="admin_roles">
                                <label class="form-check-label">Admin Roles Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="user_roles">
                                <label class="form-check-label">User Roles Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="admins">
                                <label class="form-check-label">Admin Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="users">
                                <label class="form-check-label">Users Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="instructors">
                                <label class="form-check-label">Instructors Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="students">
                                <label class="form-check-label">Students Table</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="enroll">
                                <label class="form-check-label">Enroll Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="courses">
                                <label class="form-check-label">Courses Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="sections">
                                <label class="form-check-label">Sections Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="years">
                                <label class="form-check-label">Years Table</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="custom_table[]" value="smtp">
                                <label class="form-check-label">SMTP Table</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>