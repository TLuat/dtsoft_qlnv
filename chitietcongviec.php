<?php 
$activePage = "Quản lý kết quả đánh giá";
include "inc/header.php";
include "db/database.php";

?>
<?php
// Kiểm tra xem form đã được submit hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Reload lại trang
    echo '<script>window.location.href = window.location.href;</script>';
}
?>

<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
  echo "Lỗi rồi";
} else {
  $id = $_GET['id'];
}
?>

  <div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-5 font-bold text-lg uppercase">Cập nhật tiến độ</div>
        <div>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <a href="capnhattiendocongviec.php"><i class="fa-solid fa-arrow-left"></i> Trở về</a>
            </button>
        </div>
        <div class="mb-4 mt-5">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <?php

            $sql = "SELECT * FROM tiendocongviec WHERE id_congviec = '$id'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($result);

            $tencongviec = $row["tencongviec"];
            $id_kehoach = $row["id_kehoachgiaoviec"];
            $id_nguoidung = $row["id_nguoidung"];
            $id_khuvuc = $row["id_khuvuc"];
            $id_bophan = $row["id_bophan"];
            $trangthaicongviec = $row["trangthaicongviec"];
            $ngayketthuc = $row["thoigianketthuc"];

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
              <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-white uppercase bg-gray-700">
                      <tr>
                          <th class="px-3 py-3 border border-slate-300">
                            Tên công việc
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                            Khu vực
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                            Bộ phận
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                            Người thực hiện
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                            Tên kế hoạch
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                            Ngày kết thúc
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                            Trạng thái
                          </th>
                      </tr>
                  </thead>
                  <tbody class="text-black text-center">
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                            <?php echo $tencongviec ?>
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            <?php echo $tenkhuvuc ?>
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            <?php echo $tenbophan ?>
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            <?php echo $tennguoidung ?>
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            <?php echo $tenkehoach ?>
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            <?php
                              if ($ngayketthuc == '0000-00-00' or $ngayketthuc == '') {
                                echo '';
                              } else echo $ngayketthuc;
                            ?>
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            <?php                 
                                $sql_trangthaicv = "SELECT trangthaicongviec FROM tiendocongviec WHERE id_congviec = '. $id'";
                                $result_trangthaicv = mysqli_query($connect, $sql);
                                $row_trangthaicv = mysqli_fetch_array($result_trangthaicv);
                                $trangthaicv = $row_trangthaicv["trangthaicongviec"];

                                if ($trangthaicv=='Chưa Hoàn Thành') {
                                    echo '<span class="bg-red-500 rounded p-1 text-white font-bold">Chưa Hoàn Thành</span>';
                                } else if($trangthaicv=='Hoàn Thành') {
                                    echo '<span class="bg-green-500 rounded p-1 text-white font-bold">Hoàn Thành</span>';
                                } else {
                                    echo '<span class="bg-orange-400 rounded p-1 text-white font-bold">Chưa cập nhật</span>';
                                }
                            ?>
                          </td>
                      </tr>  
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">
                            TRẠNG THÁI CÔNG VIỆC:
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">                          
                            <form class="flex" method="POST">
                                <select name="trangthaicongviec" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected>-- Chọn tiến độ --</option>
                                    <option value = "Hoàn Thành">Hoàn Thành</option>
                                    <option value = "Chưa Hoàn Thành">Chưa Hoàn Thành</option>
                                </select>
                                <button type="submit" class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Lưu
                                </button>
                            </form>
                            <?php
                              if (isset($_POST['trangthaicongviec'])) {
                                $trangthai = $_POST['trangthaicongviec'];
                            
                                $sql = "UPDATE tiendocongviec SET trangthaicongviec = '$trangthai' WHERE id_congviec = '$id'";
                                $result = mysqli_query($connect, $sql);
                            
                                if ($result) {
                                    echo "Cập nhật trạng thái thành công.";
                                } else {
                                    echo "Cập nhật trạng thái thất bại: " . mysqli_error($connect);
                                }
                            
                                if ($trangthai == 'Hoàn Thành') {
                                    $ngayketthuc = date('Y-m-d');
                                    $sql_update = "UPDATE tiendocongviec SET thoigianketthuc = '$ngayketthuc' WHERE id_congviec = '$id'";
                                    $result = mysqli_query($connect, $sql_update);
                                } else {
                                    $dateString = "0000-00-00"; // Chuỗi ngày
                                    $timestamp = strtotime($dateString); // Chuyển đổi chuỗi thành timestamp
                                    $ngayketthuc = date("Y-m-d", $timestamp); // Chuyển đổi timestamp thành đối tượng kiểu ngày
                                    $sql_deletedate = "UPDATE tiendocongviec SET thoigianketthuc = '$ngayketthuc' WHERE id_congviec = '$id'";
                                    $result = mysqli_query($connect, $sql_deletedate);
                                }
                            }                            
                            ?>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
    
  </div>

</body>

</html>
