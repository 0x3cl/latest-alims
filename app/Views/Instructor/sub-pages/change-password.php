<div class="page-wrapper">
    <div class="main-container">
        <?php include(APPPATH . '/Views/Instructor/templates/sidebar.php'); ?>
        <div class="app-container">
            <?php include(APPPATH . '/Views/Instructor/templates/navbar.php'); ?>
            <div class="app-hero-header d-flex align-items-center">
                <ol class="breadcrumb d-none d-lg-flex">
                    <li class="breadcrumb-item">
                        <i class="bi bi-house lh-1"></i>
                        <a href="index.html" class="text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item text-secondary" aria-current="page">
                        Change Password
                    </li>
                </ol>
            </div>
            <div class="app-body">
                <form id="change-password" method="post">
                    <div class="row mt-4">
                        <?= csrf_field() ?>
                        <div class="col-12 col-md-12 mb-3">
                            <label>Old Password <span class="text-danger">*</span> </label>
                            <input type="password" name="old-password" id="old-password" class="form-control <?php echo (!empty($response["message"]["old-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="">
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label>New Password <span class="text-danger">*</span> </label>
                            <input type="password" name="new-password" id="new-password" class="form-control <?php echo (!empty($response["message"]["new-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="">
                        </div>
                        <div class="col-12 col-md-12 mb-3">
                            <label>Repeat Password <span class="text-danger">*</span> </label>
                            <input type="password" name="password-repeat" id="password-repeat" class="form-control <?php echo (!empty($response["message"]["repeat-password"]) ? 'is-invalid' : '') ?>" placeholder="••••••••" value="">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 float-end">Save</button>
                </form>
            </div>
            <div class="app-footer">
                <span>&copy; 2023 | ALIMS</span>
            </div>
        </div>
    </div>
</div>

<script type="module">
import {my_courses} from '/assets/js/instructor/modules/dataUtils.js';
import {generateCSRFToken, clearFields} from '/assets/js/instructor/modules/utils.js';
import {getJWTtoken} from '/assets/js/instructor/modules/dataUtils.js';

const response = await getJWTtoken();
const jwt_token = response.token;
const id = <?= $current_userdata['id']?>

my_courses(id).then((response) => {
    let div = '';
    if(response.status == 200) {
        const data = response.data;
        console.log(data);
        data.forEach((data) => {
            div += `
            <div class="col-12 col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-capitalize fw-bold">${data.course_name}</h5>
                        <h6 class="mb-0 text-uppercase">${data.course_code}</h6>
                        <hr>
                        <small class="mb-0 d-block fw-bold text-muted text-uppercase">SATURDAY 10:00AM - 11:00AM</small>
                        <small class="mb-0 d-block fw-bold text-muted text-uppercase">${data.year_name} | ${data.section_name}</small>
                    </div>
                    <div class="card-footer w-100 d-flex justify-content-end gap-2">
                        <button class="btn btn-secondary">Masterlist</button>
                        <a href="/instructor/subjects?course=${data.course_id}&year=${data.year_id}&section=${data.section_id}" class="btn btn-primary">View Subjects</a>
                    </div>
                </div>
            </div>
            `;
        });

        $('#data-col').html(DOMPurify.sanitize(div));

        div = '';

        data.forEach((data) => {
            div += `
                
                <li>
                    <a href="/instructor/subjects?course=${data.course_id}&year=${data.year_id}&section=${data.section_id}">
                        <p class="d-block text-capitalize mb-1">${data.course_name}</p>
                        <small class="d-block text-uppercase">${data.course_code} </small>
                        <small class="d-block text-uppercase">${data.section_name} | ${data.year_name}</small>
                    </a>
                </li>
            `;
        });

        $('.treeview-menu.courses').append(DOMPurify.sanitize(div));

    }
});

$('#change-password').on('submit', function(e) {
    e.preventDefault();
    const old_password = DOMPurify.sanitize($('#old-password').val().trim());
    const new_password = DOMPurify.sanitize($('#new-password').val().trim());
    const password_repeat = DOMPurify.sanitize($('#password-repeat').val().trim());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    $.ajax({
        url: '/api/v1/my/password',
        method: 'POST',
        dataType: 'json',
        data: {
            old_password: old_password,
            new_password: new_password,
            password_repeat: password_repeat,
        }, beforeSend: function(xhr) {
            $(this).attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
            if(response.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Yey..',
                    text: response.message,
                });
            } else {
                let err = response.message;
                err = Object.values(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: err[0],
                });
            }
        }
    }).done(function(){
        $(this).attr('disabled', false);
        $('input').val('');
        generateCSRFToken();
    });
})

</script>