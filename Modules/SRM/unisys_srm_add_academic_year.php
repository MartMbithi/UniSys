<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_academic_year'])) {
    //Error Handling and prevention of posting double entries

    $error = 0;
    if (isset($_POST['year_code']) && !empty($_POST['year_code'])) {
        $year_code = mysqli_real_escape_string($mysqli, trim($_POST['year_code']));
    } else {
        $error = 1;
        $err = "Academic Year Code Cannot Be Empty";
    }
    if (isset($_POST['year_start']) && !empty($_POST['year_start'])) {
        $year_start = mysqli_real_escape_string($mysqli, trim($_POST['year_start']));
    } else {
        $error = 1;
        $err = "Academic Start Date Cannot Be Empty";
    }

    if (!$error) {
        $sql = "SELECT * FROM  UniSys_Academic_Years WHERE  year_code='$year_code' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($year_code == $row['year_code']) {
                $err =  "Academic Year With That Code  Exists";
            }
        } else {
            $year_id = $_POST['year_id'];
            $year_code = $_POST['year_code'];
            $year_start = $_POST['year_start'];
            $year_end = $_POST['year_end'];

            $query = "INSERT INTO UniSys_Academic_Years (year_id, year_code, year_start, year_end) VALUES (?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ssss', $year_id, $year_code, $year_start, $year_end);
            $stmt->execute();
            if ($stmt) {
                $success = "Added" && header("refresh:1; url=unisys_srm_add_academic_year.php");
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
                                <li class="breadcrumb-item"><a href="unisys_srm_academic_years.php">Academic Years</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Register Academic Years</span></li>
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
                                        <input type="text" class="form-control" required value="<?php echo $a; ?>-<?php echo $b; ?>" name="year_code">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Academic Year Start Date</label>
                                        <input type="date" class="form-control" required name="year_start">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Academic Year End Date</label>
                                        <input type="date" class="form-control" required name="year_end">
                                    </div>
                                </div>

                                <button type="submit" name="add_academic_year" class="btn btn-primary mt-3">Add Academic Year</button>
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