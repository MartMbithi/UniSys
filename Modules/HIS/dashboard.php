<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');
require_once('partials/_head.php');
?>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

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
                                <li class="breadcrumb-item active" aria-current="page"><span>Dashboard</span></li>
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-auto ">
                <li class="nav-item more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Hostel Reports</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Hostels" href="unisys_him_reports_hostels.php">Hostels</a>
                            <a class="dropdown-item" data-value="Rooms" href="unisys_him_reports_rooms.php">Rooms</a>
                            <a class="dropdown-item" data-value="Allocations" href="unisys_him_reports_allocations.php">Allocations</a>
                            <a class="dropdown-item" data-value="Assets" href="unisys_him_reports_assets.php">Assets</a>
                        </div>
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
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">
                            <div class="widget-heading">
                                <h5 class="">Hostels At Glance
                                    <a href="unisys_him_hostels.php" class="badge outline-badge-success">View All</a>
                                </h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content">Hostel Code</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Hostel Name</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">Number Of Rooms</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Hostel Location</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_HIM_Hostels`  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="td-content customer-name">
                                                            <?php echo $row->code; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand"><?php echo $row->name; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><?php echo $row->rooms; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content pricing"><span class=""><?php echo $row->location; ?></span></div>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">
                            <div class="widget-heading">
                                <h5 class="">Available Roooms At Glance
                                    <a href="unisys_him_rooms.php" class="badge outline-badge-success">View All</a>
                                </h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content">Room Number</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Room Type</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">Room Status</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_HIM_Rooms`  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($row = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="td-content customer-name">
                                                            <?php echo $row->code; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand"><?php echo $row->type; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><?php echo $row->status; ?></div>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">
                            <div class="widget-heading">
                                <h5 class="">Student Rooms Allocation At Glance
                                    <a href="unisys_him_rooms_allocation.php" class="badge outline-badge-success">View All</a>
                                </h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content">Room Number</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Room Type</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">Student ADM No</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">Student Name</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">Student Phone No</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_LIM_Books_Cataloque`  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($books = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="td-content customer-name">
                                                            <?php echo $books->isbn; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content product-brand"><?php echo $books->title; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><?php echo $books->author; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><?php echo $books->author; ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="td-content"><?php echo $books->author; ?></div>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('partials/_footer.php'); ?>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <?php require_once('partials/_scripts.php'); ?>

</body>

</html>