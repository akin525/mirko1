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
    $amount = stripslashes($_REQUEST['amount']);
    $amount = mysqli_real_escape_string($con, $amount);
    $name = stripslashes($_REQUEST['full']);
    $name = mysqli_real_escape_string($con, $name);

    $query="SELECT * FROM  wallet WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result))
    {
        $balance="$row[balance]";
//                        $amount=$row["balance"];
    }
    if ( $balance<$amount ){
        echo $msg="You Cant Make Purchase Above". "NGN" .$amount." from your wallet. Your wallet balance is NGN $balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";
        echo "<script>alert('".$msg."'); </script>";
    }
    if ( $balance>=$amount ) {


//echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
        mysqli_query($con, "INSERT INTO `tran` (`username`, `bank`, `account_name`, `account_no`, `amount`) VALUES ('$username', '$acct', '$name', '$number', '$amount')");
        $query = ("update wallet set balance=balance-$amount where username= '" . $_SESSION['username'] . "'");

        $result = mysqli_query($con, $query);
        if ($result) {
//        echo "<div class=l-main>
//    <div class=account_top_information>
//        <div class=account_overlay></div>
//    <div class=payment_transfer_Wrapper float_left>
//        <div class=row>
//<div class=alert alert-success role=alert>
//  <h4 class=alert-heading>Well done!</h4>
//  <p>Withdraw Processing, it make take 12 Hours Working Time Kindly Bear With us </p>
//  <hr>
//  <p class=mb-0>View Your Request Below.
//
//</div>
//</div>
//</div>
//";


            print "
                    <script language='javascript'>
                     let message = 'Withdraw Processing, it make take 12 Hours Working Time Kindly Bear With us';
                                    alert(message);
                        window.location = 'trans.php';
                    </script>
                    ";

        }
    }else {
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
foreach($data['data'] as $plans){
//    echo $plans['name'];
//    echo $plans['code'];
}

//echo $networkcode . " ". $number;

?>

<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h3>Transfer</h3>
                <?php //foreach($data['data'] as $plans){
                //    echo $plans['name'];
                //    echo $plans['code'];
                //}
                //?>
                <center>
                    <button type="submit" class="btn ">
                        <h5>You Can Make Your Transfer Request Anytime Of Your Choice</h5>
                        <h6><b>NOTE: You Can Contact Us On Our Countact Us Page.</b></h6>

                    </button>
                </center>
                <form action="trans.php" method="post">
                    <script>
                        function shoUser() {
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
                                        if(this.responseText=="fail"){
                                            document.getElementById("vtv1").innerHTML = "Error validating IUC Number";
                                            document.getElementById("btnd1").setAttribute("disabled", "true");
                                        }else{
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

                    <div class="subscribe-area">
                        <label>Enter Amount</label>
                        <input  type="number" name="amount" class="form-control" required/>
                        <!--                                            <b class="text-success fa-bold" id="vtv1"></b>-->
                    </div>
                    <div class="payment_gateway_wrapper payment_select_wrapper">
                        <label>Select Your Bank :</label>
                        <select data-required="true" class="form-control" id="value" name="value" required>

                            <option selected>choose Bank Name</option>
                            <?php
                            foreach($data['data'] as $plans){
                                ?>
                                <option value="<?php echo $plans['code']; ?>" id="<?php echo $plans['name']; ?>"><?php echo $plans['name']; ?></option>
                            <?php } ?>
                        </select>
                        <!--                                            onchange="document.getElementById('hello').value=this.is"-->
                        <!--                                            <input type="text" id="hello" name="" value="">-->
                    </div>
                    <div class="form-group">
                        <label>Account Number :</label>
                        <input  type="tel" id="tvphone1" name="number"><button id="btnv1" type="button" onclick="shoUser()">Verify</button>
                        <b class="text-success fa-bold" id="vtv1" onchange="document.getElementById('hello').id=this.value"></b>
                    </div>
                    <div class="form-group">
                        <label>Enter Verify Name</label>
                        <input  type="text" id="hello" name="full" value="" class="form-control" placeholder="Please Enter The Name Display After Very Account No" required/>
                        <!--                                            <b class="text-success fa-bold" id="vtv1"></b>-->
                    </div>
                    <?php
                    $query="SELECT * FROM  users WHERE username ='" . $_SESSION['username'] . "'";
                    $result = mysqli_query($con,$query);

                    while($row = mysqli_fetch_array($result))
                    {
                        $user="$row[username]";
                    }
                    ?>
                    <div class="change_field">
                        <input type="hidden" name="username" value="<?php echo $user; ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-success">Make Transfer</button>
                </form>

                <?php

                $query="SELECT * FROM  wallet WHERE username='" . $_SESSION['username'] . "'";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $balance=$row["balance"];
                }
                $query="SELECT * FROM deposit where username ='" . $_SESSION['username'] . "'";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $depositor=$row["amount"];
                    $iwallet=$row["iwallet"];
                }
                ?>

                <?php
                $result = mysqli_query($con,"SELECT sum(amount) FROM  deposit where username = '".$_SESSION['username']."'");
                $row = mysqli_fetch_row($result);
                $deposited = $row[0];

                ?>


                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h3>Transfer History</h3>

                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="width_table1">Username</th>
                                    <th class="width_table1">Amount</th>
                                    <th class="width_table1">Bank-Name</th>
                                    <!--                                                <th class="width_table1">description</th>-->
                                    <!--                                                <th class="width_table1">payment mode</th>-->
                                    <th class="width_table1">Account No</th>
                                    <th class="width_table1">Account Name</th>
                                    <th class="width_table1">Status</th>
                                    <!--                                                <th class="width_table1">options</th>-->

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM tran WHERE username ='" . $_SESSION['username'] . "'";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <?php
                                    $code=0;
                                    $nu=0;
                                    $code=$row["bank"];


                                    If($code=='1'){
                                        $code= 'Access Bank';
                                    }
                                    if($code=='050'){
                                        $code= 'EcoBank Nigeria PLC';
                                    }
                                    if($code=='3'){
                                        $code=  'Fidelity Bank PLC';
                                    }
                                    if($code=='011'){
                                        $code=  'First Bank of Nigeria PLC';
                                    }
                                    if($code=='058'){
                                        $code= 'Guaranty Trust Bank PLC';
                                    }
                                    if($code=='6'){
                                        $code= 'Unity Bank PLC';
                                    }
                                    if($code=='7'){
                                        $code=  'United Bank for Africa';
                                    }
                                    if($code==8){
                                        $code=  'Union Bank of Nigeria PLC';
                                    }
                                    if($code=='232'){
                                        $code=  'Sterling Bank PLC';
                                    }
                                    if($code=='221'){
                                        $code= 'Stanbic IBTC Bank PLC';
                                    }
                                    if($code=='101'){
                                        $code=  'Providus Bank Limited';
                                    }
                                    if($code=='035'){
                                        $code= 'Wema Bank PLC';
                                    }
                                    if($code=='057'){
                                        $code=  'Zenith Bank PLC';
                                    }
                                    if($code=='076'){
                                        $code=  'Polaris Bank Ltd';
                                    }
                                    if($code=='033'){
                                        $code=  'UBA Ltd';
                                    }
                                    ?>

                                    <tr>
                                        <td><?php echo decryptdata($row["username"]) ; ?></td>
                                        <td>NGN <?php echo number_format(intval($row["amount"] *1),2);?></td>
                                        <td><?php echo $code ; ?></td>
                                        <td><?php echo $row ["account_no"] ; ?></td>
                                        <td><?php echo $row ["account_name"] ; ?></td>
                                        <?php
                                        if($row["status"]==0){
                                            $d='Processing';
                                        }else{
                                            $d='Transaction Complete';
                                        }

                                        ?>
                                        <td><?php echo $d; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>



                                </tbody>
                            </table>
                        </div>
                        </a>
                    </div>



