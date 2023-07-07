<?php
include('db/database.php');
$id = $_GET['idnhansu'];
$sql = "DELETE FROM nguoidung where  id_nguoidung = '" . $id . "' ";
try {
    $query = mysqli_query($ketnoi, $sql);

} catch(Exception $e) {
    $_SESSION['error'] = 'Không thể xóa';
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>