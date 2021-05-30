<?php 


	if(session_id() == ''){ session_start(); }
	if(isset($_SESSION['user_email'])){
		if($_SESSION['user_type'] == 2){
			header("location: barber_panel.php");
		}else{
			header("location: index.php");
		}
		
	}else{
		session_destroy();
	}

	include_once("includes/db_connection.php");
	require_once("database/PDO.class.php");
	$DB = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);

	if(isset($_POST['submit'])){
		
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$bankName = $_POST['bankName'];
		$accountTitle = $_POST['accountTitle'];
		$ibanNumber = $_POST['ibanNumber'];
		$postalCode = $_POST['postalCode'];
		$fiscalCode = $_POST['fiscalCode'];
		$phone = $_POST['phone'];
		$email = strtolower(trim($_POST['email']));
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
		// $userid = $_POST['userid'];

		$getEmail = $DB->query("SELECT email FROM users WHERE email=?", array($email));
		if($getEmail == null){
			$registerUser = $DB->query("INSERT INTO `users`(`email`, `password`, `name`, `usertype`) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE status = 1", array($email, $password, $name, $usertype));//Parameters must be ordered

			$getUser = $DB->query("SELECT userid FROM users WHERE email=?", array($email));

			if ($getUser != null ) {
				$userid = $getUser[0]['userid'];
				
				// uploading cover photo
				$user_id_cards_dir = "images/id_cards/";
				if (!empty($_FILES["identity_card"]["name"])) {
					$id_card_file = $user_id_cards_dir . basename($email ."_". $_FILES["identity_card"]["name"]);
					if (move_uploaded_file($_FILES["identity_card"]["tmp_name"], $id_card_file)) {
						$identity_card = $email ."_". $_FILES["identity_card"]["name"];
					}else{
						echo "couldn't upload, might be permission issue!";
					}
				}
				$addBarber = $DB->query("INSERT IGNORE INTO `barber`(`surname`, `dob`, `identity_card`, `userid`) VALUES (?, ?, ?, ?)", array($surname, $dob, $identity_card, $userid));//Parameters must be ordered
				$addBankAccount = $DB->query("INSERT IGNORE INTO `bankAccount`(`bankName`, `accountTitle`, `ibanNumber`, `userid`) VALUES (?, ?, ?, ?)", array($bankName, $accountTitle, $ibanNumber, $userid));//Parameters must be ordered
				$addAddress = $DB->query("INSERT IGNORE INTO `address`(`address`, `city`, `postalCode`, `fiscalCode`, `phone`, `userid`) VALUES (?, ?, ?, ?, ?, ?)", array($address, $city, $postalCode, $fiscalCode, $phone, $userid));//Parameters must be ordered
				header("location: login.php");
			}
		}
	}

?>
<!-- name surname dob address city postal_code fiscal_code identity_card phone email password -->
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include_once("includes/head.php") ?>
</head>

<body class="has-bg">
	<div id="wrapper">

		<?php include_once("includes/header.php") ?>

		<main id="main">
			<div class="container two-cols single">
				<div class="right-col">
					<div class="content-holder inner register service-date">

						<form method="POST" action="barber_registration.php"  enctype="multipart/form-data" id="registrationForm">
							<h2>Professional Registration</h2>
							<div class="input">
								<label for="name">Name</label>
								<div class="input-holder">
									<input type="text" name="name" id="name" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="Surname">Surname</label>
								<div class="input-holder">
									<input type="text" name="surname" id="surname" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="dob">Date of Birth</label>
								<div class="input-holder">
									<input type="date" name="dob" id="dob" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="address">Address</label>
								<div class="input-holder">
									<input type="text" id="address" name="address" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="city">City</label>
								<div class="input-holder">
									<input type="text" id="city" name="city" class="input-control">
								</div>
							</div>

							<div class="input">
								<label for="city">Bank name</label>
								<div class="input-holder">
									<input type="text" id="bankName" name="bankName" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="city">Account title</label>
								<div class="input-holder">
									<input type="text" id="accountTitle" name="accountTitle" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="city">IBAN number</label>
								<div class="input-holder">
									<input type="text" id="ibanNumber" name="ibanNumber" class="input-control">
								</div>
							</div>

							<div class="input">
								<label for="postal_code">Postal Code</label>
								<div class="input-holder">
									<input type="number" id="postal_code" name="postalCode" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="fiscalCode">Fiscal Code</label>
								<div class="input-holder">
									<input type="text" id="fiscal_code" name="fiscalCode" class="input-control full">
								</div>
							</div>
							<div class="input">
								<label for="id_card">Identity Card</label>
								<div class="input-holder">
									<div class="file-holder">
										<input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" id="id_card" name="identity_card">
										<label class="plus" for="id_card"></label>
									</div>
								</div>
							</div>
							<div class="input">
								<label for="phone">Phone</label>
								<div class="input-holder">
									<input type="number" id="phone" name="phone" class="input-control">
								</div>
							</div>
							<div class="input">
								<label for="email">Email</label>
								<div class="input-holder">
									<input type="email" id="email" name="email" class="input-control full">
								</div>
							</div>
							<div class="input">
								<label for>Password</label>
								<div class="input-holder">
									<input type="password" id="password" name="password" class="input-control full">
								</div>
							</div>
							<div class="input">
								<label for="cpassword">Confirm Password</label>
								<div class="input-holder">
									<input type="password" id="cpassword" name="cpassword" class="input-control full">
								</div>
							</div>
							<div class="input new-input">
								<div class="col-holder">
									<label for="parlour">
										<input type="radio" id="parlour" name="usertype" value="3">
										<span class="checkmark"></span>
										Parlour
									</label>
								</div>
								
								<div class="col-holder">
									<label for="barber">
										<input type="radio" id="barber" name="usertype" value="2">
										<span class="checkmark"></span>
										Barber
									</label>
								</div>
							</div>
							
							<div class="input">
								<label for="accept" class="checkbox-holder accetta">
									<input type="checkbox" id="accept" name="accept">
									<span class="checkmark"></span>
									Accept the terms of service <a href="#">Read the agreement.</a>
								</label>
							</div>

							<div class="input">
								<button type="submit" name="submit" class="btn">Continue</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>



	<script src="js/jquery-3.3.1.min.js"></script>
	
	<script src="js/jquery.validate.min.js"></script>


	<script>
		
		$("#registrationForm").validate({
			rules: {
				name: {
					required: true, 
				},
				surname: {
					required: true,
				},
				dob: {
					required: true,
				},
				address: {
					required: true,
				},
				city: {
					required: true,
				},
				postalCode: {
					required: true,
				},
				fiscalCode: {
					required: true,
				},
				identity_card: {
					required: true,
				},
				phone: {
					required: true,
				},

				email: {
					required: true,
					remote: {
						url: "includes/ajax_functions.php",
						type: "post",
						data: {
							functionName: "check_user_email",
							email: function() {
								return $("input[name=\"email\"]").val()
							}
						}
					}
				},
				password: {
					required: true,
					remote: {
						url: "includes/ajax_functions.php",
						type: "post",
						data: {
							functionName: "check_password_strength",
							newPassword: function() {
								return $("#password").val()
							}
						}
					}
				},
				cpassword: {
					required: true,
					equalTo: "#password"
				},

				usertype:{
					required: true,
				},

				bankName:{
					required: true,
				},
				accountTitle:{
					required: true,
				},
				ibanNumber:{
					required: true,
				}

				  

			},
			messages: {

				name: {
					required: "Please enter your name"
				},
				surname: {
					required: "Please enter your surname"
				},
				dob: {
					required: "Please enter your date of birth"
				},
				address: {
					required: "Please enter your address"
				},
				city: {
					required: "Please enter your city"
				},
				postalCode: {
					required: "Please enter your postal code"
				},
				fiscalCode: {
					required: "Please enter your Fiscal Code"
				},
				identity_card: {
					required: "Please upload your Identity Card"
				},
				phone: {
					required: "Please enter your phone"
				},


				email: {
					required: "Please enter your email",
					email: "Invalid Email"
				},

				password: {
					required: "Please enter your password"
				},
				cpassword: {
					required: "Please confirm your password",
					equalTo: "Password does not match"
				},
				  
				 bankName: {
					required: "Please enter bank name"
				},
				accountTitle: {
					required: "Please enter account title"
				},
				ibanNumber: {
					required: "Please enter IBAN number"
				},

			},

			errorPlacement: function(error, element) {

				error.insertAfter(element);

			},

			errorElement: "div"
		})
	</script>
</body>

</html>