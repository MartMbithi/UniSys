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
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Library Reports</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Books Inventory" href="unisys_lim_reports_books_inventory.php">Books Inventory</a>
                            <a class="dropdown-item" data-value="Barcodes" href="unisys_lim_reports_barcodes.php">Barcodes</a>
                            <a class="dropdown-item" data-value="Register" href="unisys_lim_reports_library_register.php">Register</a>
                            <a class="dropdown-item" data-value="Operations" href="unisys_lim_reports_library_operations.php">Operations</a>
                            <a class="dropdown-item" data-value="Fines" href="unisys_lim_reports_fines.php">Fines</a>
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
                    <!-- Monthly Library Usage -->
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Monthly Library Usage</h5>
                                <ul class="tabs tab-pills">
                                    <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                </ul>
                            </div>

                            <div class="widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent">
                                        <div id="revenueMonthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Library Operations  -->
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="">Library Operations Per Type</h5>
                            </div>
                            <div class="widget-content">
                                <div id="chart-2" class=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-one">
                            <div class="widget-heading">
                                <h5 class="">Fines Payment Transactions</h5>
                            </div>

                            <div class="widget-content">
                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>Electricity Bill</h4>
                                                <p class="meta-date">4 Aug 1:00PM</p>
                                            </div>

                                        </div>

                                        <div class="t-rate rate-dec">
                                            <p>
                                                <span>-$16.44</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down">
                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                    <polyline points="19 12 12 19 5 12"></polyline>
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                        <div class="widget widget-activity-four">

                            <div class="widget-heading">
                                <h5 class="">Library Logs / Activities</h5>
                                <!-- 
                                    If its lost book, indicate red
                                    if its damanged book indicate warning
                                    if its retured in good condition indicate green
                                    Sort by latest 
                                 -->
                            </div>
                            <div class="widget-content">
                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">
                                        <div class="item-timeline timeline-primary">
                                            <div class="t-dot" data-original-title="" title="">
                                            </div>
                                            <div class="t-text">
                                                <p><span>Updated</span> Server Logs</p>
                                                <span class="badge badge-danger">Pending</span>
                                                <p class="t-time">Just Now</p>
                                            </div>
                                        </div>
                                        <div class="item-timeline timeline-success">
                                            <div class="t-dot" data-original-title="" title="">
                                            </div>
                                            <div class="t-text">
                                                <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                                <span class="badge badge-success">Completed</span>
                                                <p class="t-time">2 min ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tm-action-btn">
                                    <a href="unisys_lim_library_operations.php" class="btn">View All
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                        <div class="widget widget-account-invoice-one">

                            <div class="widget-heading">
                                <h5 class="">Library Account Info</h5>
                            </div>

                            <div class="widget-content">
                                <div class="invoice-box">

                                    <div class="acc-total-info">
                                        <h5>Balance</h5>
                                        <p class="acc-amount">$470</p>
                                    </div>

                                    <div class="inv-detail">
                                        <div class="info-detail-1">
                                            <p>Paid Fines</p>
                                            <p>$ 199.0</p>
                                        </div>
                                        <div class="info-detail-2">
                                            <p>Pending Fines</p>
                                            <p>$ 17.82</p>
                                        </div>
                                    </div>

                                    <div class="inv-action">
                                        <a href="unisys_lim_reports_fines.php" class="btn btn-dark">Summary</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-table-two">

                            <div class="widget-heading">
                                <h5 class="">Recently Added Books
                                    <a href="unisys_lim_reports_fines.php" class="badge outline-badge-success">View All</a>
                                </h5>
                            </div>

                            <div class="widget-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-content">ISBN Number</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Barcode</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Title</div>
                                                </th>
                                                <th>
                                                    <div class="th-content th-heading">Author</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Publisher</div>
                                                </th>
                                                <th>
                                                    <div class="th-content">Copies Available</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="td-content customer-name">
                                                        Andy King
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="td-content product-brand">Nike Sport</div>
                                                </td>
                                                <td>
                                                    <div class="td-content">#76894</div>
                                                </td>
                                                <td>
                                                    <div class="td-content pricing"><span class="">$88.00</span></div>
                                                </td>
                                                <td>
                                                    <div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div>
                                                </td>
                                                <td>
                                                    <div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div>
                                                </td>
                                            </tr>
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