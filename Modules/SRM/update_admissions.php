<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update'])) {

    $update = $_GET['update'];
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $campus_email = $_POST['campus_email'];
    $personal_email  = $_POST['personal_email'];
    $idnumber = $_POST['idnumber'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $adr = $_POST['adr'];
    $country = $_POST['country'];
    $course_name = $_POST['course_name'];
    $course_id = $_POST['course_id'];
    $passport = $_FILES['passport']['name'];
    move_uploaded_file($_FILES["passport"]["tmp_name"], "img/student/" . $_FILES["passport"]["name"]);

    $query = "UPDATE UniSys_Students SET  passport=?, name =?, reg_no =?, campus_email =?, personal_email =?, idnumber =?, phone =?, gender =?, dob =?, adr =?, country =?, course_name =?, course_id =? WHERE id =?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssssssssss', $passport, $name, $reg_no, $campus_email, $personal_email, $idnumber, $phone, $gender, $dob, $adr, $country, $course_name, $course_id, $update);
    $stmt->execute();
    if ($stmt) {
        $success = "Updated" && header("refresh:1; url=admissions.php");
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
        $ret = "SELECT * FROM `UniSys_Students` WHERE id ='$update'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($std = $res->fetch_object()) {
        ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Update <?php echo $std->name; ?> Admission Record</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <form method="POST" enctype="multipart/form-data" id="demo1-upload" class="dropzone dropzone-custom needsclick add-professors add-department">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Full Names</label>
                                                                    <input name="name" value="<?php echo $std->name; ?>" type="text" class="form-control" placeholder="Student Name">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Registration Number</label>
                                                                    <input required name="reg_no" value="<?php echo $std->reg_no; ?>" type="text" class="form-control" placeholder="Registration Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Campus Email</label>
                                                                    <input required name="campus_email" value="<?php echo $std->campus_email; ?>" type="text" class="form-control" placeholder="Campus Email">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Personal Email</label>
                                                                    <input required name="personal_email" value="<?php echo $std->personal_email; ?>" type="text" class="form-control" placeholder="Personal Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">National ID Number</label>
                                                                    <input required name="idnumber" value="<?php echo $std->idnumber; ?>" type="text" class="form-control" placeholder="National ID Number">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                                    <input required name="phone" value="<?php echo $std->phone; ?>" type="text" class="form-control" placeholder="Phone Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Gender</label>
                                                                    <select name="gender" class="form-control">
                                                                        <option><?php echo $std->gender; ?></option>
                                                                        <option>Male</option>
                                                                        <option>Female</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Date Of Bith</label>
                                                                    <input required name="dob" value="<?php echo $std->dob; ?>" type="text" class="form-control" placeholder="Date Of Birth">
                                                                </div>

                                                            </div>

                                                            <div class=" form-row col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Address</label>
                                                                    <input required name="adr" value="<?php echo $std->adr; ?>" type="text" class="form-control" placeholder="Address">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Colored Passport Image</label>
                                                                    <input required name="passport" type="file" class="fbtn btn-outline-success form-control" placeholder="Upload Passport">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Country</label>
                                                                    <input required name="country" value="<?php echo $std->country; ?>" type="text" class="form-control" placeholder="Country">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Course</label>
                                                                    <select name="course_name" id="courseName" onchange="getCourseDetails(this.value);" class="form-control">
                                                                        <option>Select Course</option>
                                                                        <?php
                                                                        $ret = "SELECT * FROM `UniSys_Courses`  ";
                                                                        $stmt = $mysqli->prepare($ret);
                                                                        $stmt->execute(); //ok
                                                                        $res = $stmt->get_result();
                                                                        while ($course = $res->fetch_object()) {
                                                                        ?>
                                                                            <option><?php echo $course->course_name; ?></option>
                                                                        <?php
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="course_id" id="Course_Id" type="hidden" class="form-control" placeholder="Course Id">
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