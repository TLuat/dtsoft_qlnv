<?php

include "inc/header.php";
include "db/database.php";
include "classes/nhansu.php";


$id_nd = $_SESSION['id_nguoidung'];
$id_vt = $_SESSION['id_vaitro'];
$id_bp = $_SESSION['id_bophan'];
$id_kv = $_SESSION['id_khuvuc'];


?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">

    <div class="mb-2 font-bold uppercase text-center underline text-xl drop-shadow-lg">Kết quả Đánh giá</div>
    <div class="flex flex-col">

      <div class="order-2">
        <div class="p-4 mt-4 flex grid">
          <div class="flex divToHide">
            <?php 
              if($id_vt == 'QLKV' || $id_vt == 'QTHT'){
            ?>
            <div class="shadow-md bg-white p-2 rounded-lg">
              <label for="countries" class="block mb-2 text-base font-medium text-gray-900">Chọn bộ phận</label>
              <select id="filter-select1" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">-- Tất cả --</option>
                <?php
                  if($id_vt == 'QLKV'){
                    $condition2 = "id_khuvuc = '".$id_kv."'";
                  } else {
                    $condition2 = "";
                  }
                  $sql = "SELECT DISTINCT tenbophan FROM bophan";
                  if (!empty($condition2)) {
                    $sql .= " WHERE $condition2";
                  }
                  $result = mysqli_query($connect, $sql);
                  while($row = mysqli_fetch_assoc($result)){  
                    $tenbophan = $row['tenbophan'];           
                ?> 
                <option value="<?php echo $tenbophan ?>"><?php echo $tenbophan ?></option>
                <?php } ?>
              </select>
            </div>
            <?php    
              }
            ?>

            <?php 
              if($id_vt == 'QTHT'){
            ?>
            <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
              <label class="block mb-2 text-base font-medium text-gray-900">Chọn khu vực</label>
              <select id="filter-select2" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Tất cả --</option>
                <?php
                  $sql = "SELECT tenkhuvuc FROM khuvuc";
                  $result = mysqli_query($connect, $sql);
                  while($row = mysqli_fetch_assoc($result)){  
                    $tenkhuvuc = $row['tenkhuvuc'];           
                ?> 
                <option value="<?php echo $tenkhuvuc ?>"><?php echo $tenkhuvuc ?></option>
                <?php } ?>
              </select>
            </div>
            <?php    
              }
            ?>
            <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
              <div>
                <label class="block mb-2 text-base font-medium text-gray-900">Năm</label>
                <input type="number" id="filter-select3" min="1900" max="2099" step="1" value="2023" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
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
            <table class="w-full text-sm stripe hover" id="myTable3">
              <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                  <th class="px-3 py-3 border border-slate-300">
                    STT
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
                  <th class="px-3 py-3 border border-slate-300 <?php if ($id_vt == 'QLBP') echo 'divToHide';
                                        elseif ($id_vt == 'QLKV') echo '' ?>">
                    Bộ phận
                  </th>
                  <th class="px-3 py-3 border border-slate-300 <?php if ($id_vt == 'QLKV' || $id_vt == 'QLBP') echo 'divToHide' ?>">
                    Khu vực
                  </th>
                  <th class="px-3 py-3 border border-slate-300 divToHide">
                    Năm
                  </th>
                  <th class="px-3 py-3 border border-slate-300">
                    Kết quả
                  </th>
                  <th class="px-3 py-3 action-column border border-slate-300">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody class="text-black">

                <?php

                if ($id_vt == "NS") {
                  $condition = "id_nguoidung = '" . $id_nd . "' AND id_vaitro = 'NS'";
                } elseif ($id_vt == "QLBP") {
                  $condition = "id_bophan = '" . $id_bp . "' AND id_vaitro = 'NS'";
                } elseif($id_vt == "QTHT"){
                  $condition = "id_vaitro = 'NS'";
                }
                else {
                  $condition = "id_khuvuc = '" . $id_kv . "'";
                }

                $sql = "SELECT * FROM nguoidung";

                if (!empty($condition)) {
                  $sql .= " WHERE $condition";
                }

                // $sql .= " ORDER BY id_vaitro DESC";

                $result = mysqli_query($ketnoi, $sql);
                $stt = 0;

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
                  if ($id_vaitro != "QLKV" && $id_vaitro != "QTHT") {
                    $tenbophan = $row_bophan["tenbophan"];
                  }

                  $sql_vaitro = "SELECT `tenvaitro` FROM `vaitro` WHERE `id_vaitro` = '" . $id_vaitro . "'";
                  $result_vaitro = mysqli_query($ketnoi, $sql_vaitro);
                  $row_vaitro = mysqli_fetch_array($result_vaitro);
                  $tenvaitro = $row_vaitro["tenvaitro"];

                  $sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `id_khuvuc` = '" . $id_khuvuc . "'";
                  $result_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
                  $row_khuvuc = mysqli_fetch_array($result_khuvuc);
                  if ($id_vaitro != "QTHT") {
                    $tenkhuvuc = $row_khuvuc["tenkhuvuc"];
                  }
                  

                  $sql_kehoach = "SELECT * FROM `theodoikehoach` WHERE `id_nguoidung` = '" . $id_nguoidung . "'";
                  $result_kehoach = mysqli_query($ketnoi, $sql_kehoach);           
                  $row_kehoach = mysqli_fetch_array($result_kehoach); 
                  if(isset($row_kehoach["id_kehoachgiaoviec"])) {
                  $id_kehoachgiaoviec = $row_kehoach["id_kehoachgiaoviec"];

                  $sql_ngaybatdau = "SELECT ngaybatdau FROM `kehoachgiaoviec` WHERE `id_kehoachgiaoviec` = '" . $id_kehoachgiaoviec . "'";
                  $result_ngaybatdau = mysqli_query($ketnoi, $sql_ngaybatdau);
                  $row_ngaybatdau = mysqli_fetch_array($result_ngaybatdau);
                  $ngaybatdau = $row_ngaybatdau["ngaybatdau"];
                  $nam = substr($ngaybatdau, 0, 4);
                  } else {
                    $check = "Nhân viên này Chưa có trong kế hoạch";
                  }
                  if(!isset($check)) {
                ?>

                  <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                    <td class="px-5 text-center border border-slate-300"><?php echo $stt ?></td>
                    <td class="text-center border border-slate-300"><?php echo $id_nguoidung ?></td>
                    <td scope="row" class="px-3 py-4 text-black border border-slate-300">
                      <?php echo $tennguoidung ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                      <?php echo $tenvaitro ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 <?php if ($id_vt == 'QLBP') echo 'divToHide';
                                                                        elseif ($id_vt == 'QLKV') echo '' ?>">
                      <?php
                      if ($id_vaitro == "QLKV") {
                        echo '';
                      } else {
                        echo $tenbophan;
                      }
                      ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 <?php if ($id_vt == 'QLKV' || $id_vt == 'QLBP') echo 'divToHide' ?>">
                      <?php echo $tenkhuvuc ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300 divToHide">
                      <?php echo $nam ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap text-center text-white border border-slate-300" style="text-align: center;">
                      <!-- Tinhs % -->
                      <?php
                      $sql4 = "SELECT * FROM theodoikehoach WHERE id_nguoidung = '" . $id_nguoidung . "'";

                      $result4 = mysqli_query($ketnoi, $sql4);
                      $phanTramHoanThanh = 0;
                      $TongPhanTramHoanThanh = 0;
                      $count = 0;

                      while ($row4 = mysqli_fetch_array($result4)) {
                        $count++;
                        $id_nguoidung = $row4["id_nguoidung"];
                        $id_chitieu = $row4["id_chitieu"];
                        $chitieudatduoc = $row4["chitieudatduoc"];
                        $chitieucandat = $row4["chitieucandat"];

                        $sql_chitieu = "SELECT * FROM `chitieu` WHERE `id_chitieu` = '" . $id_chitieu . "'";
                        $result_chitieu = mysqli_query($ketnoi, $sql_chitieu);
                        $row4_chitieu = mysqli_fetch_array($result_chitieu);
                        $tenchitieu = $row4_chitieu["tenchitieu"];

                        if (isset($chitieudatduoc)) {
                          $phanTramHoanThanh = ($chitieudatduoc / $chitieucandat) * 100;
                          $TongPhanTramHoanThanh += $phanTramHoanThanh;
                        }
                      }
                      ?>

                      <?php
                      if (isset($TongPhanTramHoanThanh) && $count != 0) {
                        $TongPhanTramHoanThanh = $TongPhanTramHoanThanh / $count;
                      }
                      if (isset($TongPhanTramHoanThanh) && $count != 0) {
                        if ($TongPhanTramHoanThanh >= 75) echo '<span class="font-bold bg-green-500 rounded p-1">Đạt</span>';
                        else if ($TongPhanTramHoanThanh < 75) echo '<span class="font-bold bg-red-500 rounded p-1">Không Đạt</span>';
                        else echo '<span class="bg-yellow-500 rounded p-1">Chưa Đạt</span>';
                      } else echo '<span class="bg-gray-500 rounded p-1">Chưa đánh giá</span>';
                      ?>




                    </td>

                    <td class="px-3 py-4 font-medium whitespace-nowrap text-center action-column border border-slate-300">

                      <?php
                      if ($id_vaitro == "QLBP") {
                        echo "";
                      } elseif ($id_vaitro == "QLKV") {
                        echo "";
                      } else {
                      ?>

                        <!-- Modal toggle -->
                        <button data-modal-target="defaultModal<?php echo $id_nguoidung ?>" data-modal-toggle="defaultModal<?php echo $id_nguoidung ?>" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                          Xem
                        </button>
                        <!-- Main modal -->
                        <div id="defaultModal<?php echo $id_nguoidung ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                          <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                              <!-- Modal header -->
                              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900">
                                  <?php echo $tennguoidung ?> -  <?php echo $id_nguoidung ?>
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal<?php echo $id_nguoidung ?>">
                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                  </svg>
                                  <span class="sr-only">Close modal</span>
                                </button>
                              </div>
                              <!-- Modal body -->
                              <div class="p-6 space-y-6">
                                <table class="w-full text-sm">
                                  <thead class="text-xs uppercase bg-gray-700">
                                    <tr class="bg-gray-700">
                                      <th class="px-3 py-3 border border-slate-300">
                                        Tên chỉ tiêu
                                      </th>
                                      <th class="px-3 py-3 border border-slate-300">
                                        Chỉ tiêu cần đạt
                                      </th>
                                      <th class="px-3 py-3 border border-slate-300">
                                        Chỉ đạt được
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

                                    <?php

                                    $sql3 = "SELECT * FROM theodoikehoach WHERE id_nguoidung = '" . $id_nguoidung . "'";

                                    $result3 = mysqli_query($ketnoi, $sql3);
                                    $phanTramHoanThanh = 0;
                                    $TongPhanTramHoanThanh = 0;
                                    $count = 0;

                                    while ($row3 = mysqli_fetch_array($result3)) {
                                      $count++;
                                      $id_nguoidung = $row3["id_nguoidung"];
                                      $id_chitieu = $row3["id_chitieu"];
                                      $chitieudatduoc = $row3["chitieudatduoc"];
                                      $chitieucandat = $row3["chitieucandat"];
                                      $đatduoc_nv = number_format($chitieudatduoc, 0, '.', '.');
                                      $candat_nv = number_format($chitieucandat, 0, '.', '.');

                                      $sql_chitieu = "SELECT * FROM `chitieu` WHERE `id_chitieu` = '" . $id_chitieu . "'";
                                      $result_chitieu = mysqli_query($ketnoi, $sql_chitieu);
                                      $row3_chitieu = mysqli_fetch_array($result_chitieu);
                                      $tenchitieu = $row3_chitieu["tenchitieu"];
                                    ?>

                                      <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                                        <td class="px-3 py-4 text-black border-r border-l border-slate-300">
                                          <?php echo $tenchitieu ?>
                                        </td>
                                        <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                          <?php echo $candat_nv ?>
                                        </td>
                                        <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                          <?php
                                          if (isset($chitieudatduoc)) {
                                            echo $đatduoc_nv;
                                          } else echo "Chưa báo cáo";
                                          ?>
                                        </td>
                                        <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                          <?php
                                          if (isset($chitieudatduoc)) {
                                            $phanTramHoanThanh = ($chitieudatduoc / $chitieucandat) * 100;
                                            echo round($phanTramHoanThanh, 2) . "%";

                                            $TongPhanTramHoanThanh += $phanTramHoanThanh;
                                          } else echo "--";

                                          ?>
                                        </td>
                                        <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                          <?php
                                          if (isset($chitieudatduoc)) {
                                            if ($phanTramHoanThanh >= 75) echo "Đạt";
                                            else if ($phanTramHoanThanh < 75) echo "Không đạt";
                                            else echo "Chưa đạt";
                                          } else echo "--";
                                          ?>
                                        </td>
                                      </tr>

                                    <?php
                                    }
                                    ?>
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>
                                    <tr class="pt-5 mt-5">
                                      <td></td>
                                      <td class="uppercase pt-5">Tổng hoàn thành:</td>
                                      <td class="uppercase pt-5">
                                        <?php
                                        if (isset($TongPhanTramHoanThanh) && $count != 0) {
                                          $TongPhanTramHoanThanh = $TongPhanTramHoanThanh / $count;
                                          echo round($TongPhanTramHoanThanh, 2) . "%";
                                        } else echo "--";
                                        ?>
                                      </td>
                                      <td class="uppercase pt-5">kết quả:</td>
                                      <td class="uppercase pt-5">

                                        <?php
                                        if (isset($TongPhanTramHoanThanh) && $count != 0) {
                                          if ($TongPhanTramHoanThanh >= 75) echo '<span class="bg-green-500 rounded p-1 text-white font-bold">Đạt</span>';
                                          else if ($TongPhanTramHoanThanh < 75) echo '<span class="bg-red-500 rounded p-1 text-white font-bold">Không Đạt</span>';
                                          else echo '<span class="bg-yellow-500 rounded p-1 text-white font-bold">Chưa Đạt</span>';
                                        } else echo "--";
                                        ?>

                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <!-- Modal footer -->
                              <div class="flex justify-end text-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="defaultModal<?php echo $id_nguoidung ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Đóng</button>
                              </div>
                            </div>

                          </div>
                        </div>

                      <?php
                      }
                      ?>

                    </td>
                  </tr>

                <?php
                } }
                ?>

              </tbody>
            </table>
          </div>

        </div>
        <div class="fixed right-6 group divToHide" style="top: 100px;">
          <button onclick="printPage()" class="flex items-center justify-center text-white bg-blue-700 drop-shadow-lg rounded-lg w-20 h-10 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
            <svg aria-hidden="true" class="w-6 h-6 mr-2 font-bold" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"></path>
            </svg>
            <span class="font-bold">Print</span>
          </button>
        </div>
      </div>

      <div class="p-4 order-1 divsToShow" style="display: none;">
        <div class="p-2 rounded-lg">
          <p class="block mb-2 text-base font-medium text-gray-900">Năm: <?php echo $nam ?></p>         
          <p class="block mb-2 text-base font-medium text-gray-900 <?php if ($id_vt == 'QLBP') echo 'divsToShow';
                                                                        elseif ($id_vt == 'QLKV') echo '' 
                                                                    ?>"
            >Bộ phận: <?php echo $tenbophan ?></p>
          <p class="block mb-2 text-base font-medium text-gray-900 <?php if ($id_vt == 'QLKV' || $id_vt == 'QLBP') echo 'divsToShow' ?>">Khu vực: <?php echo $tenkhuvuc ?></p>
        </div>
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
  function printPage() {
    // Hiện thẻ div 
    var divsToShow = document.getElementsByClassName('divsToShow');
    for (var i = 0; i < divsToShow.length; i++) {
      divsToShow[i].style.display = 'block';
    }

    // Ẩn các thẻ div khác
    var divsToHide = document.getElementsByClassName('divToHide');
    for (var i = 0; i < divsToHide.length; i++) {
      divsToHide[i].style.display = 'none';
    }

    // Ẩn cột Action trước khi in trang
    var actionColumns = document.getElementsByClassName('action-column');
    for (var i = 0; i < actionColumns.length; i++) {
      actionColumns[i].style.display = 'none';
    }

    var printStyle = document.createElement('style');
    printStyle.innerHTML = `
            @media print {
              table {
                border-collapse: collapse;
              }
            
              table, th, td {
                border: 1px solid black;
              }
            
              th {
                background-color: black;
                color: black;
                white-space: nowrap;
              }
            
              td {
                color: black;
                text-align: center;
                background-color: white;
                white-space: nowrap;
              }

              td span {
                color: black;
              }
            }
          `;

    // Thêm phần tử style vào phần tử head
    document.head.appendChild(printStyle);

    // In trang
    window.print();

    // Hiển thị lại cột Action sau khi in trang (tuỳ chọn)
    for (var i = 0; i < actionColumns.length; i++) {
      actionColumns[i].style.display = '';
    }

    for (var i = 0; i < divsToHide.length; i++) {
      divsToHide[i].style.display = '';
    }

    // Ẩn lại thẻ div 
    for (var i = 0; i < divsToShow.length; i++) {
      divsToShow[i].style.display = 'none';
    }
  }
</script>

<script>
  $(document).ready(function() {

    var table = $('#myTable3').DataTable({
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
      table.columns(6).search(filterValue3);
      table.columns(7).search(filterValue4);

      table.draw(); // Vẽ lại DataTable
    });

    // Custom styling for search input
    // $('.dataTables_filter input').addClass('bg-gray-100 border border-gray-300 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500');

    // Clear default search icon
    // $('.dataTables_filter label::before').remove();
    // $('.dataTables_filter label::after').remove();
    // $('.dataTables_filter label').addClass('');
    $('.dataTables_filter').addClass('divToHide');
    $('.dataTables_wrapper select').addClass('divToHide');
    $('.dataTables_wrapper label').addClass('divToHide');
    $('.dataTables_wrapper label').addClass('divToHide');

    // $('.dataTables_filter label').append('<i class="fa-solid fa-magnifying-glass"></i>');
    $('.dataTables_filter input').attr('placeholder', 'Tìm kiếm ...');
  });
</script>

</body>

</html>

