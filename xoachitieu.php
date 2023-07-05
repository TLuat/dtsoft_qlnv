<?php
    require_once('db/connect.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM chitieu where id_chitieu = '" . $id . "'";
    $query = mysqli_query($connect, $sql);
    header('location: chitieu.php');
?>