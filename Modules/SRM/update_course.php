<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update'])) {

    $faculty_id = $_POST['faculty_id'];
    $faculty_code = $_POST['faculty_code'];
    $faculty_name = $_POST['faculty_name'];
    $course_name = $_POST['course_name'];
    $update = $_GET['update'];
    $course_code = $_POST['course_code'];

    $query = "UPDATE UniSys_Courses SET faculty_id =?, faculty_code =?, faculty_name =?, course_name =?, course_code =? WHERE course_id =?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssss', $faculty_id, $faculty_code, $faculty_name, $course_name, $course_code, $update);
    $stmt->execute();
    if ($stmt) {
        $success = "Updated" && header("refresh:1; url=courses.php");
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
        $ret = "SELECT * FROM `UniSys_Courses` WHERE course_id = '$update'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($courses = $res->fetch_object()) {
        ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Update <?php echo $courses->course_name; ?></a></li>
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
                                                                    <label for="exampleInputEmail1">Course Name</label>
                                                                    <input name="course_name" value="<?php echo $courses->course_name; ?>" type="text" class="form-control">
                                                                    <input name="course_id" value="<?php echo $facultyID; ?>" type="hidden" class="form-control" placeholder="Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Course Code</label>
                                                                    <input name="course_code" type="text" value="<?php echo $courses->course_code; ?>" value="<?php echo $a; ?>-<?php echo $b; ?>" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Course Faculty</label>
                                                                    <select name="faculty_name" id="facultyName" onchange="getFacultyDetails(this.value);" class="form-control">
                                                                        <option>Select Faculty</option>
                                                                        <?php
                                                                        $ret = "SELECT * FROM `UniSys_Faculties`  ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        while ($faculty = $res->fetch_object()) {
                                                                        ?>
                                                                            <option><?php echo $faculty->faculty_name; ?></option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Faculty ID</label>
                                                                    <input name="faculty_id" readonly id="facultyID" type="text" class="form-control" placeholder="Course Id">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Faculty Code</label>
                                                                    <input name="faculty_code" readonly id="facultyCode" type="text" class="form-control" placeholder="Course Id">
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