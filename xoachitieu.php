<?php
    require_once('db/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM chitieu where id_chitieu = '" . $id . "'";
    try {
        $query = mysqli_query($connect, $sql);
    
    } catch(Exception $e) {
        $_SESSION['error'] = 'Không thể xóa';
    }
    header('location: chitieu.php');
?>