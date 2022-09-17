<?php

include './partials/_config.php';

$id = $_POST['id'];
unset($_POST['id']);


$col_names = array_keys($_POST);

$col_values =array_map(function ($item){
  return "'$item'";
}, array_values($_POST));

$str='';
$vergul=',';
foreach ($col_names as $key => $col_name) {
  if ($key==count($col_values)-1){
    $vergul='';
  }
  $str.=$col_name." = " .$col_values[$key]."$vergul ";
}

$sql = "UPDATE $tablename SET $str where id = $id";
$test = $baza->query($sql);

if ($test){
 header("Location: index.php");
}

