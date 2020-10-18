<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');

//Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $room_code = $_GET['room_code'];
    $status = $_GET['status'];
    $adn = "DELETE FROM UniSys_LIM_Allocations WHERE id =?";
    $roomStatus = "UPDATE UniSys_HIM_Rooms SET status =? WHERE code = ?";
    $stmt = $mysqli->prepare($adn);
    $roomStmt = $mysqli->prepare(($roomStatus));
    $stmt->bind_param('s', $id);
    $roomStmt->bind_param('ss', $status, $room_code);
    $stmt->execute();
    $roomStmt->execute();
    $stmt->close();
    $roomStmt->close();
    if ($stmt && $roomStmt) {
        $success = "Deleted" && header("refresh:1; url=unisys_him_room_allocations.php");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}
require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $code = $_GET['code'];
    $ret = "SELECT * FROM `UniSys_LIM_Allocations` WHERE room_code ='$code'  ";
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
                                    <li class="breadcrumb-item"><a href="">View</a> </li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $row->room_code; ?></span></li>
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
                                <div class="table-responsive mb-4 mt-4">
                                    <table id="alter_pagination" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Room Number</th>
                                                <th>Type</th>
                                                <th>Hostel Number</th>
                                                <th>Hostel Name</th>
                                                <th>Student Name</th>
                                                <th>Student ADM No.</th>
                                                <th>Date Allocated</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_LIM_Allocations` WHERE room_code ='$code'  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row->room_code; ?></td>
                                                    <td><?php echo $row->room_type; ?></td>
                                                    <td><?php echo $row->hostel_code; ?></td>
                                                    <td><?php echo $row->hostel_name; ?></td>
                                                    <td><?php echo $row->student_name; ?></td>
                                                    <td><?php echo $row->student_regno; ?></td>
                                                    <td class="text-center">
                                                        <a href="unisys_him_view_room_allocation.php?delete=<?php echo $row->id; ?>&room_code=<?php echo $row->room_code; ?>&status=Vacant" data-toggle="tooltip" class="badge outline-badge-danger">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php require_once('partials/_footer.php');
        }
            ?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->

        <?php require_once('partials/_scripts.php'); ?>
</body>

</html>