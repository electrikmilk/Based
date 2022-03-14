/*
 * main.js
 *
 * @author brandonjordan
 * @datetime 3/12/2022 22:1
 * @copyright (c) 2022 Brandon Jordan
 */

let current_database;
let current_table;

$(function () {
	load_tree();
});

function load_tree() {
	$("aside ul").html("Loading...");
	$.ajax({
		type: "POST",
		url: "backend",
		data: {
			action: "tree"
		},
		success: function (response) {
			console.log(response);
			$("aside ul").html(response);
		},
		error: function (error) {
			console.error(error);
		}
	});
}

function load_table(table) {
	if (table) {
		current_table = table;
	}
	let query = $("#row-search").val();
	$("section").html("Loading...");
	$.ajax({
		type: "POST",
		url: "backend",
		data: {
			action: "query",
			command: "select",
			table: current_table,
			query: query
		},
		success: function (response) {
			console.log("select: " + response);
			$("section").html(response);
		},
		error: function (error) {
			console.error("select error: " + error);
		}
	});
}