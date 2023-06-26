<?php
$activePage = "Nhân viên";
include "inc/header.php";
include "db/database.php";
// session_start();
$id_vt = $_SESSION['id_vaitro'];
$id_bp = $_SESSION['id_bophan'];
$id_kv = $_SESSION['id_khuvuc'];

if ($id_vt == 'QLKV') {
  $sql = "SELECT * FROM nguoidung, vaitro, bophan, khuvuc
  WHERE nguoidung.id_khuvuc = khuvuc.id_khuvuc 
  AND   nguoidung.id_vaitro = vaitro.id_vaitro
  AND   nguoidung.id_bophan = bophan.id_bophan
  AND   khuvuc.id_khuvuc = '".$id_kv."'";
  $query = mysqli_query($connect, $sql);
} else if ($id_vt = 'QLBP') {
  $sql = "SELECT * FROM nguoidung, vaitro, bophan, khuvuc
  WHERE nguoidung.id_khuvuc = khuvuc.id_khuvuc
  AND   nguoidung.id_vaitro = vaitro.id_vaitro
  AND   nguoidung.id_bophan = bophan.id_bophan
  AND   khuvuc.id_khuvuc = '".$id_kv."'
  AND   bophan.id_bophan = '".$id_bp."' 
  AND nguoidung.id_vaitro NOT IN (SELECT nguoidung.id_vaitro FROM nguoidung WHERE nguoidung.id_vaitro = 'QLBP' OR nguoidung.id_vaitro = 'QLKV') ";
  
  $query = mysqli_query($connect, $sql);
}


// $sql_bophan = mysqli_query($connect, "SELECT * FROM bophan order by id_bophan ASC");

?>



<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Nhân viên</div>
    <div class="p-4 mt-14 grid">
      <!-- <div class="justify-self-start">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
      </div> -->
      <div class="flex">
        <div class="shadow-md bg-white p-2 rounded-lg">
          <label for="countries" class="block mb-2 text-base font-medium text-gray-900">Chọn bộ phận</label>
          <select id="filter-select1" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>--Chọn Bộ phận--</option>
            <?php
            $sql_bophan = "SELECT * FROM bophan ORDER BY id_bophan DESC";
            $query_bophan = mysqli_query($ketnoi, $sql_bophan);
            while ($row_bophan = mysqli_fetch_array($query_bophan)) {
            ?>
              <option value="<?php echo $row_bophan['tenbophan'] ?> "><?php echo $row_bophan['tenbophan'] ?> </option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
          <label class="block mb-2 text-base font-medium text-gray-900">Chọn công việc chuyên môn</label>
          <select id="filter-select2" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>--Chọn Công việc chuyên môn--</option>
            <?php
            $sql_bophan = "SELECT * FROM bophan ORDER BY id_bophan DESC";
            $query_bophan = mysqli_query($ketnoi, $sql_bophan);
            while ($row_bophan = mysqli_fetch_array($query_bophan)) {
            ?>
              <option value="<?php echo $row_bophan['cvchuyenmon'] ?> "><?php echo $row_bophan['cvchuyenmon'] ?> </option>
            <?php
            }
            ?>
          </select>
        </div>

      </div>
      <div class="justify-self-end">
        <a href="themnhanvien.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Thêm nhân sự <i class="fa-solid fa-user-plus"></i>
        </a>
      </div>
      <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table id="myTable1" class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-700">
              <tr>
                <th class="px-3 py-3 border border-slate-300">
                  <div class="flex items-center">
                    STT
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                        <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                      </svg></a>
                  </div>
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Mã
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Họ & Tên
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Chức vụ
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Bộ phận
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Công việc chuyên môn
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Khu vực
                </th>
                <!-- <th class="px-3 py-3 border border-slate-300">
                  Số điện thoại
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  Địa chỉ
                </th> -->
                <th class="px-3 py-3 border border-slate-300">
                  Email
                </th>
                <!-- <th class="px-3 py-3 border border-slate-300">
                  NGÀY SINH
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  GIỚI TÍNH
                </th> -->
                <th class="px-3 py-3 border border-slate-300">
                  QUẢN LÝ
                </th>
              </tr>
            </thead>
            <tbody class="text-black text-center">
              <?php
              $i = 0;
              while ($row = mysqli_fetch_array($query)) {
                $i++;
              ?>
                <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                  <td class="px-5 text-left border border-slate-300"><?php echo $i ?></td>
                  <td class="text-center font-medium border border-slate-300"><?php echo $row['id_nguoidung'] ?></td>
                  <td scope="row" class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                    <?php echo $row['tennguoidung'] ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                    <?php echo $row['tenvaitro'] ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                    <?php echo $row['tenbophan'] ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                    <?php echo $row['cvchuyenmon'] ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                    <?php echo $row['tenkhuvuc'] ?>
                  </td>
                  <!-- <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                    <?php echo $row['sdt_nd'] ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 text-center">
                    <?php echo $row['diachi_nd'] ?>
                  </td> -->
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 text-center">
                    <?php echo $row['email'] ?>
                  </td>
                  <!-- <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 text-center">
                    <?php echo $row['ngaysinh'] ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 text-center">
                    <?php echo $row['gioitinh'] ?> -->

                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 text-center">
                    <a class="text-blue-800" href="chinhsuanhanvien.php?action=sua&idnhansu=<?php echo $row['id_nguoidung']  ?>">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a> |
                    <a href="xoanhanvien.php?action=xoa&idnhansu=<?php echo $row['id_nguoidung']  ?>">
                      <i class="fa-solid fa-trash" style="color: red;"></i>
                    </a>
                    <!-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class=" text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-1 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">

                  </button> -->
                    <!-- Thông báo khi delete -->
                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                      <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                          <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                          </button>
                          <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal">Xóa nhân sự này?</h3>
                            <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                              OK
                            </button>
                            <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- ----- -->

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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!--Datatables -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function() {

      var table = $('#myTable1').DataTable({
          responsive: false,
          search: "",
          searchPlaceholder: "Search..."
        })
        // .columns.adjust()

        .responsive.recalc();
      $('#filter-select1 ').change(function() {
        var filterValue1 = $('#filter-select1').val();

        // Áp dụng bộ lọc vào DataTable
        table.columns(4).search(filterValue1); // Lọc cột 1 bằng giá trị của select 1
        // table.columns(8).search(filterValue3);
        // table.columns(7).search(filterValue4);

        table.draw(); // Vẽ lại DataTable
      });
      $('#filter-select2 ').change(function() {
        var filterValue2 = $('#filter-select2').val();

        // Áp dụng bộ lọc vào DataTable
        table.columns(5).search(filterValue2);
        // table.columns(8).search(filterValue3);
        // table.columns(7).search(filterValue4);

        table.draw(); // Vẽ lại DataTable
      });

      // $('#filter-select1, #filter-select2, #filter-select3, #filter-select4').change(function() {
      //   var filterValue1 = $('#filter-select1').val();
      //   var filterValue2 = $('#filter-select2').val();
      //   var filterValue3 = $('#filter-select3').val();
      //   var filterValue4 = $('#filter-select4').val();

      //   // Áp dụng bộ lọc vào DataTable
      //   table.columns(4).search(filterValue1); // Lọc cột 1 bằng giá trị của select 1
      //   table.columns(5).search(filterValue2);
      //   table.columns(8).search(filterValue3);
      //   table.columns(7).search(filterValue4);

      //   table.draw(); // Vẽ lại DataTable
      // });

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