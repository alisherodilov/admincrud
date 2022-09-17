<?php
include 'partials/_config.php';
// var_dump($_POST);


$column_name = str_replace(' ', '', $_POST['column_name']);
$type = $_POST['type'];
$size = $_POST['size'];

$add_col = "ALTER TABLE $tablename ADD ";

$test = $baza->query($add_col . $column_name . " " . $type . "(" . $size . ")");

if ($test) {
    header('Location: index.php');
}

?>