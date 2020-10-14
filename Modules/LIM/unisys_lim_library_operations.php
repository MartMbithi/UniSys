<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');

//Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM UniSys_LIM_Library_Operations WHERE id =?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=unisys_lim_library_operations.php");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}
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
                                <li class="breadcrumb-item active" aria-current="page"><span>Library Operations</span></li>
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
                            <a class="btn btn-outline-success" href="unisys_lim_add_library_operation.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="12" y1="18" x2="12" y2="12"></line>
                                    <line x1="9" y1="15" x2="15" y2="15"></line>
                                </svg>

                                Register New Operation
                            </a>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="alter_pagination" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Checksum</th>
                                            <th>Type</th>
                                            <th>Book Isbn</th>
                                            <th>Book Title</th>
                                            <th>Student Name</th>
                                            <th>Student ADMNo</th>
                                            <th>Created At</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ret = "SELECT * FROM `UniSys_LIM_Library_Operations`  ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($ops = $res->fetch_object()) {
                                        ?>
                                            <tr>
                                                <td><span class="text-success"><?php echo $ops->checksum; ?></span></td>
                                                <td>
                                                    <?php
                                                    if ($ops->type == 'Damanged') {
                                                        echo "<span class='badge outline-badge-warning'>$ops->type</span>";
                                                    } elseif ($ops->type == 'Lost') {
                                                        echo "<span class='badge outline-badge-danger'>$ops->type</span>";
                                                    } elseif ($ops->type == 'Return') {
                                                        echo "<span class='badge outline-badge-success'>$ops->type</span>";
                                                    } else {
                                                        echo "<span class='badge outline-badge-primary'>$ops->type</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $ops->book_isbn; ?></td>
                                                <td><?php echo $ops->book_title; ?></td>
                                                <td><?php echo $ops->student_name; ?></td>
                                                <td><?php echo $ops->student_regno; ?></td>
                                                <td><?php echo date('d, M, Y g:i', strtotime($ops->created_at)); ?></td>
                                                <td class="text-center">
                                                    <div class="dropdown custom-dropdown">
                                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                <circle cx="19" cy="12" r="1"></circle>
                                                                <circle cx="5" cy="12" r="1"></circle>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink12">
                                                            <?php
                                                            if ($ops->type == 'Borrow') {
                                                                echo
                                                                    "
                                                                    <a class='dropdown-item text-success' href='unisys_lim_return_book.php?return=$ops->id'>Return Book</a>
                                                                    <a class='dropdown-item text-danger' href='unisys_lim_report_lost.php?lost=$ops->id'>Report Lost</a>
                                                                    <a class='dropdown-item text-warning' href='unisys_lim_return_damanged.php?damanged=$ops->id'>Return Damanged</a>
                                                                    <a class='dropdown-item text-primary' href='unisys_lim_library_operations.php?delete=$ops->id'>Delete Record</a>
                                                                    ";
                                                            } elseif ($ops->type == 'Damanged') {
                                                                echo
                                                                    "
                                                                    <a class='dropdown-item text-primary' href='unisys_lim_library_operations.php?delete=$ops->id'>Delete Record</a>
                                                                    ";
                                                            } else {
                                                                echo
                                                                    "
                                                                    <a class='dropdown-item text-primary' href='unisys_lim_library_operations.php?delete=$ops->id'>Delete Record</a>
                                                                    ";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
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
            <?php require_once('partials/_footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>