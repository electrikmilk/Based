<?php
/**
 * query.php
 *
 * @author brandonjordan
 * @datetime 3/12/2022 19:4
 * @copyright (c) 2022 Brandon Jordan
 */

$accepted_commands = [];
foreach (scandir(__DIR__ . '/commands') as $c) {
	if ($c === ".." || $c === ".") continue;
	if (pathinfo($c, PATHINFO_EXTENSION) !== "php") continue;
	$accepted_commands[] = str_replace(".php", "", $c);
}

$command = $_POST['command'];
if (in_array($command, $accepted_commands)) {
	include_once __DIR__ . "/commands/$command.php";
}