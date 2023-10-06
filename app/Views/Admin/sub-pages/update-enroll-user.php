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
                        <h3>Update Enrolled Account</h3>
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
                        <a href="<?= previous_url(); ?>" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="update-enrolled-user" method="post">
                            <div class="row mt-4">
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Account Information</h5>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username </label>
                                    <input type="text" name="username" id="username" class="form-control mt-3" placeholder="Username" value="<?php echo strtoupper($requested_data['username']); ?>" disabled>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Firstname </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?= ucwords($requested_data['firstname']); ?>" disabled>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Last Name </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?= ucwords($requested_data['lastname']); ?>" disabled>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Email </label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="eren_yeager@example.com" value="<?= $requested_data['email'] ?>" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="section-tle mb-3">
                                    <h5>Enroll To</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Course <span class="text-danger">*</span> </label>
                                    <select name="course" id="course" class="form-control">
                                        <option value="<?= $requested_data['course_id'];?>" selected><?= strtoupper($requested_data['course_name']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Section <span class="text-danger">*</span> </label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="<?= $requested_data['section_id'];?>" selected><?= strtoupper($requested_data['section_name']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Year <span class="text-danger">*</span> </label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="<?= $requested_data['year_id'];?>" selected><?= strtoupper($requested_data['year_name']) ?></option>
                                    </select>
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



$('#update-enrolled-user').on('submit', function(e) {
    e.preventDefault();
    const course = DOMPurify.sanitize($('#course').val().trim());
    const section = DOMPurify.sanitize($('#section').val().trim());
    const year = DOMPurify.sanitize($('#year').val().trim());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    $.ajax({
        url: `/api/v1/users/enroll/update/<?= $requested_data['id'] ?>`,
        method: 'POST',
        dataType: 'json',
        data: {
            course: course,
            section: section,
            year: year,
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