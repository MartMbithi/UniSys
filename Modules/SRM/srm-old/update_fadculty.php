<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();

require_once('configs/codeGen.php');

if (isset($_POST['update_faculty'])) {

    $update = $_GET['update'];
    $faculty_code = $_POST['faculty_code'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_desc = $_POST['faculty_desc'];
    $faculty_head = $_POST['faculty_head'];

    $query = "UPDATE UniSys_Faculties SET faculty_code =?, faculty_name =?, faculty_desc =?, faculty_head =? WHERE faculty_id =?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssss', $faculty_code, $faculty_name, $faculty_desc, $faculty_head, $update);
    $stmt->execute();
    if ($stmt) {
        $success = "Updated" && header("refresh:1; url=faculties.php");
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
        $ret = "SELECT * FROM `UniSys_Faculties` WHERE faculty_id ='$update'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($faculty = $res->fetch_object()) {
        ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description"><?php echo $faculty->faculty_name; ?> Faculty</a></li>
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
                                                                    <input name="faculty_name" type="text" value="<?php echo $faculty->faculty_name; ?>" class="form-control" placeholder="Faculty Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="faculty_head" value="<?php echo $faculty->faculty_head; ?>" type="text" class="form-control" placeholder="Head of Department">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="faculty_code" value="<?php echo $faculty->faculty_code; ?>" type="text" value="<?php echo $a; ?>-<?php echo $b; ?>" class="form-control" placeholder="Faculty Code">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea rows="10" name="faculty_desc" type="text" class="form-control" placeholder="Faculty Description"><?php echo $faculty->faculty_desc; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="update_faculty" class="btn btn-primary waves-effect waves-light">Update</button>
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