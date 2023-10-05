<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Views/Admin/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3" style="height: 200px;">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Views/Admin/templates/navbar.php');
            ?>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <code>An Error Occured</code>
                            <code>Error Code: <?= $error['code']?></code>
                            <code>Error Message: <?= $error['message'] ?></code>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <small>Why Am I Seeing This?</small>
                            <?php 
                                if($error['code'] == 404) {
                                    echo '
                                    <small>
                                        <ul class="mt-2">
                                            <li>The page being visited is invalid.</li>
                                            <li>The page is broken.</li>
                                            <li>If requesting user data, the user is not found.</li>
                                        </ul>
                                    </small>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>