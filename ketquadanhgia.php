<?php 
$activePage = "Quản lý kết quả đánh giá";
include "inc/header.php";
include "db/database.php";
include "classes/nhansu.php";
?>

  <div class="p-4 sm:ml-64">
      <div class="p-4 mt-14">
      <div class="mb-5 font-bold uppercase text-center underline text-xl drop-shadow-lg">Kết quả Đánh giá</div>
        <div class="p-4 mt-14 flex grid">
          <div class="flex">
            <div class="shadow-md bg-white p-2 rounded-lg">
              <label for="countries" class="block mb-2 text-base font-medium text-gray-900">Chọn bộ phận</label>
              <select id="filter-select1" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">-- Tất cả --</option>
                <option value="Kinh doanh">Kinh doanh</option>
                <option value="TKBT">TKBT</option>
                <option value="Nguồn lực">Nguồn lực</option>
                <option value="Tester">Tester</option>
              </select>
            </div>
            <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
              <label class="block mb-2 text-base font-medium text-gray-900">Chọn khu vực</label>
              <select id="filter-select2" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Tất cả --</option>
                <option value="Cần Thơ">Cần Thơ</option>
                <option value="Nha Trang">Nha Trang</option>
              </select>
            </div>
            <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
              <div>
                <label class="block mb-2 text-base font-medium text-gray-900">Năm</label>
                <input type="number" id="filter-select3" 
                      min="1900"
                      max="2099"
                      step="1"
                      value="2023"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
              </div>
            </div>
            <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
              <label class="block mb-2 text-base font-medium text-gray-900">Chọn Kết quả</label>
              <select id="filter-select4" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Tất cả --</option>
                <option value="Đạt">Đạt</option>
                <option value="Chưa đạt">Chưa đạt</option>
              </select>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
              <table class="w-full text-sm text-gray-500 dark:text-gray-400 stripe hover" id="myTable">
                  <thead class="text-xs text-white uppercase bg-gray-700">
                      <tr>
                          <th class="px-3 py-3">
                              STT
                          </th>
                          <th class="px-3 py-3">
                              Mã
                          </th>
                          <th class="px-3 py-3">
                              Họ & Tên
                          </th>
                          <th class="px-3 py-3">
                             Chức vụ
                          </th>
                          <th class="px-3 py-3">
                             Bộ phận
                          </th>
                          <th class="px-3 py-3">
                             Khu vực
                          </th>
                          <th class="px-3 py-3">
                             Năm
                          </th>
                          <th class="px-3 py-3">
                             Kết quả
                          </th>
                      </tr>
                  </thead>
                  <tbody class="text-black text-center">

                      <?php 
                      $sql = "SELECT * FROM nguoidung ORDER BY id_nguoidung LIMIT 5";
                      $result = mysqli_query($ketnoi, $sql);
                      $stt=0;

                      while ($row = mysqli_fetch_array($result)) {
                        $stt++;

                        $id_nguoidung = $row["id_nguoidung"];
                        $tennguoidung = $row["tennguoidung"];
                        $id_bophan = $row["id_bophan"];
                        $id_vaitro = $row["id_vaitro"];
                        $id_khuvuc = $row["id_khuvuc"];

                        $sql_bophan = "SELECT `tenbophan` FROM `bophan` WHERE `id_bophan` = '" . $id_bophan . "'";
                        $result_bophan = mysqli_query($ketnoi, $sql_bophan);
                        $row_bophan = mysqli_fetch_array($result_bophan);
                        $tenbophan = $row_bophan["tenbophan"];

                        $sql_vaitro = "SELECT `tenvaitro` FROM `vaitro` WHERE `id_vaitro` = '" . $id_vaitro . "'";
                        $result_vaitro = mysqli_query($ketnoi, $sql_vaitro);
                        $row_vaitro = mysqli_fetch_array($result_vaitro);
                        $tenvaitro = $row_vaitro["tenvaitro"];

                        $sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `id_khuvuc` = '" . $id_khuvuc . "'";
                        $result_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
                        $row_khuvuc = mysqli_fetch_array($result_khuvuc);
                        $tenkhuvuc = $row_khuvuc["tenkhuvuc"];

                        // Bang chi tiet ke hoach
                        // $sql_theodoikehoach = "SELECT `id_kehoachgiaoviec` FROM `theodoikehoach` WHERE `id_nguoidung` = '" . $id_nguoidung . "'";
                        // $result_theodoikehoach = mysqli_query($ketnoi, $sql_theodoikehoach);
                        // $row_theodoikehoach = mysqli_fetch_array($result_theodoikehoach);
                        // $id_kehoachgiaoviec = $row_theodoikehoach["id_kehoachgiaoviec"];


                      ?>
                    
                        <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                            <td class="px-5 text-left"><?php echo $stt ?></td>
                            <td class="text-center"><?php echo $id_nguoidung ?></td>
                            <td scope="row" class="px-3 py-4 text-black">
                                <?php echo $tennguoidung ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenvaitro ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenbophan ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenkhuvuc ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                2023
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap text-center">
                                Đạt
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

        var table = $('#myTable').DataTable({
                responsive: false,
                search: "",
                searchPlaceholder: "Search..."
            })
            // .columns.adjust()
            .responsive.recalc();

            $('#filter-select1, #filter-select2, #filter-select3, #filter-select4').change(function() {
                var filterValue1 = $('#filter-select1').val(); 
                var filterValue2 = $('#filter-select2').val(); 
                var filterValue3 = $('#filter-select3').val();
                var filterValue4 = $('#filter-select4').val(); 

                // Áp dụng bộ lọc vào DataTable
                table.columns(4).search(filterValue1); // Lọc cột 1 bằng giá trị của select 1
                table.columns(5).search(filterValue2); 
                table.columns(8).search(filterValue3); 
                table.columns(7).search(filterValue4);

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