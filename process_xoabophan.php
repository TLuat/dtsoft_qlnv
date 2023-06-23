<?php
include 'db/connect.php';
$id_bophan = $_GET['id_bophan'];

$sql = "DELETE from bophan where id_bophan='$id_bophan'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header("Location: bophan.php");