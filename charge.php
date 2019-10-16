<?php
// include stripe php bindings
require_once('vendor/autoload.php');
// include database connection and models
require_once('config/db.php');
require_once('lib/pdo.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

\Stripe\Stripe::setApiKey('insert your stripe key');

// get and filter input data
$first_name = filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'last-name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
// token id from hidden input , also see /js/main.js for token creation
$token = filter_input(INPUT_POST, 'stripeToken', FILTER_SANITIZE_STRING);

// create customer
$customer = \Stripe\Customer::create([
    'email' => $email,
    'source' => $token,
    'description' => 'Example customer'
]);

// charge customer
$charge = \Stripe\Charge::create([
    'amount' => 999,
    'currency' => 'eur',
    'description' => 'Example charge',
    'customer' => $customer->id
]);
// customer data
$customerData = [
    'id' => $customer->id,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

// instantiate new customer
$customerDB = new Customer;

//add customer to DB
$customerDB->addCustomer($customerData);

// transaction data for DB
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status,
  ];
  // Instantiate Transaction
  $transactionDB = new Transaction;
  // Add Transaction To DB
  $transactionDB->addTransaction($transactionData);

// redirect to order confirmation page
Header('Location: ./confirmation.php?tid='.$charge->id.'&product='.$charge->description.'&amount='.$charge->amount);