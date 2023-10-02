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
                            <code>Error Code: 503 Service Unavailable</code>
                            <code>Error Message: Page is Under Contruction</code>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <small>Summary</small>
                            <small>
                                <ul class="mt-2">
                                    <li>Server maintenance, upgrades, or high traffic: The webpage is temporarily unavailable due to server maintenance, updates, upgrades, or a high volume of requests.</li>
                                    <li>Server or network issues: Connectivity problems, hardware failures, software issues, or network interruptions prevent the server from fulfilling the request.</li>
                                    <li>Application or website errors: Errors within the application or website code result in the server being unable to process the request.</li>
                                    <li>Temporary unavailability: The webpage is intentionally taken offline temporarily for reasons such as content updates, issue fixing, or feature deployment.</li>
                                </ul>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>