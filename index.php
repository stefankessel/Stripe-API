<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Stripe Payment Form</title>
</head>
<body>
    <div class="container">
        <h3 class="my-4 text-center">Stripe Example Payment [9.99 €]</h3>
        <form action="./charge.php" method="post" id="payment-form">
            <div class="form-row">
                <input type="text" class="form-control mb-3" name="first-name" placeholder="First Name">
                <input type="text" class="form-control mb-3" name="last-name" placeholder="Last Name">
                <input type="email" class="form-control mb-3" name="email" placeholder="Email">
                <div id="card-element" class="form-control">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button>Submit Payment</button>
        </form>
    </div>
<!-- JS  -->  
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/main.js"></script>
</body>
</html>