<?php
session_start();
require_once('configs/config.php');
require_once('configs/checklogin.php');
check_login();

//Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $adn = "DELETE FROM UniSys_Students WHERE id =?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=admissions.php");
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
                            <h4>Admited Students List</h4>
                            <div class="add-product">
                                <a href="add_admission.php">Admit Student</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Name</th>
                                        <th>Id Number</th>
                                        <th>Email</th>
                                        <th>Campus Email</th>
                                        <th>Phone Number</th>
                                        <th>Course</th>
                                        <th>Gender</th>
                                        <th>DOB</th>
                                        <th>Settings</th>
                                    </tr>
                                    <?php
                                    $ret = "SELECT * FROM `UniSys_Students`  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute(); //ok
                                    $res = $stmt->get_result();
                                    while ($std = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $std->reg_no; ?></td>
                                            <td><?php echo $std->name; ?></td>
                                            <td><?php echo $std->idnumber; ?></td>
                                            <td><?php echo $std->personal_email; ?></td>
                                            <td><?php echo $std->campus_email; ?></td>
                                            <td><?php echo $std->phone; ?></td>
                                            <td><?php echo $std->course_name; ?></td>
                                            <td><?php echo $std->gender; ?></td>
                                            <td><?php echo $std->dob; ?></td>
                                            <td>
                                                <a href="view_admissions.php?view=<?php echo $std->id; ?>" data-toggle="tooltip" title="View Admission" class="btn btn-primary pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                <a href="update_admissions.php?update=<?php echo $std->id; ?>" data-toggle="tooltip" title="Edit Admission" class="btn btn-warning pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                <a href="admissions.php?delete=<?php echo $std->id; ?>" data-toggle="tooltip" title="Delete Admission" class="btn btn-danger pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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