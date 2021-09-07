<?php include "sidebar.php"; ?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                                            <h5>Wallet Withdraw</h5>

                                                <h6>Click Below from Wallet</h6>
                <br>
                                            <div class="about_btn plans_btn">
                                                        <a class="btn btn-outline-success" href="one.php">Withdraw</a>
                                            </div>
                                        </div>
                                    </div>
    </div>
<!--    <div class="row">-->
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                                                <h4><a href="#">Withdraw from Safe Lock</a></h4>



                                                    <?php
                                                    $query="SELECT * FROM  safe_lock WHERE username ='" . $_SESSION['username'] . "'";
                                                    $result = mysqli_query($con,$query);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $balance="$row[balance]";
                                                        $date=$row["date"];
//                        $amount=$row["balance"];
                                                    }

                                                    ?>
                                                    <?php
                                                    if($date==date('CURRENT_TIMESTAMP')){
                                                        ?>

                                                            <a class="btn btn-outline-success" href="#">Withdraw Here</a>
                                                    <?php }else{ ?>

                                                            <h6>Come Back On: <?php echo $date; ?></h6>

                                                    <?php } ?>
            </div>
        </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                                                <h1>Invest Plan</h1>
                                                <p>Coming Soon</p>

                                            <div class="about_btn plans_btn blue_btn_plans">
                                                        <a class="btn btn-outline-primary" href="dashboard.php">Back to Dashboard</a>

                                            </div>
                                        </div>

