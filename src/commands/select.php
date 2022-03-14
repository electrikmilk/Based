<?php
/**
 * select.php
 *
 * @author brandonjordan
 * @datetime 3/12/2022 22:27
 * @copyright (c) 2022 Brandon Jordan
 */

$table = $_POST['table'];
$where = $_POST['where'];
$order_by = $_POST['order_by'];

$page = 1;
$limit = 25;
if ($_POST['limit']) {
	$limit = (int)$_POST['limit'];
}

$db = new Database("based");
$query = $db->get($table, $where, $order_by, $limit);

if ($query) {
	$pages = round($db->count() / $limit);
	?>
	<button onclick="load_table()">Refresh</button>
	<input type="search" placeholder="Filter" id="row-search" onchange="load_table()"/>
	<select id="page" onchange="load_table()">
		<optgroup label="Page">
			<?php
			for ($i = 0; $i <= $pages; $i++) {
				echo $i;
			}
			?>
		</optgroup>
	</select>
	<select id="limit" onchange="load_table()">
		<optgroup label="Rows per page">
			<?php
			$limits = ["25", "50", "100", "500", "1,000"];
			foreach ($limits as $l) {
				echo "<option value='" . (int)$l . "' " . (($limit === $l) ? "selected" : "") . ">$l</option>";
			}
			?>
		</optgroup>
	</select>
	<?php
	echo "<hr/><p>" . $db->count() . " row" . ($db->count() !== 1 ? "s" : "") . ".</p><hr/>";
	echo "<table><thead><th></th>";
	foreach ($query as $column => $value) {
		if (is_int($column)) {
			continue;
		}
		echo "<th>$column</th>";
	}
	echo "</thead><tbody>";
	echo "<td><input type='checkbox'/></td>";
	foreach ($query as $column => $value) {
		if (is_int($column)) continue;
		if (is_null($value)) $value = "<em>NULL</em>";
		echo "<td>$value</td>";
	}
	echo "</tbody></table>";
} elseif ($db->error()) {
	echo "<p style='color:red;'>Error: " . $db->error() . "</p>";
}