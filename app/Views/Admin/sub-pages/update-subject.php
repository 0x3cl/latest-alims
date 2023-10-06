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
                        <h3>Update Subject</h3>
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
                        <a href="/admin/courses/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/courses/add/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/courses" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="update-subject" method="post">
                            <div class="row mt-4">
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Course Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Code <span class="text-danger">*</span> </label>
                                    <input type="text" name="code" id="code" class="form-control" placeholder="eg. ITC 001" value="<?= strtoupper($requested_data['subject_code']) ?>">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Course <span class="text-danger">*</span> </label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="">Please Wait...</option>
                                        <option value="<?= $requested_data['course_id'];?>" selected><?= strtoupper($requested_data['course_name']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Section <span class="text-danger">*</span> </label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="">Please Wait...</option>
                                        <option value="<?= $requested_data['section_id'];?>" selected><?= strtoupper($requested_data['section_name']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Year <span class="text-danger">*</span> </label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="">Please Wait...</option>
                                        <option value="<?= $requested_data['year_id'];?>" selected><?= strtoupper($requested_data['year_name']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="eg. Introduction to Web Design" value="<?= ucwords($requested_data['subject_name']) ?>">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Description <span class="text-danger"></span> </label>
                                    <textarea name="description" id="description" class="form-control" placeholder="..."> <?= ucfirst($requested_data['subject_description']) ?></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3 float-end">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
import {generateCSRFToken, toastMessage} from '/assets/js/admin/modules/utils.js';
import {getJWTtoken} from '/assets/js/admin/modules/dataUtils.js';
import {
    coursesData, yearsData, sectionsData
} from '/assets/js/admin/modules/dataUtils.js';


const response = await getJWTtoken();
const jwt_token = response.token;

coursesData().then((response) => {
    const data = response.data;
    data.forEach((val, key) => {
        $('select#course').append(DOMPurify.sanitize(
            `<option value="${val.id}">${val.name.toUpperCase()}</option>`
        ));
    });

});

yearsData().then((response) => {
    const data = response.data;
    data.forEach((val, key) => {
        $('select#year').append(DOMPurify.sanitize(
            `<option value="${val.id}">${val.name.toUpperCase()}</option>`
        ));
    });
});

sectionsData().then((response) => {
    const data = response.data;
    data.forEach((val, key) => {
        $('select#section').append(DOMPurify.sanitize(
            `<option value="${val.id}">${val.name.toUpperCase()}</option>`
        ));
    });
});



$('#update-subject').on('submit', function(e) {
    e.preventDefault();
    const code = DOMPurify.sanitize($('#code').val().trim());
    const course = DOMPurify.sanitize($('#course').val().trim());
    const section = DOMPurify.sanitize($('#section').val().trim());
    const year = DOMPurify.sanitize($('#year').val().trim());
    const name = DOMPurify.sanitize($('#name').val().trim());
    const description = DOMPurify.sanitize($('#description').val().trim());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    $.ajax({
        url: `/api/v1/subjects/update/<?= $requested_data['id'] ?>`,
        method: 'POST',
        dataType: 'json',
        data: {
            code: code,
            course: course,
            section: section,
            year: year,
            name: name,
            description: description,
        }, beforeSend: function(xhr) {
            $('#btn-proceed').attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            console.log(response);
            if(response.status == 200) {
                toastMessage('success', response.message); 
            } else {
                let err = response.message;
                err = Object.values(err);
                toastMessage('error', err[0]); 
            }
        }
    }).done(function(){
        $('#btn-proceed').attr('disabled', false);
        generateCSRFToken();
    });
});
</script>