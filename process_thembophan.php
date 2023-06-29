<?php
include 'db/connect.php';
$id_khuvuc = $_POST['id_khuvuc'];
$id_bophan = $_POST['id_bophan'];
$tenbophan = $_POST['tenbophan'];
$cvchuyenmon = $_POST['cvchuyenmon'];
$sql = "INSERT INTO bophan(id_bophan,id_khuvuc,tenbophan,cvchuyenmon) 
values('$id_bophan','$id_khuvuc','$tenbophan','$cvchuyenmon')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("Location: bophan.php");