<?php
session_start();
if($_SESSION['vaitro'] != 'QLBP' || $_SESSION['vaitro'] != 'QLKV')
    header('Location: login.php');