<?php
session_start();
unset($_SESSION['auth_id']);
session_destroy();

header("Location: index.php");
exit;
