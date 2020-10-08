<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_admission'])) {

    $id = $_POST['id'];
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
    move_uploaded_file($_FILES["passport"]["tmp_name"], "assets/img/student/" . $_FILES["passport"]["name"]);

    $query = "INSERT INTO UniSys_Students (passport, id, name, reg_no, campus_email, personal_email, idnumber, phone, gender, dob, adr, country, course_name, course_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssssssssss', $passport, $id, $name, $reg_no, $campus_email, $personal_email, $idnumber, $phone, $gender, $dob, $adr, $country, $course_name, $course_id);
    $stmt->execute();
    if ($stmt) {
        $success = "Added" && header("refresh:1; url=unisys_srm_admissions.php");
    } else {
        //inject alert that task failed
        $info = "Please Try Again Or Try Later";
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
                                <li class="breadcrumb-item"><a href="unisys_srm_admissions.php">Admissions</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Admit New Student</span></li>
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
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Full Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Admission Number</label>
                                        <input type="text" class="form-control" name="reg_no">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Campus Email</label>
                                        <input type="text" class="form-control" name="campus_email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Personal Email</label>
                                        <input type="text" class="form-control" name="personal_email">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">National ID Number</label>
                                        <input type="text" class="form-control" name="idnumber">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Phone Number</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Gender</label>
                                        <select class='form-control basic' name="gender" id="">
                                            <option selected>Select Gender</option>
                                            <option selected>Male</option>
                                            <option selected>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Date Of Bith</label>
                                        <input type="text" class="form-control" name="dob">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Passport</label>
                                        <input type="file" class="form-control btn btn-outline-success" name="passport">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Address</label>
                                        <input type="text" class="form-control" name="adr">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Country</label>
                                        <input type="text" class="form-control" name="country">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Course Name</label>
                                        <select class='form-control basic' id="courseName" onchange="getCourseDetails(this.value);" name="course_name" id="">
                                            <option selected>Select Course Name</option>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_Courses` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($course = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $course->course_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Course ID</label>
                                        <input type="text" class="form-control" readonly id="Course_Id" name="course_id">
                                    </div>
                                </div>
                                <button type="submit" name="add_admission" class="btn btn-primary mt-3">Admit Student</button>
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