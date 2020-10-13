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

/* Total Fine */
$totalFine = $PaidFine + $UnPaidFine;



/* Chart Analytics */
/* 1. Monthly Library Usage - >Data will be derived from library operations table */

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jan' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jan);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Feb' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($feb);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Mar' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($mar);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Apr' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($apr);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'May' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($may);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jun' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jun);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jul' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jul);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Aug' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($aug);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Sep' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($sep);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Oct' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($oct);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Nov' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($nov);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Dec' AND type ='Borrow'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($dec);
$stmt->fetch();
$stmt->close();



/* Reported Damanged Books Per Month */
$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jan' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Jan);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Feb' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Feb);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Mar' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Mar);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Apr' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Apr);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'May' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($May);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jun' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Jun);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jul' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Jul);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Aug' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Aug);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Sep' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Sep);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Oct' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Oct);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Nov' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Nov);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Dec' AND type ='Damanged'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($Dec);
$stmt->fetch();
$stmt->close();



/* Lost Books */
$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jan' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostJan);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Feb' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostFeb);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Mar' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostMar);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Apr' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostApr);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'May' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostMay);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jun' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostJun);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Jul' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostJul);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Aug' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostAug);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Sep' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostSep);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Oct' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostOct);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Nov' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostNov);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Library_Operations` WHERE month = 'Dec' AND type ='Lost'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lostDec);
$stmt->fetch();
$stmt->close();


/* Library Visitors Per Month */
$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Jan' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($vistJan);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Feb'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitFeb);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Mar'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitMar);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Apr'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitApr);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'May'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitMay);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Jun' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitJun);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Jul'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitJul);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Aug'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitAug);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Sep'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitSep);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Oct'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitOct);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Nov' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitNov);
$stmt->fetch();
$stmt->close();

$query = "SELECT COUNT(*)  FROM `UniSys_LIM_Register` WHERE month = 'Dec' ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($visitDec);
$stmt->fetch();
$stmt->close();
