<?php
session_start();

   include("connection.php");
   include("functions.php");

   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
	   $user_name = $_POST['user_name'];
	   $password = sha1 ( $_POST['password']);

	   if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	   {
		   //Add to database
		   $user_id = random_num(20);
           $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";

		   mysqli_query($con, $query);

		   header("Location: login-1.php");
           die;
	   }
	   else
	   {
		   echo "Prosim vnesite kaksno pravo informacijo!";
	   }
   }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Prijava</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section dark p-0 m-0 h-100 position-absolute"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
					<div class="vertical-middle">
						<div class="container py-5">
							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
								<div class="card-body" style="padding: 40px;">
									<form id="login-form" name="login-form" class="mb-0" action="signup-1.php" method="post">
										<h3>Registriraj svoj nov racun</h3>

										<div class="row">
											<div class="col-12 form-group">
												<label for="login-form-username">Uporabniško ime:</label>
												<input type="text" id="login-form-username" name="user_name" value="" class="form-control not-dark" required/>
											</div>

											<div class="col-12 form-group">
												<label for="login-form-password">Geslo:</label>
												<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" required/>
											</div>

											<div class="col-12 form-group mb-0">
												<button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="Signup">Registracija</button>
												<a href="login-1.php" class="float-end">Prijava</a>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class="text-center text-muted mt-3"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>

						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>