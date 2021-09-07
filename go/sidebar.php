<?php include "../include/database.php";
if (!isset($_SESSION['username'])) {
print "
<script>
    window.location = 'login.php';
</script>
";
}
?>
<?php



$query="SELECT * FROM  wallet WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $balance=$row["balance"];
//    $account_name=$row["account_name"];
//    $account_no=$row["account_no"];
}
$query="SELECT * FROM  userbvn WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
$bvn=0;
while($row = mysqli_fetch_array($result))
{
    $bvn=$row["bvn"];
}
$depositor=0;
$iwallet=0;
$query="SELECT * FROM deposit where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $depositor=$row["amount"];
    $iwallet=$row["iwallet"];

}
?>

<?php
$result = mysqli_query($con,"SELECT sum(amount) FROM  deposit where username ='" . $_SESSION['username'] . "'");
$row = mysqli_fetch_row($result);
$deposited = $row[0];

?>
<?php
$query="SELECT  sum(amount) FROM referal where username = '" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $refer=$row[0];


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Efe Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/logo2.png" />
</head>
<?php
$result = mysqli_query($con,"SELECT sum(amount) FROM  deposit where username = '" . $_SESSION['username'] . "'");
$row = mysqli_fetch_row($result);
$deposited = $row[0];

?>
<?php
$query="SELECT  sum(amount) FROM referal where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $refer=$row[0];


}
$query="SELECT * FROM  wallet WHERE username='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $balance=$row["balance"];
    $account_name=$row["account_name"];
    $account_no=$row["account_no"];
}
$depositor=0;
$iwallet=0;//
$query="SELECT * FROM deposit where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $depositor=$row["amount"];
    $iwallet=$row["iwallet"];

}
$lock=0;
$query="SELECT * FROM safe_lock where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) {
    $lock = $row["balance"];
    $da = $row["date"];
}

$query="SELECT * FROM users where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) {
    $date = $row["date"];
    $username=$row["username"];
    $name=$row["name"];
    $email=$row["email"];
}
?>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="../index.php"><img src="assets/images/logo2.png" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini" href="../index.php"><img src="assets/images/logo2.png" alt="logo" /></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="assets/images/user.png" alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal"><?php echo decryptdata($username); ?></h5>
                            <span><?php echo decryptdata($name); ?></span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                        <a href="profile.php" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="pass.php" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="../index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title">HomePage</span>
                </a>
            </li>
			<li class="nav-item menu-items">
				<a class="nav-link" href="news.php">
					<span class="menu-icon">
						<i class="mdi mdi-speedometer"></i>
					</span>
					<span class="menu-title">General News</span>
				</a>
			</li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="fund.php">
              <span class="menu-icon">
                <i class="mdi mdi-wallet-membership"></i>
              </span>
                    <span class="menu-title">Make Deposit</span>
                </a>
            </li>
            <?php
            $status=0;
            $query="SELECT * FROM safe_lock where username ='" . $_SESSION['username'] . "'";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($result)) {
                $status = $row["status"];
                $da = $row["date"];
            }

            if ($status == 0){ ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="safelock.php">
              <span class="menu-icon">
                <i class="mdi mdi-lock-alert"></i>
              </span>
                    <span class="menu-title">Create Safe Lock</span>
                </a>
            </li>
            <?php }else{ ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="add.php">
              <span class="menu-icon">
                <i class="mdi mdi-lock-alert"></i>
              </span>
                    <span class="menu-title">Add To Lock</span>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item menu-items">
                <a class="nav-link" href="buydata.php">
              <span class="menu-icon">
                <i class="mdi mdi-printer-off"></i>
              </span>
                    <span class="menu-title">Buy Data</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="buyair.php">
              <span class="menu-icon">
                <i class="mdi mdi-printer-off"></i>
              </span>
                    <span class="menu-title">Buy Airtime</span>
                </a>
            </li>
			<li class="nav-item menu-items">
				<a class="nav-link" href="buytv.php">
					<span class="menu-icon">
						<i class="mdi mdi-network-strength-2"></i>
					</span>
					<span class="menu-title">Cable Subscription</span>
				</a>
			</li>
			<li class="nav-item menu-items">
				<a class="nav-link" href="nepa.php">
					<span class="menu-icon">
						<i class="mdi mdi-network-strength-4-alert"></i>
					</span>
					<span class="menu-title">Pay Electricity</span>
				</a>
			</li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="myinvoice.php">
              <span class="menu-icon">
                <i class="mdi mdi-printer-off"></i>
              </span>
                    <span class="menu-title">My Invoice</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="profilebvn.php">
              <span class="menu-icon">
                <i class="mdi mdi-printer-off"></i>
              </span>
                    <span class="menu-title">Submit BVN</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="history.php">
              <span class="menu-icon">
                <i class="mdi mdi-history"></i>
              </span>
                    <span class="menu-title">Deposit History</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="refer.php">
              <span class="menu-icon">
                <i class="mdi mdi-lamp"></i>
              </span>
                    <span class="menu-title">Referral</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="h2.php">
              <span class="menu-icon">
                <i class="mdi mdi-code-brackets"></i>
              </span>
                    <span class="menu-title">Referral History</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="with.php">
              <span class="menu-icon">
                <i class="mdi mdi-wallet"></i>
              </span>
                    <span class="menu-title">Withdraw Option</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="trans.php">
              <span class="menu-icon">
                <i class="mdi mdi-wallet-giftcard"></i>
              </span>
                    <span class="menu-title">Make Transfer</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="profile.php">
              <span class="menu-icon">
                <i class="mdi mdi-account"></i>
              </span>
                    <span class="menu-title">Profile</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="pass.php">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
                    <span class="menu-title">Change Password</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="logout.php">
              <span class="menu-icon">
                <i class="mdi mdi-power-settings"></i>
              </span>
                    <span class="menu-title">Log-Out</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products">
                        </form>
                    </li>
                </ul>
				<ul class="navbar-nav w-100">
					<li class="nav-item w-100">
					<a href="news.php">
					<h4 class="text-body">Latest News</h4>	
					</a>
					</li>
				</ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                            <span class="count bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Event today</p>
                                    <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item"href="pass.php">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                    <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-link-variant text-warning"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Launch Admin</p>
                                    <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">See all notifications</p>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="assets/images/user.png" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo decryptdata($username); ?></p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="profile.php">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="logout.php">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Log out</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <p class="p-3 mb-0 text-center">Advanced settings</p>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            <?php
  $query="SELECT * FROM  mg";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)) {
$mo= $row["message"];
}
?>
 <marquee class="font-weight-bold mb-0">
	<h4>
		<b><?php echo $mo; ?></b></h4>
</marquee>


















                <!-- container-scroller -->
                <!-- plugins:js -->
                <script src="assets/vendors/js/vendor.bundle.base.js"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <script src="assets/vendors/chart.js/Chart.min.js"></script>
                <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
                <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
                <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
                <!-- End plugin js for this page -->
                <!-- inject:js -->
                <script src="assets/js/off-canvas.js"></script>
                <script src="assets/js/hoverable-collapse.js"></script>
                <script src="assets/js/misc.js"></script>
                <script src="assets/js/settings.js"></script>
                <script src="assets/js/todolist.js"></script>
                <!-- endinject -->
                <!-- Custom js for this page -->
                <script src="assets/js/dashboard.js"></script>