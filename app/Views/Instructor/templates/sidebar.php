<div id="sidebar">
    <div class="logo-sidebar text-center mt-3">
        ALIM-S
    </div>
    <hr class="mx-3">
    <div class="sidebar-content">
        <div class="ms-4 mb-3">
            Menu
        </div>
        <div class="scrollable">
            <ul class="list-unstyled">
                <li class="list-unstyled-item">
                    <a href="/instructor/dashboard" class="nav-link d-flex align-items-center gap-2 <?php echo ($active === 'dashboard') ? 'active' : ''; ?>">
                        <div class="icon">
                            <i class='bx bxs-dashboard' ></i>
                        </div>
                        <span class="icon-name">Dashboard</span>
                    </a>
                </li>
                <li class="list-unstyled-item">      
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-2 <?php echo ($active === 'accounts') ? 'active' : ''; ?>" id="sidebar-menu-link">
                        <div class="icon">
                            <i class='bx bxs-user-account'></i>
                        </div>
                        <span class="icon-name dropdown-toggle">Courses</span>
                    </a>                      
                    <div class="dropdown-content" id="account-dropdown">
                        <ul class="list-unstyled collapse">
                            <li class="list-ustyled-item">
                                <a href="/instructor/account/students" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-group bx-flip-horizontal' ></i>
                                    </div>
                                    <span class="icon-name">Students</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="list-unstyled-item">
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-2 <?php echo ($active === 'enroll') ? 'active' : ''; ?>" id="sidebar-menu-link">
                        <div class="icon">
                            <i class='bx bx-user-check'></i>
                        </div>
                        <span class="icon-name dropdown-toggle">Subjects</span>
                    </a>        
                    <div class="dropdown-content" id="enroll-dropdown">
                        <ul class="list-unstyled collapse">
                            <li class="list-ustyled-item">
                                <a href="/instructor/enroll/students" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-group bx-flip-horizontal' ></i>
                                    </div>
                                    <span class="icon-name">Students</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="list-unstyled-item">      
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-2 <?php echo ($active === 'class_course') ? 'active' : ''; ?>" id="sidebar-menu-link">
                        <div class="icon">
                            <i class='bx bx-chalkboard'></i>
                        </div>
                        <span class="icon-name dropdown-toggle">Class Course</span>
                    </a>                      
                    <div class="dropdown-content" id="account-dropdown">
                        <ul class="list-unstyled collapse">
                            <li class="list-unstyled-item">
                                <a href="/instructor/courses" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bxs-graduation'></i>
                                    </div>
                                    <span class="icon-name">Courses</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/subjects" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bx-book-content'></i>  
                                    </div>
                                    <span class="icon-name">Subjects</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/sections" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bx-intersect'></i>
                                    </div>
                                    <span class="icon-name">Sections</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/years" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bx-calendar-plus'></i>
                                    </div>
                                    <span class="icon-name">Years</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/categories" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bxs-category' ></i>
                                    </div>
                                    <span class="icon-name">Categories</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="list-unstyled-item">
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                        <div class="icon">
                            <i class='bx bx-file-blank'></i>
                        </div>
                        <span class="icon-name dropdown-toggle">Pages</span>
                    </a>
                    <div class="dropdown-content" id="pages-dropdown">
                        <ul class="list-unstyled collapse">
                            <li class="list-ustyled-item">
                                <a href="/instructor/page/home" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-home-alt'></i>
                                    </div>
                                    <span class="icon-name">Home</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/page/about" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-info-square'></i>
                                    </div>
                                    <span class="icon-name">About</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/page/features" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-check'></i>
                                    </div>
                                    <span class="icon-name">Features</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/page/testimonials" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-user-voice'></i>
                                    </div>
                                    <span class="icon-name">Testimonials</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/page/contacts" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bxs-contact'></i>
                                    </div>
                                    <span class="icon-name">Contacts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="list-unstyled-item">
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-2  <?php echo ($active === 'system') ? 'active' : ''; ?>" id="sidebar-menu-link">
                        <div class="icon">
                            <i class='bx bxs-terminal'></i>
                        </div>
                        <span class="icon-name dropdown-toggle">System</span>
                    </a>
                    <div class="dropdown-content" id="pages-dropdown">
                        <ul class="list-unstyled collapse">
                            <li class="list-ustyled-item">
                                <a href="/instructor/system/widgets" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bxs-widget'></i>
                                    </div>
                                    <span class="icon-name">Widgets</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/system/themes" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-minus-back'></i>
                                    </div>
                                    <span class="icon-name">Themes</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/system/computations" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-calculator'></i>
                                    </div>
                                    <span class="icon-name">Computations</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/system/smtp" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-mail-send'></i>
                                    </div>
                                    <span class="icon-name">SMTP</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/system/filemanager" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-folder'></i>
                                    </div>
                                    <span class="icon-name">File Manager</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/system/reports" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-file'></i>
                                    </div>
                                    <span class="icon-name">Reports</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/system/backups" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bx-folder-open'></i>
                                    </div>
                                    <span class="icon-name">Back Up</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="list-unstyled-item">
                    <a href="javascript:void(0)" class="nav-link d-flex align-items-center gap-2  <?php echo ($active === 'settings') ? 'active' : ''; ?>" id="sidebar-menu-link">
                        <div class="icon">
                            <i class='bx bx-cog'></i>
                        </div>
                        <span class="icon-name dropdown-toggle">Settings</span>
                    </a>
                    <div class="dropdown-content">
                        <ul class="list-unstyled collapse">
                            <li class="list-unstyled-item">
                                <a href="/instructor/settings/me" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bx-user'></i>
                                    </div>
                                    <span class="icon-name">Profile</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/instructor/settings/passwords" class="nav-link d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class='bx bxs-key'></i>
                                    </div>
                                    <span class="icon-name">Change Password</span>
                                </a>
                            </li>
                            <li class="list-unstyled-item">
                                <a href="/api/v1/instructor/logout" class="nav-link d-flex align-items-center gap-2" id="sidebar-menu-link">
                                    <div class="icon">
                                        <i class='bx bx-exit bx-flip-horizontal' ></i>
                                    </div>
                                    <span class="icon-name">Sign Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>