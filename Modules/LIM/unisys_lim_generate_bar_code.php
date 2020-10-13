<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');

require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $barcode = $_GET['barcode'];
    $ret = "SELECT * FROM `UniSys_LIM_Books_Cataloque` WHERE id = '$barcode'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($book = $res->fetch_object()) {
    ?>
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
                                    <li class="breadcrumb-item"><a href="unisys_lim_barcodes.php">Barcodes</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span>Generate</span></li>
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
                                <div class="card component-card_2">
                                    <img src="assets/img/cover_img/<?php echo $book->cover_img; ?>" class="img-thumbnail img-fluid card-img-top" alt="widget-card-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo  $book->title; ?> </h5>
                                        <h5 class="card-title">ISBN: <?php echo  $book->isbn; ?> </h5>
                                        <h5 class="card-title">Author: <?php echo  $book->author; ?> </h5>
                                        <hr>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Raw Barcode Number</label>
                                                    <input type="text" required value="<?php echo $a; ?><?php echo $b; ?>" class="form-control" name="barcode_text">
                                                </div>
                                            </div>
                                            <button type="submit" name="generate_barcode" class="btn btn-primary mt-3">Generate BarCode</button>
                                        </form>

                                        <?php
                                        if (isset($_POST['generate_barcode'])) {
                                            $text = $_POST['barcode_text'];
                                            echo "<img alt='testing' src='barcode_api.php?codetype=Code39&size=40&text=" . $text . "&print=true'/>";
                                        } ?>

                                    </div>
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