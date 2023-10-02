<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Modules/Admin/Views/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3" style="height: 200px;">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Modules/Admin/Views/templates/navbar.php');
            ?>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <code>An Error Occured</code>
                            <code>Error Code: 401 Unauthorized</code>
                            <code>Error Message: Access Denied</code>
                        </div>
                        <hr>
                        <div>
                            <code>Your Role: <?php echo ucwords($current_user[0]->role); ?></code>
                            <code>Page You're Trying To Access: <?php echo $restriction['unauthorized_page']; ?></code>
                            <code>Page You Can Only Access: 
                                <ul class="mt-2">
                                <?php 
                                    foreach($restriction['authorized_page'] as $page) {
                                        echo '<li><a href="'.base_url($page).'">' . base_url($page) . '</a></li>';
                                    }
                                ?>
                                </ul>
                            </code>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <small>Summary</small>
                            <small>
                                <ul class="mt-2">
                                    <li>The user does not have the necessary authorization to access the page.
                                    <li>The user is not recognized as an admin or privileged user.</li>
                                    <li>The login credentials provided by the user are not associated with an admin account.</li>
                                    <li>The user's account lacks the required permissions to access the specific page.</li>
                                </ul>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>