<?php
$activePage = "Nhân viên";
include "inc/header.php";
include "db/database.php";

if (isset($_POST['them_ns'])) {
    if (
        !empty($_POST['id_ns']) && !empty($_POST['bophan_ns']) && !empty($_POST['vaitro_ns']) && !empty($_POST['khuvuc_ns']) && !empty($_POST['ten_ns']) && !empty($_POST['sdt_ns'])
        && !empty($_POST['diachi_ns']) && !empty($_POST['email_ns']) && !empty($_POST['password_ns']) && !empty($_POST['ngaysinh_ns']) && !empty($_POST['gioitinh_ns'])
    ) {
        $id_ns = $_POST['id_ns'];
        $bophan_ns = $_POST['bophan_ns'];
        $vaitro_ns = $_POST['vaitro_ns'];
        $khuvuc_ns = $_POST['khuvuc_ns'];
        $ten_ns = $_POST['ten_ns'];
        $sdt_ns = $_POST['sdt_ns'];
        $diachi_ns = $_POST['diachi_ns'];
        $email_ns = $_POST['email_ns'];
        $password_ns = md5($_POST['password_ns']);;
        $ngaysinh_ns = $_POST['ngaysinh_ns'];
        $gioitinh_ns = $_POST['gioitinh_ns'];

        // $password = md5($_POST['password']);

        $sql = "INSERT INTO nguoidung (id_nguoidung,id_bophan,id_vaitro,id_khuvuc,tennguoidung,sdt_nd,diachi_nd,email,password,ngaysinh,gioitinh) 
        VALUEs ('$id_ns','$bophan_ns', '$vaitro_ns', '$khuvuc_ns', '$ten_ns', ' $sdt_ns', '$diachi_ns', '$email_ns', '$password_ns', '$ngaysinh_ns', ' $gioitinh_ns ')";
        $query = mysqli_query($ketnoi, $sql);
        echo '<script>alert("Thêm nhân sự thành công")</script>';
        // header('location: nhanvien.php');
    } else {
        echo '<script>alert("Thêm nhân sự thất bại")</script>';
    }
}
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase text-center">Thêm Nhân sự</div>
        <div class="mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
                <form method="POST" >
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Mã Nhân sự</label>
                            <input type="text" name="id_ns" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập mã nhân sự" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium">Địa chỉ</label>
                            <input type="text" name="diachi_ns" id="last_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập địa chỉ nhân sự" required>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium">Họ & tên</label>
                            <input type="text" name="ten_ns" id="company" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập họ tên nhân sự" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium">Giới tính</label>
                            <select name="gioitinh_ns" id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                                <option selected>Nam</option>
                                <option value="">Nữ</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                            <input type="email" name="email_ns" id="email" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@gmail.com" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Số điện thoại</label>
                            <input type="number" name="sdt_ns" id="visitors" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Password</label>
                            <input type="password" name="password_ns" id="visitors" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập password" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Ngày sinh</label>
                            <input type="text" name="ngaysinh_ns" id="visitors" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập ngày sinh" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium">Bộ phận</label>
                        <select id="countries" name="bophan_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                            <option selected>-- Chọn Bộ phận --</option>
                            <?php
                            $sql_bophan = "SELECT * FROM bophan ORDER BY id_bophan DESC";
                            $query_bophan = mysqli_query($ketnoi, $sql_bophan);
                            while ($row_bophan = mysqli_fetch_array($query_bophan)) {
                            ?>
                                <option value="<?php echo $row_bophan['id_bophan'] ?> "><?php echo $row_bophan['tenbophan'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium">Chức vụ</label>
                        <select id="countries" name="vaitro_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                            <option selected>-- Chọn Chức vụ --</option>
                            <?php
                            $sql_vaitro = "SELECT * FROM vaitro ORDER BY id_vaitro DESC";
                            $query_vaitro = mysqli_query($ketnoi, $sql_vaitro);
                            while ($row_vaitro  = mysqli_fetch_array($query_vaitro)) {
                            ?>
                                <option value="<?php echo $row_vaitro['id_vaitro'] ?> "><?php echo $row_vaitro['tenvaitro'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="" class="block mb-2 text-sm font-medium">Khu vực</label>
                        <select id="countries" name="khuvuc_ns" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                            <option selected>-- Chọn Khu vực --</option>
                            <?php
                            $sql_khuvuc = "SELECT * FROM khuvuc ORDER BY id_khuvuc DESC";
                            $query_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
                            while ($row_khuvuc = mysqli_fetch_array($query_khuvuc)) {
                            ?>
                                <option value="<?php echo $row_khuvuc['id_khuvuc'] ?> "><?php echo $row_khuvuc['tenkhuvuc'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="them_ns" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

</body>

</html>