<?php
include 'db/connect.php';
$id_khuvuc = $_GET['id_khuvuc'];
$sql = "SELECT * from bophan where id_khuvuc='$id_khuvuc'";
$result = mysqli_query($connect, $sql);
$arr = [];
$html ='';
foreach($result as $each) {
    $html.= "<option value='". $each['id_bophan']. "'>".$each['tenbophan']. "</option>";
    
}
echo $html;