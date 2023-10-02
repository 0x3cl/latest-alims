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
                        <h3>Discover</h3>
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
                    <div class="card-header d-flex justify-content-end gap-2 bg-none">
                        <div class="d-flex align-items-center gap-3">
                            <input type="text" name="discover-search" id="discover-search" class="form-control" placeholder="Find Someone...">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="discover-container">
                            <div class="discover-content">
                                <div class="card">
                                    <div class="card-body skeleton-loading">
                                        <div class="discover-profile d-flex justify-content-center">
                                            <div class="skeleton-image" style="width: 100px; height: 100px; border-radius: 50%"></div>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-center gap-2">
                                            <h5 class="skeleton-text xsm-w"></h5>
                                            <h5 class="skeleton-text xsm-w"></h5>
                                        </div>
                                        <div class="bio mt-2 d-flex justify-content-center">
                                            <div class="w-100 text-center">
                                                <div class="skeleton-text sm-w m-h"></div>
                                                <div class="skeleton-text xsm-w m-h"></div>
                                                <div class="skeleton-text sm-w m-h"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-custom-dark mt-3 skeleton-text sm-w lm-h"></button>
                                            <button class="btn btn-custom-dark mt-3  skeleton-text sm-w lm-h"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body skeleton-loading">
                                        <div class="discover-profile d-flex justify-content-center">
                                            <div class="skeleton-image" style="width: 100px; height: 100px; border-radius: 50%"></div>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-center gap-2">
                                            <h5 class="skeleton-text xsm-w"></h5>
                                            <h5 class="skeleton-text xsm-w"></h5>
                                        </div>
                                        <div class="bio mt-2 d-flex justify-content-center">
                                            <div class="w-100 text-center">
                                                <div class="skeleton-text sm-w m-h"></div>
                                                <div class="skeleton-text xsm-w m-h"></div>
                                                <div class="skeleton-text sm-w m-h"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-custom-dark mt-3 skeleton-text sm-w lm-h"></button>
                                            <button class="btn btn-custom-dark mt-3  skeleton-text sm-w lm-h"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body skeleton-loading">
                                        <div class="discover-profile d-flex justify-content-center">
                                            <div class="skeleton-image" style="width: 100px; height: 100px; border-radius: 50%"></div>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-center gap-2">
                                            <h5 class="skeleton-text xsm-w"></h5>
                                            <h5 class="skeleton-text xsm-w"></h5>
                                        </div>
                                        <div class="bio mt-2 d-flex justify-content-center">
                                            <div class="w-100 text-center">
                                                <div class="skeleton-text sm-w m-h"></div>
                                                <div class="skeleton-text xsm-w m-h"></div>
                                                <div class="skeleton-text sm-w m-h"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center gap-3">
                                            <button class="btn btn-custom-dark mt-3 skeleton-text sm-w lm-h"></button>
                                            <button class="btn btn-custom-dark mt-3  skeleton-text sm-w lm-h"></button>
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
