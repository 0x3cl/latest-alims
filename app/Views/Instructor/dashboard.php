<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . '/Views/Instructor/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . '/Views/Instructor/templates/navbar.php');                
            ?>
            <div class="container">
                <div class="mt-5">  
                    <div class="text-banner">
                        <h3>Welcome Back, <?php echo ucwords($current_userdata['firstname'] . ' ' . $current_userdata['lastname']); ?></h3>
                        <?php 
                            include(APPPATH . '/Views/Instructor/templates/text-banner.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container">
                <div class="count-overview">
                    <div class="row">
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading">
                                 <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body skeleton-loading w-100">
                                    <div class="count w-100 skeleton-text sm-w">
                                    </div>
                                    <div class="label skeleton-text xsm-w mt-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="graph-overview">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card mt-3">
                                <div class="card-header m-0 p-3 d-flex justify-content-between">
                                    <div class="section-tle">Users Analytics</div>
                                    <div>
                                        <small>
                                            <a href="#" class="m-0">view advance</a>
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body" id="card-graph-user">
                                    <ul class="list-unstyled skeleton-loading">
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text sm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text xsm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text sm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text xsm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text sm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card mt-3">
                                <div class="card-header m-0 p-3 d-flex justify-content-between">
                                    <div class="section-tle">Class Course Analytics</div>
                                    <div>
                                        <small>
                                            <a href="#" class="m-0">view advance</a>
                                        </small>
                                    </div>
                                </div>
                                <div class="card-body" id="card-graph-classcourse">
                                    <ul class="list-unstyled skeleton-loading">
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text sm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text xsm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text sm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text xsm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="w-100">
                                                    <div class="skeleton-text sm-w"></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
import { dashboardData } from "/assets/js/admin/modules/dashboard.js";
dashboardData();
</script>