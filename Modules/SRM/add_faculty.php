<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_faculty'])) {

    $faculty_id = $_POST['faculty_id'];
    $faculty_code = $_POST['faculty_code'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_desc = $_POST['faculty_desc'];
    $faculty_head = $_POST['faculty_head'];

    $query = "INSERT INTO UniSys_Faculties (faculty_id, faculty_code, faculty_name, faculty_desc, faculty_head) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssss', $faculty_id, $faculty_code, $faculty_name, $faculty_desc, $faculty_head);
    $stmt->execute();
    if ($stmt) {
        $success = "Added" && header("refresh:1; url=add_faculty.php");
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
                                <li class="breadcrumb-item"><a href="unisys_srm_faculties.php">Faculties</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Register New Faculty</span></li>
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
                                        <label for="inputEmail4">Faculty ID</label>
                                        <input type="text" name="faculty_id" value="<?php echo $ID; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Faculty Code</label>
                                        <input type="text" class="form-control" value="<?php echo $a; ?>-<?php echo $b; ?>" name="faculty_code">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Faculty Name</label>
                                        <input type="text" class="form-control" name="faculty_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Head Of Faculty</label>
                                        <select class='form-control basic' name="faculty_head" id="">
                                            <option selected>Select Head Of Faculty</option>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_Staffs` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($staff = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $staff->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">Faculty Description</label>
                                        <textarea required name="faculty_desc" rows="10" id="faculty_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" name="add_faculty" class="btn btn-primary mt-3">Add Faculty</button>
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