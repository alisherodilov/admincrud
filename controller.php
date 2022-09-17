<?php
ini_set("display_errors", 1);
include 'partials/_config.php';

if (isset($_GET['table'])) {
    $table = $_GET['table'];

    $t = $tablename;
    $ls = file_get_contents('./partials/_config.php');

    $s = '$tablename = "'.$tablename.'";';
    $r = '$tablename = "'.$table.'";';
    // configdagi text bir xil bo'lmasa enangni ko'rasan!!!

    $result=str_replace($s,$r,$ls);
    
    file_put_contents('./partials/_config.php',$result);

     header("Location: ./index.php");
}