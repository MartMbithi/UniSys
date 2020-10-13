<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('configs/codeGen.php');

if (isset($_POST['add_book'])) {
    //Error Handling and prevention of posting double entries
    $error = 0;
    if (isset($_POST['isbn']) && !empty($_POST['isbn'])) {
        $isbn = mysqli_real_escape_string($mysqli, trim($_POST['isbn']));
    } else {
        $error = 1;
        $err = "ISBN  Number Cannot Be Empty";
    }
    if (!$error) {
        $sql = "SELECT * FROM  UniSys_LIM_Books_Cataloque WHERE  isbn='$isbn' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($isbn == $row['isbn']) {
                $err =  "ISBN  Number Already Exists";
            }
        } else {
            $id = $_POST['id'];
            $isbn = $_POST['isbn'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $publisher  = $_POST['publisher'];
            $copies  = $_POST['copies '];
            $synopsis = $_POST['synopsis'];
            $cover_img = $_FILES['cover_img']['name'];
            move_uploaded_file($_FILES["cover_img"]["tmp_name"], "assets/img/student/" . $_FILES["cover_img"]["name"]);

            $query = "INSERT INTO UniSys_LIM_Books_Cataloque (id, isbn, title, author, publisher, copies, synopsis, cover_img) VALUES (?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sssssss', $id, $isbn, $title, $author, $publisher, $copies, $synopsis, $cover_img);
            $stmt->execute();
            if ($stmt) {
                $success = "Added" && header("refresh:1; url=unisys_lim_add_book.php");
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
                                <li class="breadcrumb-item"><a href="unisys_lim_books_cataloque.php">Books Cataloque</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add New Book</span></li>
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
                                        <label for="inputEmail4">ISBN Number</label>
                                        <input type="text" required value="<?php echo $a; ?><?php echo $b; ?>" class="form-control" name="isbn">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Title</label>
                                        <input type="text" required class="form-control" name="title">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Author</label>
                                        <input type="text" required class="form-control" name="author">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Publisher</label>
                                        <input type="text" required class="form-control" name="publisher">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Copies Available</label>
                                        <input type="text" required class="form-control" name="copies">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Passport</label>
                                        <input type="file" required class="form-control btn btn-outline-success" name="cover_img">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Book Synopsis</label>
                                        <textarea type="text" id="textarea" class="form-control" name="synopsis"></textarea>
                                    </div>
                                </div>
                                <button type="submit" name="add_book" class="btn btn-primary mt-3">Submit</button>
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