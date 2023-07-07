<?php
session_start();
include('db/database.php');
$id = $_GET['idkhuvuc'];
$sql = "DELETE FROM khuvuc where  id_khuvuc = '" . $id . "' ";
try {
    $query = mysqli_query($ketnoi, $sql);

} catch(Exception $e) {
    $_SESSION['error'] = 'Không thể xóa';
}
header('location: khuvuc.php');
?>