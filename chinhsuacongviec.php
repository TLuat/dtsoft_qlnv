<?php
$activePage = "Công Việc";
include "inc/header.php";
include "db/database.php";
?>
<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
  echo "Lỗi rồi";
} else {
  $id = $_GET['id']; // Lấy mã kế hoạch trên host
}

?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase">Chỉnh sửa công việc</div>
        <div class="mb-4">
            <div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <a href="congviec.php"><i class="fa-solid fa-arrow-left"></i> Trở về</a>
                </button>
            
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <?php
                // lấy dữ liệu theo id công việc
                $sql = "SELECT * FROM tiendocongviec WHERE id_congviec = '$id'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result);


                $macongviec = $row["id_congviec"];
                $tencongviec = $row["tencongviec"];
                $id_kehoach = $row["id_kehoachgiaoviec"];
                $id_nguoidung = $row["id_nguoidung"];
                $id_khuvuc = $row["id_khuvuc"];
                $id_bophan = $row["id_bophan"];
                $trangthaicongviec = $row["trangthaicongviec"];
                $ngaybatdau = $row["thoigianbatdau"];
                $ngayketthucdukien = $row["thoigianketthucdukien"];

                $sql_nguoidung = "SELECT `tennguoidung` FROM `nguoidung` WHERE `id_nguoidung` = '" . $id_nguoidung . "'";
                $result_nguoidung = mysqli_query($connect, $sql_nguoidung);
                $row_nguoidung = mysqli_fetch_array($result_nguoidung);
                $tennguoidung = $row_nguoidung["tennguoidung"];
    
                $sql_kehoach = "SELECT `tenkh` FROM `kehoachgiaoviec` WHERE `id_kehoachgiaoviec` = '" . $id_kehoach . "'";
                $result_kehoach = mysqli_query($connect, $sql_kehoach);
                $row_kehoach = mysqli_fetch_array($result_kehoach);
                $tenkehoach = $row_kehoach["tenkh"];
    
                $sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `id_khuvuc` = '" . $id_khuvuc . "'";
                $result_khuvuc = mysqli_query($connect, $sql_khuvuc);
                $row_khuvuc = mysqli_fetch_array($result_khuvuc);
                $tenkhuvuc = $row_khuvuc["tenkhuvuc"];
    
                $sql_bophan = "SELECT `tenbophan` FROM `bophan` WHERE `id_bophan` = '" . $id_bophan . "'";
                $result_bophan = mysqli_query($connect, $sql_bophan);
                $row_bophan = mysqli_fetch_array($result_bophan);
                $tenbophan = $row_bophan["tenbophan"];
                ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Chuẩn bị truy vấn INSERT
                    $id_nguoidung = $_POST['id_nguoidung'];
                    $id_kehoachgiaoviec = $_POST['id_kehoachgiaoviec'];
                    $tencongviec = $_POST['tencongviec'];
                    $id_khuvuc = $_POST['id_khuvuc'];
                    $id_bophan = $_POST['id_bophan'];
                    $ngaybatdau = $_POST['thoigianbatdau'];
                    $ngayketthucdukien = $_POST['thoigianketthucdukien'];

                    $sql_edit = "UPDATE tiendocongviec SET id_nguoidung = '$id_nguoidung' , 
                                                id_kehoachgiaoviec = '$id_kehoachgiaoviec' , 
                                                tencongviec = '$tencongviec' , 
                                                id_khuvuc = '$id_khuvuc' , 
                                                id_bophan = '$id_bophan',
                                                thoigianbatdau = '$ngaybatdau',
                                                thoigianketthucdukien = '$ngayketthucdukien'
                                                WHERE id_congviec = '$id' ";
                    $result = mysqli_query($connect, $sql_edit);
                    if ($result) {
                        echo "Chỉnh sửa công việc thành công !";
                    } else {
                        echo "Chỉnh sửa công việc thất bại: " . mysqli_error($connect);
                    }
                }
            ?>
                
                <?php
                    $sql_kh = "SELECT * FROM kehoachgiaoviec WHERE id_bophan = '$id_bp'";
                    $result_kh = mysqli_query($connect, $sql_kh);
    
                    $sql_kv = "SELECT * FROM khuvuc WHERE id_khuvuc = '$id_kv'";
                    $result_kv = mysqli_query($connect, $sql_kv);
                    
    
                    $sql_bp = "SELECT * FROM bophan WHERE id_bophan = '$id_bp'";
                    $result_bp = mysqli_query($connect, $sql_bp);
    
                    $sql_ns = "SELECT * FROM nguoidung WHERE id_bophan = '$id_bp' AND id_vaitro = 'NS'";
                    $result_ns = mysqli_query($connect, $sql_ns);
                ?>

                <form method="POST">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="id_congviec" class="block mb-2 text-sm font-medium">Mã công việc</label>
                            <input name="tencongviec" type="text" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $macongviec;?>" disabled>
                        </div>
                        <div>
                            <label for="tencongviec" class="block mb-2 text-sm font-medium">Tên công việc</label>
                            <input name="tencongviec" type="text" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $tencongviec;?>" required>
                        </div>
                        <div>
                            <label for="id_kehoachgiaoviec" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã kế hoạch</label>
                            <select name="id_kehoachgiaoviec" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <?php foreach ($result_kh as $row) : ?>
                                    <option value="<?php echo $row['id_kehoachgiaoviec']?>" 
                                        <?php if($row['tenkh'] == $tenkehoach){
                                                    echo 'selected';
                                                } 
                                        ?>
                                    >
                                        <?php echo $row['tenkh']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_khuvuc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Khu vực thực hiện</label>
                            <select name="id_khuvuc" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <?php foreach ($result_kv as $row) : ?>
                                        <option value="<?php echo $row['id_khuvuc']?>" 
                                            <?php if($row['tenkhuvuc'] == $tenkhuvuc){
                                                        echo 'selected';
                                                    } 
                                            ?>
                                        >
                                            <?php echo $row['tenkhuvuc']; ?>
                                        </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_bophan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bộ phận thực hiện</label>
                            <select name="id_bophan" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <?php foreach ($result_bp as $row) : ?>
                                        <option value="<?php echo $row['id_bophan']?>" 
                                            <?php if($row['tenbophan'] == $tenbophan){
                                                        echo 'selected';
                                                    } 
                                            ?>
                                        >
                                            <?php echo $row['tenbophan']; ?>
                                        </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_nguoidung" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Người thực hiện</label>
                            <select name="id_nguoidung" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <?php foreach ($result_ns as $row) : ?>
                                        <option value="<?php echo $row['id_nguoidung']?>" 
                                            <?php if($row['tennguoidung'] == $tennguoidung){
                                                        echo 'selected';
                                                    } 
                                            ?>
                                        >
                                            <?php echo $row['tennguoidung']; ?>
                                        </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="thoigianbatdau" class="block mb-2 text-sm font-medium">Ngày bắt đầu</label>
                            <input
                                type="date" name="thoigianbatdau"
                                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                                placeholder="Select a date" value="<?php echo $ngaybatdau ?>"/>
                        </div>
                        <div class="mb-6">
                            <label for="thoigianketthucdukien" class="block mb-2 text-sm font-medium">Ngày kết thúc dự kiến</label>
                            <input
                                type="date" name="thoigianketthucdukien"
                                class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                                placeholder="Select a date" value="<?php echo $ngayketthucdukien; ?>"/>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chỉnh sửa</button>
            </div>

            </form>
        </div>

    </div>
</div>
</div>

</body>

</html>
