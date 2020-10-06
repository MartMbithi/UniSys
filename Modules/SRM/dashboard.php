<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();
require_once('partials/_analytics.php');
require_once('partials/_head.php');
?>

<body>

    <!-- Start Header menu area -->
    <?php require_once('partials/_sidebar.php'); ?>
    <!-- End Header menu area -->
    <div class="all-content-wrapper">

        <?php require_once('partials/_header.php'); ?>

        <br><br><br>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Enrollments</h4>
                            <div class="add-product">
                                <a href="add_enrollment.php">Register New Enrollment</a>
                            </div>
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
                                                <th>Code</th>
                                                <th>Academic Year</th>
                                                <th>Unit Code</th>
                                                <th>Unit Name</th>
                                                <th>Student Adm Number</th>
                                                <th>Student Name</th>
                                                <th>Enrollment Settings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ret = "SELECT * FROM `UniSys_Enrollments`  ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($en = $res->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $en->enroll_code; ?></td>
                                                    <td><?php echo $en->enroll_aca_yr; ?></td>
                                                    <td><?php echo $en->unit_code; ?></td>
                                                    <td><?php echo $en->unit_name; ?></td>
                                                    <td><?php echo $en->student_reg_no; ?></td>
                                                    <td><?php echo $en->student_name; ?></td>
                                                    <td>
                                                        <a href="update_enrollment.php?update=<?php echo $en->enroll_id; ?>" data-toggle="tooltip" title="Edit Enrollment" class="btn btn-warning pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                        <a href="enrollments.php?delete=<?php echo $en->enroll_id; ?>" data-toggle="tooltip" title="Delete Enrollment" class="btn btn-danger pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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

        <?php require_once('partials/_footer.php'); ?>
    </div>

    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>