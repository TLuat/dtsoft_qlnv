<?php
include 'db/connect.php';
$id_bophan = $_POST['id_bophan'];
$id_khuvuc = $_POST['id_khuvuc'];
$tenbophan = $_POST['tenbophan'];
$cvchuyenmon = $_POST['cvchuyenmon'];
$sql = "UPDATE bophan SET id_khuvuc='$id_khuvuc', tenbophan='$tenbophan', cvchuyenmon='$cvchuyenmon' 
where id_bophan='$id_bophan'";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("Location: bophan.php");