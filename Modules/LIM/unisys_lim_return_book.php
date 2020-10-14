<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['return_book'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;
    if (isset($_POST['student_name']) && !empty($_POST['student_name'])) {
        $student_name = mysqli_real_escape_string($mysqli, trim($_POST['student_name']));
    } else {
        $error = 1;
        $err = "Student Name Cannot Be Empty";
    }
    if (isset($_POST['book_title']) && !empty($_POST['book_title'])) {
        $book_title = mysqli_real_escape_string($mysqli, trim($_POST['book_title']));
    } else {
        $error = 1;
        $err = "Book Title Cannot Be Empty";
    }
    if (!$error) {
        $return = $_GET['return'];
        $checksum = $_POST['checksum'];
        $type = $_POST['type'];
        $book_isbn = $_POST['book_isbn'];

        $ret = "SELECT * FROM `UniSys_LIM_Books_Cataloque` WHERE isbn = '$book_isbn'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($bk = $res->fetch_object()) {
            $initial_copies = $bk->copies;
            $new_copies = $initial_copies + 1;
        }

        $query = "UPDATE UniSys_LIM_Library_Operations SET checksum =?, type = ? WHERE id = ?";
        $update = "UPDATE UniSys_LIM_Books_Cataloque SET copies = ? WHERE isbn = ?";
        $stmt = $mysqli->prepare($query);
        $updatestmt = $mysqli->prepare($update);
        $rc = $stmt->bind_param('sss', $checksum, $type, $return);
        $rc = $updatestmt->bind_param('ss', $new_copies, $book_isbn);
        $stmt->execute();
        $updatestmt->execute();
        if ($stmt && $updatestmt) {
            $success = "Returned" && header("refresh:1; url=unisys_lim_library_operations.php");
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
    $return = $_GET['return'];
    $ret = "SELECT * FROM `UniSys_LIM_Library_Operations` WHERE id ='$return'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($ops = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="unisys_lim_library_operations.php">Library Operations</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Return <?php echo $ops->book_title; ?></span></li>
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
                                        <div style="display: none;" class="form-group col-md-6">
                                            <input type="hidden" required value="<?php echo $checksum; ?>" readonly class="form-control" name="checksum">
                                            <input type="hidden" required value="Return" class="form-control" name="type">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Registration Number</label>
                                            <input type="text" readonly value="<?php echo $ops->student_name; ?>" id="StudentName" required class="form-control" name="student_name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Name</label>
                                            <input type="text" readonly value="<?php echo $ops->student_name; ?>" id="StudentName" required class="form-control" name="student_name">
                                        </div>
                                        <hr>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Book ISBN Number</label>
                                            <input type="text" id="bookTitle" value="<?php echo $ops->book_isbn; ?>" class="form-control" name="book_isbn">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Book Title</label>
                                            <input type="text" id="bookTitle" value="<?php echo $ops->book_title; ?>" readonly class="form-control" name="book_title">
                                        </div>
                                    </div>
                                    <button type="submit" name="return_book" class="btn btn-primary mt-3">Return Book</button>
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