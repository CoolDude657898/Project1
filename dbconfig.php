<?php

function connectDB(){
    $database = "mmeacha5";
    $user = "mmeacha5";
    $pass = "customize";
    $host = "localhost";
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
        }
    catch (PDOException $e) {echo $e;}
    return $db; }
?>