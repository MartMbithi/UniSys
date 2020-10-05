<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();


//Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM UniSys_Faculties WHERE faculty_id =?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=faculties.php");
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
                            <div class="add-product">
                                <a href="add_faculty.php">Add Faculty</a>
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
                                                <th>Faculty Code</th>
                                                <th>Faculty Name</th>
                                                <th>Faculty Head</th>
                                                <th>Faculty Settings</th>
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
                                                    <td>
                                                        <a href="update_fadculty.php?update=<?php echo $faculty->faculty_id; ?>" data-toggle="tooltip" title="Edit Faculty" class="btn btn-warning pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                        <a href="faculties.php?delete=<?php echo $faculty->faculty_id; ?>" data-toggle="tooltip" title="Delete Faculty" class="btn btn-danger pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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