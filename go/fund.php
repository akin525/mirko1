<?php include "sidebar.php"; ?>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <!--                        <h4 class="font-weight-bold mb-0">--><?php //echo $name; ?><!--</h4>-->
            </div>
        </div>
        <!--                    <div class="col-xl-9 col-md-8">-->
        <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-3 col-xl-2">
                            <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                        </div>
                        <div class="col-5 col-sm-7 col-xl-8 p-0">
                            <h4 class="mb-1 mb-sm-0">Fund Account With Transfer</h4>
                            <h6 class="mb-1 mb-sm-0">Bank Name: Wema | Account No: 7481522214 | Account Name: Efe Mobile Money </h6>
                            <!--                            <p class="mb-0 font-weight-normal d-none d-sm-block">Account No: 7481522214</p>-->
                        </div>
                        <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
<!--                          <a href="fund.php" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Make Deposit</a>-->
                        </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="mdi mdi-wallet"></i>Savings Balance</h4>
                        <div class="wallet-details">
                            <!--                                <span>Wallet Balance</span>-->
                            <h3>NGN <?php echo number_format(intval($balance *1),2);?></h3>
                            <div class="d-flex justify-content-between my-4">
                                <!--                                                <div>-->
                                <!--                                                    <p class="mb-1">Early Balance</p>-->
                                <!--                                                    <h4>NGN --><?php //echo number_format(intval($iwallet *1),2);?><!--</h4>-->
                                <!--                                                </div>-->
                                <!--                                                <div>-->
                                <!--                                                    <p class="mb-1">New Deposit</p>-->
                                <!--                                                    <h4>NGN --><?php //echo number_format(intval($amount *1),2);?><!--</h4>-->
                                <!--                                                </div>-->
                            </div>
                            <div class="wallet-progress-chart">
                                <!--                                                <div class="d-flex justify-content-between">-->
                                <!--                                <span>NGN --><?php //echo number_format(intval($iwallet *1),2);?>
                                <!--</span>-->
                                <!--                                                    <span>NGN --><?php //echo number_format(intval($amount *1),2);?>
                                <!--</span>-->
                                <!--                                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Save More</h4>
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST')

                            $amou=intval(mysqli_real_escape_string($con,$_POST['amount']));
                        {
                        ?>
                        <form id="paymentForm" action="" method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">

                                        <label class="form-control">NGN</label>
                                    </div>
                                    <input type="number" maxlength="4" class="form-control" name="amount" id="amount" placeholder="00.00" required/>
                                </div>

                            </div>
                            <input type="hidden"  id="email-address" value="<?php echo decryptdata($email); ?>">
                    </div>
                </div>
                <div class="text-center mb-3">
                    <p></p>
                    <!--                                    <p class="mb-3">OR</p>-->
                    <!--                                    <ul class="list-inline mb-0">-->
                    <!--                                        <li class="line-inline-item mb-0 d-inline-block">-->
                    <!--                                            <button type="submit" name="amount" value="500" onclick="payWithPaystack()"> 500</button>-->
                    <!--                                        </li>-->
                    <!--                                        <li class="line-inline-item mb-0 d-inline-block">-->
                    <!--                                            <a href="javascript:;" id="1000" type="submit">1000</a>-->
                    <!--                                        </li>-->
                    <!--                                        <li class="line-inline-item mb-0 d-inline-block">-->
                    <!--                                            <a href="javascript:;" id="1500" class="updatebtn">1500</a>-->
                    <!--                                        </li>-->
                    <!--                                    </ul>-->
                </div>
                <!--                                <b class="text-success fa-bold" id="vtv1"></b>-->
                <button id="myBtn" class=" btn-block withdraw-btn" type="button" >Fund With Transfer</button>

                <center>

                    <div id="myModal" class="modal modal-body ">

                        <!-- Modal content -->
                        <div class="card">
                        <div class="card-body">
                            <div class="align-content-lg-between">
                                <span class="close alert">&times;</span>
                                <div class="col-5 col-sm-7 col-xl-8 p-0">
                                    <h4 class="mb-1 mb-sm-0">Fund Account With Transfer</h4>
                                    <h6 class="mb-1 mb-sm-0">Bank Name: Wema | Account No: 7481522214 | Account Name: Efe Mobile Money </h6>
                                    <!--                            <p class="mb-0 font-weight-normal d-none d-sm-block">Account No: 7481522214</p>-->
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </center>
                <script>

                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on the button, open the modal
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <?php } ?>
                <button class="btn btn-primary btn-block withdraw-btn" type="submit" onclick="payWithPaystack()"> Fund With Paystack</button>
				<script src="https://js.paystack.co/v1/inline.js"> </script>
				</form>
				<button class="btn btn-success btn-block withdraw-btn" type="submit" onClick="makePayment()"> Fund With Flutterwave</button>
				<script src="https://checkout.flutterwave.com/v3.js"> </script>
               
            </div>
        </div>
    </div>
</div>
<!--        <div class="row">-->
<!--            <div class="col-md-7 grid-margin stretch-card">-->
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Deposit Transaction</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <tfoot>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Total Balance</th>
                    <th>Amount Before</th>
                    <th>Amount After</th>
                    <th>Payment_Ref</th>
                </tr>
                </thead>
                </tfoot>
                <?php
                $query = "SELECT * FROM deposit WHERE username ='" . $_SESSION['username'] . "'";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <!--                        <td>--><?php //echo $row["id"] ; ?><!--</td>-->
                        <td><?php echo $row["date"] ; ?></td>
                        <td><?php echo decryptdata($row["username"]) ; ?></td>
                        <td>NGN<?php echo $row["amount"] ; ?></td>
                        <td>NGN<?php echo $row["iwallet"] ; ?></td>
                        <td>NGN<?php echo $row["fwallet"] ; ?></td>
                        <td><?php echo $row ["payment_ref"] ; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_17fd09d2f1b858a21859595153d9770573a7c996', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
// label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let message = 'Payment complete! Reference: ' + response.reference;
                    // alert(message);

                    window.location = 'transaction.php?reference='+response.reference;

                }
            });
            handler.openIframe();
        }
    </script>
    
<script>
	function makePayment()
	{
		FlutterwaveCheckout({
			public_key: "FLWPUBK_TEST-32b42fe99e105f6350c37d57a62374c0-X",
			tx_ref:''+Math.floor((Math.random() * 1000000000) + 1),
			amount: document.getElementById("amount").value*1,
			currency: "NGN",
			payment_options: " ",
			meta: {
				consumer_id: 23,
				consumer_mac: "92a3-912ba-1192a",
			},
			customer: {
				email: document.getElementById("email-address").value,
				phone_number: "08102909304",
				name: "Flutterwave Developers",
			},
			callback: function (response) {
				let message = 'Payment complete! id: ' + response.transaction_id;
				//alert(message);

				window.location = 'transaction1.php?reference='+response.transaction_id;

			},
			onclose: function() {
				// close modal
			},
			customizations: {
				title: "Efemobilemoney",
				description: "Fund Wallet",
				//logo: "https://assets.piedpiper.com/logo.png",
			},
		});
	}
</script>
