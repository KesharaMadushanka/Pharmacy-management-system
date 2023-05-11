<?php

include_once('../../functions/userFunctions.php');

?>

<div class="card" style="opacity: 0.9;">
    <div class="card" style="opacity: 0.9;">
        <div class="card-header">
            Profit
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark" style="font-size:15px;">
                <thead>
                    <tr>
                        <th scope="col">Total Expense</th>
                        <th scope="col">Total Income</th>
                        <th scope="col">Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="font-size:30px;">
                        <th scope="row">Rs. <?php expense();?> </th>
                        <th scope="row">Rs. <?php income();?> </th>
                        <th scope="row">Rs. <?php profit();?> </th>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


</div>