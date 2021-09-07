<?php include "sidebar.php";

require("classes/block_io.php");
require("classes/gateway.php");

$query="SELECT * FROM users where username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) {
    $date = $row["date"];
    $username=$row["username"];
    $name=$row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
}
?>

<div class="card">
    <div class="card-body">
        <div class="row page-breadcrumbs">
            <div class="col-md-5 align-self-center">
                <h4 class="theme-cl">Select Payment Gateway</h4>
            </div>


        </div>
        <!-- Title & Breadcrumbs-->


        <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST')

            $amount=intval(mysqli_real_escape_string($con,$_POST['amount']));
        $product=mysqli_real_escape_string($con,$_POST['product']);
        $productid=mysqli_real_escape_string($con,$_POST['productid']);
        $number=mysqli_real_escape_string($con,$_POST['number']);
        {

        $msg='';
        $status='';
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_method'])){

            $scode=rand(1111111111,9999999999); //generating random code, this will act as ticket id
            $amount=intval(mysqli_real_escape_string($con,$_POST['amount']));
            $title=mysqli_real_escape_string($con,$_POST['product']);
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

        $query="SELECT * FROM  users WHERE username ='" . $_SESSION['username'] . "'";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($result))
        {
            $user="$row[username]";
        }

        if ( $balance<$amount ){
            $status="NOTOK";
            $msg=$msg."You Cant Make Purchase Above". "NGN" .$amount." from your wallet. Your wallet balance is NGN $balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";
            echo "<script>alert('".$msg."'); </script>";
        }

        if ($status=="OK")
        {
            $query=mysqli_query($con,"update wallet set balance=balance-$amount where username='".$_SESSION['username']."'");
            // $query=mysqli_query($con,"insert into bill_payment (product, username, amount, transactionid, paymentmethod,status) values ('$title', '$user', '$amount', '$scode', 'Wallet Payment', '$status')");

            $errormsg= "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </br></strong>You have successfully paid NGN $amount for $title.</div>"; //printing error if found in validation

            echo "<script>window.location='billpayment.php?amount=".$amount."&refid=".$scode."&product=".$product."&productid=". $productid ."&number=". $number."&method=Wallet'; </script>";

//header("paystackpayment.php?amount=".$amount."&refid=".$scode."&product=".$product."&productid=".$productid."&number=".$number);
        }
        ?>

        <!-- All Contact List -->
        <td class="row">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <!--                            <th scope="col">Method</th>-->
                        <th scope="col">Logo</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Select</th>
                    </tr>
                    </thead>
                    <tbody>
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
                            <div class="contact-thumb">
                                <img src="images/auth/paystack_logo.png" class="img-circle img-responsive" alt="">
                            </div>
                        </td>
                        <td>
                            <h4><b>Paystack</b></h4>
                            <span><a href="#" class="__cf_email__" data-cfemail="0367626d6a666f67746a6866436b6c776e626a6f2d606c6e">NGN.<?php echo  $amount; ?> </a></span>
            </div>
        </td>
        <td>
            <button type="button" onclick="payWithPaystack()" class="btn btn-outline-primary btn-rounded"><i class="fa fa-check"></i> Pay</button>
        </td>


    </div>
</div>
<?php } ?>
    </tr>

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
    <div class="contact-thumb">
        <img src="images/auth/flutterwave_logo.png" class="img-circle img-responsive" alt="">
    </div>
</td>
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

</div>
</div>
<?php } ?>
</tr>
<!-- Single Contact List -->
<?php
$query="SELECT * FROM  paymentgateway where name='Payant' and status=1";

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
    $payant="$row[code]";

}?>
<?php
$query="SELECT count(*) FROM  paymentgateway where name='Payant' and status=1";

$result = mysqli_query($con,$query);
$row = mysqli_fetch_row($result);
$numrows = $row[0];

if($numrows==1) {
?>
<!-- Single Contact List -->
<tr>
<td>
    <div class="contact-thumb">
        <img src="images/auth/payant_logo.png" class="img-circle img-responsive" alt="">
    </div>
</td>
<td>
    <div class="contact-detail">
        <h4><b>Payant</b></h4>
        <span><a href="#" class="__cf_email__" data-cfemail="0367626d6a666f67746a6866436b6c776e626a6f2d606c6e">NGN.<?php echo $amount; ?> </a></span>
    </div>
</td>
<td>

    <div class="contact-info">
        <button type="button" class="btn btn-outline-primary btn-rounded" onClick="payWithPayant()"><i class="fa fa-check"></i> Pay</button>

    </div>
</td>
</div>
</div>
<?php } ?>
</tr>
<!---->
<!--								--><?php
//                    $box = new BtcGateway();
//                    echo $box->create_payment_box("$amount");
//                    ?>
<!--								 --><?php
//                    $box = new LtcGateway();
//                    echo $box->create_payment_box("$amount");
//                    ?>

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
            <div class="contact-thumb">
                <img src="images/auth/wallet.png" class="img-circle img-responsive" alt="">
            </div>
        </td>
        <td>
            <div class="contact-detail">
                <h4><b>Wallet</b></h4>
                <span><a href="#" class="__cf_email__" data-cfemail="65040b0b00080017170c1111250208040c094b060a08">NGN.<?php echo $amount; ?></a></span>
            </div>
        </td>
        <td>
            <div class="contact-info">

                <form action="select.php" method="post">
                    <input type="hidden" name="amount" value="<?php  print $amount; ?>">
                    <input type="hidden" name="product" value="<?php  print $product; ?>">
                    <input type="hidden" name="productid" value="<?php  print $productid; ?>">
                    <input type="hidden" name="id" value="<?php  print $productid; ?>">
                    <input type="hidden" name="number" value="<?php  print $number; ?>">
                    <input type="hidden" name="payment_method" value="wallet">
                    <button type="submit" class="btn btn-rounded btn-outline-info"><i class="fa fa-check"> </i> Pay From Wallet </button>

                </form>
            </div>
        </td>
    </tr>
    </tbody>
    </div>
    </div>
<?php } ?>
    </div>
<!-- End All Contact List -->

<?php } ?>

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
            firstname: '<?php decryptdata($name); ?>',
            // label: "Optional string that replaces customer email"
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "<?php echo decryptdata($phone); ?>",
                        value: "+2348012345678"
                    }
                ]
            },
            callback: function(response){
                //alert('Deposit successful. transaction refference number is ' + response.reference);
                window.location='billpayment.php?amount=<?php echo $amount; ?>&refid=' + response.reference+ '&product=<?php echo $product; ?>&productid=<?php echo $productid; ?>&number=<?php echo $number; ?>&method=Paystack';

            },
            onClose: function(){
                alert('window closed');
            }
        });
        handler.openIframe();
    }
</script>

<script>
    function payWithPayant() {
        var handler = Payant.invoice({
            "key": "<?php echo $payant; ?>",
            "client": {
                "first_name": "<?php echo $fname; ?>",
                "last_name": "customer",
                "email": "<?php echo $email; ?>",
                "phone": "<?php echo $phone; ?>"
            },
            "due_date": "<?php echo date('m/d/Y'); ?>",
            "fee_bearer": "account",
            "items": [
                {
                    "item": "<?php echo $product ?>",
                    "description": ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    "unit_cost": <?php echo $topay; ?>,
                    "quantity": "1"
                }
            ],
            callback: function(response) {
                console.log(response);
                //alert('Deposit successful. transaction refference number is ' + response.reference);
                window.location='billpayment.php?amount=<?php echo $amount; ?>&refid=' + response.reference+ '&product=<?php echo $product; ?>&productid=<?php echo $productid; ?>&number=<?php echo $number; ?>&method=Payant';
            },
            onClose: function() {
                console.log('Window Closed.');
                alert('window closed');
            }
        });

        handler.openIframe();
    }
</script>

</form>

<script>
    const API_publicKey = "<?php echo $rave; ?>";

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "<?php echo decryptdata($email); ?>",
            amount: "<?php echo $amount; ?>",
            customer_phone: "<?php echo decryptdata($phone); ?>",
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
                    window.location='billpayment.php?amount=<?php echo $amount; ?>&refid=<?php echo $scode; ?>&product=<?php echo $product; ?>&productid=<?php echo $productid; ?>&number=<?php echo $number; ?>&method=Rave';

                } else {
                    alert("Hello! Payment Not Successfull!");
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>

