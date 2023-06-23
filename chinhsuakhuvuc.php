<?php
$activePage = "Khu vực";
include "inc/header.php";
include "db/database.php";

$id = $_GET['idkhuvuc'];
$sql_up = "SELECT * FROM khuvuc where  id_khuvuc = '" . $id . "' ";
$query_up = mysqli_query($ketnoi, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['capnhat_kv'])) {
    $id_kv = $_POST['id_kv'];
    $ten_kv = $_POST['ten_kv'];
    $diachi_kv = $_POST['diachi_kv'];
    $sdt_kv = $_POST['sdt_kv'];


    $sql = "UPDATE khuvuc SET id_khuvuc = '$id_kv',tenkhuvuc = '$ten_kv',diachi = '$diachi_kv',sdt = '$sdt_kv' where id_khuvuc = '" . $id . "' ";
    $query = mysqli_query($ketnoi, $sql);
    echo '<script>alert("Cập nhật khu vực thành công")</script>';
    // header('location: nhanvien.php');
}

?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase text-center">Cập nhật Khu vực</div>
        <div class="mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
                <form method="POST">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Mã khu vực</label>
                            <input type="text" name="id_kv" id="first_name" value="<?php echo $row_up['id_khuvuc'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập mã nhân sự" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium">Tên khu vực</label>
                            <input type="text" name="ten_kv" id="last_name" value="<?php echo $row_up['tenkhuvuc'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập địa chỉ nhân sự" required>
                        </div>
                        <div>
                            <label for="company" class="block mb-2 text-sm font-medium">Địa chỉ</label>
                            <input type="text" name="diachi_kv" id="company" value="<?php echo $row_up['diachi'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập họ tên nhân sự" required>
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium">Số điện thoại</label>
                            <input type="number" name="sdt_kv" id="email" value="<?php echo $row_up['sdt'] ?>" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@gmail.com" required>
                        </div>

                        <button type="submit" name="capnhat_kv" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

</body>

</html>