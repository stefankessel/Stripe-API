<?php
// include database connection and models
require_once('../config/db.php');
require_once('../lib/pdo.php');
require_once('../models/Customer.php');

// instantiate customer
$customer = new Customer;
// get customer data
$customers = $customer->getCustomers();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Customers Data</title>
</head>
<body>
    <div class="container mt-4">
            <div class="btn-group mb-4" role="group">
                <a href="customers.php" class="btn btn-secondary">Customers Data</a>
                <a href="transactions.php" class="btn btn-primary">Transactions Data</a>
            </div>
            <h2 class="text-center">Customers</h2>
            <table class="table table-striped mb-4">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Customer ID</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($customers as $customer): ?>
                        <td><?php echo $customer->last_name ?></td>
                        <td><?php echo $customer->first_name ?></td>
                        <td><?php echo $customer->email ?></td>
                        <td><?php echo $customer->id ?></td>
                        <td><?php echo $customer->created_at ?></td>
                    <?php endforeach ;?>
                    </tr>
                </tbody>
            </table>
            <br>
            <p><a href="../index.php" class="btn btn-primary">Payment Page</a></p>
    </div>
</body>
</html>