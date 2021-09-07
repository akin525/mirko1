<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Efemobilemoney</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />
</head>

<body>
<?php
include_once ("../include/database.php");
// Inialize session
//session_start();
if (isset($_SESSION['username'])) {

}
$sql="SELECT maintain FROM  settings WHERE sno=0";
if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main= $row[0];
    }
    if($main==2 || $main==3)
    {
        print "<script language='javascript'>window.location = '404.php';</script>";
    }

}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo']))
{


// Collect the data from post method of form submission //
    $username=encryptdata(mysqli_real_escape_string($con,$_POST['username']));
    $password=mysqli_real_escape_string($con,$_POST['password']);
//    $password = md5($password);

    $query = "SELECT * from users where username='$username' and password='$password'";
//    $query= "SELECT * FROM `admin` WHERE email='$email' and password='$password'";
    $result = $con->query($query);
    $count = mysqli_num_rows($result);
//    echo $count;
//    return;

// If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        $result = mysqli_query($con, $query);

//        while ($row = mysqli_fetch_array($result)) {
//            $status = $row['active'];
//        }
//
//        if ($status == 0) {
//            $errormsg = "<div class='alert alert-danger'>
//    <button type='button' class='close' data-dismiss='alert'>&times;</button>
//    <i class='fa fa-ban-circle'></i><strong>You have been banned from accessing this portal </br></strong></div>"; //printing error if found in validation
//        } else {
        $_SESSION['username'] = $username;
        $_SESSION['login_user']=$username;
        print "
                    <script language='javascript'>
                        window.location = 'dashboard.php';
                    </script>
                    ";
//        }
    } else {
        $errormsg = "<div class='alert alert-danger'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <i class='fa fa-ban-circle'></i><strong>Incorrect login details </br></strong></div>"; //printing error if found in validation
    }

}

?>

<!-- page-title area end -->

<center><?php
    if(!empty($errormsg))
    {
        print $errormsg;

    }
    ?>
</center>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <button type="button" class="btn btn-outline-success"><a href="../index.php">Back To Homepage</a> </button>
                        <h3 class="card-title text-left mb-3">Login</h3>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                            <input type="hidden" name="_token" value="6KSM4J0Cbwlyqe2p7ZOCAXtAxJzTeRCudMFtBKFZ">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control p_input" required/>
                            <input type="hidden" name="todo" value="post">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control p_input" required/>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"> Remember me </label>
                                </div>
                                <a href="forget.php" class="forgot-pass">Forgot password</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                            </div>
<!--                            <div class="d-flex">-->
<!--                                <button class="btn btn-facebook mr-2 col">-->
<!--                                    <i class="mdi mdi-facebook"></i> Facebook </button>-->
<!--                                <button class="btn btn-google col">-->
<!--                                    <i class="mdi mdi-google-plus"></i> Google plus </button>-->
<!--                            </div>-->
                            <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
</body>
</html>