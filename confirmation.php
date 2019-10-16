<?php
// check url parameter
if(!empty($_GET['tid']) && !empty($_GET['product']) && !empty($_GET['amount'])){
    // get and filter GET_POST data
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $product = $GET['product'];
    $amount = $GET['amount'];
    $tid = $GET['tid'];
    
}else{
    Header('Location:./index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Confirmation</title>
</head>
<body>
    <div class="container mt-4">
        <div class="bg-light text-center">
            <h2>Thank you for your purchase</h2>
            <hr>
            <p>You bought <strong><?php echo $product ?></strong> for the amount of <strong><?php echo $amount ?> €</strong></p>
            <p>Your transaction ID is: <strong><?php echo $tid ?></strong></p>
            <p><a href="./index.php" class="btn btn-primary mt-4">Make another purchase</a></p>
        </div>
    </div>
</body>
</html>