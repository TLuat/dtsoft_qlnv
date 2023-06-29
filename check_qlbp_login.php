<?php
session_start();
if(!isset($_SESSION['id_vaitro']) || $_SESSION['vaitro'] != 'QLBP')
    header('Location: login.php');