<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-sm-6 col-12 mt-5">
            <form id="login-form" class="my-5 needs-validation" method="post">
                <div class="border rounded-2 p-4 mt-5">
                    <div class="login-form">
                        <?= csrf_field() ?>
                        <h1 class="fw-bold">ALIM-S</h1>
                        <h4 class="fw-light mb-4">Student Login</h4>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" />
                        </div>
                        <div class="d-grid py-3 mt-3">
                            <button class="btn btn-lg btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
