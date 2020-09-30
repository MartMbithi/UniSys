<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
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
                        <a href="dashboard.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php
        require_once('partials/_header.php');
        ?>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Faculties List</h4>
                            <div class="add-product">
                                <a href="add_faculty.php">Add Faculty</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Faculty Code</th>
                                        <th>Faculty Name</th>
                                        <th>Faculty Head</th>
                                        <th>Faculty Settings</th>
                                    </tr>
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
                                            <td>
                                                <a href="view_faculty.php?view=<?php echo $faculty->faculty_id; ?>" data-toggle="tooltip" title="View Faculty" class="btn btn-success pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i> View</a>

                                                <a href="update_fadculty.php?edit=<?php echo $faculty->faculty_id; ?>" data-toggle="tooltip" title="Edit Faculty" class="btn btn-warning pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                                                <a href="faculties.php?delete=<?php echo $faculty->faculty_id; ?>" data-toggle="tooltip" title="Delete Faculty" class="btn btn-danger pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('partials/_footer.php'); ?>
    </div>
    <?php require_once('partials/_scripts.php');?>
</body>

</html>