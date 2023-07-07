<?php
    require_once('db/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM kehoachgiaoviec where id_kehoachgiaoviec = '" . $id . "'";
    try {
        $query = mysqli_query($connect, $sql);
    
    } catch(Exception $e) {
        $_SESSION['error'] = 'Không thể xóa';
    }
    header('location: kehoachgiaoviec.php');
?>