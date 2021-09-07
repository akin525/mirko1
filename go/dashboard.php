<?php include "sidebar.php"; ?>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
                <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                        <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Efe User Dashboard</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">SAVE SMART, SAVE SECURELY, SAVE REGULARLY!</p>
                    </div>
                    <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="fund.php" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Make Deposit</a>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NGN <?php echo number_format(intval($balance *1),2);?></h3>
<!--                            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>-->
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-wallet"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Savings Balance</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NGN<?php echo number_format(intval($lock *1),2); ?></h3>
<!--                            <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>-->
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success">
                            <span class="mdi mdi-lock"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Lock Balance</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NGN<?php echo number_format(intval($refer *1),2);?></h3>
<!--                            <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>-->
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-danger">
                            <span class="mdi mdi-wallet"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Referral Bonus</h6>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NGN 0.00</h3>
<!--                            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>-->
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-wallet"></span>
                        </div>
                    </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Withdraw</h6>
            </div>
        </div>
    </div>
</div>
<div class="card">
	<div class="card-body">
		<h6 class="text-white font-weight-bold">Your Referral Link</h6>
		<!-- The text field -->
		<input class="text-success form-control"  id="myInput" value=http://127.0.0.1/mirko/go/register.php?refer=<?php echo decryptdata($username); ?> readonly/>
		<!-- The button used to copy the text -->
		<button onclick="myFunction()" class="btn badge-success">Copy Referral Link</button>
	</div>
</div>
<script>
	function myFunction() {
/* Get the text field */
var copyText = document.getElementById("myInput");

/* Select the text field */
copyText.select();
copyText.setSelectionRange(0, 99999); /* For mobile devices */

/* Copy the text inside the text field */
navigator.clipboard.writeText(copyText.value);

/* Alert the copied text */
alert("Copied the text: " + copyText.value);
}
</script>
<br>
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">More Option</h4>
<!--                <canvas id="transaction-history" class="transaction-chart"></canvas>-->
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <a href="method.php"><h6 class="mb-1">Create Payment Method</h6></a>
<!--                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>-->
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
<!--                        <h6 class="font-weight-bold mb-0">$236</h6>-->
                    </div>
                </div>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <a href="view.php"><h6 class="mb-1">View Payment Method</h6></a>
                        <!--                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>-->
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <!--                        <h6 class="font-weight-bold mb-0">$236</h6>-->
                    </div>
                </div>
                <?php
                if ($bvn==0){ ?>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <a href="profilebvn.php"><h6 class="mb-1">Submit your Bvn</h6></a>
                        <!--                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>-->
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <!--                        <h6 class="font-weight-bold mb-0">$236</h6>-->
                    </div>
                </div>
                <?php }else{?>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        Bvn: <h6 class="mb-1"><?php echo $bvn; ?></h6>
                        <!--                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>-->
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <!--                        <h6 class="font-weight-bold mb-0">$236</h6>-->
                    </div>
                </div>
                <?php } ?>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <a href="with.php"><h6 class="mb-1">Withdraw</h6></a>
<!--                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>-->
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
<!--                        <h6 class="font-weight-bold mb-0">$593</h6>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h4 class="text-success">Saving History</h4>
                    <p class="text-muted mb-1">Your data status</p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-primary">
                                        <i class="mdi mdi-wallet"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">Current Savings Balance</h6>
                                        <p class="text-muted mb-0">Available Balance  </p>
                                    </div>
                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">NGN <?php echo number_format(intval($balance *1),2);?></p>
<!--                                        <p class="text-muted mb-0">30 tasks, 5 issues </p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-wallet"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">Early Pay</h6>
<!--                                        <p class="text-muted mb-0">Upload new design</p>-->
                                    </div>
                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">NGN<?php echo number_format(intval($depositor *1),2);?></p>
<!--                                        <p class="text-muted mb-0">23 tasks, 5 issues </p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-wallet"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">New Deposit</h6>
<!--                                        <p class="text-muted mb-0">New project discussion</p>-->
                                    </div>
                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">NGN<?php echo number_format(intval($depositor *1),2);?></p>
<!--                                        <p class="text-muted mb-0">15 tasks, 2 issues</p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <i class="mdi mdi-wallet"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">Matured</h6>
<!--                                        <p class="text-muted mb-0"></p>-->
                                    </div>
                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">NGN<?php echo number_format(intval($iwallet *1),2);?></p>
<!--                                        <p class="text-muted mb-0">35 tasks, 7 issues </p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-lock-alert"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">Lock Wallet</h6>
<!--                                        <p class="text-muted mb-0">New application planning</p>-->
                                    </div>
                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">NGN<?php echo number_format(intval($lock *1),2); ?></p>
<!--                                        <p class="text-muted mb-0">27 tasks, 4 issues </p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Deposit History</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <div class="form-check form-check-muted m-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                    </label>
                                </div>
                            </th>
                            <th> Transaction Id </th>
                            <th> Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM deposit WHERE username ='" . $_SESSION['username'] . "'";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) { ?>

                            <tr>
                                <td>
                                    <div class="form-check form-check-muted m-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                        </label>
                                    </div>
                                </td>
                                <td><?php echo $row["payment_ref"] ; ?></td>
                                <td><?php echo $row["date"] ; ?></td>
                                <td>NGN.<?php echo $row ["amount"] ; ?></td>
                            </tr>
                            <?php
                        }
                        ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>