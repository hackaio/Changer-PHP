<?php

$msg=$_GET['msg'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chenji App</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
	
    <link rel="stylesheet" href="css/skins/_all-skins.min.css">

    <link rel="icon" href="images/favicon.png">

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- js -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Font Awesome -->
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

<style>
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 8px;
  background: #3388CC;
  color: white;
  min-width: 40px;
  text-align: center;
}
</style>

</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        WELCOME TO CHENJI APP
    </div>
	
<div id="f1_card">
    <!-- /.login-logo -->
	<div class="front face">
        <div class="row login-box-body">
            <div class="login-box-msg">
            <?php 
            if (isset($msg)){
                echo "<b style='color:red'>" .$msg. "</b>";
            }else{echo 'LOGIN SCREEN';}
            ?></div>
            <div class="has-feedback " style="text-align:center;">
            </div>
            <div class="hidden-sm hidden-xs col-lg-4 col-md-4 col-sm-12" style="padding: 1em">
                <img src="images/logo.png" 
                style="height:fit-content; width:160" style="margin:auto;">
            </div>
        <div class="col-lg-8 col-md-8 col-sm-12" style="padding: 2em">
            <form method="post" action="login.php">
                <input type="hidden" name="_token" value="AVCA72xVMqU7xklE2AyzfB87PzCjcrfge1LseYQy">

                <div class="input-container">                                     
                    <input type="int" class="form-control txtuppercase" name="userName" value="" placeholder="phone"><i class="fa fa-phone icon"></i> 
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div> 
            </form>	
         			
        </div>
        <a href="#" id="flip_content">Login as Admin</a>	     
    </div>	
    	
<div style="margin:auto;">
     
</div>
	</div>	
	
	<div class="back face center">
	  <div class="row login-box-body">
        <div class="login-box-msg">Admin Login Center</div>
        <div class="has-feedback " style="text-align:center;">
        </div>
        <div style="padding: 2em">
            <form method="post" action="login.php">
                <input type="hidden" name="_token" value="AVCA72xVMqU7xklE2AyzfB87PzCjcrfge1LseYQy">
				
				<div class="input-container">                                     
                    <input type="text" class="form-control" name="phone" placeholder="Phone number"><i class="fa fa-mobile-phone icon"></i> 
                </div>

                <div class="input-container"> 
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <i class="fa fa-lock icon"></i>
                </div>
			   
                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                </div> 
            </form>	
<a href="#" id="flip_content2"><font color="Black">  Login as Client</font></a>	| <?php echo $_GET['msg'];?>		
        </div>		
        </div>		 
<div style="margin:auto;">
</div>	
	</div>
</div>



    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<script>
      // Login Page Flipbox control
var btn = document.getElementById('flip_content');
var content = document.getElementById('f1_card');
btn.onclick = function() {
  content.classList.toggle('flip');
}

var btn2 = document.getElementById('flip_content2');
var content = document.getElementById('f1_card');
btn2.onclick = function() {
  content.classList.toggle('flip');
}

jQuery(document).ready(function() {
	
	// 1 Capitalize string - convert textbox user entered text to uppercase
	jQuery('.txtuppercase').keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});
});
</script>

</body>
</html>
