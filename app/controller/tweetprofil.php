<?php
$conec= new Database();
$conection=$conec->connect();
$id=$_SESSION['id'];
$query= "SELECT * FROM tweets  INNER JOIN members on tweets.member_id = members.id WHERE member_id=".$id." order by tweets.id DESC";

$sqli = $conection->query($query);
// var_dump($rowqli); 