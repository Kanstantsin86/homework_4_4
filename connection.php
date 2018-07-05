<?php
$root="root"; 
$root_password="";
$host='localhost';
$db="newdb";
$dbh = new PDO("mysql:host=$host;dbname=$db", $root, $root_password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        