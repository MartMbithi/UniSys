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
    $view = $_GET['view'];
    $ret = "SELECT * FROM `UniSys_LIM_Books_Cataloque` WHERE id ='$view'  ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($book = $res->fetch_object()) {
        $book_isbn = $book->isbn;
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
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $book->title; ?></span></li>
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
            <?php
            require_once('partials/_sidebar.php');

            ?>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">

                    <div class="row layout-spacing">

                        <!-- Content -->
                        <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                            <div class="user-profile layout-spacing">
                                <div class="widget-content widget-content-area">
                                    <div class="d-flex justify-content-between">
                                        <h3 class=""><?php echo $book->title; ?></h3>
                                        <a href="unisys_lim_update_book.php?update=<?php echo $book->id; ?>" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg></a>
                                    </div>
                                    <div class="text-center user-info">
                                        <img src='assets/img/cover_img/<?php  echo $book->cover_img; ?>' class='img-fluid img-thumbnail' alt='avatar'>
                                        <p class=""><?php echo $book->title; ?></p>
                                    </div>
                                    <div class="user-info-list">
                                        <div class="">
                                            <ul class="contacts-block list-unstyled">
                                                <li class="contacts-block__item">
                                                    ISBN : <?php echo $book->isbn; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Author : <?php echo $book->author; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Publisher : <?php echo $book->publisher; ?>
                                                </li>
                                                <li class="contacts-block__item">
                                                    Copies : <?php echo $book->copies; ?> Copies
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Plot | Synopsis | Details</h3>
                                    <div class="widget-content">
                                        <?php echo $book->synopsis; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
                            <div class="bio layout-spacing ">
                                <div class="widget-content widget-content-area">
                                    <h3 class="">Libary Operations Records For <?php echo $book->title; ?></h3>
                                    <div class="widget-content">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="th-content">Checksum</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Student Name</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Student Adm No</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Operation Type</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Operation Type</div>
                                                        </th>
                                                        <th>
                                                            <div class="th-content">Created At</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $ret = "SELECT * FROM `UniSys_LIM_Library_Operations` WHERE book_isbn = '$book_isbn' ORDER BY `UniSys_LIM_Library_Operations`.`created_at` DESC LIMIT 10   ";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($ops = $res->fetch_object()) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <div class="td-content"><span class="pricing"><?php echo $ops->checksum; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="pricing"><?php echo $ops->student_name; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="discount-pricing"><?php echo $ops->student_regno; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="discount-pricing"><?php echo $ops->type; ?></span></div>
                                                            </td>
                                                            <td>
                                                                <div class="td-content"><span class="discount-pricing"><?php echo date('d, M, Y g:i', strtotime($ops->created_at)); ?></span></div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            <?php require_once('partials/_footer.php');
        } ?>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <?php require_once('partials/_scripts.php'); ?>
</body>

</html>