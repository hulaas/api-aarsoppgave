<?php
/* Database-tilkobling */
$host = '158.36.139.21';
$user = 'venn_user_2';
$pass = 'Uservenn@2';
$db = 'Venn_2';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
