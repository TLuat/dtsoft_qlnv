<?php
include 'db/connect.php';
$id_khuvuc = $_POST['id_khuvuc'];
$tenbophan = $_POST['tenbophan'];
$cvchuyenmon = $_POST['cvchuyenmon'];
$sql = "INSERT INTO bophan(id_khuvuc,tenbophan,cvchuyenmon) 
values('$id_khuvuc','$tenbophan','$cvchuyenmon')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("Location: bophan.php");