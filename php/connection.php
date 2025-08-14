<?php
///////////////////////////////////////////////////////////////////////////////////////////////

$host = "localhost";  // host name
$dbname = "ub_medias_db"; // database name
$user = "root"; // user name
$pass = ""; // password

/* $host = "localhost";  // host name
$dbname = "amtechco_ub_medias_db"; // database name
$user = "amtechco_ub_medias"; // user name
$pass = "UB-medias001"; // password */

///////////////////////////////////////////////////////////////////////////////////////////////

try {
    // send connection the the databse  
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the attribution

    if ($pdo) { // test if the connection is etablished
        //echo "connected"; // return this text if connected successfully
    } else {
        echo "error while connecting to the database"; // return this is not connected
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

///////////////////////////////////////////////////////////////////////////////////////////////
