<?php
include 'partials/_config.php';
$newtablename = $_GET['table'];


$sql11 = "CREATE TABLE ".$newtablename." (id int auto_increment primary key, name varchar(200))";
$test = $baza->query($sql11);

header("Location: index.php");
