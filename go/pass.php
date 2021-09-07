<?php include "sidebar.php"; ?>
<div class="row ">
<div class="col-12 grid-margin">
<div class="card">
	<div class="card-body">
		<h4 class="theme-cl">Update Password</h4>
		<?php
		$status = "OK";
		$msg=$password ="";

		if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {


			// Collect the data from post method of form submission //
			$cpass=mysqli_real_escape_string($con,$_POST['cpass']);
			//                                    $cpass = md5($cpass);
			$ccpass=mysqli_real_escape_string($con,$_POST['ccpass']);

			$password=mysqli_real_escape_string($con,$_POST['password']);
			//                                    $password = md5($password);

			$confirm_password=mysqli_real_escape_string($con,$_POST['confirm_password']);
			//                                    $confirm_password =('confirm_password');
			//collection ends

			if ($password!="") {

				if ( $ccpass!==$cpass) {
					$msg=$msg."Current Password Is Wrong.<BR>";
					$status= "NOTOK";}

				if ( $password <> $confirm_password ) {
					$msg=$msg."New Password And Confirm Password Are Not Matching.<BR>";
					$status= "NOTOK";}

				if ( strlen($password) < 8 ) {
					$msg=$msg."Password Must Be More Than 8 Char Length.<BR>";
					$status= "NOTOK";}

				//validation starts
				// if userid is less than 6 char then status is not ok
			}

			if ($status=="OK") {
				$query=mysqli_query($con,"update users set password='$password'  where username='" . $_SESSION['username'] . "'");

				$errormsg= "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your password has been updated</div>"; //printing error if found in validation

			}
			if ($status=="NOTOK") {

				$errormsg= "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Please Fix The Errors Below : </br></strong>".$msg."</div>"; //printing error if found in validation

			}

		}//end checking password empty

		$query="SELECT * FROM  users WHERE username='" . $_SESSION['username'] . "'";


		$result = mysqli_query($con,$query);
		$i=0;
		while ($row = mysqli_fetch_array($result)) {

			$password="$row[password]";
			$email=$row["email"];
			$n="$row[name]";

		}

		$query="SELECT * FROM  users WHERE username='" . $_SESSION['username'] . "'";
		$result = mysqli_query($con,$query);
		$i=0;
		while ($row = mysqli_fetch_array($result)) {

			$pass="$row[password]";
		}


		$mail= "info@efemobilemoney.com";
		$to = decryptdata($email);
		$from = $mail;
		$name = $n;
		//$subject = $_REQUEST['subject'];
		//$number = $_REQUEST['phone_no'];
		//$cmessage = $_REQUEST['message'];

		$headers = "From: $from";
		$headers = "From: " . $from . "\r\n";
		$headers .= "Reply-To: ". $from . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$subject = "From Efemobilemoney";

		$logo = '<img src=images/logo.png alt=logo>';
		$link = '#';

		$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
		$body .= "<table style='width: 100%;'>";
		$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
		$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
		$body .= "<p style='border:none;'><strong>Password Update<strong>";
		$body .= "<p style='border:none;'><strong>Your Password has been Change Successful. </strong> New Password: {$password} </p>";
		//        $body .= "<p style='border:none;'><strong>Kindly Update Your Password after Log-in Your Profile</strong></p>";
		//$body .= "<p style='border:none;'><strong>Password:</strong> {$password}</p>";
		//$body .= "<p style='border:none;'><strong>Wallet Balance:</strong>#0.00</p>";
		$body .= "</tr>";
		// 	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
		$body .= "<tr><td></td></tr>";
		//$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
		$body .= "</tbody></table>";
		$body .= "</body></html>";

		$send = mail($to, $subject, $body, $headers);
		?>

		<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">

		<div class="row">


			<div class="col-md-12">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!="")) {
					print $errormsg;
				}
				?>
				<div class="form-group">
					<label>Enter Current Password</label>
					<input type="password" class="form-control" id="email" name="cpass" placeholder="Current Password" required />

					<input type="hidden" class="form-control" value="<?php echo $pass; ?>" id="email" name="ccpass" placeholder="Current Password"/>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<div class="form-group">
					<label>Enter New Password</label>
					<input type="text" name="password" class="form-control" value="" required>
				</div>
			</div>

			<div class="col-md-6 col-12">
				<div class="form-group">
					<label>Confirm New Password</label>
					<input type="text" name="confirm_password" class="form-control" value="">
				</div>
			</div>
		</div>

	</div>



	<div class="col-md-12">
		<div class="form-group">
			<br>
			<button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Account</button>
			</form>
		</div>
	</div>
</div>

