<?php
$conec= new Database();
$conection=$conec->connect();

$query= "SELECT * FROM members order by id DESC limit 6";

$sqlii = $conection->query($query);