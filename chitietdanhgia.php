<?php 
$activePage = "Quản lý kết quả đánh giá";
include "inc/header.php";
include "db/database.php";
include "classes/nhansu.php";
?>

<?php

    if (!isset($_GET['id']) || $_GET['id'] == NULL) {
      echo "Lỗi rồi";
    } else {
      $id = $_GET['id']; // Lấy mã kế hoạch trên host
    }

    $sql = "SELECT * FROM kehoachgiaoviec WHERE  makehoach = '$id'";
    $result = mysqli_query($ketnoi, $sql);
    $row = mysqli_fetch_array($result);

    $thoigianbatdau = $row["thoigianbatdau"];
    $thoigianketthucdukien = $row["thoigiandukien"];
    $thoigianketthuc = $row["thoigianketthuc"];
    $mabophan = $row["mabophan"];
    $makhuvuc = $row["makhuvuc"];

    $sql_bophan = "SELECT `tenbophan` FROM `bophan` WHERE `mabophan` = '" . $mabophan . "'";
    $result_bophan = mysqli_query($ketnoi, $sql_bophan);
    $row_bophan = mysqli_fetch_array($result_bophan);
    $tenbophan = $row_bophan["tenbophan"];

    $sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `makhuvuc` = '" . $makhuvuc . "'";
    $result_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
    $row_khuvuc = mysqli_fetch_array($result_khuvuc);
    $tenkhuvuc = $row_khuvuc["tenkhuvuc"];
?>

  <div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
      <div class="mb-3 drop-shadow-lg"><a href="danhgia.php" class="bg-blue-700 p-2 text-white font-bold rounded-lg uppercase"><i class="fa-sharp fa-solid fa-arrow-left"></i> Trờ về</a></div>
      <div class="mb-5 font-bold uppercase text-center underline text-xl drop-shadow-lg">Chi tiết Đánh giá</div>
      <div class="grid grid-cols-3 gap-4 mb-4">
          <div class="items-center justify-center h-24 rounded bg-white">
              <p class="text-base mt-4 ml-3 mb-3"><b>Mã kế hoạch:</b> <?php echo $id ?></p>
              <p class="text-base ml-3"><b>Trạng thái:</b> <span class="bg-red-500 rounded p-1 text-white">Chưa đánh giá</span></p>
          </div>
          <div class="items-center justify-center h-24 rounded bg-white text-center">
              <p class="text-base mt-4 mb-3"><b>Bô phận:</b> <?php echo $tenbophan ?></p>
              <p class="text-base"><b>Khu vực:</b> <?php echo $tenkhuvuc ?></p>
          </div>
          <div class="items-center justify-center pb-5 rounded bg-white text-center">
              <p class="text-base mt-4 mb-3"><b>Thởi gian bắt đầu:</b> <?php echo $thoigianbatdau ?></p>
              <p class="text-base mt-4 mb-3"><b>Thởi gian kết thúc dự kiến:</b> <?php echo $thoigianketthucdukien ?></p>
              <p class="text-base"><b>Thởi gian kết thúc thực tế:</b> <?php echo $thoigianketthuc ?></p>
          </div>
      </div>
    </div>

    <hr class="bg-pink-400 rounded p-1">
        <div class="mb-4 mt-5">
        <div class="text-center"> 
              Tổng chỉ tiêu đề ra cho kế hoạch <?php echo $id ?>
         </div>
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-white uppercase bg-gray-700">
                      <tr>
                          <th class="px-3 py-3 border border-slate-300">
                              Tên chỉ tiêu
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Tổng chỉ tiêu cần đạt
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Tổng chỉ đạt được
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Hoàn thành (%)
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Đánh giá
                          </th>
                      </tr>
                  </thead>
                  <tbody class="text-black text-center">
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                             Doanh số
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            1.400.000.000
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            1.470.000.000
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            105%
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            Đạt
                          </td>
                      </tr>
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                             Xuất hóa đơn
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          500
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          500
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          100%
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            Đạt
                          </td>
                      </tr>
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                            Phát triển khách hàng
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          100
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          75
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          75%
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            Chưa đạt
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
                            ĐÁNH GIÁ TỔNG THỂ:
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">                          
                            <form class="flex" action="#">
                                <select id="countries" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>-- Chọn đánh gá --</option>
                                    <option value="US">Đạt</option>
                                    <option value="CA">Chưa đạt</option>
                                    <option value="CA">Không đạt</option>
                                </select>
                                <button type="button" class="ml-3 drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Lưu
                                </button>
                            </form>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>

    <hr class="bg-pink-400 rounded p-1 mt-5">
    <div class="mb-4 mt-5">
         <div class="text-center">
              Danh sách nhân viên thuộc kế hoạch <?php echo $id ?>
         </div>
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-white uppercase bg-gray-700">
                      <tr>
                         <th class="px-3 py-3 border border-slate-300">
                              Tên nhân sự
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Tên chỉ tiêu
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Tổng chỉ tiêu cần đạt
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Tổng chỉ đạt được
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Hoàn thành (%)
                          </th>
                          <th class="px-3 py-3 border border-slate-300">
                              Đánh giá
                          </th>
                      </tr>
                  </thead>
                  <tbody class="text-black text-center">
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                         <td class="px-3 py-4 text-black border-r border-slate-300">
                             Nguyễn Văn A
                          </td>
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                             Doanh số
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            1.400.000.000
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            1.470.000.000
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                            105%
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                <select id="countries" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="US">Đạt</option>
                                    <option value="CA">Chưa đạt</option>
                                    <option value="CA">Không đạt</option>
                                </select>
                          </td>
                      </tr>
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                         <td class="px-3 py-4 text-black border-r border-slate-300">
                             Nguyễn Văn B
                          </td>
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                             Xuất hóa đơn
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          500
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          500
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          100%
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                              <select id="countries" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="US" selected>Đạt</option>
                                    <option value="CA">Chưa đạt</option>
                                    <option value="CA">Không đạt</option>
                              </select>
                          </td>
                      </tr>
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                             Nguyễn Văn A
                          </td>
                          <td class="px-3 py-4 text-black border-r border-slate-300">
                            Phát triển khách hàng
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          100
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          75
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                          75%
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                              <select id="countries" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="US">Đạt</option>
                                    <option value="CA" selected>Chưa đạt</option>
                                    <option value="CA">Không đạt</option>
                              </select>
                          </td>
                      </tr>
                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                          <td class="px-3 py-4 text-black">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">
                          </td>
                          <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">                          
                              <button type="button" class="ml-3 drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                  Lưu
                              </button>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
  </div>

</body>

</html>