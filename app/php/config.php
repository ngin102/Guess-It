<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'postgres');
define('DB_PASSWORD', 'postgres');
define('DB_NAME', 'postgres');

$link = pg_connect("host=localhost port=5432 dbname=postgres");

if (!$link) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
