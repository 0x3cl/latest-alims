<nav id="sidebar" class="sidebar-wrapper">
    <!-- App brand starts -->
    <div class="app-brand px-3 py-2 d-flex align-items-center">
        <a class="navbar-brand w-100 mt-3" href="index.html">
            <h1 class="text-center">ALIM-S</h1>
        </a>
    </div>
    <!-- App brand ends -->

    <!-- Sidebar profile starts -->
    <div class="sidebar-profile">
        <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="img-3x me-3 rounded-2" alt="Admin Dashboard" />
        <div class="m-0 mt-2">
            <h6 class="m-0 text-nowrap fw-bold"><?= ucwords($current_userdata['firstname'] . ' ' . $current_userdata['lastname']) ?></h6>
            <hr class="my-1">
            <p class="m-0 text-secondary"><?= $current_userdata['username'] ?></p>
            <p class="m-0 text-secondary position-relative line-clamp" style="bottom: 5px"><?= $current_userdata['email'] ?></p>
        </div>
    </div>
    <!-- Sidebar profile ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
        <ul class="sidebar-menu">
            <li class="<?= $active === 'dashboard' ? 'active current-page' : '' ?>">
                <a href="/instructor/dashboard">
                    <i class="bi bi-house-door"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="treeview <?= $active === 'courses' ? 'active current-page' : '' ?>">
                <a href="#">
                    <i class="bi bi-ui-checks-grid"></i>
                    <span class="menu-text">My Courses</span>
                </a>
                <ul class="treeview-menu courses">
                    <li>
                        <a href="/instructor/courses">All Courses</a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?= $active === 'settings' ? 'active current-page' : '' ?>">
                <a href="#">
                    <i class="bi bi-gear"></i>
                    <span class="menu-text">Settings</span>
                </a>
                <ul class="treeview-menu settings">
                    <li>
                        <a href="/instructor/me">My Profile</a>
                    </li>
                    <li>
                        <a href="/instructor/change/password">Change Password</a>
                    </li>
                    <li>
                        <a href="/instructor/sign-out">Sign Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Sidebar menu ends -->
</nav>