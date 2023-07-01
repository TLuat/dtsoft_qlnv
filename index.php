<?php 
$activePage = "dashboard";
include "inc/header.php";
include "db/database.php";
?>



<div class="p-4 sm:ml-64">

   <div class="p-4 mt-14">
      
      <div class="grid grid-cols-3 gap-4">
         <div class="col-span-2">
            <div class="grid grid-cols-2 gap-4">
               <?php
               if ($_SESSION['id_vaitro'] != 'NS' && $_SESSION['id_vaitro'] != 'QTHT'){
               ?>
               <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="nhanvien.php">
                     <i class="fas fa-users fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #f7f7f7;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                     if ($_SESSION['id_vaitro'] == 'QLBP'){
                        $query = "SELECT COUNT(*) AS id_nguoidung FROM nguoidung WHERE id_vaitro = 'NS' AND id_bophan = '".$_SESSION['id_bophan']."' ";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['id_nguoidung'];
                            echo  $totalUsers . " nhân viên ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     } else if ($_SESSION['id_vaitro'] == 'QLKV'){
                        $query_nvkv = "SELECT COUNT(*) AS id_nguoidung FROM nguoidung WHERE id_vaitro != 'QLKV' AND id_khuvuc = '".$_SESSION['id_khuvuc']."'";

                        $result_nvkv = mysqli_query($connect, $query_nvkv);
                         
                        if ($result_nvkv) {
                            $row_nvkv = mysqli_fetch_assoc($result_nvkv);
                            $totalUsers_kv = $row_nvkv['id_nguoidung'];
                     echo  $totalUsers_kv . " nhân viên ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     } 
                       
                     ?>
                  </div>
                  <div>
                     <p>Nhân Viên</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
               if ($_SESSION['id_vaitro'] == 'QTHT'){
               ?>
                <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="user.php">
                     <i class="fas fa-users fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #f7f7f7;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                         $query_all = "SELECT COUNT(*) AS id_nguoidung FROM nguoidung WHERE id_vaitro != 'QTHT'";
                         $result_all = mysqli_query($connect, $query_all);
                         if ($result_all) {
                           $row_all = mysqli_fetch_assoc($result_all);
                           $totalUsers_all = $row_all['id_nguoidung'];
                           echo  $totalUsers_all . " người dùng ";
                         } else {
                           echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                         }
                     ?>
                  </div>
                  <div>
                     <p>Người Dùng</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
               if ($_SESSION['id_vaitro'] == 'QTHT'){
               ?>
                <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="khuvuc.php">
                     <i class="fas fa-users fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #f7f7f7;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                         $query = "SELECT COUNT(*) AS id_khuvuc FROM khuvuc ";
                         $result = mysqli_query($connect, $query);
                         if ($result) {
                             $row = mysqli_fetch_assoc($result);
                             $totalUsers = $row['id_khuvuc'];
                             echo  $totalUsers . " khu vực ";
                         } else {
                             echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                         }
                     ?>
                  </div>
                  <div>
                     <p>Khu Vực</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
               if($_SESSION['id_vaitro'] == 'QLKV'){
               ?>
                <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="bophan.php">
                     <i class="fas fa-building fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #ffffff;"></i>
                     <!-- <i class="fas fa-users " style="color: #f7f7f7;"></i> -->
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                        $query = "SELECT COUNT(*) AS id_bophan FROM bophan WHERE id_khuvuc = '".$_SESSION['id_khuvuc']."' ";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['id_bophan'];
                            echo  $totalUsers . " bộ phận ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     ?>
                  </div>
                  <div>
                     <p>Bộ Phận</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
               if ($_SESSION['id_vaitro'] == 'QLBP'){
               ?>
               <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="capnhattiendocongviec.php">
                     <i class="fas fa-tasks fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #fafafa;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                        
                        $query = "SELECT COUNT(*) AS id_congviec FROM tiendocongviec WHERE id_bophan = '".$_SESSION['id_bophan']."' ";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['id_congviec'];
                            echo  $totalUsers . " công việc ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     ?>
                  </div>
                  <div>
                     <p>Công Việc</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
               if ($_SESSION['id_vaitro'] == 'NS'){
               ?>
               <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="capnhattiendocongviec.php">
                     <i class="fas fa-tasks fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #fafafa;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                        
                        $query = "SELECT COUNT(*) AS id_congviec FROM tiendocongviec WHERE id_nguoidung = '".$_SESSION['id_nguoidung']."' ";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['id_congviec'];
                            echo  $totalUsers . " công việc ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     ?>
                  </div>
                  <div>
                     <p>Công Việc</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
                  if ($_SESSION['id_vaitro'] == 'QLBP'){
               ?>
                <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="kehoachgiaoviec.php">
                     <i class="fas fa-table fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #ffffff;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                  <?php
                        $query = "SELECT COUNT(*) AS id_kehoach FROM kehoachgiaoviec WHERE id_bophan = '".$_SESSION['id_bophan']."' ";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['id_kehoach'];
                            echo  $totalUsers . " kế hoạch ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     ?>    
                  </div>
                  <div>
                     <p>Kế Hoạch</p>
                  </div>
               </div>
               <?php
               }
               ?>
               <?php
               if ($_SESSION['id_vaitro'] == 'QLBP'){
               ?>
               <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="nhanvien.php">
                     <i class="fas fa-bullseye fa-lg bg-blue-500 p-6 rounded-full shadow-xl border-2" style="color: #f7f7f7;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                        $query = "SELECT COUNT(*) AS id FROM theodoikehoach ";
                        $result = mysqli_query($connect, $query);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalUsers = $row['id'];
                            echo  $totalUsers . " chỉ tiêu ";
                        } else {
                            echo "Lỗi trong quá trình truy vấn: " . mysqli_error($connect);
                        }
                     ?>
                  </div>
                  <div>
                     <p>Chỉ Tiêu</p>
                  </div>
               </div>
               <?php
               }
               ?>
            </div>
            <br>
            <div class="">
                  <img src="assets/img/img_gt.jpg" class="rounded-lg" style="display: inline-block; width: 1000px; height: 500px" alt="">
            </div>
         </div>
         <div class="bg-blue-200 p-5 border-2 border-inherit shadow-xl rounded-lg">
            <div>
            <div class="grid grid-cols-3 p-6 border-2 border-inherit shadow-xl rounded-lg">
                  <div class="">
                     <a href="capnhattiendocongviec.php">
                     <i class="fas fa-money-check-alt fa-lg bg-blue-400 p-6 rounded-full shadow-xl border-2" style="color: #ffffff;"></i>
                     </a>
                  </div>
                  <div></div>
                  <div class="text-center">
                     <?php
                       $query = "SELECT SUM(chitieudatduoc) AS tong_doanh_so FROM theodoikehoach WHERE id_chitieu = 'DS'";
                       $result = mysqli_query($conn, $query);
                       if ($result) {
                           $row = mysqli_fetch_assoc($result);
                           $totalRevenue = $row['tong_doanh_so'];
                           $doanhSoFormatted = number_format($totalRevenue, 0, '.', '.');
                           echo "Tổng doanh số: " . $doanhSoFormatted;
                       } else {
                           echo "Lỗi trong quá trình truy vấn: " . mysqli_error($conn);
                       }
                     ?>
                  </div>
                  <div class="">
                     <p>Doanh Số</p>
                  </div>
               </div>
            </div>
            <br>
            <div>
               <div class="grid grid-cols-3 ">
                  <div class="col-span-1">
                     <img src="assets/img/annhnen.jpg" class="rounded-lg" style="display: inline-block; width: auto; height: auto" alt="">
                  </div>
                  <div class="col-span-2 ml-3">
                  <p>>> Các chi nhánh công ty</p>
                  </div>
               </div>
               <br>
               <div class="grid grid-cols-3 ">
                  <div class="col-span-1">
                     <img src="assets/img/anh1.jpg" class="rounded-lg" style="display: inline-block; width: auto; height: auto;" alt="">
                  </div>
                  <div class="col-span-2 ml-3">
                  <p>>> Thông tin 2</p>
                  </div>
               </div>
               <br>
               <div class="grid grid-cols-3 ">
                  <div class="col-span-1">
                     <img src="assets/img/anh3.jpg" class="rounded-lg" style="display: inline-block; width: auto; height: auto" alt="">
                  </div>
                  <div class="col-span-2 ml-3">
                  <p>>> Kỷ niệm 28 năm thành lập công ty</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </div>
            
</div>

</body>

</html>
