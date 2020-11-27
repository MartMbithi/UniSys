<?PHP
/* Staffs */
$query = "SELECT COUNT(*)  FROM `UniSys_Staffs` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staffs);
$stmt->fetch();
$stmt->close();

/* Jobs Posted*/
$query = "SELECT COUNT(*)  FROM `UniSys_JobsPosted` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($jobs_posted);
$stmt->fetch();
$stmt->close();

/* Unpaid Benefits */
$query = "SELECT COUNT(*)  FROM `UniSys_Benefits` WHERE status !='Paid'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($unpaid_benefits);
$stmt->fetch();
$stmt->close();

/* Paid Benefits */
$query = "SELECT COUNT(*)  FROM `UniSys_Benefits` WHERE status ='Paid'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($paid_benefits);
$stmt->fetch();
$stmt->close();

/* Pending Payrolls */
$query = "SELECT COUNT(*)  FROM `UniSys_Payrolls` WHERE status ='Pending'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($pending_payrolls);
$stmt->fetch();
$stmt->close();

/* Paid Payrolls */
$query = "SELECT COUNT(*)  FROM `UniSys_Payrolls` WHERE status !='Pending'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($paid_payrolls);
$stmt->fetch();
$stmt->close();