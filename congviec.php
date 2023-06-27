<?php
$activePage = "Quản Lý Công Việc";
include "inc/header.php";
include "db/database.php";

if (isset($_GET['delete_id'])) {
  $deleteId = $_GET['delete_id'];

  // Thực hiện truy vấn xóa dòng dữ liệu
  $sqlDelete = "DELETE FROM tiendocongviec WHERE id_congviec = '$deleteId'";
  if (mysqli_query($connect, $sqlDelete)) {
  } else {
    // Xử lý lỗi khi xóa dữ liệu
    echo "Lỗi: " . mysqli_error($connect);
  }
}

?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Danh sách công việc </div>
    <div class="p-4 mt-14 flex grid">
      <div class="flex">
        <div>
          <label class="block mb-2 text-base font-medium text-gray-900">Chọn bộ phận</label>
          <select id="filter-select1" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>-- Tất cả --</option>
            <option value="Kinh Doanh">Kinh doanh</option>
            <option value="TKBT">TKBT</option>
            <option value="Nguồn lực">Nguồn lực</option>
            <option value="Tester">Tester</option>
          </select>
        </div>
        <div class="ml-5">
          <label  class="block mb-2 text-base font-medium text-gray-900">Chọn khu vực</label>
          <select id="filter-select2" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>-- Tất cả --</option>
            <option value="Cần Thơ">Cần Thơ</option>
            <option value="Nha Trang">Nha Trang</option>
            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Vinh">Vinh</option>
          </select>
        </div>
        <div class="ml-5">
          <div>
            <label for="visitors" class="block mb-2 text-base font-medium text-gray-900">Năm</label>
            <input type="number" id="visitors" min="1900" max="2099" step="1" value="2023" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 mt-14 grid">
          <div class="justify-self-end">
            <a href="themcongviec.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
              <i class="fa-solid fa-plus"></i> Thêm công việc
            </a>
          </div>
        </div>

        <table class="w-full text-sm text-gray-500 dark:text-gray-400" id="myTablecv">
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
            <tbody class="text-black text-center">
            <?php

            if ($id_vt == "QLBP") {
              $condition = "id_bophan = '" . $id_bp . "'";
            } 
            $sql = "SELECT * FROM tiendocongviec";

            if (!empty($condition)) {
              $sql .= " WHERE $condition";
            }

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
                  <a href="chinhsuacongviec.php?id=<?php echo $id_congviec ?>" class="ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top">Sửa |
                    <a href="?delete_id=<?php echo $id_congviec ?>" class="text-dark cursor-pointer" onclick="return confirm('Bạn có chắc chắn muốn xóa dòng dữ liệu này?')">Xóa</a>
                </td>
              </tr>
              <?php
          }
          ?>
            </tbody>
          
        </table>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#myTablecv').DataTable({
                responsive: false,
                search: "",
                searchPlaceholder: "Search..."
            })
            // .columns.adjust()
            .responsive.recalc();

        $('#filter-select1, #filter-select2').change(function() {
            var filterValue1 = $('#filter-select1').val();
            var filterValue2 = $('#filter-select2').val();

            // Áp dụng bộ lọc vào DataTable
            table.columns(3).search(filterValue1); // Lọc cột 1 bằng giá trị của select 1
            table.columns(2).search(filterValue2);
  

            table.draw(); // Vẽ lại DataTable
        });

        // Custom styling for search input
        // $('.dataTables_filter input').addClass('bg-gray-100 border border-gray-300 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500');

        // Clear default search icon
        // $('.dataTables_filter label::before').remove();
        // $('.dataTables_filter label::after').remove();
        // $('.dataTables_filter label').addClass('');
        // $('.dataTables_filter input').addClass('m-2 bg-white text-white border');

        // $('.dataTables_filter label').append('<i class="fa-solid fa-magnifying-glass"></i>');
        $('.dataTables_filter input').attr('placeholder', 'Tìm kiếm ...');
    });
</script>

</body>

</html>
