<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['update_academic_year'])) {

    $update = $_GET['update'];
    $year_code = $_POST['year_code'];
    $year_start = $_POST['year_start'];
    $year_end = $_POST['year_end'];

    $query = "UPDATE UniSys_Academic_Years SET year_code =?, year_start =?, year_end =? WHERE year_id =?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssss', $year_code, $year_start, $year_end, $update);
    $stmt->execute();
    if ($stmt) {
        $success = "Updated" && header("refresh:1; url=unisys_srm_academic_years.php");
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
    $update = $_GET['update'];
    $ret = "SELECT * FROM `UniSys_Academic_Years` WHERE year_id ='$update'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($year = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="unisys_srm_academic_years.php">Academic Years</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_srm_academic_years.php">Update</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $year->year_code; ?></span></li>
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
                                            <label for="inputEmail4">Year ID</label>
                                            <input type="text" name="year_id" value="<?php echo $ID; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Academic Year Code</label>
                                            <input type="text" class="form-control" value="<?php echo $year->year_code; ?>" name="year_code">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Academic Year Start Date</label>
                                            <input value="<?php echo $year->year_start; ?>" type="text" class="form-control"  name="year_start">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Academic Year End Date</label>
                                            <input value="<?php echo $year->year_end; ?>" type="text" class="form-control"  name="year_end">
                                        </div>
                                    </div>

                                    <button type="submit" name="update_academic_year" class="btn btn-primary mt-3">Update Academic Year</button>
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