<?php

$host = "localhost";
$user = "db1u39";
$pass = "kLn5ekGi";
$dbname = $user;

$conn = pg_connect("host=$host user=$user password=$pass dbname=$dbname");
if(!$conn)
{
    echo "Πρόβλημα σύνδεσης στη βάση.";
    die;
}