<?php
session_start();
if(!isset($_SESSION['id_vaitro']) || $_SESSION['id_vaitro'] != 'QLKV') {
    header('Location: login.php');
}