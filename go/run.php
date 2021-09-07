<?php include_once("../include/database.php");
// Check, if username session is NOT set then this page will jump to login page



if ($json = json_decode(file_get_contents("php://input"), true)) {
	// 	print_r($json['transactionReference']);
	$data = $json;

}
$paid=$data["paymentStatus"];
$refid=$data["paymentReference"];
$acct=strtolower($data["accountDetails"]["accountName"]);
$bank=$data["accountDetails"]["bankCode"];
$amount=$data["accountDetails"]["amountPaid"];
$no=$data["accountDetails"]["accountNumber"];
//  echo $amount;
// echo $bank;
// echo $no;
$fwallet=$ubalance+$amount;

$query="SELECT * FROM banks where account_name ='$acct'";
$result = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result)) {
	$ubank="$row[bank_name]";
	$account="$row[account_no]";
	$username="$row[username]";
	$name=strtolower($row["account_name"]);
}
if ($acct==$name||$ubank==$bank) {
	$query="SELECT * FROM deposit";
	$result = mysqli_query($con,$query);
	while ($row = mysqli_fetch_array($result)) {
		$d=$row["payment_ref"];

	}
	if ($d==$refid) {
		echo "payment refid the same";
	} else {

		$query=mysqli_query($con,"insert into deposit (status, username, amount, payment_ref,  iwallet, fwallet, date) values (1,'$username', '$amount', '$refid', '$ubalance', '$fwallet', CURRENT_TIMESTAMP)");
		echo $query;
		$result=mysqli_query($con,"update wallet set balance=balance+$amount WHERE username='$username'");
		$query="SELECT * FROM deposit where username ='$username'";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) {
			$depositor=$row["amount"];
			$iwallet=$row["iwallet"];

		}
		$query="SELECT * FROM users where username = '$username'";
		$result = mysqli_query($con,$query);
		while ($row = mysqli_fetch_array($result)) {
			$username = $row["username"];
			$name = $row["name"];
			$email = $row["email"];
		}
	}

}

$mail= "info@efemobilemoney.com";
$to = decryptdata($email);
$from = $mail;

$headers = "From: $from";
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "From EFE MOBILE MONEY.";

$logo = '<img src="public/images/logo/logo.png" alt="logo">';
$link = '#';

$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
$body .= "<p style='border:none;'><strong>Wallet Summary<strong>";
$body .= "<p style='border:none;'><strong>Name:</strong> {$name}</p>";
$body .="<div class=card float_left>";
$body .= " <tr>
                                                <td class=invest_td1>Tansaction Id</td>
                                            </tr>
                                            </tbody>wallet ";
$body .= "<tbody>
                                            <tr>
                                                <td class=invest_td1>Early Payments</td>
                                                <td class=invest_td1>: NGN {$amount}</td>
                                            </tr>";
$body .= "<tr>
                                                <td class=invest_td1>Matured Deposit</td>
                                                <td class=invest_td1>: NGN{$iwallet}</td>
                                            </tr>";
$body .= " <tr>
                                                <td class=invest_td1>Released Deposit</td>

                                                <td class=invest_td1>: NGN{$fwallet}</td>
                                            </tr>
                                            </tbody>wallet ";
$body .= "</tr>";
// 	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
$body .= "<tr><td></td></tr>";
//$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

$send = mail($to, $subject, $body, $headers);

?>