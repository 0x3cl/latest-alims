<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-sm-6 col-12 mt-4">
            <form id="login-form" class="my-5 needs-validation" method="post">
                <div class="border rounded-2 p-4 mt-5">
                    <div class="login-form">
                        <?= csrf_field() ?>
                        <a href="index.html" class="mb-4 d-flex">
                            <img src="/assets/template/images/logo.svg" class="img-fluid login-logo" alt="Admin Dashboard Templates" />
                        </a>
                        <h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your email" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" />
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check m-0">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
                                <label class="form-check-label" for="rememberPassword">Remember</label>
                            </div>
                            <a href="forgot-password.html" class="text-blue text-decoration-underline">Lost password?</a>
                        </div>
                        <div class="d-grid py-3 mt-4">
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
