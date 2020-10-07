<?php

/* Faculties */
$query = "SELECT COUNT(*)  FROM `UniSys_Faculties`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Faculties);
$stmt->fetch();
$stmt->close();

/* Academic Years */
$query = "SELECT COUNT(*) FROM `UniSys_Academic_Years`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Academic_Years);
$stmt->fetch();
$stmt->close();

/* Courses */
$query = "SELECT COUNT(*) FROM `UniSys_Courses`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Courses);
$stmt->fetch();
$stmt->close();

/* Admissions */
$query = "SELECT  COUNT(*) FROM `UniSys_Students`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Admissions);
$stmt->fetch();
$stmt->close();

/* Enrollments */
$query = "SELECT COUNT(*) FROM `UniSys_Enrollments` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Enrollments);
$stmt->fetch();
$stmt->close();

/* Students */
$query = "SELECT COUNT(*) FROM `UniSys_Students` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Students);
$stmt->fetch();
$stmt->close();
