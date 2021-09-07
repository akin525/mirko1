<?php include "sidebar.php"; ?>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:404.php');
    exit;
}


// Inialize session
//session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
    print "<script language='javascript'>	window.location = 'login.php';</script>";
}

//    $action= mysqli_real_escape_string($con, $_POST['action']);
//    $amount= $_POST["amount"];
$phone=$_GET["number"];
$amount=intval(mysqli_real_escape_string($con,$_GET['amount']));

{

$msg='';
$status='';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_method'])){

    $scode=rand(1111111111,9999999999); //generating random code, this will act as ticket id
    $amount=intval(mysqli_real_escape_string($con,$_POST['amount']));
    $status="OK";
    $msg="";
}
$query="SELECT * FROM  wallet WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $balance="$row[balance]";
//                        $amount=$row["balance"];
}

$query="SELECT * FROM  safe_lock WHERE username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $ba="$row[balance]";

}
//$to=intval(mysqli_real_escape_string($con,$_GET[$amount]));

$query="SELECT * FROM  users WHERE username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
    $user="$row[username]";
    $email=$row["email"];
    $fname=$row["name"];
}

if ( $balance<$amount ){
    $status="NOTOK";
    $msg=$msg."You Cant Make Purchase Above". "NGN" .$amount." from your wallet. Your wallet balance is NGN $balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";
    echo "<script>alert('".$msg."'); </script>";
}

if ($status=="OK")
{

    $query=mysqli_query($con,"update safe_lock set balance=balance+$amount where username='" . $_SESSION['username'] . "'");

    $query=mysqli_query($con,"update wallet set balance=balance-$amount where username='" . $_SESSION['username'] . "'");


    $errormsg= "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </br></strong>You have successfully paid NGN $amount for Safe Lock</div>"; //printing error if found in validation

    print "
                    <script language='javascript'>
                        window.location = 'dashboard.php';
                    </script>
                    ";

}


?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <tr>
                <?php
                $query="SELECT * FROM  paymentgateway where name='Paystack' and status=1";


                $result = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($result))
                {
                    $paystack="$row[code]";

                }

                $query="SELECT count(*) FROM  paymentgateway where name='Paystack' and status=1";

                $result = mysqli_query($con,$query);
                $row = mysqli_fetch_row($result);
                $numrows = $row[0];

                if($numrows==1) {
                    ?>
                    <!-- Single Contact List -->
                            <td>
                            <div class="contact-detail">

                                <h4><b>Paystack</b></h4>
                                <span class="form-control"><a href="#" class="__cf_email__" data-cfemail="0367626d6a666f67746a6866436b6c776e626a6f2d606c6e">NGN.<?php echo  $amount; ?> </a></span>
                            </div>
                            </td>
                            <td>
                            <div class="contact-info">

                                <button type="button" onclick="payWithPaystack()" class="btn btn-outline-primary btn-rounded"> Pay</button>
                            </div>
                            </td>
    </tr>

                        </div>
                    </div>
                <?php } ?>

                <?php $query="SELECT * FROM  paymentgateway where name='Rave' and status=1";


                $result = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($result))
                {
                    $rave="$row[code]";

                }

                $query="SELECT count(*) FROM  paymentgateway where name='Rave' and status=1";

                $result = mysqli_query($con,$query);
                $row = mysqli_fetch_row($result);
                $numrows = $row[0];

                if($numrows==1) {
                    ?>
                    <!-- Single Contact List -->
                    <tr>
                   <td>
                            <div class="contact-detail">
                                <h4><b> Flutter Wave</b></h4>
                                <span><a href="#" class="__cf_email__" data-cfemail="0367626d6a666f67746a6866436b6c776e626a6f2d606c6e">NGN.<?php echo $amount; ?> </a></span>
                            </div>
                   </td>
            <td>
                            <div class="contact-info">

                                <button type="button" class="btn btn-outline-primary btn-rounded" onClick="payWithRave()"><i class="fa fa-check"></i> Pay</button>

                            </div>
            </td>
</tr>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $query="SELECT count(*) FROM  paymentgateway where name='Bank Transfer' and status=1";

                $result = mysqli_query($con,$query);
                $row = mysqli_fetch_row($result);
                $numrows = $row[0];

                if($numrows==1) {
                    ?>

                    <!-- Single Contact List -->
                    <tr>
                    <td>
                            <div class="contact-detail">
                                <h4><b>Wallet</b></h4>
                                <span class="form-control"><a href="#" class="__cf_email__" data-cfemail="65040b0b00080017170c1111250208040c094b060a08">NGN.<?php echo $amount; ?></a></span>
                            </div>
                    </td>
                    <td>
                            <div class="contact-info">

                                <form action="wall.php" method="post">
                                    <input type="hidden" name="amount" value="<?php  print $amount; ?>">
                                    <input type="hidden" name="email" value="<?php  print $email; ?>">
                                    <input type="hidden" name="date" value="<?php  print $date; ?>">
                                    <input type="hidden" name="fname" value="<?php  print $fname; ?>">
                                    <input type="hidden" name="number" value="<?php  print $phone; ?>">
                                    <input type="hidden" name="payment_method" value="wallet">
                                    <button type="submit" class="btn btn-rounded btn-outline-info"><i class="fa fa-check"> </i> Pay From Wallet </button>

                                </form>
                            </div>
                    </td>
                    </tr>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- End All Contact List -->

            <?php } ?>

        </div>
            <!-- End All Contact List -->

        </div>
        <?php
        $scode=rand(1111111111,9999999999); //generating random code, this will act as ticket id

        ?>

        <script>
            function showDiv() {
                document.getElementById('welcomeDiv').style.display = "block";
            }
        </script>

        <script>
            function showDiv1() {
                document.getElementById('welcomeDiv1').style.display = "block";
            }
        </script>

        <script>
            function showDiv2() {
                document.getElementById('welcomeDiv2').style.display = "block";
            }
        </script>

        </form>
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script src="https://api.payant.ng/assets/js/inline.min.js"></script>
        <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"> </script>

        <?php $topay=$amount*100; ?>
        <script>
            function payWithPaystack(){
                var handler = PaystackPop.setup({
                    key: "<?php echo $paystack; ?>",
                    email: "<?php echo decryptdata($email); ?>",
                    amount: "<?php echo $topay; ?>",
                    currency: "NGN",
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    firstname: '<?php $fname; ?>',
                    // label: "Optional string that replaces customer email"
                    metadata: {
                        custom_fields: [
                            {
                                display_name: "Mobile Number",
                                variable_name: "<?php echo $phone; ?>",
                                value: "+2348012345678"
                            }
                        ]
                    },
                    callback: function(response){
                        alert('Deposit successful. transaction refference number is ' + response.reference);
                        window.location='pog.php?amount=<?php echo $amount; ?>&refid=' + response.reference+ '&email=<?php echo $email; ?>&amount=<?php echo $topay; ?>&number=<?php echo $phone; ?>&date=<?php echo $date; ?>&method=Paystack';

                    },
                    onClose: function(){
                        alert('window closed');
                    }
                });
                handler.openIframe();
            }
        </script>

        <script>
            const API_publicKey = "<?php echo $rave; ?>";

            function payWithRave() {
                var x = getpaidSetup({
                    PBFPubKey: API_publicKey,
					customer_email: "<?php echo decryptdata($email); ?>",
                    amount: "<?php echo $amount; ?>",
                    customer_phone: "<?php echo $phone; ?>",
                    currency: "NGN",
                    txref: "rave-123456",
                    meta: [{
                        metaname: "flightID",
                        metavalue: "AP1234"
                    }],
                    onclose: function() {},
                    callback: function(response) {
                        var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
                        console.log("This is the response returned after a charge", response);
                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            window.location='pog.php?amount=<?php echo $amount; ?>&refid=' + response.reference+ '&email=<?php echo $email; ?>&amount=<?php echo $topay; ?>&number=<?php echo $phone; ?>&method=Paystack';

                        } else {
                            alert("Hello! Payment Not Successfull!");
                        }

                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }
        </script>


