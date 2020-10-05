<?php
include('configs/pdoconfig.php');

//Course Id
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

//Faculty ID
if (!empty($_POST["facultyName"])) {
    $id = $_POST['facultyName'];
    $stmt = $DB_con->prepare("SELECT * FROM UniSys_Faculties WHERE faculty_name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['faculty_id']); ?>
<?php
    }
}


//Faculty Name
if (!empty($_POST["facultyId"])) {
    $id = $_POST['facultyId'];
    $stmt = $DB_con->prepare("SELECT * FROM UniSys_Faculties WHERE faculty_name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['faculty_code']); ?>
<?php
    }
}

//Units details
if (!empty($_POST["UnitCode"])) {
    $id = $_POST['UnitCode'];
    $stmt = $DB_con->prepare("SELECT * FROM UniSys_Units WHERE unit_code = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['unit_name']); ?>
<?php
    }
}