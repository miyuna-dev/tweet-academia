<?php
$conec= new Database();
$conection=$conec->connect();

$query= "SELECT * FROM tweets INNER JOIN members on tweets.member_id = members.id order by tweets.id DESC";

$sqli = $conection->query($query);