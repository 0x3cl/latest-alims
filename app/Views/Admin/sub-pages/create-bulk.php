<?php

    $uri = request()->uri->getPath();
    $array = explode("/", $uri);
    array_splice($array, -2);
    
    $path = implode("/", $array);
    
?>
<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Modules/Admin/Views/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="site-header px-3">
            <!-- navbar -->
            <?php 
                include(APPPATH . 'Modules/Admin/Views/templates/navbar.php');
            ?>
            <div class="container">
                <div class="mt-5">
                    <div class="text-banner">
                        <h3>Add <?php echo ucwords($parsing["target"]); ?></h3>
                        <?php 
                            include(APPPATH . 'Modules/Admin/Views/templates/text-banner.php');
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
                            <a href="/<?php echo $path ?>/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                            <a href="/<?php echo $path ?>/add/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                            <a href="/<?php echo $path ?>" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="section-tle mb-3">
                                <h5>Import Bulk Data</h5>
                                <small class="text-muted">Only accepts .csv .xlsx .xls .json file formats</small>
                            </div>
                            <div class="droparea">
                                <input type="file" name="bulk_file" id="bulk_file" class="form-control">
                                <input type="hidden" name="target" id="target" value="<?php echo $parsing["target"] ?>">
                            </div>
                            <hr>
                            <div class="section-tle mt-3 mb-3">
                                <small class="text-muted">Preview Parsed Data</small>
                            </div>
                            <div class="preview-bulk">
                                <div class="status" id="bulk_status">
                                    <div>
                                        <code>// currently no file is parsed</code>
                                    </div>
                                    <div>
                                        <code>// upload a file</code>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
