<?php
require_once('LeaderboardEntry.php');
require_once('config.php');

use ProjectSNM\LeaderboardEntry;

$query1 = "SELECT COUNT(*) FROM guess_it.leaderboard";
$rs1 = pg_query($link, $query1) or die("Cannot execute query: $query1\n");
$val1 = pg_fetch_result($rs1, 0, 0);

$entries = json_decode($_POST['entries'], true);
$player_name = "";
$guesses = "";
$day_of_word = "";

$newEntry = new LeaderboardEntry;

foreach ($entries as $entry) {
    $newEntry->set_player_name($entry['player_name']);
    $newEntry->set_guesses($entry['guesses']);
    $newEntry->set_day_of_word($entry['day_of_word']);
}

$player_name = $newEntry->get_player_name();
$guesses = $newEntry->get_guesses();
$day_of_word = $newEntry->get_day_of_word();

$query2 = "SELECT COUNT(*) FROM guess_it.leaderboard WHERE player_name = '" . $player_name . "' AND guesses = '" . $guesses . "'AND day_of_word = '" . $day_of_word . "'";
$rs2 = pg_query($link, $query2) or die("Cannot execute query: $query2\n");
$val2 = pg_fetch_result($rs2, 0, 0);


if ($val2 == 0) {
    $query = "INSERT INTO guess_it.leaderboard (l_id, player_name, guesses, day_of_word) VALUES ('" . $val1 . "','" . $player_name . "','" . $guesses . "','" . $day_of_word . "')";
    $rs = pg_query($link, $query) or die("Cannot execute query: $query\n");
}
