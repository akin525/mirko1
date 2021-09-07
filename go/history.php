<?php include "sidebar.php"; ?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
    <h5 class="card-title">Deposit Transaction</h5>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <tfoot>
            <thead>
            <tr>
                <th>Date</th>
                <th>Username</th>
                <th>Total Balance</th>
                <th>Amount Before</th>
                <th>Amount After</th>
                <th>Payment_Ref</th>
            </tr>
            </thead>
            </tfoot>
            <?php
            $query = "SELECT * FROM deposit WHERE username ='" . $_SESSION['username'] . "'";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <!--                        <td>--><?php //echo $row["id"] ; ?><!--</td>-->
                    <td><?php echo $row["date"] ; ?></td>
                    <td><?php echo decryptdata($row["username"]) ; ?></td>
                    <td>NGN<?php echo $row["amount"] ; ?></td>
                    <td>NGN<?php echo $row["iwallet"] ; ?></td>
                    <td>NGN<?php echo $row["fwallet"] ; ?></td>
                    <td><?php echo $row ["payment_ref"] ; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>
