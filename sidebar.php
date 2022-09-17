<?php
include 'partials/_config.php';

$table = $baza->query('SHOW TABLES;');
$tables = $table->fetch_all();

foreach ($tables as $tableName) {
  echo '<li class="nav-item menu-items">
            <a class="nav-link" href="controller.php?table=' . $tableName[0] . '">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">' . strtoupper($tableName[0]) . ' </span>
            </a>
          </li>
          ';
}
