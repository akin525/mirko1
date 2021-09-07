<?php  include "sidebar.php";
$query="SELECT * FROM  users WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
    $username=$row["username"];
    $name=$row["name"];
    $date=$row["date"];
    $email=$row["email"];
    $phone=$row["phone"];
    $address=$row["address"];
//    $cphoto=$row["photo"];
}
?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
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
                        <h5 class="form-title">Basic Information</h5>
                        <div class="alert alert-warning" id="PayNote" style="font-weight: bold;font-size: 13px;">

                            Dear <?php echo decryptdata($name); ?>! Your Account privacy is important to us, as this might be need by our technical team for assistant when needed. Keep Safe.

                        </div>

<!--        <div class="col-auto profile-image">-->
<!--            <a href="#">-->
<!--                --><?php //if($cphoto==1){ ?>
<!--                    <img class=" img-thumbnail rounded-circle" alt="User Image" src="assets/images/profiles/avatar.png">-->
<!--                --><?php //}else{ ?>
<!--                    <img class="img-thumbnail rounded-circle" alt="User Image" src="--><?//= 'assets/php/'.$cphoto; ?><!--">-->
<!--                --><?php //} ?>
<!--            </a>-->
<!--        </div>-->
<!--        <button type="submit" name="submit"  class="btn btn-primary" id="profileUpdateBtn"><a class="text-white" href="editp.php">Upload Profile Photo</a><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-profile-spinner"></span></button>-->

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' ){

            $status="OK";
// Collect the data from post method of form submission //
            $name=encryptdata(mysqli_real_escape_string($con,$_POST['name']));
//                            $contr=mysqli_real_escape_string($con,$_POST['country']);
            $phone=encryptdata(mysqli_real_escape_string($con,$_POST['phone']));
            $email=encryptdata(mysqli_real_escape_string($con,$_POST['email']));
            $address=encryptdata(mysqli_real_escape_string($con,$_POST['add']));
//                            $gender=mysqli_real_escape_string($con,$_POST['gender']);
//                            $address=mysqli_real_escape_string($con,$_POST['address']);
//collection ends

            $query3=mysqli_query($con,"update users set `name`='$name', phone='$phone',email='$email', address='$address' where username = '" . $_SESSION['username'] . "'");

            echo $message = "Profile Update Successfully";
            print "
				<script language='javascript'>
				 let message = 'Profile Update Successfully: ';
                                    alert(message);
window.location = 'profile.php';
</script>
";
        }
        ?>
        <form action="profile.php" method="POST">

            <?php if(isset($error) != NULL):?>
                <p><?php echo $error; ?></p>
            <?php endif; ?>
            <!--            <div class="row">-->
            <!--                <div class="card">-->
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label class="mr-sm-2">Name</label>
                        <input class="form-control" type="text" value="<?php echo decryptdata($name); ?>" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-xl-6">
                        <label class="mr-sm-2">Email</label>
                        <input class="form-control" type="email" value="<?php echo decryptdata($email); ?>" name="email" placeholder="" required>
                    </div>
                    <div class="form-group col-xl-6">
                        <label class="mr-sm-2">Mobile Number</label>
                        <input class="form-control no_only" type="text" value="<?php echo decryptdata($phone); ?>" name="phone" placeholder="" required>
                    </div>
                    <div class="form-group col-xl-6">
                        <label class="mr-sm-2">Address</label>
                        <input class="form-control no_only" type="text" value="<?php echo decryptdata($address); ?>" name="add" placeholder="" required>
                    </div>
                    <div class="form-group col-xl-6">
                        <label class="mr-sm-2">Username</label>
                        <input type="text" class="form-control datepicker" type="text" name="dob" value="<?php echo decryptdata($username); ?>"  readonly>
                    </div>
                    <!--    <div class="col-xl-12">-->
                    <!--        <h5 class="form-title">Address</h5>-->
                    <!--    </div>-->
                    <!--    <div class="form-group col-xl-12">-->
                    <!--        <label class="mr-sm-2">Address</label>-->
                    <!--        <input type="text" class="form-control" name="address" value="">-->
                    <!--    </div>-->
                    <div class="form-group col-xl-12">
                        <button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="submit">Update</button>
                    </div>
        </form>
        <button type="button" class="btn btn-outline-primary btn-rounded"><a href="pass.php"> Change Password</a></button>
        <!--                <button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="button"><a href="password.php"> Change Password</a></button>-->


</div>
        </div>
    </div>
</div