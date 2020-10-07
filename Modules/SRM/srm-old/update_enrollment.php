<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update'])) {

    $update = $_GET['update'];
    $enroll_code = $_POST['enroll_code'];
    $enroll_aca_yr = $_POST['enroll_aca_yr'];
    $unit_code = $_POST['unit_code'];
    $unit_name = $_POST['unit_name'];
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_reg_no = $_POST['student_reg_no'];
    $query = "UPDATE UniSys_Enrollments SET enroll_code =?, enroll_aca_yr =?, unit_code =?, unit_name =?, student_id =?, student_name =?, student_reg_no =? WHERE enroll_id =?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $enroll_code, $enroll_aca_yr, $unit_code, $unit_name, $student_id, $student_name, $student_reg_no, $update);
    $stmt->execute();
    if ($stmt) {
        //inject alert that post is shared  
        $success = "Updated" && header("refresh:1; url=enrollments.php");
    } else {
        //inject alert that task failed
        $info = "Please Try Again Or Try Later";
    }
}

require_once('partials/_head.php');
?>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php require_once('partials/_sidebar.php'); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <br><br><br><br><br>
        <?php
        require_once('partials/_header.php');
        $update = $_GET['update'];
        $ret = "SELECT * FROM `UniSys_Enrollments` WHERE enroll_id ='$update'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($en = $res->fetch_object()) {
        ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Register New Enrollment</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <form method="POST" id="add-department" class="add-department">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Enrollment Code</label>
                                                                    <input name="enroll_code" value="<?php echo $en->enroll_code; ?>" type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Academic Years</label>
                                                                    <select name="enroll_aca_yr" class="form-control">
                                                                        <option>Select Academic Years</option>
                                                                        <?php
                                                                        $ret = "SELECT * FROM `UniSys_Academic_Years`  ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        while ($ay = $res->fetch_object()) {
                                                                        ?>
                                                                            <option><?php echo $ay->year_start; ?> To <?php echo $ay->year_end; ?> </option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Unit Code</label>
                                                                    <select name="unit_code" id="UnitCode" onchange="getUnitDetails(this.value);" class="form-control">
                                                                        <option>Select Unit Code</option>
                                                                        <?php
                                                                        $ret = "SELECT * FROM `UniSys_Units`  ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        while ($units = $res->fetch_object()) {
                                                                        ?>
                                                                            <option><?php echo $units->unit_code; ?></option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Unit Name</label>
                                                                    <input name="unit_name" readonly id="unitName" type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Student Registration Number</label>
                                                                    <select name="student_reg_no" id="RegNumber" onchange="getStudentDetails(this.value);" class="form-control">
                                                                        <option>Select Student Registration Number</option>
                                                                        <?php
                                                                        $ret = "SELECT * FROM `UniSys_Students`  ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        while ($students = $res->fetch_object()) {
                                                                        ?>
                                                                            <option><?php echo $students->reg_no; ?></option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Student Name</label>
                                                                    <input name="student_name" readonly id="StudentName" type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Student ID</label>
                                                                    <input name="student_id" readonly id="StudentID" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="update" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
            <br><br><br>
        <?php require_once('partials/_footer.php');
        } ?>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>