<?php
// customer class
// insert stripe customer into own database

class Customer{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    // add customer to DB method
    public function addCustomer($customer){
        // sql statement
        $this->db->query('INSERT INTO customer (id, first_name, last_name, email) VALUES (:id, :first_name, :last_name, :email)');
        // bind values
        $this->db->bind('id', $customer['id']);
        $this->db->bind('first_name', $customer['first_name']);
        $this->db->bind('last_name', $customer['last_name']);
        $this->db->bind('email', $customer['email']);
        //execute
        $this->db->execute();
    }
    // get customers from DB
    public function getCustomers(){
        $this->db->query('SELECT * FROM customer ORDER BY created_at DESC');
        return $result = $this->db->resultset();
    }
}