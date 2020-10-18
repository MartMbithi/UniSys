<?php
include('configs/pdoconfig.php');

//Student Name
if (!empty($_POST["RegNumber"])) {
    $id = $_POST['RegNumber'];
    $stmt = $DB_con->prepare("SELECT * FROM UniSys_Students WHERE reg_no = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['name']); ?>
<?php
    }
}

