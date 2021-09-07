<?php include "sidebar.php"; ?>
<div style="padding:90px 15px 20px 15px">
    <h4 class="align-content-center text-sm-center">Airtime TopUp</h4>
    <div class="card">
        <div class="card-body">
            <div class="box w3-card-4">
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!=""))
                {
                    print $errormsg;
                }
                ?>
                <form action="preview.php" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <br>
                            <br>
                            <div id="AirtimeNote" class="alert alert-danger" style="text-transform: uppercase;font-weight: bold;font-size: 23px;display: none;"></div>
                            <div id="AirtimePanel">

                                <div id="div_id_airtimetype" class="form-group">
                                    <label for="airtimetype_a" class=" requiredField">
                                        Airtime Type<span class="asteriskField">*</span>
                                    </label>
                                    <div class="form-group">
                                        <select name="airtimetype" class="text-success form-control" required="" id="airtimetype">
                                            <option value="" selected="">---------</option>

                                            <option value="VTU">AIRTIME VTU TOP-UP</option>

                                        </select>
                                    </div>
                                </div>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Network<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <select name="id" class="text-success form-control" required="">
                                            <?php

                                            $query="SELECT * FROM products1 where `product_type`='airtime'";
                                            $result = mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $id="$row[id]";
                                                ?>
                                                <option value="" selected="">---------</option>

                                                <option value="<?php echo $id; ?>"><?php echo "$row[name]"; $id=$row["id"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class=" btn" style="color: white;background-color: #095b26" id="btnsubmit"> Purchase Now</button>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <br>
                            <center> <h6>Codes for Airtime Balance: </h6></center>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary">MTN Airtime VTU    <span id="RightT"> *556#  </span></li>

                                <li class="list-group-item list-group-item-success"> 9mobile Airtime VTU   *232# </li>
                                <li class="list-group-item list-group-item-action"> Airtel Airtime VTU   *123# </li>
                                <li class="list-group-item list-group-item-info"> Glo Airtime VTU #124#. </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                </form></div>


        </div>
