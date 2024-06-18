<?php
require_once 'load_env.php';
loadEnv('database.env');

$hostname = getenv('DB_HOSTNAME');
$userDataBase = getenv('DB_USERNAME');
$passwordUser = getenv('DB_PASSWORD');
$databaseName = getenv('DB_DATABASE');

$koneksi = mysqli_connect($hostname, $userDataBase, $passwordUser, $databaseName) or die(mysqli_error($koneksi));
?>
