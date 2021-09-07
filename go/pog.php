<?php include_once("../include/session.php");
if (!isset($_SESSION['username'])) {
    print "
<script language='javascript'>
    window.location = 'login.php';
</script>
";
}
$topay= intval(mysqli_real_escape_string($con,$_GET["amount"]));
$refid= mysqli_real_escape_string($con,$_GET["refid"]);
$email=mysqli_real_escape_string($con,$_GET['email']);
$phone=mysqli_real_escape_string($con,$_GET['number']);
//$GLOBALS['recipient']=mysqli_real_escape_string($con,$_GET['number']);
$GLOBALS['method']=mysqli_real_escape_string($con,$_GET['method']);
$date= mysqli_real_escape_string($con,$_GET["date"]);
//    $date=$_POST['date'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$refid",
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
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0)

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
//    echo $response;
}
$data=json_decode($response, true);
$amount=$data["data"]["amount"]/100;
$auth=$data["data"]["authorization"]["authorization_code"];

$query="SELECT * FROM users where username = '".$_SESSION['username']."'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $depositor="$row[username]";
    $email="$row[email]";
    $name="$row[name]";
}

$query="SELECT * FROM  wallet WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $ubalance=$row["balance"];
}

$fwallet=$ubalance+$amount;





//$query=mysqli_query($con,"insert into deposit (status, username, amount, payment_ref,  iwallet, fwallet, date) values (1,'$depositor', '$amount', '$fid', '$ubalance', '$fwallet', CURRENT_TIMESTAMP)");
//$result=mysqli_query($con,"update  safe_lock set balance=balancd+$topay where username='".$loggedin_session."'");
$query=mysqli_query($con,"update safe_lock set balance=balance+$amount where username='" . $_SESSION['username'] . "'");

//    $query=mysqli_query($con,"update wallet set balance=balance+$topay where username='".$loggedin_session."'");

$query="SELECT * FROM deposit where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $depositor=$row["amount"];
    $iwallet=$row["iwallet"];

}
echo "<script language='javascript'>
let message = '$topay Is Being Add To Safelock';
                                    alert(message);
window.location = 'dashboard.php';</script>";
?>



