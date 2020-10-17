<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update_hostel'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = mysqli_real_escape_string($mysqli, trim($_POST['code']));
    } else {
        $error = 1;
        $err = "Code  Number Cannot Be Empty";
    }
    if (!$error) {
        $update = $_GET['update'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        $rooms  = $_POST['rooms'];
        $created_at = $_POST['created_at'];
        $query = "UPDATE UniSys_HIM_Hostels SET code =?, name =?, location =?, rooms =?, created_at ? WHERE id =?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ssssss', $code, $name, $location, $rooms, $created_at, $update);
        $stmt->execute();
        if ($stmt) {
            $success = "Added" && header("refresh:1; url=unisys_him_hostels.php");
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
    $ret = "SELECT * FROM `UniSys_HIM_Hostels` WHERE id ='$update'  ";
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
                                    <li class="breadcrumb-item"><a href="unisys_him_hostels.php">Hostels</a></li>
                                    <li class="breadcrumb-item"><a href="">Update</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $row->name; ?></span></li>
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
                                            <input type="text" required value="<?php echo $row->code; ?>" class="form-control" name="code">
                                            <input type="hidden" required value="<?php echo date('d M Y'); ?>" class="form-control" name="created_at">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Hostel Name</label>
                                            <input type="text" required value="<?php echo $row->name; ?>" class="form-control" name="name">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Location</label>
                                            <input type="text" required value="<?php echo $row->location; ?>" class="form-control" name="location">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Number Of Rooms</label>
                                            <input type="text" value="<?php echo $row->rooms; ?>" required class="form-control" name="rooms">
                                        </div>
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary mt-3">Update Hostel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                require_once('partials/_footer.php'); ?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->

    <?php
        require_once('partials/_scripts.php');
    }
    ?>
</body>

</html>