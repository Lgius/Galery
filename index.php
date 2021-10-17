<?php
session_start();

   include("connection.php");
   include("functions.php");

   $user_data = check_login($con);


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
	<title>Galerija</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
    <?php require("header.php")?>
		<section id="slider" class="slider-element slider-parallax include-header min-vh-100" style="background: url('images/landing1.jpg') no-repeat; background-size: cover">
			<div class="slider-inner">

				<div class="vertical-middle slider-element-fade">
					<div class="container dark text-center">

						<div class="heading-block mb-0 center">
							<h1>
								<span class="text-rotater nocolor" data-separator="|" data-rotate="flipInX" data-speed="3500">
								</span>
							</h1>
						</div>

						<div class="gallery-container">
						 <?php	
						 include_once 'includes/dbh.inc.php';

						 $sql = "SELECT * FROM slike ORDER BY vrsta DESC";
						 $stmt = mysqli_stmt_init($conn);
						 if(!mysqli_stmt_prepare($stmt, $sql))
						 {
							echo "SQL statement failed!";
						 }
						 else
						 {
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);

							while ($row = mysqli_fetch_assoc($result))
							{
								echo '<a href="#">
				           		<div style="background-image: url(images/Galerija/'.$row["pot_slike"].');"></div>
				           		<h3>'.$row["naslov"].'</h3>
				           		<p>'.$row["opis"].'</p>
				         		</a>';
							}
						 }
						 ?>
			       	    </div>

						<div class="gallery-upload">
						  <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
						    <input type="text" name="filename" placeholder="Ime slike...">
							<input type="text" name="filetitle" placeholder="Naslov slike...">
							<input type="text" name="filedesc" placeholder="Opis slike...">
							<input data-required="image" type="file" name="file" id="file_upload" class="image-input" data-traget-resolution="image_resolution" value="">
							<button type="submit" name="submit">NALOZI</button>
						  </form>
						</div>     

					</div>
				</div>

			</div>
		</section>
</body>
</html>