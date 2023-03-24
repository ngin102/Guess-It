<?php
require_once('TableInfo.php');
require_once('config.php');

use ProjectSNM\TableInfo;

date_default_timezone_set('America/Toronto');
//header("refresh: 1.5");

$today = date("Y-m-d");
$query = "SELECT player_name, guesses, l_id FROM guess_it.leaderboard WHERE day_of_word = '" . $today . "' ORDER BY guesses ASC, l_id ASC" ;
$query2 = "SELECT COUNT(*) FROM guess_it.leaderboard WHERE day_of_word = '" . $today . "'";

/*
$query = "SELECT player_name, guesses FROM guess_it.leaderboard WHERE day_of_word = '".$today."' ORDER BY guesses ASC";
*/
$result = pg_query($link, $query) or die("Cannot execute query: $query\n");
$result2 = pg_query($link, $query2) or die("Cannot execute query: $query\n");
$val2 = pg_fetch_result($result2, 0, 0);
$int_val2 = (int)$val2;

$tableInfo = new TableInfo;

$x = 0;
echo $tableInfo->print_table_header();
while ($x < $int_val2) {
    echo "<tr><td>" . pg_fetch_result($result, $x, 0) . "</td> <td>" . pg_fetch_result($result, $x, 1) . "</td> </tr>";
    $x++;
}
echo $tableInfo->print_table_closing_tags();
