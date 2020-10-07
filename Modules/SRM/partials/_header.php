<?php
$auth_id = $_SESSION['auth_id'];
$ret = "SELECT * FROM `UniSys_Staffs` WHERE auth_id ='$auth_id' ";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($staff = $res->fetch_object()) {
    if ($staff->passport == '') {
        $passport = "<img src='img/logo/logo-dark.png'  />";
    } else {
        $passport = "img/staffs/$row->passport";
    }
?>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <?php echo $passport; ?>
                                                    <span class="admin-name"><?php echo $staff->name; ?></span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="logout.php"><span class="fa fa-logout"></span>Log Out</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="faculties.php">Faculties</a></li>
                                    <li><a data-toggle="collapse" data-target="#demoevent" href="#">Admissions<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demoevent" class="collapse dropdown-header-top">
                                            <li><a href="academic_year.php">Academic Year</a>
                                            </li>
                                            <li><a href="admissions.php">Admissions</a>
                                            </li>
                                            <li><a href="manage_academic_years.php">Manage Academic Yrs</a>
                                            </li>
                                            <li><a href="manage_admissions.php">Manage Admissions</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="courses.php">Courses</a></li>
                                    <li><a data-toggle="collapse" data-target="#demoevent" href="#">Student Units<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demoevent" class="collapse dropdown-header-top">
                                            <li><a href="units.php">Units</a>
                                            </li>
                                            <li><a href="manage_units.php">Manage Units</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="enrollments.php">Enrollments</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>