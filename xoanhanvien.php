<?php
include('db/database.php');
$id = $_GET['idnhansu'];
$sql = "DELETE FROM nguoidung where  id_nguoidung = '" . $id . "' ";
$query = mysqli_query($ketnoi, $sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>