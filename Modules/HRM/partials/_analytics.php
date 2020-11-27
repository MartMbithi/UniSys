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

$unpaid_benefits = 0;
/* Paid Benefits */
$paid_benefits = 0;
/* Pending Payrolls */
$pending_payrolls = 0;
/* Paid Payrolls */
$paid_payrolls = 0 ;
