<?php
$activePage = "Thông tin cá nhân";
include "inc/header.php";
include('db/database.php');

$id = $_SESSION['id_nguoidung'];
$sql = "SELECT * FROM nguoidung WHERE id_nguoidung = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['capnhat_ns'])) {
    $diachi = $_POST['diachi_nd'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt_nd'];
    $ngaysinh = $_POST['ngaysinh'];
    

    $sql_edit = "UPDATE nguoidung SET diachi_nd ='$diachi',
                                    email = '$email',
                                    sdt_nd = '$sdt',
                                    ngaysinh = '$ngaysinh'
                                WHERE id_nguoidung = '$id' ";
    $result = mysqli_query($connect, $sql_edit);
    if ($result) {
        echo "Chỉnh sửa công việc thành công !";
    } else {
        echo "Chỉnh sửa công việc thất bại: " . mysqli_error($connect);
    }
}
?>
<?php
   $sql_kv = "SELECT * FROM khuvuc WHERE id_khuvuc = '$id_kv'";
   $result_kv = mysqli_query($connect, $sql_kv);
   $row_kv = mysqli_fetch_array($result_kv);
   
   $sql_bp = "SELECT * FROM bophan WHERE id_bophan = '$id_bp'";   
   $result_bp = mysqli_query($connect, $sql_bp);
   $row_bp = mysqli_fetch_array($result_bp);
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase text-center">Thông tin cá nhân</div>
        <div class="mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
                <form method="POST">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Mã Nhân sự</label>
                            <input type="text" name="id_ns" id="first_name" value="<?php echo $row['id_nguoidung']; ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled required>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium">Họ & tên</label>
                            <input type="text" name="ten_ns" id="company" value="<?php echo $row['tennguoidung'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled placeholder="Flowbite" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium">Địa chỉ</label>
                            <input type="text" name="diachi_nd" id="last_name" value="<?php echo $row['diachi_nd'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Ngày sinh</label>
                            <input type="date" name="ngaysinh" value="<?php echo $row['ngaysinh'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập ngày sinh" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Giới tính</label>
                            <input type="text" name="ngaysinh" value="<?php echo $row['gioitinh'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập ngày sinh" disabled required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@gmail.com" required>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-2 text-sm font-medium">Số điện thoại</label>
                            <input type="number" name="sdt_nd" id="visitors" value="<?php echo $row['sdt_nd'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                        </div>
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Bộ phận</label>
                            <input type="text" name="bophan_ns" id="first_name" value="<?php echo $row_bp['tenbophan'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" disabled required>
                        </div>
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Khu vực</label>
                            <input type="text" name="khuvuc_ns" id="first_name" value="<?php echo $row_kv['tenkhuvuc'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" disabled required>
                        </div>
                    </div>
                    <button type="submit" name="capnhat_ns" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chỉnh sửa</button>
                </form>

            </div>

        </div>
    </div>
</div>

</body>

</html>
