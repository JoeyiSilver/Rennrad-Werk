<?php
$host = "db-mysql-fra1-44104-do-user-15108968-0.c.db.ondigitalocean.com";
$name = "defaultdb";
$user = "Cornelius";
$passwort = "AVNS_VlFRvzOy2dSzV8U4dP4";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>