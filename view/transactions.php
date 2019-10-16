<?php
// include database connection and models
require_once('../config/db.php');
require_once('../lib/pdo.php');
require_once('../models/Transaction.php');

// instantiate customer
$transaction = new Transaction;
// get customer data
$transactions = $transaction->getTransactions();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Transactions Data</title>
</head>
<body>
    <div class="container mt-4">
            <div class="btn-group mb-4" role="group">
                <a href="customers.php" class="btn btn-primary">Customers Data</a>
                <a href="transactions.php" class="btn btn-secondary">Transactions Data</a>
            </div>
            <h2 class="text-center">Customers</h2>
            <table class="table table-striped mb-4">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($transactions as $transaction): ?>
                        <td><?php echo $transaction->id ?></td>
                        <td><?php echo $transaction->customer_id ?></td>
                        <td><?php echo $transaction->product ?></td>
                        <td><?php echo sprintf('%.2f',$transaction->amount / 100) ;?> <?php echo strtoupper($transaction->currency) ;?></td>
                        <td><?php echo $transaction->status ?></td>
                        <td><?php echo $transaction->created_at ?></td>
                    <?php endforeach ;?>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><a href="../index.php" class="btn btn-primary">Payment Page</a></p>
    </div>
</body>
</html>