<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
require_once('partials/_head.php');
check_login();

?>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a class="main-logo" href="dashboard.php"></a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>

        <?php
        require_once('partials/_header.php');
        $view = $_GET['view'];
        $ret = "SELECT * FROM `UniSys_Students` WHERE id = '$view'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($std = $res->fetch_object()) {
        ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-info-inner">
                                <div class="profile-img">
                                    <img src="img/student/<?php echo $std->passport; ?>" alt="" />
                                </div>
                                <div class="profile-details-hr">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Name</b><br /> <?php echo $std->name; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Reg Number</b><br /> <?php echo $std->reg_no; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>National ID Number</b><br /> <?php echo $std->idnumber; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Course</b><br /> <?php echo $std->course_name; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="address-hr">
                                                <p><b>Campus Email</b><br /> <?php echo $std->campus_email; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Personal Email</b><br /> <?php echo $std->personal_email; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Phone Number</b><br /> <?php echo $std->phone; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Date Of Birth</b><br /> <?php echo $std->dob; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr">
                                                <p><b>Gender</b><br /> <?php echo $std->gender; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                            <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                                <p><b>Country</b><br /> <?php echo $std->country; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="address-hr">
                                                <p><b>Address</b><br /> <?php echo $std->adr; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#enrollment">Enrollment Activity</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                    <div class="product-tab-list tab-pane fade active in" id="enrollment">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Full Name</b><br /> <?php echo $std->name; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Admission No. </b><br /> <?php echo $std->reg_no; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Email</b><br /><?php echo $std->campus_email; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                            <div class="address-hr biography">
                                                                <p><b>Course </b><br /> <?php echo $std->course_name; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="skill-title">
                                                                        <?php
                                                                        $std_id = $std->id;
                                                                        $ret = "SELECT * FROM  UniSys_Enrollments WHERE student_id = '$std_id'  ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        while ($unit = $res->fetch_object()) {
                                                                        ?>
                                                                            <h2>Enrolled Units For Academic Year <?php echo $unit->enroll_aca_yr; ?> </h2>
                                                                        <?php
                                                                        } ?>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ex-pro">
                                                                <ul>
                                                                    <?php
                                                                    $std_id = $std->id;
                                                                    $ret = "SELECT * FROM  UniSys_Enrollments WHERE student_id = '$std_id'  ";
                                                                    $stmt = $mysqli->prepare($ret);
                                                                    $stmt->execute(); //ok
                                                                    $res = $stmt->get_result();
                                                                    while ($unit = $res->fetch_object()) {
                                                                    ?>
                                                                        <li><i class="fa fa-angle-right"></i> <?php echo $unit->unit_code; ?> <?php echo $unit->unit_name; ?> </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>