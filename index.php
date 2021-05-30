<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link media="all" rel="stylesheet" href="css/main.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
	<script>
		window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js" defer><\/script>')
	</script>
	<script src="js/jquery.main.js" defer></script>
	<style>

	</style>
</head>

<body>
	<div id="wrapper">
		<?php


		include_once("includes/header.php");
		?>
		<main id="main">
			<div class="banner">
				<div class="container">
					<form action="#">
						<h1>Enter your home address and find hairdressers and barbers closest to you. </h1>
						<div class="form-wrap">
							<div class="input">
								<input type="text" placeholder="Home address: Street, Ncivico, Interno.">
							</div>
							<button type="submit" class="btn">Find Service </button>
						</div>
						<p>First time on JustCut?<a href="register.php" style="position: relative; right: 14px;">Register as Client</a></p>

					</form>
					<div class="img-holder">
						<img src="images/img01.png" alt="image description">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="earn-block">
					<form action="login.php" method="POST">
						<h1>Earn money with us<br> become your own entrepreneur</h1>
						<p>Choose JustCut and work with us </p>
						<div class="form-group">
							<input type="email" placeholder="Email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" name="password" class="form-control" required>
						</div>
						<div class="form-group text-right">
							<a href="#" class="link">Need Help? </a>
						</div>
						<button type="submit" name="submit" class="btn">Login </button>

						<p class="text-center note">First time on JustCut?
							<span class="reg">
								<a href="barber_registration.php" class="link">Register as Barber</a> </span>
						</p>
					</form>

				</div>
			</div>
		</main>
		<footer id="footer">
			<div class="container">

				<div class="buttons">

					<div class="button-holder" style="position: relative;right: 670px;">
						<h5><strong class="title">Soon Out</strong></h5>
						<a href="#"><img src="images/btn-app.png" alt="app-button"></a>
						<a href="#"><img src="images/btn-play.png" alt="app-play"></a>
					</div>
				</div>
				<div>
					<a href="#"><img src="images/icon-cc.png" alt="app-button" width="150px" height="150px" style="margin-left: 470px;"></a>
				</div>
				<div class="social-area">
					<strong class="title">Follow us on </strong>
					<ul class="social-networks">
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" style="font-size:24px"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</body>

</html>