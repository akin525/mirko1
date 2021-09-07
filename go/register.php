<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Corona Admin</title>
		<!-- plugins:css -->
		<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
		<!-- endinject -->
		<!-- Plugin css for this page -->
		<!-- End plugin css for this page -->
		<!-- inject:css -->
		<!-- endinject -->
		<!-- Layout styles -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- End layout styles -->
		<link rel="shortcut icon" href="assets/images/logo2.png" />
	</head>
	<?php
	echo "";
	if ( ! ini_get('date.timezone') ) {
		date_default_timezone_set('GMT');
	}
	
	include("../include/database.php");
	//session_start();
	if (isset($_GET['refer'])) {


		$id=$_GET['refer'];
	}else{
		$id="";
	}
	$sql="SELECT maintain FROM  settings WHERE sno=0";
	if ($result = mysqli_query($con, $sql)) {

	/* fetch associative array */
		while ($row = mysqli_fetch_row($result)) {
			$main= $row[0];
		}
		if ($main==2 || $main==3) {
			print "<script language='javascript'>window.location = '404.php';</script>";
		}

	}

	$query="SELECT * FROM settings";


	$result = mysqli_query($con,$query);

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
		// Collect the data from post method of form submission //
		$name = encryptdata(mysqli_real_escape_string($con, $_POST['name']));
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$password2 = mysqli_real_escape_string($con, $_POST['password2']);
		$email = encryptdata(mysqli_real_escape_string($con, $_POST['email']));
		//    $address = mysqli_real_escape_string($con, $_POST['address']);
		//    $phone = mysqli_real_escape_string($con, $_POST['phone']);
		$username = encryptdata(mysqli_real_escape_string($con, $_POST['username']));
		$refer=encryptdata(mysqli_real_escape_string($con, $_POST['refer']));
		$mail= "info@efemobilemoney.com";
		$status = "OK";
		$msg = "";
		//validation starts
		// if userid is less than 6 char then status is not ok

		if (!isset($username) or strlen($username) < 6) {
			$msg = $msg . "Username Should Contain Minimum 6 CHARACTERS.<br />";
			$status = "NOTOK";
		}

		if (!ctype_alnum($username)) {
			$msg = $msg . "Username Should Contain Alphanumeric Chars Only.<br />";
			$status = "NOTOK";
		}

		$remail = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE email = '$email'");
		$re = mysqli_fetch_row($remail);
		$nremail = $re[0];
		if ($nremail == 1) {
			$msg = $msg  .  "E-Mail Id Already Registered. Please try another one<br />";
			$status = "NOTOK";
		}

		if (strlen($password) < 8) {
			$msg = $msg . "Password Must Be More Than 8 CHARACTERS Length.<br />";
			$status = "NOTOK";
		}

		if (strlen($email) < 1) {
			$msg = $msg . "Please Enter Your Email Id.<br />";
			$status = "NOTOK";
		}

		if ($password <> $password2) {
			$msg = $msg . "Both Passwords Are Not Matching.<br />";
			$status = "NOTOK";
		}
		$sql = "SELECT username FROM users WHERE username='{$username}'";
		$result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
		if (mysqli_num_rows($result) > 0) {
			$msg = $msg . "user id already Registered. please try another one<br />";
			$status = "NOTOK";
		}
		//Test if it is a shared client
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
			//Is it a proxy address
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		//The value of $ip at this point would look something like: "192.0.34.166"
		//$ip = ip2long($ip);
		//The $ip would now look something like: 1073732954
		$token = bin2hex(openssl_random_pseudo_bytes(32));
		if ($status == "OK") {
			//echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
			mysqli_query($con, "INSERT INTO `users` (`username`, `email` ,`password`, `name`, `phone`, `address`) VALUES ('$username', '$email', '$password', '$name', 'update your profile', 'update your profile')");
			mysqli_query($con,"insert into wallet(username,balance) values('$username',0)");

				mysqli_query($con,"INSERT INTO referal (`username`, `newuserid`, amount) value ('$refer', '$username', 100)");
	
			// More headers
			//        $headers = "MIME-Version: 1.0" . "\r\n";
			//        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			//        $headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
			//        $to=$email;
			//        $subject="Account creation on ".$wname;
			//        $message = "Dear $name! <br /><p>Welcome to $wname your one stop mobile app for purchase of data subscription. <br/><br/> We are pleased that you have signed up on this service. <br/><br/>If you have any enquiries while using this service, please contact us at $wmail or call/whatsapp $wphone. <br/><br/>We are excited to have you onboard. <br/> Once again, welcome to $wname. <br/> Your account has been created with the details below. <br /> Username: $username <br /> Password: $password2. </p><br/>$wname <br /> https://".$wlink."<br/>Copyright (c)".date('Y')." . All rights reserved.";

			//mail($to,$subject,$message,$headers);




			$to = decryptdata($email);
			$from = $mail;
			$name = $_REQUEST['name'];
			$subject = $_REQUEST['subject'];
			$number = $_REQUEST['phone_no'];
			$cmessage = $_REQUEST['message'];

			$headers = "From: $from";
			$headers = "From: " . $from . "\r\n";
			$headers .= "Reply-To: ". $from . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$subject = "From EFE MOBILE MONEY.";

			$logo = '<img src="public/images/logo/logo.png" alt="logo">';
			$link = '#';

			$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
			$body .= "<div id=container>";
			$body .= "<div class=product-details>";
			$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
			$body .= "<h1><strong>Thanks For Signing Up, This Are Your Details Below</strong></h1>";
			$bd=decryptdata($name);
			$body .= "<p><strong>Name:</strong> {$bd}</p>";
			$body .= "<p><strong>Email:</strong> {$to}</p>";
			$body .= "<p><strong>Password:</strong> {$password}</p>";
			$body .= "<p><strong>Wallet Balance:</strong>#0.00</p>";
			$body .= "</tr>";
			// 	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
			$body .= "</div>";
			$body .= "<div id=container>{$cmessage}</div>";
			$body .= "</tbody></table>";
			$body .= "</body></html>";

			$send = mail($to, $subject, $body, $headers);
			$suss= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Account Registration successful : </br></strong>A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox. $password</div>";
			//printing error if found in validation
			//print "
				//<script language='javascript'>
//window.location = 'login.php';
//</script>
//";
		} else {
			$errormsg= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
		}
	}
	?>
	<body>
		<div class="container-scroller">
			<div class="container-fluid page-body-wrapper full-page-wrapper">
				<div class="row w-100 m-0">
					<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
						<div class="card col-lg-4 mx-auto">
							<div class="card-body px-5 py-5">
								<center>
									<?php
									if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK")) {
										print $errormsg;

									}
									?>

									<?php
									if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="OK")) {
										print $suss;

									}
									?>
									<button type="button" class="btn btn-outline-success">
										<a href="../index.php">Back To Homepage</a> </button>
								</center>
								<h3 class="card-title text-left mb-3">Register</h3>
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"method="post">
									<div class="form-group">
										<label>Full Name</label>
										<input type="text" name="name" class="form-control p_input" required/>
									</div>
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" class="form-control p_input" required/>
										<input type="hidden" name="refer" value="<?php echo $id; ?>"/>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" class="form-control p_input" required/>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control p_input" required/>
									</div>
									<div class="form-group">
										<label>Confirmed Password</label>
										<input type="password" name="password2" class="form-control p_input" required/>
									</div>
									<div class="form-group d-flex align-items-center justify-content-between">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input"> Remember me </label>
										</div>
										<a href="#" class="forgot-pass">Forgot password</a>
									</div>
									<div class="text-center">
										<button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
									</div>
									<!--                            <div class="d-flex">-->
									<!--                                <button class="btn btn-facebook col mr-2">-->
									<!--                                    <i class="mdi mdi-facebook"></i> Facebook </button>-->
									<!--                                <button class="btn btn-google col">-->
									<!--                                    <i class="mdi mdi-google-plus"></i> Google plus </button>-->
									<!--                            </div>-->
									<p class="sign-up text-center">Already have an Account?
										<a href="login.php"> Log-in</a></p>
									<p class="terms">By creating an account you are accepting our
										<a href="#"> Terms & Conditions</a></p>
								</form>
							</div>
						</div>
					</div>
					<!-- content-wrapper ends -->
				</div>
				<!-- row ends -->
			</div>
			<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->
		<!-- plugins:js -->
		<script src="assets/vendors/js/vendor.bundle.base.js"> </script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="assets/js/off-canvas.js"> </script>
		<script src="assets/js/hoverable-collapse.js"> </script>
		<script src="assets/js/misc.js"> </script>
		<script src="assets/js/settings.js"> </script>
		<script src="assets/js/todolist.js"> </script>
		<!-- endinject -->
	</body>
</html>