<?php
ini_set("display_errors", 1);

include './partials/_config.php';
//var_dump();
$col_names = implode(", ", array_keys($_POST));
$col_values = implode(", ", array_map(function ($item){
    return "'$item'";
}, array_values($_POST)));

$sql = "INSERT INTO $tablename ($col_names) VALUES ($col_values);";
$test = $baza->query($sql);
echo $test;

if ($test){
  header("Location: index.php");
}