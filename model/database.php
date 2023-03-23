<?php
    $dsn = 'mysql:host=r4wkv4apxn9btls2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=r7g8fyyovht5zmwf';
    $username = 'o72xq0azop2f0fzj';
    $password = 'ho14plukfvyp73sf';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = 'Database error';
        $error_message .= $e->getMessage();
        echo $error_message;
        //include('database_error.php');
        exit();
    }
?>
