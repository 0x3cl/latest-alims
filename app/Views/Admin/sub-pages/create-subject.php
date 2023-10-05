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
                        <h3>Add Subject</h3>
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
                        <a href="/admin/subjects/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/bulk/upload" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/subjects" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="create-subject" method="post">
                            <div class="row mt-4">
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Subject Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Code <span class="text-danger">*</span> </label>
                                    <input type="text" name="code" id="code" class="form-control" placeholder="eg. ITC 001">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Course <span class="text-danger">*</span> </label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="">Please Wait...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Year <span class="text-danger">*</span> </label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="">Please Wait...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Section <span class="text-danger">*</span> </label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="">Please Wait...</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control <?php echo (!empty($response["message"]["code"]) ? 'is-invalid' : '') ?>" placeholder="eg. Introduction to Web Design">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Description <span class="text-danger"></span> </label>
                                    <textarea name="description" id="description" class="form-control <?php echo (!empty($response["message"]["description"]) ? 'is-invalid' : '') ?>" placeholder="..."></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3 float-end" id="btn-proceed">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="module">

import {
    coursesData, yearsData, sectionsData
} from '/assets/js/admin/modules/dataUtils.js';

import { controls } from '/assets/js/admin/modules/controls.js';


coursesData().then((response) => {
    const data = response.data;
    $('select#course').html(DOMPurify.sanitize(
        `<option value="">Select Course</option>`
    ));
    data.forEach((val, key) => {
        $('select#course').append(DOMPurify.sanitize(
            `<option value="${val.id}">${val.name.toUpperCase()}</option>`
        ));
    });
});

yearsData().then((response) => {
    const data = response.data;
    $('select#year').html(DOMPurify.sanitize(
        `<option value="">Select Year</option>`
    ));
    data.forEach((val, key) => {
        $('select#year').append(DOMPurify.sanitize(
            `<option value="${val.id}">${val.name.toUpperCase()}</option>`
        ));
    });
});

sectionsData().then((response) => {
    const data = response.data;
    $('select#section').html(DOMPurify.sanitize(
        `<option value="">Select Section</option>`
    ));
    data.forEach((val, key) => {
        $('select#section').append(DOMPurify.sanitize(
            `<option value="${val.id}">${val.name.toUpperCase()}</option>`
        ));
    });
});

controls();

</script>