<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');
require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $view = $_GET['view'];
    $ret = "SELECT * FROM `UniSys_Students` WHERE id ='$view'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($std = $res->fetch_object()) {
        $std_id = $std->id;
    ?>
        <!--  END NAVBAR  -->

        <!--  BEGIN NAVBAR  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">

                            <nav class="breadcrumb-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_srm_admissions.php">Admissions</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_srm_admissions.php">View Admissions</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $std->name; ?></span></li>
                                </ol>
                            </nav>

                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            <?php
            require_once('partials/_sidebar.php');

            ?>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="row layout-spacing">

                        <!-- Content -->
                        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                            <div class="user-profile layout-spacing">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class=""><?php echo $std->name; ?>'s Profile</h3>
                                        <a href="unisys_srm_update_admission.php?update=<?php echo $std->id; ?>" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg></a>
                                    </div>
                                    <div class="text-center user-info">
                                        <?php
                                        if ($std->passport == '') {
                                            echo "<img src='assets/img/boy.png' class='img-fluid img-thumbnail' alt='avatar'>";
                                        } else {
                                            echo "<img src='assets/img/student/$std->passport' class='img-fluid img-thumbnail' alt='avatar'>";
                                        } ?>

                                        <p class=""><?php echo $std->name; ?></p>
                                    </div>
                                    <div class="user-info-list">

                                        <div class="">
                                            <ul class="contacts-block list-unstyled">
                                                <li class="contacts-block__item">
                                                    ADM No: <?php echo $std->name; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Campus Email : <?php echo $std->campus_email; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Personal Email : <?php echo $std->personal_email; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    ID Number : <?php echo $std->idnumber; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Phone Number: <?php echo $std->phone; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Gender : <?php echo $std->gender; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="8.5" cy="7" r="4"></circle>
                                                        <polyline points="17 11 19 13 23 9"></polyline>
                                                    </svg> DOB : <?php echo $std->dob; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Address : <?php echo $std->adr; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Country : <?php echo $std->country; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Course : <?php echo $std->course_name; ?>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Course Enrollment Records</h3>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="th-content">Unit Code</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Unit Name</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Academic Yr</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Date Enrolled</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $ret = "SELECT * FROM `UniSys_Enrollments` WHERE student_id = '$std_id' ORDER BY `UniSys_Enrollments`.`created_at` DESC LIMIT 10   ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($enrollment = $res->fetch_object()) {
                                                        $admission_number  = $enrollment->student_reg_no;
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <div class="td-content"><span class="pricing"><?php echo $enrollment->unit_code; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="pricing"><?php echo $enrollment->unit_name; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="discount-pricing"><?php echo $enrollment->enroll_aca_yr; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="discount-pricing"><?php echo date('d-M-Y', strtotime($enrollment->created_at)); ?></span></div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            <?php require_once('partials/_footer.php');
        } ?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <?php require_once('partials/_scripts.php'); ?>
</body>

</html>