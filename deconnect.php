<?php
use lib\MotifyLogging\MotifyLogging\MotifyLogging;
$logger = new MotifyLogging();
$logger->warning("Disconnecting");
session_start();
unset($_SESSION['connecter']);
session_destroy();
header('Location: connect.html');