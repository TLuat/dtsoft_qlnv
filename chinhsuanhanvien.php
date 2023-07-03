<?php
$activePage = "Nhân viên";
include "inc/header.php";
include('db/database.php');


$id = $_GET['idnhansu'];
$sql_up = "SELECT * FROM nguoidung where  id_nguoidung = '" . $id . "' ";
$query_up = mysqli_query($ketnoi, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['capnhat_ns'])) {
    if (
        !empty($_POST['id_ns']) && !empty($_POST['bophan_ns']) && !empty($_POST['vaitro_ns']) && !empty($_POST['ten_ns']) && !empty($_POST['sdt_ns'])
        && !empty($_POST['diachi_ns']) && !empty($_POST['email_ns']) && !empty($_POST['password_ns']) && !empty($_POST['ngaysinh_ns']) && !empty($_POST['gioitinh_ns'])
    ) {
        $id_ns = $_POST['id_ns'];
        $bophan_ns = $_POST['bophan_ns'];
        $vaitro_ns = $_POST['vaitro_ns'];
        $khuvuc_ns = $_SESSION['id_khuvuc'];
        $ten_ns = $_POST['ten_ns'];
        $sdt_ns = $_POST['sdt_ns'];
        $diachi_ns = $_POST['diachi_ns'];
        $email_ns = $_POST['email_ns'];
        $password_ns = $_POST['password_ns'];
        $ngaysinh_ns = $_POST['ngaysinh_ns'];
        $gioitinh_ns = $_POST['gioitinh_ns'];

        $sql = "UPDATE nguoidung SET id_nguoidung = '$id_ns',id_bophan = '$bophan_ns',id_vaitro = '$vaitro_ns',id_khuvuc= '$khuvuc_ns',tennguoidung = '$ten_ns',sdt_nd= '$sdt_ns' ,diachi_nd = '$diachi_ns',
        email='$email_ns',password = '$password_ns',ngaysinh = '$ngaysinh_ns',gioitinh = '$gioitinh_ns'  where id_nguoidung = '" . $id . "' ";
        $query = mysqli_query($ketnoi, $sql);
        echo '<script>alert("Cập nhật nhân sự thành công")</script>';
    } else if (
        !empty($_POST['id_ns']) && !empty($_POST['vaitro_ns']) && !empty($_POST['ten_ns']) && !empty($_POST['sdt_ns'])
        && !empty($_POST['diachi_ns']) && !empty($_POST['email_ns']) && !empty($_POST['password_ns']) && !empty($_POST['ngaysinh_ns']) && !empty($_POST['gioitinh_ns'])
    ) {
        $id_ns = $_POST['id_ns'];
        $bophan_ns = $_SESSION['id_bophan'];
        $vaitro_ns = $_POST['vaitro_ns'];
        $khuvuc_ns = $_SESSION['id_khuvuc'];
        $ten_ns = $_POST['ten_ns'];
        $sdt_ns = $_POST['sdt_ns'];
        $diachi_ns = $_POST['diachi_ns'];
        $email_ns = $_POST['email_ns'];
        $password_ns = $_POST['password_ns'];
        $ngaysinh_ns = $_POST['ngaysinh_ns'];
        $gioitinh_ns = $_POST['gioitinh_ns'];

        $sql = "UPDATE nguoidung SET id_nguoidung = '$id_ns',id_bophan = '$bophan_ns',id_vaitro = '$vaitro_ns',id_khuvuc= '$khuvuc_ns',tennguoidung = '$ten_ns',sdt_nd= '$sdt_ns' ,diachi_nd= '$diachi_ns',
        email='$email_ns',password = '$password_ns',ngaysinh = '$ngaysinh_ns',gioitinh = '$gioitinh_ns'  where id_nguoidung = '" . $id . "' ";
        $query = mysqli_query($ketnoi, $sql);
        echo '<script>alert("Cập nhật nhân sự thành công")</script>';
    }else{
        echo '<script>alert("Cập nhật nhân sự không thành công")</script>';
    }
}
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase text-center">Chỉnh sửa Nhân sự</div>
        <div class="mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
                <form method="POST">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Mã Nhân sự</label>
                            <input type="text" name="id_ns" id="first_name" value="<?php echo $row_up['id_nguoidung'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium">Địa chỉ</label>
                            <input type="text" name="diachi_ns" id="last_name" value="<?php echo $row_up['diachi_nd'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium">Họ & tên</label>
                            <input type="text" name="ten_ns" id="company" value="<?php echo $row_up['tennguoidung'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium">Giới tính</label>
                            <select id="countries" name="gioitinh_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                                <option selected>Nam</option>
                                <option value="">Nữ</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                            <input type="email" name="email_ns" id="email" value="<?php echo $row_up['email'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@gmail.com" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Số điện thoại</label>
                            <input type="number" name="sdt_ns" id="visitors" value="<?php echo $row_up['sdt_nd'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Password</label>
                            <input type="password" name="password_ns" id="visitors" value="<?php echo $row_up['password'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập password" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Ngày sinh</label>
                            <input type="date" name="ngaysinh_ns" id="visitors" value="<?php echo $row_up['ngaysinh'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập ngày sinh" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium">Chức vụ</label>
                        <select id="countries" name="vaitro_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                            <?php
                            if( $_SESSION['id_vaitro'] == 'QLKV'){
                                $sql_vaitro = "SELECT * FROM vaitro WHERE id_vaitro NOT IN ('QLBP');";
                            }else {
                                $sql_vaitro = "SELECT * FROM vaitro WHERE id_vaitro NOT IN ( 'QLKV','QLBP');";
                            }
                            $query_vaitro = mysqli_query($ketnoi, $sql_vaitro);
                            while ($row_vaitro = mysqli_fetch_array($query_vaitro)) {
                                if ($row_vaitro['id_vaitro'] == $row_up['id_vaitro']) {
                            ?>
                                    <option selected value="<?php echo $row_vaitro['id_vaitro'] ?>"> <?php echo $row_vaitro['tenvaitro'] ?> </option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $row_vaitro['id_vaitro'] ?>"> <?php echo $row_vaitro['tenvaitro'] ?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php if ($_SESSION['id_vaitro'] != 'QLBP' && $_SESSION['id_vaitro'] != 'QLKV') {
                    ?>
                        <div class="mb-6">
                            <label for="" class="block mb-2 text-sm font-medium">Bộ phận</label>
                            <select id="countries" name="bophan_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                                <?php
                                $sql_bophan = "SELECT * FROM bophan ORDER BY id_bophan DESC";
                                $query_bophan = mysqli_query($ketnoi, $sql_bophan);
                                while ($row_bophan = mysqli_fetch_array($query_bophan)) {
                                    if ($row_bophan['id_bophan'] == $row_up['id_bophan']) {
                                ?>
                                        <option selected value="<?php echo $row_bophan['id_bophan'] ?>"> <?php echo $row_bophan['tenbophan'] ?> </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $row_bophan['id_bophan'] ?>"> <?php echo $row_bophan['tenbophan'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="" class="block mb-2 text-sm font-medium">Khu vực</label>
                            <select id="countries" name="khuvuc_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                                <?php
                                $sql_khuvuc = "SELECT * FROM khuvuc ORDER BY id_khuvuc DESC";
                                $query_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
                                while ($row_khuvuc = mysqli_fetch_array($query_khuvuc)) {
                                    if ($row_khuvuc['id_khuvuc'] == $row_up['id_khuvuc']) {
                                ?>
                                        <option selected value="<?php echo $row_khuvuc['id_khuvuc'] ?>"> <?php echo $row_khuvuc['tenkhuvuc'] ?> </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $row_khuvuc['id_khuvuc'] ?>"> <?php echo $row_khuvuc['tenkhuvuc'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    } else if ($_SESSION['id_vaitro'] == 'QLKV' && $_SESSION['id_vaitro'] != 'QLBP') {
                    ?>
                        <div class="mb-6">
                            <label for="" class="block mb-2 text-sm font-medium">Bộ phận</label>
                            <select id="countries" name="bophan_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                                <?php
                                $sql_bophan = "SELECT * FROM bophan ORDER BY id_bophan DESC";
                                $query_bophan = mysqli_query($ketnoi, $sql_bophan);
                                while ($row_bophan = mysqli_fetch_array($query_bophan)) {
                                    if ($row_bophan['id_bophan'] == $row_up['id_bophan']) {
                                ?>
                                        <option selected value="<?php echo $row_bophan['id_bophan'] ?>"> <?php echo $row_bophan['tenbophan'] ?> </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $row_bophan['id_bophan'] ?>"> <?php echo $row_bophan['tenbophan'] ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    } else if ($_SESSION['id_vaitro'] == 'QLBP' && $_SESSION['id_vaitro'] != 'QLKV') {
                    ?>

                    <?php
                    }
                    ?>
                    <button type="submit" name="capnhat_ns" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

</body>

</html>