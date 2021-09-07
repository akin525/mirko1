<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
	<meta name="description" content="We help you save money with our our secure safe lock plans. Save and earn 5-10% per annum">
    <meta name="author" content="Efemobilemoney">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Efefmobilemoney</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/fontawesome-all.min.css" rel="stylesheet">
    <link href="./css/aos.min.css" rel="stylesheet">
    <link href="./css/swiper.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="./assets/images/favicon.png">
</head>
<body>
    
    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text" href="index.php">EFE MOBILE MONEY</a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault" >
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#header">Home</a>
                    </li>
                    <?php include "include/database.php";?>
                    <?php if( isset($_SESSION['username']) ){
                    $query = "SELECT * FROM  users WHERE username='" . $_SESSION['username'] . "'";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        $username = "$row[username]";
                        $name = $row["name"];
                        $date = $row["date"];
                        $email = $row["email"];
                        $phone = $row["phone"];

                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo decryptdata($name); ?></a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="go/dashboard.php">Dashboard</a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="go/logout.php">Log-Out</a>
                    </li>
                    <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="go/login.php">Sign-In</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="go/register.php">Join Us</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#plans">Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Home -->
    <section class="home py-5 d-flex align-items-center" id="header">
        <div class="container text-light py-5"  data-aos="fade-right"> 
            <h1 class="headline"><span class="home_text">We Provide </span><br>The Best Tools To Save</h1>
            <p class="para para-light py-3">We help you save money with our our secure safe lock plans. Save and earn 5-10% per annum</p>
            <div class="d-flex align-items-center">
                <p class="p-2"><i class="fas fa-laptop-house fa-lg"></i></p>
                <p>SAVE SMART, SAVE SECURELY, SAVE REGULARLY!</p>
            </div>
            <div class="d-flex align-items-center">
                <p class="p-2"><i class="fas fa-wifi fa-lg"></i></p>
                <p>Airtime/Mobile Data Available</p>
            </div>
            <div class="my-3">
                <a class="btn" href="#plans">View Plans</a>
            </div>
            <div class="d-flex justify-content-center justify-content-lg-start">
                <?php if( isset($_SESSION['username'])){ ?>
                    <button type="button" class="btn btn-success"><a href="go/dashboard.php" class="btn-get-started scrollto">Dashboard</a></button>
                <?php }else{ ?>
                    <button type="button" class="btn btn-success"><a href="go/login.php">Log-In</a></button>
                    <button type="button" class="btn btn-success"><a href="go/register.php">Register</a></button>
                <?php } ?>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of home -->


    <!-- Information -->
    <section class="information">
        <div class="container-fluid">  
            <div class="row text-light">
                <div class="col-lg-4 text-center p-5" data-aos="zoom-in">
                    <i class="fas fa-tachometer-alt fa-3x p-2"></i>
                    <h4 class="py-3">Save Smart</h4>
                    <p class="para-light">the money that you keep in an account in a bank or similar financial organization</p>
                </div>
                <div class="col-lg-4 text-center p-5"  data-aos="zoom-in">
                    <i class="fas fa-clock fa-3x p-2"></i>
                    <h4 class="py-3">99% Internet Uptime</h4>
                    <p class="para-light">Start enjoying this very low rates Data plan for your internet browsing databundle.</p>
                </div>
                <div class="col-lg-4 text-center p-5 text-dark"  data-aos="zoom-in"> 
                    <i class="fas fa-headset fa-3x p-2"></i>
                    <h4 class="py-3">24/7 Support </h4>
                    <p class="para-light">We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv & Startimes), Electricity Bill Payment and Educational PIN(s) with instant delivery</p>
                </div>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of information -->
    

    <!-- About -->
    <section class="about d-flex align-items-center text-light py-5" id="about">
        <div class="container" >
            <div class="row d-flex align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <p>ABOUT US</p>
                    <h1>Who We Are<br></h1>
                    <p class="py-2 para-light">Efe Mobile Money is an online saving platform that give her users avenue to automate their savings, users can save their funds using our well secured saving plan. We give 10% interest Per annum on every Penny Saved. We help you save your money safely and securely with our safe lock plans.</p>
                    <p class="py-2 para-light"></p>

                    <div class="my-3">
                        <a class="btn" href="#your-link">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center py-4 py-sm-0" data-aos="fade-down"> 
                    <img class="img-fluid" src="./assets/images/about.jpg" alt="about" >
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of about -->

<br>
    <br>

    <!-- Services -->
    <section class="services d-flex align-items-center py-5" id="services">
        <div class="container text-light">
            <div class="text-center pb-4" >
                <p>OUR SERVICES</p> 
                <h2 class="py-2">Explore unlimited possibilities</h2>
                <p class="para-light">We help you Save and Keep your Funds Securely</p>
            </div>
            <div class="row gy-4 py-2" data-aos="zoom-in">
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-home fa-2x"></i>
                        <h4 class="py-2">Stable & Profitable</h4>
                        <p class="para-light">Experienced business owners and managers know that 3 things are necessary to ensure the long- term success of any business: growth, profit and stability</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-wifi fa-2x"></i>
                        <h4 class="py-2"> Mobile Data</h4>
                        <p class="para-light">Start enjoying this very low rates Data plan for your internet browsing databundle.</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-phone fa-2x"></i>
                        <h4 class="py-2">Instant Withdraw</h4>
                        <p class="para-light">Withdrawal Speed: Up to 4 hours .General rules for depositing and withdrawing funds . If a deposit or withdrawal is not subject to instant execution</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-mobile fa-2x"></i>
                        <h4 class="py-2">Referral Provides</h4>
                        <p class="para-light">A referral program is an organized process in which customers are rewarded for spreading the word.</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-home fa-2x"></i>
                        <h4 class="py-2">SECURITY</h4>
                        <p class="para-light">Your payment is secure and your details will never be at risk</p>
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-tv fa-2x"></i>
                        <h4 class="py-2">Cable Subscription</h4>
                        <p class="para-light">Instantly Activate Cable subscription with favourable discount compare to others</p>
                    </div>                    
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of services -->

<br>
    <br>
    <br>
    <br>
    <!-- Plans -->
    <section class="plans d-flex align-items-center py-5" id="plans">
        <div class="container text-light" >
            <div class="text-center pb-4">
                <p>OUR PLANS</p>
                <h2 class="py-2">AFFORDABLE PLANS & PRICING</h2>
                <p class="para-light"></p>
            </div>
            <div class="row gy-3" data-aos="zoom-in">
                <div class="col-lg-3">
                    <div class="card bg-transparent px-4">
                        <h4 class="py-2">MTN BUNDLE </h4>
                        <?php

                        $query="SELECT * FROM products1 where `product_type1`='m' LIMIT 6";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>
                            <tbody>
                            <center>
                                <div class="card-body justify-content-center text-center">
                                    <tr>
                                        <td><small class="align-baseline">&#8358;<?php echo $row["tittle"];?>-</small></td>
                                        <td><i> &#8358;<?php echo $row["amount"];?></i></td>
                                        <!--                <td style="color: rgb(35,20,2); font-size:12px;  font-weight: bolder;"><i>1Month</i></td>-->
                                    </tr>

                                </div>
                            </center>
                            </tbody>
                        <?php } ?>
                        <div class="my-3">
                            <a class="btn" href="go/buydata.php" >Buy Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card bg-transparent px-4">
                        <h4 class="py-2">Airtel BUNDLE</h4>
                        <?php

                        $query="SELECT * FROM products1 where `product_type1`='a' LIMIT 5";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>
                            <tbody>
                            <center>
                                <div class="card-body justify-content-center text-center">
                                    <tr>
                                        <td><small class="align-baseline">&#8358;<?php echo $row["tittle"];?>-</small></td>
                                        <td><i> &#8358;<?php echo $row["amount"];?></i></td>
                                        <!--                <td style="color: rgb(35,20,2); font-size:12px;  font-weight: bolder;"><i>1Month</i></td>-->
                                    </tr>

                                </div>
                            </center>
                            </tbody>
                        <?php } ?>
                        <div class="my-3">
                            <a class="btn" href="go/buydata.php" >Buy Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card bg-transparent px-4" >
                        <h4 class="py-2">GLO BUNDLE</h4>
                        <?php

                        $query="SELECT * FROM products1 where `product_type1`='g' LIMIT 5";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>
                            <tbody>
                            <center>
                                <div class="card-body justify-content-center text-center">
                                    <tr>
                                        <td><small class="align-baseline">&#8358;<?php echo $row["tittle"];?>-</small></td>
                                        <td><i> &#8358;<?php echo $row["amount"];?></i></td>
                                        <!--                <td style="color: rgb(35,20,2); font-size:12px;  font-weight: bolder;"><i>1Month</i></td>-->
                                    </tr>

                                </div>
                            </center>
                            </tbody>
                        <?php } ?>
                        <div class="my-3">
                            <a class="btn" href="go/buydata.php" >Buy Data</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card bg-transparent px-4" >
                        <h4 class="py-2">9MOBILEBUNDLE</h4>
                        <?php

                        $query="SELECT * FROM products1 where `product_type1`='9' LIMIT 5";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result))
                        {
                            ?>
                            <tbody>
                            <center>
                                <div class="card-body justify-content-center text-center">
                                    <tr>
                                        <td><small class="align-baseline">&#8358;<?php echo $row["tittle"];?>-</small></td>
                                        <td><i> &#8358;<?php echo $row["amount"];?></i></td>
                                        <!--                <td style="color: rgb(35,20,2); font-size:12px;  font-weight: bolder;"><i>1Month</i></td>-->
                                    </tr>

                                </div>
                            </center>
                            </tbody>
                        <?php } ?>
                        <div class="my-3">
                            <a class="btn" href="go/buydata.php" >Buy Data</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of plans -->

    <!-- Work -->
    <section class="work d-flex align-items-center py-5" >
        <div class="container-fluid text-light">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right">
                    <img class="img-fluid" src="./assets/images/work.jpg" alt="work">
                </div>
                <div class="col-lg-5 d-flex align-items-center px-4 py-3" data-aos="">
                    <div class="row">
                        <div class="text-center text-lg-start py-4 pt-lg-0">
                            <p>OUR WORK</p>
                            <h2 class="py-2">Explore unlimited possibilities</h2>
                            <p class="para-light">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos dicta mollitia totam explicabo obcaecati quia laudantium repudiandae.</p>
                        </div>
                        <div class="container" data-aos="fade-up">
                            <div class="row g-5">
                                <div class="col-6 text-start" >
                                    <i class="fas fa-briefcase fa-2x text-start"></i>
                                    <h2 class="purecounter" data-purecounter-start="0" data-purecounter-end="1258" data-purecounter-duration="3">1</h2>
                                    <p>PROJECTS COMPLETED</p>
                                </div>
                                <div class="col-6" >
                                    <i class="fas fa-award fa-2x"></i>
                                    <h2 class="purecounter" data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="3">1</h2>
                                    <p>AWARDS</p>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-users fa-2x"></i>
                                    <h2 class="purecounter" data-purecounter-start="0" data-purecounter-end="1255" data-purecounter-duration="3">1</h2>
                                    <p>CUSTOMER ACTIVE</p>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-clock fa-2x"></i>
                                    <h2 class="purecounter" data-purecounter-start="0" data-purecounter-end="1157" data-purecounter-duration="3">1</h2>
                                    <p>GOOD REVIEWS</p>
                                </div>
                            </div>
                        </div> <!-- end of container -->
                    </div> <!-- end of row -->
                </div> <!-- end of col-lg-5 -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of work -->

    <!-- Testimonials -->
    <div class="slider-1 testimonial text-light d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="text-center w-lg-75 m-auto pb-4">
                    <p>TESTIMONIALS</p>
                    <h2 class="py-2">What Our Clients Says</h2>
                    <p class="para-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci esse facilis vel, neque ipsa mollitia impedit, commodi ab illo dignissimos, voluptatum quae amet sed tenetur dolores reprehenderit laudantium quo sint.</p>
                </div>
            </div> <!-- end of row -->
            <div class="row p-2" data-aos="zoom-in">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>

                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-1.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <h6>Marlene Visconte</h6>
                                                <p>General Manager - Scouter</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-2.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <h6>John Spiker</h6>
                                                <p>Team Leader - Vanquish</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-3.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <h6>Stella Virtuoso</h6>
                                                <p>Design Chief - Upscale</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-4.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <p>Mike tim</p>
                                                <p>Investor - TechGroww</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of testimonials -->


    <!-- Newsletter -->
    <section class="newsletter text-light py-5">
        <div class="container">
            <div class="row" >
                <div class="col-lg-6 text-center text-lg-start" data-aos="fade-right">
                    <h4 class="py-1">Subscribe to our Newsletter</h4>
<!--                    <p class="para-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor deleniti nobis amet accusamus debitis facilis quibusdam officia laborum nesciunt. Nihil.</p>-->
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                    <div class="input-group my-3">
                        <input type="text" class="form-control p-2" placeholder="Enter your email address" aria-label="Recipient's email">
                        <button class="btn-secondary text-light" type="button">Subscribe</button>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of newsletter -->


    <!-- Contact -->
    <section class="contact d-flex align-items-center py-5" id="contact">
        <div class="container-fluid text-light">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center px-lg-5" data-aos="fade-right">
                    <div style="width:90%">
                        <div class="text-center text-lg-start py-4 pt-lg-0">
                            <p>CONTACT</p>
                            <h2 class="py-2">Send your query</h2>
<!--                            <p class="para-light">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos dicta mollitia totam explicabo obcaecati quia laudantium repudiandae.</p>-->
                        </div>
                        <div>
                            <div class="row" >
                                <div class="col-lg-6">
                                    <div class="form-group py-2">
                                        <input type="text" class="form-control form-control-input" id="exampleFormControlInput1" placeholder="Enter name">
                                    </div>                                
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group py-2">
                                        <input type="email" class="form-control form-control-input" id="exampleFormControlInput2" placeholder="Enter phone number">
                                    </div>                                 
                                </div>
                            </div>
                            <div class="form-group py-1">
                                <input type="email" class="form-control form-control-input" id="exampleFormControlInput3" placeholder="Enter email">
                            </div>  
                            <div class="form-group py-2">
                                <textarea class="form-control form-control-input" id="exampleFormControlTextarea1" rows="6" placeholder="Message"></textarea>
                            </div>                            
                        </div>
                        <div class="my-3">
                            <a class="btn form-control-submit-button" href="#your-link">Submit</a>
                        </div>
                    </div> <!-- end of div -->
                </div> <!-- end of col -->
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                    <img class="img-fluid d-none d-lg-block" src="./assets/images/contact.jpg" alt="contact">        
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of contact -->


    <!-- Location -->
    <section class="location text-light py-5">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="p-2"><i class="far fa-map fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>ADDRESS</h6>
                        <p>Lagos Nigeria</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="fas fa-mobile-alt fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>CALL FOR QUERY</h6>
                        <p>0803 530 6324 or 0816 693 9205</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="far fa-envelope fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>SEND US MESSAGE</h6>
                        <p>info@efemobilemoney.com</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="far fa-clock fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>OPENING HOURS</h6>
                        <p>09:00 AM - 18:00 PM</p>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of location -->


    <!-- Footer -->
    <section class="footer text-light">
        <div class="container">
            <div class="row" data-aos="fade-right">
                <div class="col-lg-3 py-4 py-md-5">
                    <div class="d-flex align-items-center">
                        <h4 class="">Who we are</h4>
                    </div>
                    <p class="py-3 para-light">Efe Mobile Money is an online saving platform that give her users avenue to automate their savings, users can save their funds using our well secured saving plan. We give 10% interest Per annum on every Penny Saved. We help you save your money safely and securely with our safe lock plans.</p>
                    <div class="d-flex">
                        <div class="me-3">
                            <a href="#your-link">
                                <i class="fab fa-facebook-f fa-2x py-2"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <a href="#your-link">
                                <i class="fab fa-twitter fa-2x py-2"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <a href="#your-link">
                                <i class="fab fa-instagram fa-2x py-2"></i>
                            </a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-4 py-md-5">
                    <div>
                        <h4 class="py-2">Quick Links</h4>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#about"><p class="ms-3">About</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Services</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Plans</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Contact</p></a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-4 py-md-5">
                    <div>
                        <h4 class="py-2">Useful Links</h4>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Privacy</p></a>
                            
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Terms</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Disclaimer</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">FAQ</p></a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-4 py-md-5">
                    <div class="d-flex align-items-center">
                        <h4>Newsletter</h4>
                    </div>
<!--                    <p class="py-3 para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, ab.</p>-->
                    <div class="d-flex align-items-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control p-2" placeholder="Enter Email" aria-label="Recipient's email">
                            <button class="btn-secondary text-light"><i class="fas fa-envelope fa-lg"></i></button>       
                        </div>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of footer -->


    <!-- Bottom -->
    <div class="bottom py-2 text-light" >
        <div class="container d-flex justify-content-between">
            <div>
                <p>Copyright © Efemobilemoney</p><br>
<!--                <p>Distributed by: <a href="https://themewagon.com/">Themewagon</a></p>-->
            </div>
            <div>
                <i class="fab fa-cc-visa fa-lg p-1"></i>
                <i class="fab fa-cc-mastercard fa-lg p-1"></i>
                <i class="fab fa-cc-paypal fa-lg p-1"></i>
                <i class="fab fa-cc-amazon-pay fa-lg p-1"></i>
            </div>
        </div> <!-- end of container -->
    </div> <!-- end of bottom -->
 
 <!--Start of Tawk.to Script-->
 <script type="text/javascript">
 var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
 (function() {
	 var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	 s1.async=true;
	 s1.src='https://embed.tawk.to/5e3fdfb1298c395d1ce6f98a/default';
	 s1.charset='UTF-8';
	 s1.setAttribute('crossorigin','*');
	 s0.parentNode.insertBefore(s1,s0);
 })();
 </script>
 <!--End of Tawk.to Script-->
    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="assets/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->

    
    <!-- Scripts -->
    <script src="./js/bootstrap.min.js"></script><!-- Bootstrap framework -->
    <script src="./js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="./js/swiper.min.js"></script><!-- Swiper for image and text sliders -->
    <script src="./js/aos.js"></script><!-- AOS on Animation Scroll -->
    <script src="./js/script.js"></script>  <!-- Custom scripts -->
</body>
</html>