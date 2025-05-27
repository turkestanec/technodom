<?php
$localhost = 'localhost';
$login = 'root';
$password = 'root';
$databaseName = 'technodom';

$connection = mysqli_connect($localhost, $login, $password, $databaseName);

if (!$connection) {
    echo 'Байланыспады';
}
?>
