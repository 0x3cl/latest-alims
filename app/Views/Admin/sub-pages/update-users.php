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
                        <h3>Update <?php echo ucwords(user_role($requested_data['role'])) ?> Account</h3>
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
                        <a href="/admin/account/<?= user_role($requested_data['role']) . 's' . '/add/single' ?>" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/bulk/upload" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/account/<?= user_role($requested_data['role']) . 's' ?>" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="update-users" method="post">
                            <div class="row mt-4">
                                <?= csrf_field(); ?>
                                <div class="section-tle mb-3">
                                    <h5>Personal Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Username <span class="text-danger">*</span> </label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= strtoupper($requested_data['username']) ?>" disabled>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Role <span class="text-danger">*</span> </label>
                                    <input type="text" name="role" id="role" class="form-control" placeholder="Username" value="<?= strtoupper(user_role($requested_data['role'])) ?>" disabled>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Firstname <span class="text-danger">*</span> </label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="eg. Carl" value="<?= ucwords($requested_data['firstname']) ?>">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Last Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="eg. Llemos" value="<?= ucwords($requested_data['lastname']) ?>">
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Email <span class="text-danger">*</span> </label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="carlllemos@example.com" value="<?= $requested_data['email'] ?>">
                                </div>
                                <div class="col-12 col-md-4 mb-3">
                                    <label>Contact <span class="text-danger">*</span> </label>
                                    <input type="text" name="contact" id="contact" class="form-control" placeholder="(09)" value="<?= $requested_data['contact'] ?>">
                                </div>
                                <div class="col-12 col-md-8 mb-3">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Building, Block, Lot, Barangay" value="<?= ucwords($requested_data['address']) ?>">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>District/Province <span class="text-danger">*</span> </label></label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Choose</option>
                                        <option value="<?= ucwords($requested_data['province']) ?>" selected><?=  ucwords($requested_data['province']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>City/Municipality <span class="text-danger">*</span> </label></label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="">Select District / Province</option>
                                        <option value="<?= ucwords($requested_data['city']) ?>" selected><?= ucwords($requested_data['city']) ?></option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Birthday <span class="text-danger">*</span> </label>
                                    <input type="date" name="birthday" id="birthday" min="1995-01-01" max="2005-12-31" class="form-control" placeholder="Birthday" value="<?= $requested_data['birthday'] ?>">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label>Gender <span class="text-danger">*</span> </label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Choose</option>
                                        <option value="male" <?= $requested_data['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                                        <option value="female" <?= $requested_data['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
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
import{address} from '/assets/js/admin/modules/address.js';
import {generateCSRFToken, toastMessage} from '/assets/js/admin/modules/utils.js';
import {getJWTtoken} from '/assets/js/admin/modules/dataUtils.js';

address();

const response = await getJWTtoken();
const jwt_token = response.token;
let role;


$('#update-users').on('submit', function(e) {
    e.preventDefault();
    
    const firstname = DOMPurify.sanitize($('#firstname').val().trim());
    const lastname = DOMPurify.sanitize($('#lastname').val().trim());
    const email = DOMPurify.sanitize($('#email').val().trim());
    const contact = DOMPurify.sanitize($('#contact').val().trim());
    const address = DOMPurify.sanitize($('#address').val().trim());
    const state = DOMPurify.sanitize($('#state').val().trim());
    const city = DOMPurify.sanitize($('#city').val().trim());
    const birthday = DOMPurify.sanitize($('#birthday').val().trim());
    const gender = DOMPurify.sanitize($('#gender').val().trim());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    $.ajax({
        url: `/api/v1/users/update/<?= user_role($requested_data['role']) . '/' . $requested_data['id'] ?>`,
        method: 'POST',
        dataType: 'json',
        data: {
            firstname: firstname,
            lastname: lastname,
            email: email,
            contact: contact,
            address: address,
            state: state,
            city: city,
            birthday: birthday,
            gender: gender,
        }, beforeSend: function(xhr) {
            $('#btn-proceed').attr('disabled', true);
            xhr.setRequestHeader('Authorization', `Bearer ${jwt_token}`);
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
        }, success: function(response) {
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