<?php
// Include config file
require_once "../connect.php";
$phone = trim($_POST["phone"]);
$input5000 = trim($_POST["5000"]);
$input2000 = trim($_POST["2000"]);
$input1000 = trim($_POST["1000"]);
$input500 = trim($_POST["500"]);
$input200 = trim($_POST["200"]);
$input100 = trim($_POST["100"]);
$total = ($input5000 * 5000) +($input2000 * 2000)+($input1000 * 1000)+($input500 * 500)+($input200 * 200)+($input100 * 100);
$importantKeys = array(
    '5000' =>$input5000,
    '2000' => $input2000,
    '1000' => $input1000,
    '500' => $input500,
    '200' => $input200, 
    '100' => $input100, 
    'total' => $total
    );

$importantKeys = json_encode($importantKeys);
//echo $myJSON;
$comission = $total * 0.1;
$returns = $total + $comission;
echo $total .'    ' .$comission.'    ' .$returns;
$sql = "INSERT INTO chenji_ledger (phone_number,total_change,commision,total_amount,status,general)
VALUES (?,?,?,?,?,?)";
if($stmt = mysqli_prepare($link, $sql)){
    $status ="2";
   
   
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "siiiss", $param_username,$total,$comission,$returns,$status,$importantKeys);
            
    // Set parameters
    $param_username = $phone ;
    $total_change = $total ;
    mysqli_stmt_execute($stmt);
    $msg = "eveluy dsuihgdsiu";
    header("Location: showall.php?msg=".$importantKeys);

} else{
    echo "Oops! Something went wrong. Please try again later.";
}

// Close statement
mysqli_stmt_close($stmt);

?>