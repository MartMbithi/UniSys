<?php

/* Hostels */
$query = "SELECT COUNT(*)  FROM `UniSys_HIM_Hostels` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($hostels);
$stmt->fetch();
$stmt->close();

/* Total Rooms */
$query = "SELECT COUNT(*)  FROM `UniSys_HIM_Rooms`  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($rooms);
$stmt->fetch();
$stmt->close();

/* Total Vacant Rooms */
$query = "SELECT COUNT(*)  FROM `UniSys_HIM_Rooms` WHERE status ='Vacant'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($vacant);
$stmt->fetch();
$stmt->close();

/* Total Occupied Rooms */
$query = "SELECT COUNT(*)  FROM `UniSys_HIM_Rooms` WHERE status !='Vacant'  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($occupied);
$stmt->fetch();
$stmt->close();

/* Under Renovation  Room*/
$query = "SELECT COUNT(*)  FROM `UniSys_HIM_Assets` WHERE status !='Under Renovation'   ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($underrenovation);
$stmt->fetch();
$stmt->close();

/* Assets */
$query = "SELECT COUNT(*)  FROM `UniSys_HIM_Assets`   ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($assets);
$stmt->fetch();
$stmt->close();