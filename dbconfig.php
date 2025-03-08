<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function connectDB(){
    $database = "mmeacha5";
    $user = "mmeacha5";
    $pass = "customize";
    $host = "localhost";
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
        echo "db success"; }    # You’ll need to take this echo out when you know it’s working
    catch (PDOException $e) {echo $e;}
    return $db; } ?>