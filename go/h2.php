<?php include "sidebar.php"; ?>
<?php
$query="SELECT  sum(amount) FROM referal where username ='" . $_SESSION['username'] . "'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $refer=$row[0];


}
?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h6 class="text-secondary">REFERRAL HISTORY</h6>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <tfoot>
                        <thead>
                        <tr>
                            <th class="width_table1">Id</th>
                            <th class="width_table1">username</th>
                            <th class="width_table1">Referral</tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM referal WHERE username ='" . $_SESSION['username'] . "'";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) { ?>

                            <tr>
                                <td><?php echo $row["id"] ; ?></td>
                                <td><?php echo $row["username"] ; ?></td>
                                <td><?php echo $row["newuserid"] ; ?></td>
                            </tr>
                            <?php
                        }
                        ?>



                        </tbody>
                    </table>


</div>
            </div>
        </div>
    </div>
</div>
