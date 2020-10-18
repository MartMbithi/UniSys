<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['allocate_room'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;
    if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
        $student_name = mysqli_real_escape_string($mysqli, trim($_POST['student_name']));
    } else {
        $error = 1;
        $err = "Student Name Cannot Be Empty";
    }
    if (isset($_POST['student_regno']) && !empty($_POST['student_regno'])) {
        $student_regno = mysqli_real_escape_string($mysqli, trim($_POST['student_regno']));
    } else {
        $error = 1;
        $err = "Student Admission Number Cannot Be Empty";
    }
    //Check if student has already been allocated room
    if (!$error) {
        $sql = "SELECT * FROM  UniSys_LIM_Allocations WHERE  student_regno='$student_regno' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($student_regno == $row['student_regno']) {
                $err =  "Student Already Allocated Room";
            }
        } else {
            $id = $_POST['id'];
            $room_code = $_GET['room_code'];
            $room_type = $_GET['room_type'];
            $hostel_code = $_GET['hostel_code'];
            $hostel_name = $_GET['hostel_name'];
            $student_name = $_POST['student_name'];
            $student_regno = $_POST['student_regno'];
            $status  = $_GET['status'];
            $date_allocated = date('d M Y');
            $query = "INSERT INTO UniSys_LIM_Allocations (id, room_code, room_type, hostel_code, hostel_name, student_name, student_regno, date_allocated) VALUES (?,?,?,?,?,?,?,?)";
            $RoomStat = "UPDATE UniSys_HIM_Rooms SET status =? WHERE code =?";
            $stmt = $mysqli->prepare($query);
            $RoomStmt = $mysqli->prepare($RoomStat);
            $rc = $stmt->bind_param('ssssssss', $id, $room_code, $room_type, $hostel_code, $hostel_name, $student_name, $student_regno, $date_allocated);
            $rc = $RoomStmt->bind_param('ss', $status, $room_code);
            $stmt->execute();
            $RoomStmt->execute();
            if ($stmt && $RoomStmt) {
                $success = "Allocation Recorded" && header("refresh:1; url=unisys_him_room_allocations.php");
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
    $room_code = $_GET['room_code'];
    $ret = "SELECT * FROM `UniSys_HIM_Rooms` WHERE  code ='$room_code'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($row = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="unisys_him_room_allocations.php">Room Allocations</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Allocate <?php echo $row->code; ?> Student </span></li>
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
                                            <label for="inputEmail4">Room Code</label>
                                            <input type="text" required value="<?php echo $row->code; ?>" class="form-control" name="code">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Registration Number</label>
                                            <select class='form-control basic' id="RegNumber" onchange="getStudentDetails(this.value);" name="student_regno">
                                                <option selected>Select Student Registration Number</option>
                                                <?php
                                                $ret = "SELECT * FROM `UniSys_Students`  ";
                                                $stmt = $mysqli->prepare($ret);
                                                $stmt->execute(); //ok
                                                $res = $stmt->get_result();
                                                while ($std = $res->fetch_object()) {
                                                ?>
                                                    <option><?php echo $std->reg_no; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Name</label>
                                            <input type="text" readonly id="StudentName" required class="form-control" name="student_name">
                                        </div>
                                    </div>
                                    <button type="submit" name="allocate_room" class="btn btn-primary mt-3">Allocate Student Room</button>
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