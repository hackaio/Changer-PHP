<!DOCTYPE html>
<html>
    <?php 
        
        // Include config file
        require_once "../connect.php";
		
	?>
	<head>
		<meta charset="UTF-8">
		<title>chenji APP</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- CSRF Token -->
		<meta name="csrf-token" content="dTxijccgdp1ROiXjn5QWcbwKt8otfRf8X1IqyPl6">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../css/ionicons.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
		<!-- DatePicker -->
		<link rel="stylesheet" href="../datepicker/css/bootstrap-datepicker.min.css">
		<!-- Multple select -->
		<link rel="stylesheet" href="../css/bootstrap-select.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../css/AdminLTE.min.css">
		<link rel="stylesheet" href="../css/_all-skins.min.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/customer.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="icon" href="../images/favicon.png">
		<!-- Image upload -->
		<link rel="stylesheet" type="text/css" href="../assets/css/loadimg.min.css">
		<link rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition skin-blue fixed sidebar-mini">
		<div class="wrapper">
			<!-- Main Header -->
			<!-- Main Header -->
			<header class="main-header">
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					</a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- The user image in the navbar-->
									<img src="../images/logo.png" class="user-image" alt="User Image" style="margin:auto;"/>
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									&nbsp;&nbsp;<span class="hidden-xs"><?php echo $fname ?> <?php echo $lname ?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img src="../images/favicon.png" class="img-circle" alt="User Image">
										<p>
											<?php echo $fname ?> <?php echo $lname ?> <br><br>
											<small>Member since <?php echo $date ?></small>
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a class="btn btn-default btn-flat" href="#" data-toggle="modal" data-target="#modal-defaultPass">Change Password</a>
										</div>
										<div class="pull-right">
											<a href="../logout.php" class="btn btn-default btn-flat">
											Sign out
											</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="logo-panel">
						<div class="image">
							<img src="../images/logo.png">
						</div>
					</div>
					<!-- Sidebar Menu -->
					<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li class="">
						<a href="<?php echo "index.php";?>"><i class="fa fa-home"></i> <span>Nyumbani</span></a>
					</li>
					<li class="">
						<a href="<?php echo "omba.php";?>"><i class="fa fa-phone"></i> <span>Omba Chenji</span></a>
					</li>
					
					<li class="">
						<a href="<?php echo "profile.php";?>"><i class="fa fa-user"></i> <span>Akaunti</span></a>
					</li>
					
					<!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<section class="content-header">
					<h1 class="pull-left">	Miamala Yangu</h1>
					<!--h1 class="pull-right">
						<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="#">Cancel</a>
					</h1-->
				</section>
				<div class="content">
					<div class="clearfix"></div>
					<div class="box box-primary">
						<div class="box-body">
                        <table class="table table-responsive" id="sms-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>KIASI</th>
                                    <th>COST</th>
                                    <th>JUMLA</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $sql = "select  * from chenji_ledger ";
                                    if($stmt = mysqli_prepare($link, $sql)){
                                    
                                        $result = mysqli_query($link, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {?>
                                        <tr>
                                           <td><?php echo $row["id"];?></td>
                                           <td><?php echo $row["total_change"];?></td>
                                           <td><?php echo $row["commision"];?></td>
                                           <td><?php echo $row["total_amount"];?></td>
                                           <td><?php echo $row["status"];?></td>
                                        </tr>
                                           <?php
                                        }
                                        } else {
                                        echo "0 results";
                                        }

                                    } else{
                                        echo "Oops! Something went wrong. Please try again later.";
                                    }

                                    // Close statement
                                    mysqli_stmt_close($stmt);

                                    ?>
                            </tbody>
                        </table>    


						</div>
					</div>
				</div>
			</div>
			<!-- Main Footer -->
			<footer class="main-footer">
				<?php require('../footer.php'); ?>
			</footer>
		</div>
		<!-- jQuery 3.1.1 -->
		<script src="../js/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="../js/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="../js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="../js/jquery.dataTables.min.js"></script>
		<script src="../js/dataTables.bootstrap.min.js"></script>
		<!-- DatePicker -->
		<script src="../datepicker/js/bootstrap-datepicker.min.js"></script>
		<!-- Multiple Select -->
		<script src="../js/bootstrap-select.js"></script>
		<!-- AdminLTE App -->
		<script src="../js/adminlte.min.js"></script>
		<!-- Customer js -->
		<script src="../js/customer.js"></script>
		<!-- Customer js -->
		<script src="../js/bootstrap3-typeahead.min.js"></script>
		<script>
			//Date picker
			$('#datepicker').datepicker({
			    autoclose: true
			})
			$('#datepicker2').datepicker({
			    autoclose: true
			})
			$('#datepicker3').datepicker({
			    autoclose: true
			})
		</script>
	</body>
</html>