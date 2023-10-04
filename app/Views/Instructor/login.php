<div class="d-block d-sm-flex justify-content-center">
    <div class="left-panel">
        <div class="container px-4">
            <div class="mb-5">
                <h1 class="section-title">Instructor Portal!</h1>
                <p>Please sign in to continue...</p>
            </div>
            <form method="post" id="login-form">
                <?= csrf_field() ?>
                <div class="form-group mb-3">
                    <input type="text" name="username" id="username" class="form-control" value="" required="required" autocomplete="off">
                    <label for="username">USERNAME</label>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" value="" required="required" autocomplete="off">
                    <label for="password">PASSWORD</label>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="nav-link float-end fs-6 d-flex align-items-center">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
                </div>
                <div class="mt-3">
                    <button id="btn-login" class="btn btn-primary mt-3 mb-3 p-3 float-end w-100">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>