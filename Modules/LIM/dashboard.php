<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');
require_once('partials/_head.php');
?>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php require_once('partials/_nav.php'); ?>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-auto ">
                <li class="nav-item more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Advanced Reporting</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Faculties" href="unisys_srm_reports_faculties.php">Faculties</a>
                            <a class="dropdown-item" data-value="Admissions" href="unisys_srm_reports_admissions.php">Admissions</a>
                            <a class="dropdown-item" data-value="Courses" href="unisys_srm_reports_courses.php">Courses</a>
                            <a class="dropdown-item" data-value="Units" href="unisys_srm_reports_units.php">Units</a>
                            <a class="dropdown-item" data-value="Enrollments" href="unisys_srm_reports_enrollments.php">Enrollments</a>
                            <a class="dropdown-item" data-value="Students" href="unisys_srm_reports_students.php">Students</a>
                        </div>
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
        <?php require_once('partials/_sidebar.php'); ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                    <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Revenue</h5>
                                <ul class="tabs tab-pills">
                                    <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                </ul>
                            </div>

                            <div class="widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent">
                                        <div id="revenueMonthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">
                            <div class="widget-heading">
                                <h5 class="">Recent Admissions</h5>
                            </div>
                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content">Adm Number</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Name</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Email</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">DOB</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Course</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_Students` ORDER BY `UniSys_Students`.`created_at` ASC  LIMIT 10";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($admissions = $res->fetch_object()) { ?>
                                                <tr>
                                                    <td>
                                                        <div class="td-content product-brand"><?php echo $admissions->reg_no;?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand"><?php echo $admissions->name;?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><?php echo $admissions->campus_email;?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content pricing"><span class=""><?php echo $admissions->dob;?></span></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><span class="badge outline-badge-primary"><?php echo $admissions->course_name;?></span></div>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-three">

                            <div class="widget-heading">
                                <h5 class="">Recent Enrollments</h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content">Code</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">ADM Number</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Name</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Academic Yr</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">No. Units Enrolled</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_Enrollments` ORDER BY `UniSys_Enrollments`.`created_at` DESC LIMIT 10  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($enrollment = $res->fetch_object()) {
                                                $admission_number  = $enrollment->student_reg_no;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="td-content"><span class="pricing"><?php echo $enrollment->enroll_code; ?></span></div>

                                                    </td>
                                                    <td>
                                                        <div class="td-content"><span class="pricing"><?php echo $enrollment->student_reg_no; ?></span></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><span class="discount-pricing"><?php echo $enrollment->student_name; ?></span></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><span class="discount-pricing"><?php echo $enrollment->enroll_aca_yr; ?></span></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content">
                                                            <?php
                                                            //Enrolled Units
                                                            $query = "SELECT COUNT(*) FROM `UniSys_Enrollments` WHERE student_reg_no ='$admission_number' ";
                                                            $stmt = $mysqli->prepare($query);
                                                            $stmt->execute();
                                                            $stmt->bind_result($unitsEnrolled);
                                                            $stmt->fetch();
                                                            $stmt->close();
                                                            echo $unitsEnrolled;
                                                            ?>
                                                        </div>
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
            <?php require_once('partials/_footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>