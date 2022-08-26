<?php


$host = "localhost";
$dbname = "bookstore";
$username = "root";
$password = "";

// <!-- Connection string -->

try{
    $connection = New PDO ("mysql:host={$host}; dbname={$dbname}", $username, 
    $password);

}catch(PDOException $error){
    echo "connection error".$error -> getMessage();
}

