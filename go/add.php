<?php include "sidebar.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
// Collect the data from post method of form submission //
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $number = mysqli_real_escape_string($con, $_POST['number']);

    $status = "OK";
    $msg = "";
    if (!isset($number) or strlen($number) < 11) {
        $msg = $msg . "number Should Contain Minimum 11 CHARACTERS.<br />";
        $status = "NOTOK";
    }
    if ($status == "OK") {

        $suss= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Select Payment Method </br></strong></div>";
        //printing error if found in validation
        print "
				<script language='javascript'>
window.location = 'wall.php?amount=".$amount."&number=".$number."';
</script>
";
    }else{
        $errormsg= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
    }

}
?>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                                            <h3>Add to Safe Lock</h3>


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

                                                        <!--                                        <label>Select Payment Mode :</label>-->
                                                        <!--                                        <select name="action" id="action">-->
                                                        <!--                                            <option selected>choose gateway</option>-->
                                                        <!--                                            <option value="1">Wallet</option>-->
                                                        <!--                                            <option value="2">Atm Card</option>-->
                                                        <!--                                        </select>-->

                                                <div class="change_field">
                                                    <label>Amount To Add :</label>
                                                    <input class="form-control" type="tel" name="amount" required />
                                                </div
                                                <div class="change_field">
                                                    <label>Phone Number:</label>
                                                    <input class="form-control" type="tel"  name="number" required/>
                                                </div>
                                                <button type="submit" class="btn btn-outline-primary btn-rounded"> Continue</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
