<?php include "sidebar.php";
if (isset($_REQUEST['username'])) {
	// removes backslashes
	$username = stripslashes($_REQUEST['username']);
	//escapes special characters in a string
	$username = mysqli_real_escape_string($con, $username);
	$number    = stripslashes($_REQUEST['number']);
	$number   = mysqli_real_escape_string($con, $number);
	$acct = stripslashes($_REQUEST['value']);
	$acct = mysqli_real_escape_string($con, $acct);
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($con, $name);
	$tb=$acct;
	if ($acct=="058") {
		$tb="000013";
	}
		if ($acct=="070") {
			$tb="000007";
		}
		if ($acct=="011") {
			$tb="000016";
		}
		if ($acct=="035") {
			$tb="000017";
		}

		if ($acct=="232") {
			$tb="000001";
		}
		if ($acct=="063") {
			$tb="000005";
		}
		if ($acct=="057") {
			$tb="000015";
		}
		if ($acct=="032") {
			$tb="000018";
		}
		if ($acct=="030") {
			$tb="000020";
		}

		if ($acct=="082") {
			$tb="000002";
		}
	
		if ($acct=="044") {
			$tb="000014";
		}
	
		if ($acct=="101") {
			$tb="000023";
		}

		if ($acct=="050") {
			$tb="000010";
		}

		if ($acct=="214") {
			$tb="000003";
		}
	
		if ($acct=="076") {
			$tb="000008";
		}

		if ($acct=="221") {
			$tb="000012";
		}
	
		if ($acct=="068") {
			$tb="000021";
		}
	
		if ($acct=="100") {
			$tb="000022";
		}

		if ($acct=="033") {
			$tb="000004";
		}

		if ($acct=="215") {
			$tb="000011";
		}



	//echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
	$query = ("INSERT INTO `banks` (`username`, `bank_name` ,`account_no`, `account_name`) VALUES ('$username', '$tb', '$number', '$name')");

	$result   = mysqli_query($con, $query);
	if ($result) {
		echo "<div class=l-main>
    <div class=account_top_information>
        <div class=account_overlay></div>
    <div class=payment_transfer_Wrapper float_left>
        <div class=row>
<div class=alert alert-success role=alert>
  <h4 class=alert-heading>Well done!</h4>
  <p>Aww yeah, you successfully Create a new payment Method.</p>
  <hr>
  <p class=mb-0>Click Here To View The Payment Method.<button type=submit class=btn btn-outline-primary btn-rounded><a href=view.php>View Payment Method</a></button>
</p>
</div>
</div>
</div>
";

		//        print "
		//                    <script language='javascript'>
		//                        window.location = 'my account.php';
		//                    </script>
		//                    ";

	} else {
		echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
	}
} else {

}
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/bank",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
"Authorization: Bearer sk_test_280c68e08f76233b476038f04d92896b4749eec3",
"Cache-Control: no-cache",
),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//    echo $response;
}
$data = json_decode($response, true);
$success = $data["status"];
//$tran = $data["data"];
//$tran1 = $data["data"]["name"];
//$tran2= $data["data"]["code"];
foreach ($data['data'] as $plans) {
	//    echo $plans['name'];
	//    echo $plans['code'];
}

//echo $networkcode . " ". $number;


?>

<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<!--        <div class="sv_heading_wraper heading_center">-->
				<!--                    <div class="card" style="width: 18rem;">-->
				<!--                    <div class="card-header">-->
				<!--                        Payment Method-->
				<!--                    </div>-->
				<!--                        --><?php
				//                        $code=0;
				//                        $nu=0;
				//                        $query="SELECT * FROM  banks WHERE username = '".$loggedin_session."'";
				//                        $result = mysqli_query($con,$query);
				//
				//                        while($row = mysqli_fetch_array($result))
				//                        {
				//                            $user="$row[username]";
				//                            $code=$row["bank_name"];
				//                            $nu=$row["account_no"];
				//
				//
				//                        If($code=='1'){
				//                            echo 'Access Bank';
				//                        }
				//                        if($code=='050'){
				//                            echo 'EcoBank Nigeria PLC';
				//                        }
				//                        if($code=='3'){
				//                            echo 'Fidelity Bank PLC';
				//                        }
				//                        if($code=='011'){
				//                            echo 'First Bank of Nigeria PLC';
				//                        }
				//                        if($code=='058'){
				//                            echo 'Guaranty Trust Bank PLC';
				//                        }
				//                        if($code=='6'){
				//                            echo 'Unity Bank PLC';
				//                        }
				//                        if($code=='7'){
				//                            echo 'United Bank for Africa';
				//                        }
				//                        if($code==8){
				//                            echo 'Union Bank of Nigeria PLC';
				//                        }
				//                        if($code=='232'){
				//                            echo 'Sterling Bank PLC';
				//                        }
				//                        if($code=='221'){
				//                            echo 'Stanbic IBTC Bank PLC';
				//                        }
				//                        if($code=='101'){
				//                            echo 'Providus Bank Limited';
				//                        }
				//                        if($code=='035'){
				//                            echo 'Wema Bank PLC';
				//                        }
				//                        if($code=='057'){
				//                            echo 'Zenith Bank PLC';
				//                        }
				//                        if($code=='076'){
				//                            echo 'Polaris Bank Ltd';
				//                        }
				// ?>
				<!--                    <ul class="list-group list-group-flush">-->
				<!--                        <li class="list-group-item">Bank: --><?php //echo $code; ?><!--</li>-->
				<!--                        <li class="list-group-item">Account No: --><?php //echo $nu; ?><!--</li>-->
				<!--                    </ul>-->
				<!--                        --><?php //} ?>
				<!--                </div>-->

				<h3>Payment Account</h3>
				<?php //foreach($data['data'] as $plans){
				//    echo $plans['name'];
				//    echo $plans['code'];
				//}
				// ?>
			</div>
			<center>
				<button type="submit" class="btn btn-outline-primary btn-rounded">
					<h5>You can register More than one Payment Account</h5>
					<h6>
						<b>NOTE: it has to be an account you want to make payment from</b></h6>

				</button>
			</center>
			<div class="card-body">
				<form action="method.php" method="post">
					<script>
						function shoUser()
						{
							var str= document.getElementById("tvphone1").value;
							var k= document.getElementById("value").value;

							if (str == "") {
								document.getElementById("vtv1").innerHTML = "IUC cannot be empty";
								document.getElementById("btnd1").removeAttribute("disabled");
								return;
							} else if (str.length<9) {
								document.getElementById("vtv1").innerHTML = "IUC is too short";
								document.getElementById("btnd1").removeAttribute("disabled");
								return;
							} else {
								document.getElementById("btnv1").innerText="Verify....";
								var xmlhttp = new XMLHttpRequest();
								xmlhttp.onreadystatechange = function() {
									if (this.readyState == 4 && this.status == 200) {
										document.getElementById("btnv1").innerText="Verify";
										if (this.responseText=="fail") {
											document.getElementById("vtv1").innerHTML = "Error validating IUC Number";
											document.getElementById("btnd1").setAttribute("disabled", "true");
										} else {
											document.getElementById("vtv1").innerHTML = this.responseText;
											document.getElementById("btnd1").removeAttribute("disabled");
										}
									}
								};
								xmlhttp.open("GET","verifybill.php?number="+str+"+&networkcode="+k,true);
								xmlhttp.send();
							}
						}
					</script>

					<div class="form-group">
						<label>Select Your Bank :</label>
						<select data-required="true" class="form-control" id="value" name="value" required>

							<option selected>choose Bank Name</option>
							<?php
							//foreach ($data['data'] as $plans) {
								$query="SELECT * FROM dp";
							$result = mysqli_query($con,$query);
							while($row = mysqli_fetch_array($result)){
								?>
								<option  value=<?php echo $row['bank_code']; ?>><?php echo $row['bank_name']; ?></option>
								
							<!--                                <option value="050">EcoBank Nigeria PLC</option>-->
							<!--                                <option value="3">Fidelity Bank PLC</option>-->
							<!--                                <option value="011">First Bank of Nigeria PLC</option>-->
							<!--                                <option value="058">Guaranty Trust Bank PLC</option>-->
							<!--                                <option value="6">Unity Bank PLC</option>-->
							<!--                                <option value="7">United Bank for Africa</option>-->
							<!--                                <option value="8">Union Bank of Nigeria PLC</option>-->
							<!--                                <option value="232">Sterling Bank PLC</option>-->
							<!--                                <option value="221">Stanbic IBTC Bank PLC</option>-->
							<!--                                <option value="101">Providus Bank Limited</option>-->
							<!--                                <option value="035">Wema Bank PLC</option>-->
							<!--                                <option value="057">Zenith Bank PLC</option>-->
							<!--                                <option value="076">Polaris Bank Ltd</option>-->
							<?php } ?>
						</select>
						
					</div>
					<div class="form-group">
						<label>Account Number :</label>
						<input class="form-control" type="tel" id="tvphone1" name="number">
						<button id="btnv1" type="button" onclick="shoUser()">Verify</button>
						<b class="text-success fa-bold" id="vtv1"></b>
					</div>
					<?php
					$query="SELECT * FROM  users WHERE username ='" . $_SESSION['username'] . "'";
					$result = mysqli_query($con,$query);

					while ($row = mysqli_fetch_array($result)) {
						$user="$row[username]";
					}
					?>
					<div class="change_field">
						<input type="hidden" name="username" value="<?php echo $user; ?>">
					</div>

					<div class="form-group">
						<label>Enter Verify Name</label>
						<input  type="text"  name="name" class="form-control" placeholder="Please Enter The Name Display After Very Account No" required/>
						<!--                                            <b class="text-success fa-bold" id="vtv1"></b>-->
					</div>
					<button type="submit" class="btn btn-outline-success">Add Payment Method</button>
				</form>
			</div>
		</div>
	</div>
</div>