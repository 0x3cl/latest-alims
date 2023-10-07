<nav id="sidebar" class="sidebar-wrapper">
    <!-- App brand starts -->
    <div class="app-brand px-3 py-2 d-flex align-items-center">
        <a href="index.html">
            <img src="/assets/template/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
        </a>
    </div>
    <!-- App brand ends -->

    <!-- Sidebar profile starts -->
    <div class="sidebar-profile">
        <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="img-3x me-3 rounded-2" alt="Admin Dashboard" />
        <div class="m-0">
            <p class="m-0 text-secondary">Hello &#128075;</p>
            <h6 class="m-0 text-nowrap"><?= ucwords($current_userdata['firstname'] . ' ' . $current_userdata['lastname']) ?></h6>
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
            <!-- <li class="treeview <?= $active === 'subjects' ? 'active current-page' : '' ?>">
                <a href="widgets.html">
                    <i class="bi bi-stickies"></i>
                    <span class="menu-text">My Subjects</span>
                </a>
                <ul class="treeview-menu subjects">
                   
                </ul>
            </li> -->
        </ul>
    </div>
    <!-- Sidebar menu ends -->
</nav>