<?php
include 'db/connect.php';
session_start();
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * from nguoidung where email='$email' and password='$password' limit 1";
$result = mysqli_query($connect, $sql);
$isCustomer = mysqli_num_rows($result);
if ($isCustomer == 1) {
    $each = mysqli_fetch_array($result);
    $_SESSION['name'] = $each['tennguoidung'];
    $_SESSION['id'] = $each['id_nguoidung'];
    header("Location: index.php");
} else {
    $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác";
    ?>
    <!-- <INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);"> -->
    <a href="javascript:history.go(-1)">Back to previous page</a>
    <script>
        document.querySelector('a').click();
    </script>
<?php
    exit();
}
?>