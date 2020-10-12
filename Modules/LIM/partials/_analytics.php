<?php
/* Available Book Copies */
$query = "SELECT SUM(copies)  FROM `UniSys_LIM_Books_Cataloque`";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($AvailableBook);
$stmt->fetch();
$stmt->close();

/* Lost Books */
$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE type = 'Lost'" ;
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($LostBook);
$stmt->fetch();
$stmt->close();

/* Damanged Books */
$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE type = 'Damanged'" ;
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($DamangedBooks);
$stmt->fetch();
$stmt->close();

/* Borrowed  Books */
$borrowedBooks = ($AvailableBook - ($LostBook + $DamangedBooks));

/* Total Paid Fine */
$query = "SELECT SUM(fine_amt)  FROM `UniSys_LIM_Fines` WHERE  status = 'Paid'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($PaidFine);
$stmt->fetch();
$stmt->close();

/* Unpaid Fine */
$query = "SELECT SUM(fine_amt)  FROM `UniSys_LIM_Fines` WHERE  status != 'Paid'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($UnPaidFine);
$stmt->fetch();
$stmt->close();