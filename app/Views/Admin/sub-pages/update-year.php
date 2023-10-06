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
                        <h3>Update Year</h3>
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
                        <a href="/admin/years/add/single" class="btn btn-outline-primary float-end d-flex align-items-center"><i class='bx bx-plus'></i></a>
                        <a href="/admin/years/add/bulk" class="btn btn-outline-secondary float-end d-flex align-items-center"><i class='bx bx-file'></i></a>
                        <a href="/admin/years" class="btn btn-outline-danger ms-auto d-flex align-items-center"><i class='bx bxs-left-arrow-alt'></i></a>
                    </div>
                    <div class="card-body">
                        <form id="update-year" method="post">
                            <div class="row mt-4">
                                <?= csrf_field() ?>
                                <div class="section-tle mb-3">
                                    <h5>Year Information</h5>
                                    <small class="text-muted">All <span class="text-danger">*</span> are required</small>
                                </div>
                                <div class="col-12 col-md-12 mb-3">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name" class="form-control <?php echo (!empty($response["message"]["code"]) ? 'is-invalid' : '') ?>" placeholder="eg. First Year" value="<?= ucwords($requested_data['name']) ?>">
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

const response = await getJWTtoken();
const jwt_token = response.token;

$('#update-year').on('submit', function(e) {
    e.preventDefault();
    const name = DOMPurify.sanitize($('#name').val().trim());
    const csrf_token =  DOMPurify.sanitize($('input[name="csrf_token"]').val().trim());

    $.ajax({
        url: `/api/v1/years/update/<?= $requested_data['id'] ?>`,
        method: 'POST',
        dataType: 'json',
        data: {
            name: name,
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