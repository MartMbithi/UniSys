<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');
//add faculty

if (isset($_POST['add_faculty'])) {

    $faculty_id = $_POST['faculty_id'];
    $faculty_code = $_POST['faculty_code'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_desc = $_POST['faculty_desc'];
    $faculty_head = $_POST['faculty_head'];

    $query = "INSERT INTO UniSys_Faculties (faculty_id, faculty_code, faculty_name, faculty_desc, faculty_head) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssss', $faculty_id, $faculty_code, $faculty_name, $faculty_desc, $faculty_head);
    $stmt->execute();
    if ($stmt) {
        //inject alert that post is shared  
        $success = "Added" && header("refresh:1; url=add_faculty.php");
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
                                <li class="active"><a href="#description">Add Faculty</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form method="POST" id="add-department" action="#" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Faculty Name</label>
                                                                <input name="faculty_name" type="text" class="form-control" placeholder="Faculty Name">
                                                                <input name="faculty_id" value="<?php echo $facultyID; ?>" type="hidden" class="form-control" placeholder="Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Faculty Head</label>
                                                                <input name="faculty_head" type="text" class="form-control" placeholder="Head of Department">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Faculty Code</label>
                                                                <input name="faculty_code" type="text" value="<?php echo $a; ?>-<?php echo $b; ?>" class="form-control" placeholder="Faculty Code">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Faculty Description</label>
                                                                <textarea rows="10" name="faculty_desc" type="text" class="form-control" placeholder="Faculty Description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit" name="add_faculty" class="btn btn-primary waves-effect waves-light">Submit</button>
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