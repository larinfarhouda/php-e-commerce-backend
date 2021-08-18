<?php

$serveername = "localhost";
$dbusername = "root";
$bdpassword = "";
$dbname = "ecommerce";

$conn = mysqli_connect($serveername,$dbusername,$bdpassword,$dbname);


if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}