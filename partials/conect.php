<?php
$namedb="id18411726_styngerwebsite";
$servername="localhost";
$usernamebd="root";
$password="";
$conn=new mysqli($servername,$usernamebd,$password,$namedb);
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}


?>
