<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();


//Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM UniSys_Academic_Years WHERE year_id =?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=academic_year.php");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}
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
        <br><br><br><br><br>
        <?php
        require_once('partials/_header.php');
        ?>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Registered Academic Years List</h4>
                            <div class="add-product">
                                <a href="add_academic_year.php">Add Academic Year</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Code</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Settings</th>
                                    </tr>
                                    <?php
                                    $ret = "SELECT * FROM `UniSys_Academic_Years`  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($year = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $year->year_code; ?></td>
                                            <td><?php echo $year->year_start; ?></td>
                                            <td><?php echo $year->year_end; ?></td>
                                            <td>
                                                <a href="update_academic_year.php?update=<?php echo $year->year_id; ?>" data-toggle="tooltip" title="Edit Academic Year" class="btn btn-warning pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                <a href="academic_year.php?delete=<?php echo $year->year_id; ?>" data-toggle="tooltip" title="Delete Academic Year" class="btn btn-danger pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
    <?php require_once('partials/_scripts.php'); ?>
</body>

</html>