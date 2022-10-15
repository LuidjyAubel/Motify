<?php
session_start();
unset($_SESSION['connecter']);
session_destroy();
header('Location: connect.html');