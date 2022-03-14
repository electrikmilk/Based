<?php
/**
 * tree.php
 *
 * @author brandonjordan
 * @datetime 3/12/2022 21:44
 * @copyright (c) 2022 Brandon Jordan
 */

//$connection = mysqli_connect('localhost', 'root', 'root');
//$databases = mysqli_query($connection, "select name from master.sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");
//print_r(mysqli_fetch_array($databases));
//while ($row = mysqli_fetch_array($databases)) {
//	foreach ($row as $column => $value) {
//		echo "$column => $value<hr/>";
//	}
//}

echo "<li><a href='#' onclick='load_table(\"employees\")'>employees</a></li>";