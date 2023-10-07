<nav id="sidebar" class="sidebar-wrapper">
    <div class="app-brand px-3 py-2 d-flex align-items-center">
        <a href="index.html">
            <img src="/assets/template/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
        </a>
    </div>
    <div class="sidebar-profile">
        <img src="/uploads/avatar/<?= $current_userdata['avatar'] ?>" class="img-3x me-3 rounded-2" alt="Admin Dashboard" />
        <div class="m-0">
            <p class="m-0 text-secondary">Hello &#128075;</p>
            <h6 class="m-0 text-nowrap"><?= ucwords($current_userdata['firstname'] . ' ' . $current_userdata['lastname']) ?></h6>
        </div>
    </div>
    <div class="sidebarMenuScroll">
        <ul class="sidebar-menu">
            <li>
                <a href="/instructor/courses">
                    <i class="bi bi-arrow-left"></i>
                    <span class="menu-text">Return to Courses</span>
                </a>
            </li>
            <p class="mt-2 ms-4">Content</p>
        </ul>
    </div>
</nav>