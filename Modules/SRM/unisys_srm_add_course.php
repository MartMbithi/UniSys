<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_course'])) {

    //Error Handling and prevention of posting double entries

    $error = 0;
    if (isset($_POST['course_code']) && !empty($_POST['course_code'])) {
        $course_code = mysqli_real_escape_string($mysqli, trim($_POST['course_code']));
    } else {
        $error = 1;
        $err = "Course Code Cannot Be Empty";
    }
    if (isset($_POST['course_name']) && !empty($_POST['course_name'])) {
        $course_name = mysqli_real_escape_string($mysqli, trim($_POST['course_name']));
    } else {
        $error = 1;
        $err = "Course Name Cannot Be Empty";
    }

    if (isset($_POST['faculty_id']) && !empty($_POST['faculty_id'])) {
        $faculty_id = mysqli_real_escape_string($mysqli, trim($_POST['faculty_id']));
    } else {
        $error = 1;
        $err = "Faculty ID Cannot Be Empty";
    }

    if (isset($_POST['faculty_code']) && !empty($_POST['faculty_code'])) {
        $faculty_code = mysqli_real_escape_string($mysqli, trim($_POST['faculty_code']));
    } else {
        $error = 1;
        $err = "Faculty Code Cannot Be Empty";
    }


    if (!$error) {
        $sql = "SELECT * FROM  UniSys_Courses WHERE  course_code='$course_code' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($course_code == $row['course_code']) {
                $err =  "Course Code Already Exists";
            }
        } else {
            $faculty_id = $_POST['faculty_id'];
            $faculty_code = $_POST['faculty_code'];
            $faculty_name = $_POST['faculty_name'];
            $course_name = $_POST['course_name'];
            $course_id = $_POST['course_id'];
            $course_code = $_POST['course_code'];

            $query = "INSERT INTO UniSys_Courses (faculty_id, faculty_code, faculty_name, course_name, course_id, course_code) VALUES (?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ssssss', $faculty_id, $faculty_code, $faculty_name, $course_name, $course_id, $course_code);
            $stmt->execute();
            if ($stmt) {
                $success = "Added" && header("refresh:1; url=unisys_srm_add_course.php");
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
                                <li class="breadcrumb-item"><a href="unisys_srm_courses.php">Courses</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Register New Course</span></li>
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
                                        <label for="inputEmail4">Course ID</label>
                                        <input type="text" name="course_id" value="<?php echo $ID; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Course Code</label>
                                        <input required type="text" class="form-control" value="<?php echo $a; ?>-<?php echo $b; ?>" name="course_code">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Course Name</label>
                                        <input required type="text" class="form-control" name="course_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Faculty Name</label>
                                        <select required class='form-control basic' name="faculty_name" id="facultyName" onchange="getFacultyDetails(this.value);">
                                            <option selected>Select Faculty</option>
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
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Faculty ID</label>
                                        <input name="faculty_id" required readonly id="facultyID" type="text" class="form-control" placeholder="Faculty Id">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Faculty Code</label>
                                        <input name="faculty_code" required readonly id="facultyCode" type="text" class="form-control" placeholder="Faculty Code">
                                    </div>
                                </div>
                                <button type="submit" name="add_course" class="btn btn-primary mt-3">Add Course</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require_once('partials/_footer.php');
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