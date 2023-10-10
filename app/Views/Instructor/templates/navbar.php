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
        <div class="dropdown">
            <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-grid fs-4 lh-1 text-secondary"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <div class="d-flex gap-2 m-2">
                    <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="/assets/template/images/brand-behance.svg" class="img-3x" alt="Admin Themes" />
                    </a>
                    <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="/assets/template/images/brand-gatsby.svg" class="img-3x" alt="Admin Themes" />
                    </a>
                    <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="/assets/template/images/brand-google.svg" class="img-3x" alt="Admin Themes" />
                    </a>
                    <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="/assets/template/images/brand-bitcoin.svg" class="img-3x" alt="Admin Themes" />
                    </a>
                    <a href="javascript:void(0)" class="g-col-4 p-2 border rounded-2">
                        <img src="/assets/template/images/brand-dribbble.svg" class="img-3x" alt="Admin Themes" />
                    </a>
                </div>
            </div>
        </div>
        <div class="dropdown border-start">
            <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bag-check fs-4 lh-1 text-secondary"></i>
                <span class="count-label info"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-sm">
                <div class="dropdown-item">
                    <div class="d-flex flex-column p-3 border">
                        <h3 class="mb-1">$35,000</h3>
                        <div class="mb-1 d-flex justify-content-between">
                            <span class="text-secondary">Revenue</span>
                            <span class="text-primary">+2%</span>
                        </div>
                        <div class="progress small">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="d-flex flex-column p-3 border">
                        <h3 class="mb-1">$48,000</h3>
                        <div class="mb-1 d-flex justify-content-between">
                            <span class="text-secondary">Income</span>
                            <span class="text-primary">+7%</span>
                        </div>
                        <div class="progress small">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="d-flex flex-column p-3 border">
                        <h3 class="mb-1">2800</h3>
                        <div class="mb-1 d-flex justify-content-between">
                            <span class="text-secondary">Sales</span>
                            <span class="text-danger">+3%</span>
                        </div>
                        <div class="progress small">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="d-grid mx-3 my-3">
                    <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                </div>
            </div>
        </div>
        <div class="dropdown border-start">
            <a class="dropdown-toggle d-flex px-3 py-4 position-relative" href="#!" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-envelope-open fs-5 lh-1 text-secondary"></i>
                <span class="count-label"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <div class="dropdown-item">
                    <div class="d-flex py-2 border-bottom">
                        <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="img-3x me-3 rounded-3" alt="Admin Theme" />
                        <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                            <p class="mb-1">Membership has been ended.</p>
                            <p class="small m-0 text-secondary">Today, 07:30pm</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="d-flex py-2 border-bottom">
                        <img src="/assets/template/images/user2.png" class="img-3x me-3 rounded-3" alt="Admin Theme" />
                        <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Benjamin Michiels</h6>
                            <p class="mb-1">Congratulate, James for new job.</p>
                            <p class="small m-0 text-secondary">Today, 08:00pm</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="d-flex py-2">
                        <img src="/assets/template/images/user1.png" class="img-3x me-3 rounded-3" alt="Admin Theme" />
                        <div class="m-0">
                            <h6 class="mb-1 fw-semibold">Jehovah Roy</h6>
                            <p class="mb-1">Lewis added new schedule release.</p>
                            <p class="small m-0 text-secondary">Today, 09:30pm</p>
                        </div>
                    </div>
                </div>
                <div class="d-grid mx-3 my-1">
                    <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                </div>
            </div>
        </div>
        <div class="dropdown ms-2">
            <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
                href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="rounded-2 img-3x" alt="Bootstrap Gallery" />
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                <a class="dropdown-item d-flex align-items-center" href="/instructor/me"><i
                        class="bi bi-person fs-4 me-2"></i>Profile</a>
                <a class="dropdown-item d-flex align-items-center" href="/instructor/settings"><i
                        class="bi bi-gear fs-4 me-2"></i>Settings</a>
                <a class="dropdown-item d-flex align-items-center" href="/instructor/sign-out"><i
                        class="bi bi-escape fs-4 me-2"></i>Logout</a>
            </div>
        </div>
    </div>
</div>