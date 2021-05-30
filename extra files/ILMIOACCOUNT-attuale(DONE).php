<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project Title</title>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link media="all" rel="stylesheet" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js" defer><\/script>')</script>
	<script src="js/jquery.main.js" defer></script>
</head>
<body class="has-bg">
	<div id="wrapper">
		<header id="header" class="gradient">
			<div class="container">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="Just Cut"></a>
				</div>
				<a href="#" class="nav-opener"><span></span></a>
				<nav class="main-nav">
					<ul>
						<li class="has-drop"><a href="#" class="drop-opener">Ciao Mario</a>
							<ul class="dropdown">
								<li><a href="#">Account</a></li>
								<li><a href="#">Servizi effettuati </a></li>
								<li><a href="#">Servizi prenotati </a></li>
								<li><a href="#">Indirizzi di servizio   </a></li>
								<li><a href="#">Metodi di pagamento</a></li>
								<li><a href="#">Esci </a></li>
							</ul>
						</li>
						<li><a href="#">Chi siamo ?</a></li>
						<li><a href="#">Aiuto e Contatti   </a></li>
					</ul>
				</nav>
			</div>
		</header>
		<main id="main">
			<div class="container two-cols">
				<div class="left-col">
					<h2><a href="#" class="account-opener">Account</a> </h2>
					<ul class="account-info slide">
						<li><a href="#">Servizi effettuati </a></li>
						<li><a href="#">Servizi prenotati </a></li>
						<li><a href="#">Indirizzi di servizio   </a></li>
						<li><a href="#">Metodi di pagamento</a></li>
					</ul>
				</div>
				<div class="right-col">
					<div class="content-holder">
						<h2>Il mio Account </h2>
						<div class="input">
							<label for="Nome">Nome</label>
							<div class="input-holder">
								<input type="text" placeholder="Mario" id="Nome" class="input-control">
							</div>
						</div>
						<div class="input">
							<label for="Email">Email</label>
							<div class="input-holder">
								<input type="text" placeholder="Mario.rossi,@gmail.com " id="Email" class="input-control">
							</div>
						</div>
						<div class="input">
							<label for="Cellulare">Cellulare</label>
							<div class="input-holder">
								<input type="text" placeholder="332568974" id="Cellulare" class="input-control">
							</div>
						</div>
						<div class="input">
							<label for="Password">Password</label>
							<div class="input-holder password">
								<input type="password" placeholder="Enter Password" value="password" id="password" class="input-control password">
								<a href="#">Modifica password</a>
							</div>
						</div>
						<div class="input">
							<button type="submit" class="btn">Salva modifiche</button>
						</div>
						<div class="input">
							<p>Desideri eliminare il tuo account Just Cut ? <br> <a href="#" class="link">Elimina il mio account</a> </p>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
</html>
