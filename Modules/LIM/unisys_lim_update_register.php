<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update_entry'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = mysqli_real_escape_string($mysqli, trim($_POST['code']));
    } else {
        $error = 1;
        $err = "Code  Number Cannot Be Empty";
    }
    if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
        $student_name = mysqli_real_escape_string($mysqli, trim($_POST['student_name']));
    } else {
        $error = 1;
        $err = "Student Name  Cannot Be Empty";
    }

    if (isset($_POST['student_regno']) && !empty($_POST['student_regno'])) {
        $student_regno = mysqli_real_escape_string($mysqli, trim($_POST['student_regno']));
    } else {
        $error = 1;
        $err = "Student Registration Number  Cannot Be Empty";
    }

    if (!$error) {
        $sql = "SELECT * FROM  UniSys_LIM_Register WHERE  code='$code' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($code == $row['code']) {
                $err =  "Entry Code Already Exists";
            }
        } else {
            $update = $_GET['update'];
            $code = $_POST['code'];
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year  = $_POST['year'];
            $student_regno = $_POST['student_regno'];
            $student_name = $_POST['student_name'];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out'];
            $query = "UPDATE UniSys_LIM_Register SET  code =?, day =?, month =?, year =?, student_regno =?, student_name =?, check_in =?, check_out =? WHERE id =?";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sssssssss', $code, $day, $month, $year, $student_regno, $student_name, $check_in, $check_out, $update);
            $stmt->execute();
            if ($stmt) {
                $success = "Updated" && header("refresh:1; url=unisys_lim_library_register.php");
            } else {
                //inject alert that task failed
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $update = $_GET['update'];
    $ret = "SELECT * FROM `UniSys_LIM_Register` WHERE id = '$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($reg = $res->fetch_object()) {
    ?>
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
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_lim_library_register.php">Library Register</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_lim_library_register.php">Update Entry</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $reg->code; ?></span></li>
                                </ol>
                            </nav>

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

                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-6">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-row mb-4">
                                        <div style="display:none" class="form-group col-md-6">
                                            <label for="inputEmail4">ID</label>
                                            <input type="text" name="id" value="<?php echo $ID; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Code</label>
                                            <input type="text" required value="<?php echo $a; ?><?php echo $b; ?>" class="form-control" name="code">
                                            <input type="hidden" required value="<?php echo date('d'); ?>" class="form-control" name="day">
                                            <input type="hidden" required value="<?php echo date('M'); ?>" class="form-control" name="month">
                                            <input type="hidden" required value="<?php echo date('Y'); ?>" class="form-control" name="year">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Student Name</label>
                                            <input type="text" value="<?php echo $reg->student_name; ?>" id="StudentName" required class="form-control" name="student_name">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Student ADM Number</label>
                                            <input type="text" value="<?php echo $reg->student_regno; ?>" id="StudentName" required class="form-control" name="student_regno">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Check In</label>
                                            <input type="time" required value="<?php echo $reg->check_in; ?>" class="form-control" name="check_in">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Check Out</label>
                                            <input type="time" value="<?php echo $reg->check_out; ?>" required class="form-control" name="check_out">
                                        </div>

                                    </div>
                                    <button type="submit" name="update_entry" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            require_once('partials/_footer.php');
        }
            ?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->

        <?php
        require_once('partials/_scripts.php');
        ?>
</body>

</html>