<?php
$host="localhost";
$user="root";
$pwd="";
$dbname="propertymanagement";
$con=mysqli_connect($host,$user,$pwd,$dbname);
if(mysqli_connect_error())
{
    echo"<script>alert('cannot connect to database');</script>";
    exit(); 
}
?>