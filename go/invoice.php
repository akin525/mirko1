<?php include "sidebar.php"; ?>

<div class="row page-breadcrumbs">
    <div class="card">
        <div class="card-body">
            <div class="col-md-12 align-self-center">
                <h4 class="theme-cl">Payment Invoice Detail</h4>
            </div>
        </div>
        <!-- Title & Breadcrumbs-->
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))
        {

            $id=mysqli_real_escape_string($con,$_POST['id']);

            $query="SELECT * FROM  bill_payment where  id = '$id'";
            $result = mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result))
            {
                $name="$row[username]";
                $product="$row[product]";
                $amount="$row[amount]";
                $tid="$row[transactionid]";
                $pmeth="$row[paymentmethod]";
                $date="$row[timestamp]";
                $status="$row[status]";
//                $recipient="$row[recipient]";
            }
        }

        $query="SELECT * FROM  users where  username = '$name'";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($result))
        {
            $fname="$row[name]";
            $email="$row[email]";
            $phone="$row[phone]";
//            $country="$row[country]";
        }

        $query="SELECT * FROM  settings";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($result))
        {
            $coname="$row[coname]";
            $coemail="$row[email]";
            $cophone="$row[phone]";
            $cocountry="$row[address]";
            $cur="$row[currency]";
        }


        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="detail-wrapper padd-top-30 padd-bot-30">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <a href="javascript:window.print()" class="btn theme-btn"><i class="mdi mdi-printer"></i>Print this invoice</a>
                                        </div>
                                    </div>

                                    <div class="row mrg-0">
                                        <div class="col-md-6">
                                            <div id="logo"><img src="../public/images/logo/logo.png" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-6">
                                            <p id="invoice-info">
                                                <strong>Order:</strong> <?php echo $tid; ?> <br>
                                                <strong>Issued:</strong> <?php echo $date; ?> <br>

                                            </p>
                                        </div>

                                    </div>

                                    <div class="row  mrg-0 detail-invoice">

                                        <div class="col-md-12">
                                            <h2>INVOICE</h2>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7 col-sm-7">

                                                    <h4>Supplier: </h4>
                                                    <h5><?php echo $coname; ?></h5>
                                                    <p>
                                                        <a href="#" class="__cf_email__" data-cfemail="7f161119103f3e1b12161139161a0d511c1012"><?php echo $coemail; ?></a><br />

                                                        <?php echo $cophone; ?><br />

                                                        <!--                                            --><?php //echo $cocountry; ?>
                                                    </p>

                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5">
                                                    <h4>Client's Details :</h4>
                                                    <h5><?php echo decryptdata($fname); ?></h5>
                                                    <p>
                                                        <a href="#" class="__cf_email__" data-cfemail="1b687a6e697a6d767a7277232c5b7c767a727735787476"><?php echo decryptdata($email); ?></a><br />

                                                        <?php echo decryptdata($phone); ?><br />

                                                        <!--                                            --><?php //echo $country; ?>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="col-12 col-md-12">
                                            <strong>ITEM DESCRIPTION & DETAILS :</strong>
                                        </div>
                                        <hr>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="invoice-table">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Transaction ID</th>
                                                            <th>Product</th>
                                                            <th>Price</th>
                                                            <th>Payment Method</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><?php echo $tid; ?></td>
                                                            <td><?php echo $product; ?></td>
                                                            <td><?php echo $cur; ?> <?php echo $amount; ?></td>
                                                            <td><?php echo $pmeth; ?></td>
                                                            <!--                                                <td>--><?php //echo $recipient; ?><!--</td>-->
                                                            <td><?php if($status==1){
                                                                    echo "Delivered";
                                                                }elseif ($status==0) {
                                                                    echo "Not Delivered";
                                                                } ?></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h5><b>Total : <?php echo $cur; ?> <?php echo $amount; ?> </h5></b>
                                                </div>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>