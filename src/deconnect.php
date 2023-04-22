<?php
include('../lib/MotifyLogging.php');
$logger = new MotifyLogging();
$logger->warning("Disconnecting".$_SESSION['Username']);
session_start();
unset($_SESSION['connecter']);
session_destroy();
header('Location: connection.php');