<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');
if (isset($_POST['update_year'])) {

    $update = $_GET['update'];
    $year_code = $_POST['year_code'];
    $year_start = $_POST['year_start'];
    $year_end = $_POST['year_end'];

    $query = "UPDATE UniSys_Academic_Years SET  year_code =?, year_start =?, year_end =? WHERE year_id =? ";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssss', $year_code, $year_start, $year_end, $update);
    $stmt->execute();
    if ($stmt) {
        $success = "Updated" && header("refresh:1; url=academic_year.php");
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
    <?php
    require_once('partials/_sidebar.php');
    $update = $_GET['update'];
    $ret = "SELECT * FROM `UniSys_Academic_Years` WHERE year_id ='$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($year = $res->fetch_object()) {
    ?>
        <!-- End Left menu area -->
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <br><br><br><br><br><br><br>
            <?php require_once('partials/_header.php'); ?>
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-payment-inner-st">
                                <ul id="myTabedu1" class="tab-review-design">
                                    <li class="active"><a href="#description">Update <?php echo $year->year_start; ?> - <?php echo $year->year_end; ?> Academic Year</a></li>
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
                                                                    <input name="year_code" type="text" class="form-control" value="<?php echo $a; ?>-<?php echo $b; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="year_start" value="<?php echo $year->year_start; ?>" type="text" class="form-control" placeholder="Start Date DD - MM - YYYY">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="year_end" value="<?php echo $year->year_end; ?>" type="text" class="form-control" placeholder="End Date DD - MM - YYYY">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="update_year" class="btn btn-primary waves-effect waves-light">Submit</button>
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