<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'user');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'chenji_ledger');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


session_start();

// get session variable
if(isset($_SESSION["status"])){
    $_SESSION["phone"];
	
}

?>