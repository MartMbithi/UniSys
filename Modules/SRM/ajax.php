<?php
include('configs/pdoconfig.php');

//Room ID
if (!empty($_POST["courseName"])) {
    $id = $_POST['courseName'];
    $stmt = $DB_con->prepare("SELECT * FROM UniSys_Courses WHERE course_name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['course_id']); ?>
<?php
    }
}
