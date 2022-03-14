<?php
/**
 * backend.php
 *
 * @author brandonjordan
 * @datetime 3/12/2022 16:37
 * @copyright (c) 2022 Brandon Jordan
 */

spl_autoload_register(function ($class) {
	include_once "../classes/$class.php";
});

$action = $_POST['action'];
if (!file_exists("../src/$action.php")) {
	die("Error: action '$action' does not exist.");
}
include_once "../src/$action.php";