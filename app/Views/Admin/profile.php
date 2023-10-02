<div class="wrapper">
    <!-- sidebar -->
    <?php 
        include(APPPATH . 'Modules/Admin/Views/templates/sidebar.php');
    ?>

    <div id="content">
        <div class="banner">
            <div class="site-header px-3 skeleton-image">
                <div class="banner-container">
                    <div class="banner-overlay">
                    </div>
                    <div class="banner-image-others">
                        <img src="/uploads/banner/<?php echo $data['personal'][0]->banner; ?>">
                    </div>
                </div>
                <!-- navbar -->
                <?php 
                    include(APPPATH . 'Modules/Admin/Views/templates/navbar.php');
                ?>
            </div>
        </div>
        <div id="dashboard" class="mx-2">
            <div class="container w-100">
                <div class="d-block d-md-flex position-relative">
                    <div>
                        <div class="profile-container">
                          <img src="/uploads/avatar/<?php echo $data['personal'][0]->avatar ?>" class="view-profile">
                        </div>
                    </div>
                    <div class="profile-info">
                        <h1><?php echo ucwords($data['personal'][0]->firstname . ' ' . $data['personal'][0]->lastname) ?></h1>
                        <p><?php echo user_role($data['personal'][0]->role); ?><span class="badge-admin mb-1"><i class='bx bxs-check-circle'></i></span></p>
                    </div>
                </div>  
                <div class="row mt-4">
                    <div class="col-12 col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title m-0">About</h6>
                            </div>
                            <div class="card-body">
                                <div class="bio">
                                    <div>
                                        <?php echo isEmpty($data['personal'][0]->bio); ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="info">
                                    <ul class="list-unstyled">
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bxs-id-card'></i>
                                                <span>#<?php echo isEmpty($data['personal'][0]->user_id) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bx-user'></i>
                                                <span><?php echo isEmpty($data['personal'][0]->username) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bx-home'></i>
                                                <span><?php echo isEmpty($data['personal'][0]->city . ', ' . $data['personal'][0]->province) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bx-heart'></i>
                                                <span><?php echo isEmpty($data['personal'][0]->status) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bxs-cake'></i>
                                                <span><?php echo convert_date_format($data['personal'][0]->birthday) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bx-male-sign'></i>
                                                <span><?php echo isEmpty($data['personal'][0]->gender) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bx-mobile'></i>
                                                <span><?php echo isEmpty($data['personal'][0]->contact) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bxl-facebook-square'></i>
                                                <span><a href="https://www.facebook.com/<?php echo $data['personal'][0]->fb_link ?>" class="text-lowercase"><?php echo isEmpty($data['personal'][0]->fb_link); ?></a></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bxl-instagram'></i>
                                                <span><a href="https://www.instagram.com/<?php echo $data['personal'][0]->ig_link ?>" class="text-lowercase"><?php echo isEmpty($data['personal'][0]->ig_link); ?></a></span>
                                            </div>
                                        </li>
                                        <li class="list-unstyled-item">
                                            <div class="icon">
                                                <i class='bx bxl-twitter'></i>
                                                <span><a href="https://www.twitter.com/<?php echo $data['personal'][0]->twi_link ?>" class="text-lowercase"><?php echo isEmpty($data['personal'][0]->twi_link); ?></a></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                            <?php 
                                if (empty($data['enrolled_at']) || count($data['enrolled_at']) === 0) {
                                    echo '
                                        <div class="card">
                                            <div class="card-body">
                                                <small>Not yet enrolled</small>
                                            </div>
                                        </div>
                                    ';
                                } else {
                                    foreach ($data['enrolled_at'] as $enrolled_at) {
                                        echo '
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                <h6 class="card-title m-0">Education</h6>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td>Courses</td>
                                                            <td>Year</td>
                                                            <td>Section</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>'.$enrolled_at->course_name.'</td>
                                                            <td>'.$enrolled_at->year.'</td>
                                                            <td>'.$enrolled_at->section.'</td>
                                                        </tr>
                                                    </tbody>
                                                </table>';

                                        $enrolled_subjects = array_filter($data['enrolled_subjects'], function ($subject) use ($enrolled_at) {
                                            return $subject->course_id === $enrolled_at->course_id && $subject->year_id === $enrolled_at->year_id && $subject->section_id === $enrolled_at->section_id;
                                        });

                                        if (empty($enrolled_subjects)) {
                                            echo '<small class="text-muted">no subjects yet in this course.</small>';
                                        } else {
                                            echo '
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>Code</td>
                                                        <td>Name</td>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                                            
                                            foreach ($enrolled_subjects as $enrolled_subject) {
                                                echo '
                                                <tr>
                                                    <td>'.strtoupper($enrolled_subject->subject_code).'</td>
                                                    <td>'.ucwords($enrolled_subject->subject_name).'</td>
                                                </tr>';
                                            }
                                            
                                            echo '
                                                </tbody>
                                            </table>';
                                        }
                                        
                                        echo '
                                            </div>
                                        </div>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>