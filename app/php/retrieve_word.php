<?php
date_default_timezone_set('America/Toronto');
require_once('config.php');

# Getting a random number from 0 to 2776 (these are the ids of each word in database for regular/random mode)
srand(date("mjy"));
$random_id = rand(0, 2776);

srand();
$random_id2 = rand(0, 2776);
$random_id3 = rand(0, 120);
$random_id4 = rand(0, 165);


# This query will select all rows from the table with the id = $random_id
$query = "SELECT * FROM guess_it.regular_random_mode WHERE id = $random_id";
$query2 = "SELECT * FROM guess_it.regular_random_mode WHERE id = $random_id2";
$query3 = "SELECT * FROM guess_it.celebrity_mode WHERE c_id = $random_id3";
$query4 = "SELECT * FROM guess_it.educational_mode WHERE e_id = $random_id4";
# Get the result from the database
$rs = pg_query($link, $query) or die("Cannot execute query: $query\n");
$rs2 = pg_query($link, $query2) or die("Cannot execute query: $query\n");
$rs3 = pg_query($link, $query3) or die("Cannot execute query: $query\n");
$rs4 = pg_query($link, $query4) or die("Cannot execute query: $query\n");
# Fetch the result as a value (we are looking at row 0, column 1 of the result from the query)
# This is the "word" column; so we have successfully fetched a word from the table.
$val = array(pg_fetch_result($rs, 0, 1), pg_fetch_result($rs2, 0, 1), pg_fetch_result($rs3, 0, 1), pg_fetch_result($rs4, 0, 1), rand(0, 123456789));

echo json_encode($val);