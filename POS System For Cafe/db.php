<?php
$servername="localhost";
$username="root";
$password="";
$database="sgp";
$conn=mysqli_connect($servername,$username,$password,$database);
$conn1=mysqli_connect($servername,$username,$password,$database);
$conn2=mysqli_connect($servername,$username,$password,$database);


if (!$conn) {
    die("sorry we failed to connect." . mysqli_connect_error());
} else {
    // echo "we connect to database";
}

?>