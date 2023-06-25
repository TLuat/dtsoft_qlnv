<?php
$activePage = "Công Việc";
include "inc/header.php";
include "db/database.php";
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase">Thêm công việc</div>
        <div class="mb-4">
            <div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <a href="congviec.php"><i class="fa-solid fa-arrow-left"></i> Trở về</a>
                </button>
            
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Lấy dữ liệu từ biểu mẫu
                    $id_congviec = $_POST['id_congviec'];
                    $id_nguoidung = $_POST['id_nguoidung'];
                    $id_kehoachgiaoviec = $_POST['id_kehoachgiaoviec'];
                    $tencongviec = $_POST['tencongviec'];
                    $id_khuvuc = $_POST['id_khuvuc'];
                    $id_bophan = $_POST['id_bophan'];
                    $ngaybatdau = $_POST['thoigianbatdau'];
                    $ngayketthucdukien = $_POST['thoigianketthucdukien'];

                    //Chuẩn bị truy vấn INSERT
                    $sql = "INSERT INTO 
                                tiendocongviec (id_nguoidung, id_kehoachgiaoviec, tencongviec, id_khuvuc, id_bophan, id_congviec, thoigianbatdau, thoigianketthucdukien)
                                VALUES ('$id_nguoidung', '$id_kehoachgiaoviec', '$tencongviec', '$id_khuvuc', '$id_bophan' , '$id_congviec' , '$ngaybatdau' , '$ngayketthucdukien')";


                    // Thực thi truy vấn
                    if ($connect->query($sql) === TRUE) {
                        echo "Thêm dữ liệu thành công !";
                    } else {
                        echo "Lỗi: " . $sql . "<br>" . $connect->error;
                    }
                }
                ?>
                <?php
                $sql_kh = "SELECT * FROM kehoachgiaoviec";
                $result_kh = mysqli_query($connect, $sql_kh);

                $sql_kv = "SELECT * FROM khuvuc";
                $result_kv = mysqli_query($connect, $sql_kv);

                $sql_bp = "SELECT * FROM bophan";
                $result_bp = mysqli_query($connect, $sql_bp);

                $sql_ns = "SELECT * FROM nguoidung";
                $result_ns = mysqli_query($connect, $sql_ns);
                ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="id_congviec" class="block mb-2 text-sm font-medium">Mã công việc</label>
                            <input name="id_congviec" type="text" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mã công việc VD: CV001, CV002,..." required>
                        </div>
                        <div>
                            <label for="tencongviec" class="block mb-2 text-sm font-medium">Tên công việc</label>
                            <input name="tencongviec" type="text" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên công việc" required>
                        </div>
                        <div>
                            <label for="id_kehoachgiaoviec" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã kế hoạch</label>
                            <select name="id_kehoachgiaoviec" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn kế hoạch --</option>
                                <?php foreach ($result_kh as $row) : ?>
                                    <option value="<?php echo $row['id_kehoachgiaoviec'] ?>"><?php echo $row['tenkh'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_khuvuc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Khu vực thực hiện</label>
                            <select name="id_khuvuc" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn khu vực --</option>
                                <?php foreach ($result_kv as $row) : ?>
                                    <option value="<?php echo $row['id_khuvuc'] ?>"><?php echo $row['tenkhuvuc'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_bophan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bộ phận thực hiện</label>
                            <select name="id_bophan" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn bộ phận --</option>
                                <?php foreach ($result_bp as $row) : ?>
                                    <option value="<?php echo $row['id_bophan'] ?>"><?php echo $row['tenbophan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_nguoidung" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Người thực hiện</label>
                            <select name="id_nguoidung" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn nhân sự --</option>
                                <<?php foreach ($result_ns as $row) : ?> <option value="<?php echo $row['id_nguoidung'] ?>"><?php echo $row['tennguoidung'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="thoigianbatdau" class="block mb-2 text-sm font-medium">Ngày bắt đầu</label>
                            <input
                                type="date" name="thoigianbatdau"
                                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                                placeholder="Select a date" />
                        </div>
                        <div class="mb-6">
                            <label for="thoigianketthucdukien" class="block mb-2 text-sm font-medium">Ngày kết thúc dự kiến</label>
                            <input
                                type="date" name="thoigianketthucdukien"
                                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                                placeholder="Select a date" />
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm công việc</button>
            </div>

            </form>
            
        </div>

    </div>
</div>
</div>

</body>

</html>