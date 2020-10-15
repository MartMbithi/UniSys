<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');
require_once('configs/codeGen.php');
require_once('partials/_head.php');
?>

<body>

    <!--  BEGIN NAVBAR  -->
    <?php
    require_once('partials/_nav.php');
    $receipt = $_GET['receipt'];
    $ret = "SELECT * FROM `UniSys_LIM_Fines` WHERE id = '$receipt' ";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute(); //ok
    $res = $stmt->get_result();
    while ($fine = $res->fetch_object()) {
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
                                    <li class="breadcrumb-item"><a href="unisys_lim_fines.php">Fines</a></li>
                                    <li class="breadcrumb-item"><a href="unisys_lim_fines.php">Receipts</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><span><?php echo $fine->fine_type; ?> Book Fine</span></li>
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
                    <div class="row invoice layout-top-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="app-hamburger-container">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></div>
                            </div>
                            <div class="doc-container">
                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="search">
                                                <input type="text" class="form-control" placeholder="Search...">
                                            </div>
                                            <ul class="nav nav-pills inv-list-container d-block" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <div class="nav-link list-actions" id="invoice-00001" data-invoice-id="<?php echo $fine->fine_amt;?>">
                                                        <div class="f-m-body">
                                                            <div class="f-head">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="f-body">
                                                                <p class="invoice-number">Receipt Number <?php echo $fine->code;?></p>
                                                                <p class="invoice-generated-date">Date: <?php echo date('d M Y', strtotime($fine->created_at));?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-container">
                                    <div class="invoice-inbox">

                                        <div class="inv-not-selected">
                                            <p>Open a receipt from the list.</p>
                                        </div>

                                        <div class="invoice-header-section">
                                            <h4 class="inv-number"></h4>
                                            <div class="invoice-action">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer action-print" data-toggle="tooltip" data-placement="top" data-original-title="">
                                                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                    <rect x="6" y="14" width="12" height="8"></rect>
                                                </svg>
                                            </div>
                                        </div>

                                        <div id="ct" class="">
                                            <div class="invoice-00001">
                                                <div class="content-section  animated animatedFadeInUp fadeInUp">

                                                    <div class="row inv--head-section">

                                                        <div class="col-sm-6 col-12">
                                                            <h3 class="in-heading">Receipt</h3>
                                                        </div>
                                                        <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                            <div class="company-info">
                                                                <h5 class="inv-brand-name">UniSys - Library</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row inv--detail-section">

                                                        <div class="col-sm-7 align-self-center">
                                                            <p class="inv-to">Receipt To</p>
                                                        </div>
                                                        <div class="col-sm-5 align-self-center  text-sm-right order-sm-0 order-1">
                                                            <p class="inv-detail-title">From : UNISYSY - LIBRARY</p>
                                                        </div>

                                                        <div class="col-sm-7 align-self-center">
                                                            <p class="inv-customer-name"><?php echo $fine->student_name;?></p>
                                                            <p class="inv-street-addr"><?php echo $fine->student_regno;?></p>
                                                        </div>
                                                        <div class="col-sm-5 align-self-center  text-sm-right order-2">
                                                            <p class="inv-list-number"><span class="inv-title">Receipt Number : </span> <span class=""><?php echo $fine->code;?></span></p>
                                                            <p class="inv-due-date"><span class="inv-title">Date : </span> <span class="inv-date"><?php echo date('d M Y', strtotime($fine->created_at));?></span></p>
                                                        </div>
                                                    </div>

                                                    <div class="row inv--product-table-section">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col">Book Title</th>
                                                                            <th class="text-right" scope="col">Book ISBN</th>
                                                                            <th class="text-right" scope="col">Fine Type</th>
                                                                            <th class="text-right" scope="col">Amount</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><?php echo $fine->book_title;?></td>
                                                                            <td class="text-right"><?php echo $fine->book_isbn;?></td>
                                                                            <td class="text-right"><?php echo $fine->fine_type;?> Book</td>
                                                                            <td class="text-right">Ksh <?php echo $fine->fine_amt;?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                            
                                                        </div>
                                                        
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="inv--total-amounts text-sm-right">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                                        <h4 class="">Total Paid : </h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                                        <h4 class="">Ksh <?php echo $fine->fine_amt;?></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="inv--thankYou">
                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <p class="">Thank You For Being Our Loyal Client </p>
                                            </div>
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