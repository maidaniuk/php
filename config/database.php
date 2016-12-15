<?php
// This is the database connection configuration.
function connect () {
$host = 'localhost';
$dbname = 'nature';
$username = 'web';
$password = '12345!@#$%';

$link = mysqli_connect($host, $username, $password, $dbname);
/* check connection */
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
return $link;
}