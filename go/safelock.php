<?php include "sidebar.php"; ?>
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">

                                            <h3>Create Safe Lock</h3>
                                                    <form action="paysafe.php" method="post">
                                                        <!--                                        <label>Select Payment Mode :</label>-->
                                                        <!--                                        <select name="action" id="action">-->
                                                        <!--                                            <option selected>choose gateway</option>-->
                                                        <!--                                            <option value="1">Wallet</option>-->
                                                        <!--                                            <option value="2">Atm Card</option>-->
                                                        <!--                                        </select>-->
                                                <div class="change_field">
                                                    <label>Amount To Lock :</label>
                                                    <input class="form-control" type="tel" name="amount" required />
                                                </div>
                                                <div class="change_field">
                                                    <label>full name :</label>
                                                    <input class="form-control" type="text" name="fname" required />
                                                </div>
                                                <div class="change_field">
                                                    <label>Email:</label>
                                                    <input class="form-control" type="email"  name="email" required/>
                                                </div>
                                                <div class="change_field">
                                                    <label>Phone Number:</label>
                                                    <input class="form-control" type="number"  name="number" required/>
                                                </div>
                                                <div class="change_field">
                                                    <label>Duration :</label>
                                                    <input class="form-control" type="date" name="date" placeholder="" required/>
                                                </div>
                                                        <br>
                                                <button type="submit" class="btn btn-outline-primary btn-rounded"> Continue</button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


