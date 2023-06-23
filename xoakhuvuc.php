<?php
include('db/database.php');
$id = $_GET['idkhuvuc'];
$sql = "DELETE FROM khuvuc where  id_khuvuc = '" . $id . "' ";
$query = mysqli_query($ketnoi, $sql);
header('location: khuvuc.php');
?>