<?php
$conec= new Database();
$conection=$conec->connect();
$user= $_GET['user'];
$query= "SELECT * FROM tweets  INNER JOIN members on tweets.member_id = members.id WHERE member_id=".$user." order by tweets.id DESC";

$queryy= "SELECT * FROM tweets  INNER JOIN members on tweets.member_id = members.id WHERE member_id=".$user." order by tweets.id DESC";

$sqli = $conection->query($query);
$sqlii = $conection->query($queryy);

$rowqli= $sqlii->fetch_assoc();
// var_dump($rowqli); 