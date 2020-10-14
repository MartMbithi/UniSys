<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_library_operation'])) {
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
        $id = $_POST['id'];
        $cheksum = $_POST['checksum'];
        $type = $_POST['type'];
        $student_regno = $_POST['student_regno'];
        $student_name  = $_POST['student_name'];
        $book_isbn  = $_POST['book_isbn'];
        $book_title = $_POST['book_title'];
        $month = $_POST['month'];


        $ret = "SELECT * FROM `UniSys_LIM_Books_Cataloque` WHERE isbn = '$book_isbn'  ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($bk = $res->fetch_object()) {
            $initial_copies = $bk->copies;
            $new_copies = $initial_copies - 1;
        }

        $query = "INSERT INTO UniSys_LIM_Library_Operations (id, checksum, type, student_regno, student_name, book_isbn, book_title, month ) VALUES (?,?,?,?,?,?,?,?)";
        $update = "UPDATE UniSys_LIM_Books_Cataloque SET copies = ? WHERE isbn = ?";
        $stmt = $mysqli->prepare($query);
        $updatestmt = $mysqli->prepare($update);
        $rc = $stmt->bind_param('ssssssss', $id, $checksum, $type, $student_regno, $student_name, $book_isbn, $book_title, $month);
        $rc = $updatestmt->bind_param('ss', $new_copies, $book_isbn);
        $stmt->execute();
        $updatestmt->execute();
        if ($stmt && $updatestmt) {
            $success = "Added"; // && header("refresh:1; url=unisys_lim_add_library_operation.php");
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Operation</span></li>
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
                                        <input type="hidden" required value="<?php echo date('M') ?>" class="form-control" name="month">
                                        <input type="hidden" required value="Borrow" class="form-control" name="type">
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
                                    <hr>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Book ISBN Number</label>
                                        <select id="bookIsbn" onchange="getBookDetails(this.value);" class='form-control basic' name="book_isbn">
                                            <option selected>Select Book ISBN Number</option>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_LIM_Books_Cataloque`  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($book = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $book->isbn; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Book Title</label>
                                        <input type="text" id="bookTitle" readonly class="form-control" name="book_title">
                                    </div>
                                </div>
                                <button type="submit" name="add_library_operation" class="btn btn-primary mt-3">Submit</button>
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