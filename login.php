<?php 
require('connect.php');

	
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['userName'];
		
	$sql = "SELECT * FROM user WHERE phone = '".$name."' ";
	$result = (mysqli_query($link, $sql));
	$rowData = mysqli_fetch_assoc($result);	 
	/*if (mysqli_num_rows($result) < 0){
		//register user
	}*/
	if(mysqli_num_rows($result) > 0){
		
		// session variables
		$_SESSION["owner"] = $rowData['phone'];
		header('location: omba/');
	}else if(isset($_POST['password'])){

		if ($name='0682908805' and $_POST['password']=='5682'){
			header("Location: gawa/");
		}else{
			echo "you're not an administrator";
		}
	}
	else{
		header("Location: index.php?msg=wrong credentials");
	}	
}
?>