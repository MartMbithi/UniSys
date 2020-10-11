<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update_units'])) {

    if (isset($_POST['course_id']) && !empty($_POST['course_id'])) {
        $course_id = mysqli_real_escape_string($mysqli, trim($_POST['course_id']));
    } else {
        $error = 1;
        $err = "Course ID / Name Cannot Be Empty";
    }
    if (!$error) {
        $course_name = $_POST['course_name'];
        $course_id = $_POST['course_id'];
        $update = $_GET['update'];
        $unit_code = $_POST['unit_code'];
        $unit_name = $_POST['unit_name'];

        $query = "UPDATE UniSys_Units  SET course_name =?, course_id =?, unit_code =?, unit_name =? WHERE unit_id =?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sssss', $course_name, $course_id, $unit_code, $unit_name, $update);
        $stmt->execute();
        if ($stmt) {
            $success = "Added" && header("refresh:1; url=unisys_srm_units.php");
        } else {
            //inject alert that task failed
            $info = "Please Try Again Or Try Later";
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
    $ret = "SELECT * FROM `UniSys_Units` WHERE unit_id ='$update' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($units = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="unisys_srm_units.php">Units</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_srm_units.php">Update Units</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $units->unit_name; ?></span></li>
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
                                            <label for="inputEmail4">Unit ID</label>
                                            <input type="text" name="unit_id" value="<?php echo $ID; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Unit Code</label>
                                            <input type="text" class="form-control" value="<?php echo $units->unit_code; ?>" name="unit_code">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Unit Name</label>
                                            <input type="text" class="form-control" value="<?php echo $units->unit_name; ?>" name="unit_name">
                                        </div>

                                    </div>
                                    <div class="form-row mb-6">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Course Name</label>
                                            <select name="course_name" id="courseName" onchange="getCourseDetails(this.value);" class="form-control basic">
                                                <option><?php echo $units->course_name; ?></option>
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

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Course ID</label>
                                            <input name="course_id" readonly id="Course_Id" type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <button type="submit" name="update_units" class="btn btn-primary mt-3">Update Unit</button>
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