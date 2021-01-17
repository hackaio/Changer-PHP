<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
function connect_chenji(){
	$server = "localhost";
	$user = "user";
	$dbname = "chenji_ledger";
	$password = "1234";
	$conn = new mysqli($server, $user, $password, $dbname);
    ini_set("max_execution_time", 0);
	if($conn->connect_error){
		die("connection to server is lost");
	}
	return $conn;
}
 
/* Attempt to connect to MySQL database */
$link = connect_chenji();

session_start();

// get session variable
if(isset($_SESSION["status"])){
    $_SESSION["phone"];
	
}

?>