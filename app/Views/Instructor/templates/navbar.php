<nav class="navbar navbar-expand-lg navbar-dark py-3">
    <div class="container">
        <div class="hamburger-navbar-brand">
            <a class="navbar-brand" href="/admin/dashboard">ADMINISTRATOR</a>
            <div class="nav-input">
                <div class="hamburger-wrapper me-5">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
        <ul class="list-unstyled nav d-flex gap-4 align-items-center nav-ul">
            <li class="nav-item position-relative d-none d-sm-flex">
                <div class="dropdown">
                    <a class="nav-link active" data-bs-toggle="dropdown">
                        <i class='bx bx-chat'></i>
                        <span class="badge">
                            <small>99</small>
                        </span>
                    </a>
                    <div class="dropdown-menu mt-3 p-2">
                        <div class="d-flex dropdown-sm-text">
                            <a href="#" class="nav-link text-dark">
                                Admin01 sent a message
                            </a>
                        </div>
                        <div class="d-flex dropdown-sm-text">
                            <a href="#" class="nav-link text-dark">
                                Admin01 sent a message
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item position-relative d-none d-sm-flex">
                <div class="dropdown">
                    <a class="nav-link active" data-bs-toggle="dropdown">
                        <i class='bx bx-bell'></i>
                        <span class="badge">
                            <small>99</small>
                        </span>
                    </a>
                    <div class="dropdown-menu mt-3 p-2">
                        <div class="d-flex dropdown-sm-text">
                            <a href="#" class="nav-link text-dark">
                                New notification in here
                            </a>
                        </div>
                        <div class="d-flex dropdown-sm-text">
                            <a href="#" class="nav-link text-dark">
                                New notification in here
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <div class="profile" data-bs-toggle="dropdown">
                        <div class="d-flex align-items-center gap-2" id="navbar-profile">
                            <div>
                                <img src="<?= base_url('./uploads/avatar/'.$current_userdata['avatar']) ?>" id="img-profile">
                            </div>
                            <div>
                                <div class="dropdown-toggle"><?= ucwords($current_userdata['firstname'] . ' ' . $current_userdata['lastname']) ?></div>
                                <div>#<?= $current_userdata['id'] ?></div>
                            </div>
                        </div>
                    </div>
                    <ul class="dropdown-menu mt-3" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/admin/settings/me">Profile</a></li>
                        <li><a class="dropdown-item" href="/api/v1/admin/logout">Sign Out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>