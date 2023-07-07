<?php
$activePage = "Chi tiết kế hoạch";
include "inc/header.php";
?>
<?php
    $id = $_GET['id'];
    $vaitro = $_SESSION['id_vaitro'];
    $bophan = $_SESSION['id_bophan'];
    $khuvuc = $_SESSION['id_khuvuc'];
    $sql = "SELECT * FROM kehoachgiaoviec
    INNER JOIN khuvuc ON kehoachgiaoviec.id_khuvuc = khuvuc.id_khuvuc 
    INNER JOIN bophan ON khuvuc.id_khuvuc = bophan.id_khuvuc
    WHERE id_kehoachgiaoviec = '" . $id . "' And bophan.id_bophan = '". $bophan ."' And khuvuc.id_khuvuc = '". $khuvuc ."'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);

    $sql1 = "SELECT * FROM kehoachgiaoviec kh
    INNER JOIN tiendocongviec td ON kh.id_kehoachgiaoviec = td.id_kehoachgiaoviec
    INNER JOIN nguoidung nd ON td.id_nguoidung = nd.id_nguoidung
    WHERE kh.id_kehoachgiaoviec = '" . $id . "' ";
    $query1 = mysqli_query($connect, $sql1);
    $query2 = mysqli_query($connect, $sql1);

    $sql3 = "SELECT DISTINCT td.tencongviec FROM kehoachgiaoviec kh
    INNER JOIN tiendocongviec td ON kh.id_kehoachgiaoviec = td.id_kehoachgiaoviec
    INNER JOIN nguoidung nd ON td.id_nguoidung = nd.id_nguoidung
    WHERE kh.id_kehoachgiaoviec = '" . $id . "' ";
    $query3 = mysqli_query($connect, $sql3);

    $sql4 ="SELECT * from theodoikehoach tdkh
    INNER JOIN nguoidung nd ON tdkh.id_nguoidung = nd.id_nguoidung
    INNER JOIN chitieu ct ON tdkh.id_chitieu = ct.id_chitieu
    where chitieudatduoc IS NOT NULL and tdkh.id_nguoidung is not null and tdkh.id_kehoachgiaoviec='" . $id . "'";
    $query4 = mysqli_query($connect, $sql4);

    $tongtiendo = 0;
    $tong = 0;
    while($row2 = mysqli_fetch_assoc($query2)){ $tong = $row2['trangthaicongviec'];  
    if($tong == 'Hoàn Thành'){
      $tongtiendo = 1;
    }else{
      $tongtiendo = 0;
      break;
    }}
?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-5 font-bold text-lg uppercase">Chi tiết Kế hoạch </div>
    <div class="p-4 mt-14 grid">
      <div class="justify-self-start">
        <a href="inchitietkehoach.php?&id=<?php echo $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          In kế hoạch <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <?php 
          if($vaitro == 'QLBP'){
        ?>
            <a href="chinhsuakehoach.php?&id=<?php echo $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
              Chỉnh sửa kế hoạch <i class="fa-solid fa-pen-to-square"></i>
            </a>
        <?php
          }
        ?>

      </div>
    </div>
    <div class="mb-4 mt-5">
        <div class="text-center mb-5 font-bold text-lg uppercase">
          Thông tin kế hoạch "<?php echo $row['tenkh']; ?>"
        </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
              <th class="px-3 py-3 border border-slate-300">
                NGÀY BẮT ĐẦU
              </th>
              <th class="px-3 py-3 border border-slate-300">
              NGÀY KẾT THÚC DỰ KIẾN
              </th>
              <th class="px-3 py-3 border border-slate-300">
              NGÀY KẾT THÚC THỰC TẾ
              </th>
              <th class="px-3 py-3 border border-slate-300">
              KHU VỰC THỰC HIỆN
              </th>
              <th class="px-3 py-3 border border-slate-300">
              BỘ PHẬN PHỤ TRÁCH
              </th>
              <th class="px-3 py-3 border border-slate-300">
              TIẾN ĐỘ KẾ HOẠCH
              </th>
            </tr>
          </thead>
          <tbody class="text-black text-center">
            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
              <td class="px-3 py-4 text-black border-r border-slate-300">
                <?php echo $row['ngaybatdau']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
              <?php echo $row['ngayktdukien']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
              <?php echo $row['ngayktthucte']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
              <?php echo $row['tenkhuvuc']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
              <?php echo $row['tenbophan']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                <?php 
                if($tongtiendo == 0){echo 'Chưa hoàn thành';}
                else {
                  echo 'Đã hoàn thành';
                }
                ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <hr class="bg-pink-400 rounded p-0.5 mt-5">
      <div class="mb-4 mt-5">
        <div class="text-center mb-5 font-bold text-lg uppercase">
          Các công việc trong kế hoạch
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table id="myTable5" class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-700">
              <tr style="background-color: white;">
                <th>
                  <label class="block mb-2 text-base font-medium text-gray-900">Chọn công việc</label>
                  <select id="filter-select2" class="bg-gray-50 border text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">-- Tất cả --</option>
                    <?php 
                      while($row3 = mysqli_fetch_assoc($query3)){
                    ?>
                      <option value="<?php echo $row3['tencongviec'] ?>"><?php echo $row3['tencongviec'] ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </th>
              </tr>
              <tr>
                <th class="px-3 py-3 border border-slate-300">
                  STT
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  TÊN CÔNG VIỆC
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  NGƯỜI PHỤ TRÁCH
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  NGÀY BẮT ĐẦU
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  NGÀY KẾT THÚC DỰ KIẾN
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  NGÀY KẾT THÚC THỰC TẾ
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  TIẾN ĐỘ CÔNG VIỆC
                </th>
              </tr>
            </thead>
            <tbody class="text-black text-center">
              <?php
                  $i = 1;
                  while($row1 = mysqli_fetch_assoc($query1)){?>
                <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $i++; ?>
                  </td>
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $row1['tencongviec']; ?>
                  </td>
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $row1['tennguoidung']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['thoigianbatdau']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['thoigianketthucdukien']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['thoigianketthuc']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['trangthaicongviec']; ?>
                  </td>
                </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
          
        </div>
        <hr class="bg-pink-400 rounded p-0.5 mt-5">
      <div class="mb-4 mt-5">
        <div class="text-center mb-5 font-bold text-lg uppercase">
          Các chỉ tiêu trong kế hoạch
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table id="myTable6" class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-700">
              <?php 
                  $sql_chitieu = "SELECT * from chitieu";
                  $query_chitieu = mysqli_query($connect, $sql_chitieu);
              ?>
              <tr style="background-color: white;">
                  <label class="block mb-2 text-base font-medium text-gray-900">Chọn chỉ tiêu</label>
                  <select id="filter-select3" class="bg-gray-50 border text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">-- Tất cả --</option>
                    <?php 
                      while($row_chitieu = mysqli_fetch_assoc($query_chitieu)){
                    ?>
                      <option value="<?php echo $row_chitieu['tenchitieu'] ?>"><?php echo $row_chitieu['tenchitieu'] ?></option>
                    <?php
                      }
                    ?>
                  </select>
              </tr>
              <tr>
                <th class="px-3 py-3 border border-slate-300">
                  STT
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  TÊN NGƯỜI DÙNG
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  TÊN CHỈ TIÊU
                </th>
                <th class="px-3 py-3 border border-slate-300">
                  CHỈ TIÊU CẦN ĐẠT
                </th>
              </tr>
            </thead>
            <tbody class="text-black text-center">
              <?php
                  $u = 1;
                  while($row4 = mysqli_fetch_assoc($query4)){?>
                <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $u++; ?>
                  </td>
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $row4['tennguoidung']; ?>
                  </td>
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $row4['tenchitieu']; ?>
                  </td>
                  <td class="px-3 py-4 text-black border-r border-slate-300">
                  <?php echo $row4['chitieucandat']; ?>
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
  <script>
    $(document).ready(function() {

      var table = $('#myTable5').DataTable({
          responsive: false,
          search: "",
          searchPlaceholder: "Search..."
        })
        // .columns.adjust()
        .responsive.recalc();

      $('#filter-select2, #filter-select3').change(function() {
        var filterValue2 = $('#filter-select2').val();

        // Áp dụng bộ lọc vào DataTable
        table.columns(1).search(filterValue2);

        table.draw(); // Vẽ lại DataTable
      });
      $('.dataTables_filter').addClass('divToHide');
      $('.dataTables_wrapper select').addClass('divToHide');
      $('.dataTables_wrapper label').addClass('divToHide');
      $('.dataTables_wrapper label').addClass('divToHide');

      $('.dataTables_filter input').attr('placeholder', 'Tìm kiếm ...');
    });
  </script>

<script>
    $(document).ready(function() {

      var table = $('#myTable6').DataTable({
          responsive: false,
          search: "",
          searchPlaceholder: "Search..."
        })
        // .columns.adjust()
        .responsive.recalc();

      $('#filter-select3').change(function() {
        var filterValue3 = $('#filter-select3').val();

        // Áp dụng bộ lọc vào DataTable
        table.columns(2).search(filterValue3);

        table.draw(); // Vẽ lại DataTable
      });
      $('.dataTables_filter').addClass('divToHide');
      $('.dataTables_wrapper select').addClass('divToHide');
      $('.dataTables_wrapper label').addClass('divToHide');
      $('.dataTables_wrapper label').addClass('divToHide');

      $('.dataTables_filter input').attr('placeholder', 'Tìm kiếm ...');
    });
  </script>

  </body>

  </html>