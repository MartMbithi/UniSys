<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_unit'])) {

    $course_name = $_POST['course_name'];
    $course_id = $_POST['course_id'];
    $unit_id = $_POST['unit_id'];
    $unit_code = $_POST['unit_code'];
    $unit_name = $_POST['unit_name'];

    $query = "INSERT INTO UniSys_Units (course_name, course_id, unit_id, unit_code, unit_name) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssss', $course_name, $course_id, $unit_id, $unit_code, $unit_name);
    $stmt->execute();
    if ($stmt) {
        //inject alert that post is shared  
        $success = "Added" && header("refresh:1; url=units.php");
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
        <?php require_once('partials/_header.php'); ?>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Register New Unit</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form method="POST" id="add-department"  class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Unit Name</label>
                                                                <input name="unit_name" type="text" class="form-control">
                                                                <input name="unit_id" value="<?php echo $facultyID; ?>" type="hidden" class="form-control" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Unit Code</label>
                                                                <input name="unit_code" type="text" value="<?php echo $a; ?>-<?php echo $b; ?>" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Course </label>
                                                                <select name="course_name" id="courseName" onchange="getCourseDetails(this.value);" class="form-control">
                                                                    <option>Select Course Name</option>
                                                                    <?php
                                                                    $ret = "SELECT * FROM `UniSys_Courses`  ";
                                                                    $stmt = $mysqli->prepare($ret);
                                                                    $stmt->execute(); //ok
                                                                    $res = $stmt->get_result();
                                                                    while ($courses = $res->fetch_object()) {
                                                                    ?>
                                                                        <option><?php echo $courses->course_name; ?></option>
                                                                    <?php
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Course ID</label>
                                                                <input name="course_id" readonly id="courseID" type="text" class="form-control" placeholder="Course Id">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit" name="add" class="btn btn-primary waves-effect waves-light">Submit</button>
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
        <?php require_once('partials/_footer.php'); ?>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>