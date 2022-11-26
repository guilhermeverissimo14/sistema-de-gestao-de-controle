<?php
session_start();
$_SESSION["token"] = false;
header("Location: login.php");
exit;