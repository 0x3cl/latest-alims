<div class="app-header">
    <div class="d-flex">
        <button class="btn btn-outline-primary me-3 toggle-sidebar" id="toggle-sidebar">
            <i class="bi bi-list fs-5"></i>
        </button>
        <button class="btn btn-outline-primary me-3 pin-sidebar" id="pin-sidebar">
            <i class="bi bi-list fs-5"></i>
        </button>
    </div>
    <div class="app-brand-sm">
        <a href="index.html" class="d-lg-none d-md-block">
            <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="logo" alt="Bootstrap Gallery">
        </a>
    </div>
    <div class="header-actions">
        <div class="dropdown ms-2">
            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
                href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <a class="dropdown-item d-flex align-items-center" href="/instructor/me"><i
                        class="bi bi-person fs-4 me-2"></i>Profile</a>
                <a class="dropdown-item d-flex align-items-center" href="/instructor/sign-out"><i
                        class="bi bi-escape fs-4 me-2"></i>Logout</a>
            </div>
        </div>
    </div>
</div>