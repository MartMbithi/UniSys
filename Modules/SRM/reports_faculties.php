<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();

require_once('partials/_head.php');
?>

<body>

    <?php require_once('partials/_sidebar.php'); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a class="main-logo" href="dashboard.php"></a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <?php
        require_once('partials/_header.php');
        ?>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Faculties List</h4>
                            <!-- <div class="add-product">
                                <a href="add_faculty.php">Add Faculty</a>
                            </div> -->
                            <div class="asset-inner">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>Faculty Code</th>
                                                <th>Faculty Name</th>
                                                <th>Faculty Head</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_Faculties`  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($faculty = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $faculty->faculty_code; ?></td>
                                                    <td><?php echo $faculty->faculty_name; ?></td>
                                                    <td><?php echo $faculty->faculty_head; ?></td>
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
        <?php require_once('partials/_footer.php'); ?>
    </div>
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>