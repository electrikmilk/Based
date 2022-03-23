<?php
/**
 * tree.php
 *
 * @author brandonjordan
 * @datetime 3/22/2022 23:49
 * @copyright (c) 2022 Brandon Jordan
 */

$connection = mysqli_connect('localhost', 'root', 'root');
$databases = mysqli_query($connection, "SHOW DATABASES");
while ($database = mysqli_fetch_array($databases)) {
	$db_name = $database[0];
	echo "<li><a href='#'>[<span>&plus;</span>] $db_name</a>";
	$tables = mysqli_query($connection, "SHOW TABLES from $db_name");
	if (mysqli_num_rows($tables)) {
		echo "<ul>";
		while ($table = mysqli_fetch_array($tables)) {
			echo "<li><a href='#' onclick='load_table(\"{$table[0]}\")'>{$table[0]}</a></li>";
		}
		echo "</ul>";
	}
	echo "</li>";
}