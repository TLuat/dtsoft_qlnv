<?php
$activePage = "Báo cáo chỉ tiêu";
include "inc/header.php";
?>
<?php 
  $id_user = $_SESSION['id_nguoidung'];
  $vaitro = $_SESSION['id_vaitro'];
  $bophan = $_SESSION['id_bophan'];
  if($vaitro == 'QLBP'){
    $sql = "SELECT * FROM kehoachgiaoviec kh
    INNER JOIN bophan bp ON kh.id_bophan = bp.id_bophan
    WHERE kh.id_bophan = '" . $bophan . "' 
    ";
  }else{
    $sql = "SELECT DISTINCT kh.id_kehoachgiaoviec, kh.tenkh 
    FROM kehoachgiaoviec kh
    INNER JOIN tiendocongviec td ON kh.id_kehoachgiaoviec = td.id_kehoachgiaoviec
    WHERE td.id_nguoidung = '" . $id_user . "' 
    ";
  }
  $query = mysqli_query($connect,$sql);
?>
<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Báo cáo chỉ tiêu</div>
    <div class="mb-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mb-4 font-bold text-lg uppercase">Các kế hoạch cần báo cáo chỉ tiêu</div>
        <table id="myTable" class="w-full text-sm text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
              <th class="px-3 py-3 border border-slate-300">
                <div class="text-center items-center">
                  STT
                </div>
              </th>
              <th class="px-3 py-3 border border-slate-300">
                MÃ KẾ HOẠCH
              </th>
              <th class="px-3 py-3 border border-slate-300">
                TÊN KẾ HOẠCH
              </th>
              <?php 
                if($vaitro == 'QLBP'){
              ?>
                <th class="px-3 py-3 border border-slate-300">
                  ĐẶT CHỈ TIÊU
                </th>
              <?php
                }else{
              ?>
                <th class="px-3 py-3 border border-slate-300">
                  BÁO CÁO CHỈ TIÊU	
                </th>
              <?php
                }
              ?>
              
            </tr>
          </thead>
          <tbody class="text-black text-center">
            <?php
                  $i = 1;
                  while($row = mysqli_fetch_assoc($query)){?>
            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
              <td class="px-3 border border-slate-300"><?php echo $i++; ?></td>
              <td class="text-center font-medium border border-slate-300"><?php echo $row['id_kehoachgiaoviec']; ?></td>
              <td scope="row" class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                <?php echo $row['tenkh']; ?>
              </td>
              <?php 
                if($vaitro == 'QLBP'){
              ?>
                <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                  <a class="text-blue-800" href="datchitieu.php?&id=<?php echo $row['id_kehoachgiaoviec']; ?>">
                  <i class="fa-solid fa-bullseye"></i>
                  </a>
                </td>
              <?php
                }else{
              ?>
                <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                  <a class="text-blue-800" href="baocaochitieukehoach.php?&id=<?php echo $row['id_kehoachgiaoviec']; ?>">
                    <i class="fa-solid fa-book"></i>
                  </a>
                </td>
              <?php
                }
              ?>
            </tr>
            <?php  }  ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

</body>

</html>