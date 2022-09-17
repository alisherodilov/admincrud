<?php
include './partials/_config.php';

$id = $_GET['id'];

$sql = "delete from $tablename where id= $id";

$test = $baza->query($sql);

if ($test){
  header("Location: index.php");
}