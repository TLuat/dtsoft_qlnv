<?php
$activePage = "Quản Lý Công Việc";
include "inc/header.php";
include "db/database.php";
?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Công việc</div>
    <div class="p-4 mt-14 flex grid">
      <div class="flex">
      </div>
    </div>
    <div class="mb-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400" id="myTable">
          <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
              <th class="px-3 py-3">
                <div class="flex items-center">
                  STT
                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                      <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                    </svg></a>
                </div>
              </th>
              <th class="px-3 py-3">
                Tên công việc
              </th>
              <th class="px-3 py-3">
                Khu vực
              </th>
              <th class="px-3 py-3">
                Bộ phận
              </th>
              <th class="px-3 py-3">
                Người thực hiện
              </th>
              <th class="px-3 py-3">
                Tên kế hoạch
              </th>
              <th class="px-3 py-3">
                Ngày bắt đầu
              </th>
              <th class="px-3 py-3">
                Ngày kết thúc dự kiến
              </th>
              <th class="px-3 py-3">
                Ngày kết thúc
              </th>
              <th class="px-3 py-3">
                Tiến độ
              </th>
              <th class="px-3 py-3">
                Trạng thái
              </th>
              <th class="px-3 py-3">

              </th>
            </tr>
          </thead>
          <?php
          $sql = "SELECT * FROM tiendocongviec ORDER BY id_congviec LIMIT 5";
          $result = mysqli_query($connect, $sql);
          $stt = 0;

          while ($row = mysqli_fetch_array($result)) {

            $stt++;

            $id_congviec = $row["id_congviec"];
            $tencongviec = $row["tencongviec"];
            $id_kehoach = $row["id_kehoachgiaoviec"];
            $id_nguoidung = $row["id_nguoidung"];
            $id_khuvuc = $row["id_khuvuc"];
            $id_bophan = $row["id_bophan"];
            $trangthaicongviec = $row["trangthaicongviec"];
            $ngaybatdau = $row["thoigianbatdau"];
            $ngayketthucdukien = $row["thoigianketthucdukien"];
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
            <tbody class="text-black text-center">
              <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                <td class="px-5 text-left"><?php echo $stt ?></td>
                <td class="text-center"><?php echo $tencongviec ?></td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php echo $tenkhuvuc ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php echo $tenbophan ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php echo $tennguoidung ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php echo $tenkehoach ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php echo $ngaybatdau ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php echo $ngayketthucdukien ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                <?php
                  if ($ngayketthuc == '0000-00-00' or $ngayketthuc == '') {
                    echo '';
                  } else echo $ngayketthuc;
                ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                <?php
                  if ($ngayketthuc == '0000-00-00' or $ngayketthuc == '') {
                    echo '';
                  } else if ($ngayketthuc > $ngayketthucdukien){
                    echo 'Trễ tiến độ';
                  } else echo 'Đúng tiến độ';
                ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <?php
                  if ($trangthaicongviec == '-- Chọn tiến độ --' or $trangthaicongviec == '') {
                    echo 'Chưa cập nhật';
                  } else echo $trangthaicongviec;
                  ?>
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap">
                  <a href="chitietcongviec.php?id=<?php echo $id_congviec ?>" class="ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top">Cập nhật
                </td>
              </tr>
            </tbody>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- <script src="https://code.jquery.com/jquery.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
  $('#myTable').DataTable();
</script> -->

</body>

</html>