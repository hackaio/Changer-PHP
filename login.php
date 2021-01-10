<?php 
require('connect.php');

	
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['userName'];
		
	$sql = "SELECT * FROM users WHERE phone = '".$name."' ";
	$result = (mysqli_query($link, $sql));
	$rowData = mysqli_fetch_assoc($result);	 
	if (mysqli_num_rows($result) < 0){
		//register user
	}
	else if(mysqli_num_rows($result) > 0){
		
		// session variables
		$_SESSION["owner"] = $rowData['phone'];
		header('location: omba/index.php');
		
    }else if($name=='+255682908805' and $_POST['pass']!='' and $_POST['pass']=='1234'){
					
			header('location: gawa/index.php');
	}
			
}
?>