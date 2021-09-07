<?php include "sidebar.php"; ?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Bills Invoice</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Payment ID</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Token(Available Only Electricity</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $query="SELECT * FROM bill_payment where username ='" . $_SESSION['username'] . "'";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            $status="$row[status]";
                            if($status==1)
                                $sta="Paid";
                            if($status==1)
                                $color="cl-success bg-success-light";
                            if ($status==2)
                                $sta="Declined";
                            if($status==2)
                                $color="danger";
                            if ($status==0)
                                $sta="Pending";
                            if($status==0)
                                $color="cl-danger bg-danger-light";
                            ?>
                            <tr>
                                <td><a href="#"><?php echo "$row[product]"; ?></a></td>
                                <td><i class="fa fa-lg"></i><?php echo "$row[transactionid]"; ?></td>
                                <td><div class="label <?php echo $color; ?> ">NGN.<?php echo "$row[amount]"; ?></div></td>
                                <td><?php echo "$row[timestamp]"; ?></td>
                                <td><?php echo "$row[token]"; ?></td>
                                <form action="invoice.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo "$row[id]"; ?>">
                                    <td><button type="submit" class="badge btn-outline-primary btn-rounded"><i class="fa fa-print"></i> Print Invoice</button>
                                </form>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
