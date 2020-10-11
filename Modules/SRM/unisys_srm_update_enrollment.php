<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update_enrollments'])) {

    $error = 0;
    if (isset($_POST['enroll_code']) && !empty($_POST['enroll_code'])) {
        $enroll_code = mysqli_real_escape_string($mysqli, trim($_POST['enroll_code']));
    } else {
        $error = 1;
        $err = "Unit Code Cannot Be Empty";
    }

    if (isset($_POST['student_reg_no']) && !empty($_POST['student_reg_no'])) {
        $student_reg_no = mysqli_real_escape_string($mysqli, trim($_POST['student_reg_no']));
    } else {
        $error = 1;
        $err = "Student Reg No Cannot Be Empty";
    }

    if (isset($_POST['unit_code']) && !empty($_POST['unit_code'])) {
        $unit_code = mysqli_real_escape_string($mysqli, trim($_POST['unit_code']));
    } else {
        $error = 1;
        $err = "Unit Code Cannot Be Empty";
    }

    if (isset($_POST['unit_name']) && !empty($_POST['unit_name'])) {
        $unit_name = mysqli_real_escape_string($mysqli, trim($_POST['unit_name']));
    } else {
        $error = 1;
        $err = "Unit Name Cannot Be Empty";
    }

    if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
        $student_name = mysqli_real_escape_string($mysqli, trim($_POST['student_name']));
    } else {
        $error = 1;
        $err = "Student Name Cannot Be Empty";
    }
    if (!$error) {
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
            $success = "Updated" && header("refresh:1; url=unisys_srm_enrollments.php");
        } else {
            //inject alert that task failed
            $info = "Please Try Again Or Try Later";
        }
    } else {
        $err = "Please Try Again Or Try Later";
    }
}

require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $update = $_GET['update'];
    $ret = "SELECT * FROM `UniSys_Enrollments` WHERE enroll_id = '$update'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($en = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="unisys_srm_enrollments.php">Enrollments</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_srm_enrollments.php">Update Enrollemts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $en->enroll_code; ?></span></li>
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
                                            <label for="inputEmail4">Enroll ID</label>
                                            <input type="text" name="enroll_id" value="<?php echo $ID; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Code</label>
                                            <input type="text" class="form-control" value="<?php echo $a; ?>-<?php echo $b; ?>" name="enroll_code">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Academic Year</label>
                                            <select name="enroll_aca_yr" class="form-control basic">
                                                <option><?php echo $en->enroll_aca_yr; ?></option>
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
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Unit Code</label>
                                            <select name="unit_code" id="UnitCode" onchange="getUnitDetails(this.value);" class="form-control basic">
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
                                            </select> </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4"> Unit Name</label>
                                            <input name="unit_name" readonly id="unitName" type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Student Reg Number</label>
                                            <select name="student_reg_no" id="RegNumber" onchange="getStudentDetails(this.value);" class="form-control basic">
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
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4"> Student Name</label>
                                            <input name="student_name" readonly id="StudentName" type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4"> Student ID</label>
                                            <input name="student_id" readonly id="StudentID" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <button type="submit" name="update_enrollment" class="btn btn-primary mt-3">Update Enrollment</button>
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