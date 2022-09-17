<?php
ini_set("display_errors", 1);

function dd($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

$data = $_POST;

$username = str_replace(' ', '', $_POST['username']);
$password = str_replace(' ', '', $_POST['password']);
$database_name = str_replace(' ', '', $_POST['database']);
$table_name = str_replace(' ', '', $_POST['table']);

$connaction = mysqli_connect('localhost', $username, $password, $database_name);
$_SESSION['connaction'] = $connaction;

$count_columns = (count($data) - 4) / 3;
$col_names = [];
$col_types = [];
$col_sizes = [];

for ($i = 1; $i <= $count_columns; $i++) {
  $col_names[$i] = str_replace(' ', '', $_POST['column_name' . $i]);
  $col_types[$i] = str_replace(' ', '', $_POST['type' . $i]);
  $col_sizes[$i] = str_replace(' ', '', $_POST['size' . $i]);
}


if ($connaction) {
  $add_col = "ALTER TABLE $table_name ADD ";
  $sql = "CREATE TABLE $table_name (id int auto_increment primary key)";
  $connaction->query($sql);

  for ($f = 1; $f <= count($col_names); $f++) {
    $connaction->query($add_col . $col_names[$f] . " " . $col_types[$f] . "(" . $col_sizes[$f] . ")");
  }

  $conf = '<?php
            $dbname = "'.$database_name.'";
            $baza = mysqli_connect("localhost", "' . $username . '", "' . $password . '", "' . $database_name . '");
            $tablename = "' . $table_name . '";';
  file_put_contents('./_config.php', '');
  file_put_contents('./_config.php', $conf);




  // // sidebar //

  // file_put_contents('../sidebar.php', '');

  // $table = $connaction->query('SHOW TABLES;');
  // $tables = $table->fetch_all();
  // $tstr = '';

  // foreach ($tables as $tableName) {
  //   $li = '<li class="nav-item menu-items">
  //           <a class="nav-link" href="controller.php?table=' . $tableName[0] . '">
  //             <span class="menu-icon">
  //               <i class="mdi mdi-table-large"></i>
  //             </span>
  //             <span class="menu-title">' . strtoupper($tableName[0]) . '</span>
  //           </a>
  //         </li>
  //         ';

  //   $tstr .= $li;
  // }
  // file_put_contents('../sidebar.php', $tstr);
  header('Location: ../index.php');
}
