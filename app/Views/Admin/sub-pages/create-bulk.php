<?php

    $uri = request()->uri->getPath();
    $array = explode("/", $uri);
    array_splice($array, -2);
    
    $path = implode("/", $array);
    
?>
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
                        <h3>Add Bulk Data</h3>
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
                    <?php 
                        echo csrf_field();
                    ?>
                    <div class="card-header">
                        <div class="d-flex gap-2">
                            <a href="<?= previous_url() ?>" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="section-tle mb-3">
                                <h5>Import Bulk Data</h5>
                                <small class="text-muted">Only accepts .csv .xlsx .xls .json file formats</small>
                            </div>
                            <div class="bulk-type">
                                <select name="type" id="type" class="form-control mb-2">
                                    <option value="">Choose Type</option>
                                    <option value="students">Students</option>
                                    <option value="instructors">Instructors</option>
                                    <option value="administrators">Students</option>
                                    <option value="courses">Courses</option>
                                    <option value="subjects">Subjects</option>
                                    <option value="sections">Sections</option>
                                    <option value="years">Years</option>
                                </select>
                            </div>
                            <div class="droparea">
                                <input type="file" name="bulk_file" id="bulk_file" class="form-control">
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

<script type="module">
import { parseBulk } from "/assets/js/admin/modules/parseBulk.js";
parseBulk();
</script>
