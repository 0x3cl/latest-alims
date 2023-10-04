<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . '/Views/Admin/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . '/Views/Admin/templates/navbar.php');
            ?>
            <div class="container">
                <div class="mt-5">
                    <div class="text-banner">
                        <h3>Manage Student Accounts</h3>
                        <?php 
                            include(APPPATH . '/Views/Admin/templates/text-banner.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="card" id="card-data">
                    <div class="card-header d-flex justify-content-end gap-2">
                        <a href="javascript:void(0)" class="btn btn-outline-secondary" id="control" data-action="enable" data-type="user"><i class='bx bx-show'></i></a>
                        <a href="javascript:void(0)" class="btn btn-outline-secondary" id="control" data-action="disable" data-type="user"><i class='bx bx-hide'></i></a>
                        <a href="javascript:void(0)" class="btn btn-outline-danger" id="control" data-action="delete" data-type="user"><i class='bx bx-trash'></i></a>
                        <a href="/admin/account/students/add/single" class="btn btn-outline-primary float-end"><i class='bx bx-add-to-queue'></i></a>
                    </div>
                    <div class="card-body">
                        <div class="loader student">
                            <div class="inner-loader">
                                <i class='bx bx-loader-circle bx-spin' ></i>
                                <p>Please Wait...</p>
                            </div>
                        </div>
                        <div class="">
                            <?= csrf_field() ?>
                            <table class="table nowrap w-100" id="student-table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="multi-select-all" id="multi-select-all"></th>
                                        <th>ID</th>
                                        <th>Enroll Status</th>
                                        <th>Account Status</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Gender</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include(APPPATH . '/Views/Admin/templates/modals.php');
?>

<script type="module">
import { studentTable } from "/assets/js/admin/modules/datatables.js";
import {controls} from '/assets/js/admin/modules/controls.js';
studentTable();
controls(studentTable);
</script>