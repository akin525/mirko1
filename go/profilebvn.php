<?php include "sidebar.php"; ?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h3>Bvn Update</h3>
                <?php
                $query="SELECT * FROM  users WHERE username='" . $_SESSION['username'] . "'";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $username=$row["username"];
                    $name=$row["name"];
                    $email=$row["email"];
                }
                ?>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bvn'])) {
                    $bvn = mysqli_real_escape_string($con, $_POST['bvn']);

                    $status = "OK";
                    $msg = "";
                    if (strlen($bvn) != 11) {
                        $msg = $msg . "Bvn Number Must not Be less Than 11 CHARACTERS Length.<br />";
                        $status = "NOTOK";
                    }
                    $sql = "SELECT bvn FROM userbvn WHERE bvn='{$bvn}'";
                    $result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
                    if (mysqli_num_rows($result) > 0) {
                        $msg = $msg . "Your bvn has been Registered.<br />";
                        $status = "NOTOK";
                    }
                    $sql = "SELECT username FROM userbvn WHERE username='{$username}'";
                    $result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
                    if (mysqli_num_rows($result) > 0) {
                        $msg = $msg . "Username has been Registered.<br />";
                        $status = "NOTOK";
                    }
                    $sql = "SELECT username FROM userbvn WHERE 'name'='{$name}'";
                    $result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
                    if (mysqli_num_rows($result) > 0) {
                        $msg = $msg . "Your Name has been Registered.<br />";
                        $status = "NOTOK";
                    }

                    if ($status == "OK") {
                        //echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
                        mysqli_query($con, "INSERT INTO `userbvn` (`username`, `name`, `bvn`) VALUES ('$username', '$name', '$bvn')");

                        $suss = "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Bvn Update successful : </br></strong>A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox.</div>";
                        //printing error if found in validation
                        print "
				<script language='javascript'>
window.location = 'dashboard.php';
</script>
";
                    } else {
                        $errormsg = "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong></br></strong>" . $msg . "</div>"; //printing error if found in validation
                    }
                }
                ?>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK"))
                {
                    print $errormsg;

                }
                ?>

                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="OK"))
                {
                    print $suss;

                }
                ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"method="post">

                    Username:<div class="form-control require"> <?php echo decryptdata($username); ?> </div><br>

                    Name:<div class="form-control require"> <?php echo decryptdata($name); ?></div><br>
                    <p>-----</p>

                    Bvn Number: <input type="number" class="form-control require" name="bvn"><br>

                    <!--                            Email: <div class="form-control require" >--><?php //echo $user_check; ?><!--</div><br>-->
                    <!---->
                    <!--                            Address: <input type="text" class="form-control require" name="address"><br>-->

                    <button type="submit" class="btn btn-success btn-block">Update Bvn</button>


                </form>
