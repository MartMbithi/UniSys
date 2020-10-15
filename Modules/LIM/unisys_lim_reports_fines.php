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
    <?php require_once('partials/_nav.php'); ?>
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
                                <li class="breadcrumb-item"><a href="">Advance Reporting</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Library Fines</span></li>
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
                                <table id="html5-extension" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Fine For</th>
                                            <th>Book Isbn</th>
                                            <th>Book Title</th>
                                            <th>Student Name</th>
                                            <th>Student ADMNo</th>
                                            <th>Amount Fined</th>
                                            <th>Paid At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = "SELECT * FROM `UniSys_LIM_Fines` ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($fine = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><span class="text-success"><?php echo $fine->code; ?></span></td>
                                                <td>
                                                    <?php
                                                    if ($fine->fine_type == 'Damanged') {
                                                        echo "<span class='badge outline-badge-warning'>$fine->fine_type Book </span>";
                                                    } elseif ($fine->fine_type == 'Lost') {
                                                        echo "<span class='badge outline-badge-danger'>$fine->fine_type Book </span>";
                                                    } elseif ($fine->fine_type == 'Return') {
                                                        echo "<span class='badge outline-badge-success'>$fine->fine_type Book </span>";
                                                    } else {
                                                        echo "<span class='badge outline-badge-primary'>$fine->fine_type Book </span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $fine->book_isbn; ?></td>
                                                <td><?php echo $fine->book_title; ?></td>
                                                <td><?php echo $fine->student_name; ?></td>
                                                <td><?php echo $fine->student_regno; ?></td>
                                                <td>Ksh <?php echo $fine->fine_amt; ?></td>
                                                <td><?php echo date('d, M, Y g:i', strtotime($fine->created_at)); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php require_once('partials/_footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>