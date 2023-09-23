<?php
if(file_exists('../config/.env')){
$env = parse_ini_file('../config/.env');
define("DBHOST", $env["DBHOST"]);
define("DBUSER",$env["DBUSER"]);
define("DBPASSWORD",$env["DBPASSWORD"]);
 define("API_KEY", $env["API_KEY"]);
}