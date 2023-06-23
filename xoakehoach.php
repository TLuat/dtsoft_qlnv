<?php
    require_once('db/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM kehoachgiaoviec where id_kehoachgiaoviec = $id";
    $query = mysqli_query($connect, $sql);
    header('location: kehoachgiaoviec.php');
?>