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
                        <h3>Delete Instructors</h3>
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
                    <div class="card-header">
                        <div class="d-flex gap-2">
                            <a href="/admin/account/instructors/" class="btn btn-primary ms-auto">Go Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Are you sure to delete this instructor account?</h5>
                        <code>
                            <ul class="list-unstyled">
                                <li>ID: <?php echo $user[0]->id; ?></li>
                                <li>Username: <?php echo $user[0]->username; ?></li>
                                <li>Email: <?php echo $user[0]->email; ?></li>
                            </ul>
                        </code>
                        <hr>
                        <small class="fw-bold text-muted">Note: This action cannot be undone.</small>
                        <ul class="mt-3">
                            <li>Courses associated with this instructor will be removed</li>
                            <li>Subjects associated with this instructor will be removed</li>
                            <li>Assessments associated with this instructor will be removed</li>
                        </ul>
                        <button class="btn btn-danger mt-3 float-end" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Proceed</button>
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