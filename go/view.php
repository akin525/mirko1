<?php include "sidebar.php"; ?>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                                    <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="method.php">Create New Payment Method</a></button>
                                    <?php
                                    if(isset($_GET["username"])){
                                        $todelete= mysqli_real_escape_string($con,$_GET["username"]);

                                        $result=mysqli_query($con,"DELETE FROM banks WHERE username='$todelete'");
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Bank Name</th>
                                                <th>Account No</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php
                                                $code=0;
                                                $nu=0;
                                                $query="SELECT * FROM  banks WHERE username ='" . $_SESSION['username'] . "'";
                                                $result = mysqli_query($con,$query);

                                                while($row = mysqli_fetch_array($result)) {
                                                $user = "$row[username]";
                                                $code = $row["bank_name"];
                                                $nu = $row["account_no"];
                                                $id = $row["id"];


												if ($code == '000007') {
													$a='Fidelity bank';
                                                }
												if ($code == '000016') {
													$a='First bank';
                                                }
												if ($code == '000017') {
													$a= 'Wema bank';
                                                }
												if ($code == '000001') {
													$a= 'Sterling bank';
                                                }
												if ($code == '000013') {
                                                    $a= 'Guaranty Trust Bank PLC';
                                                }
												if ($code == '000005') {
													$a= 'Diamond bank';
                                                }
												if ($code == '000015') {
													$a='Zenith bank';
                                                }
												if ($code == '000018') {
                                                    $a='Union Bank of Nigeria PLC';
                                                }
												if ($code == '000020') {
													$a= 'Heritage bank';
                                                }
												if ($code == '000002') {
													$a= 'Keystone bank';
                                                }
												if ($code == '000014') {
													$a='Access bank';
                                                }
												if ($code == '000023') {
													$a= 'Providus Bank';
                                                }
												if ($code == '000010') {
													$a= 'Ecobank Nigeria Plc';
                                                }
												if ($code == '000003') {
													$a= 'First City Monument Bank Plc';
                                                }
												if ($code == '000008') {
													$a= 'Polaris Bank';
                                                }
												if ($code == '000012') {
													$a= 'Stanbic IBTC Bank Ltd';
                                                }
												if ($code == '000004') {
													$a= 'United Bank For Africa Plc';
                                                }
												if ($code == '000011') {
													$a= 'Unity Bank Plc';
                                                }
                                                
                                                ?>
                                                <td><?php  echo decryptdata($user); ?></td>
                                                <td><?php  echo $a ?></td>
                                                <td><?php  echo $nu; ?></td>
                                                <td>
                                                    <a href="view.php?username=<?php print $row["username"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-trash-o fa"></i></a>
                                                    <button type="submit" class="btn btn-rounded btn-outline-info"><i class="fa fa-check"> </i><a href="view.php?username=<?php print $row["username"]; ?>">Delete</a> </button>

                                                </td>
                                            </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
