<?php
$activePage = "Kế hoạch giao việc";
include "inc/header.php";
?>
<?php 
  $id_user = $_SESSION['id_nguoidung'];
  $vaitro = $_SESSION['id_vaitro'];
  $bophan = $_SESSION['id_bophan'];
  if($vaitro == 'QLBP'){
    $sql = "SELECT DISTINCT kh.id_kehoachgiaoviec, kh.tenkh, kv.tenkhuvuc, bp.tenbophan
  FROM kehoachgiaoviec kh 
    INNER JOIN khuvuc kv ON kh.id_khuvuc = kv.id_khuvuc 
    INNER JOIN bophan bp ON kh.id_bophan = bp.id_bophan
  WHERE kh.id_bophan = '" . $bophan . "'
  ";
  }else{
    $sql = "SELECT DISTINCT kh.id_kehoachgiaoviec, kh.tenkh, kv.tenkhuvuc, bp.tenbophan, td.id_nguoidung
  FROM kehoachgiaoviec kh 
    INNER JOIN khuvuc kv ON kh.id_khuvuc = kv.id_khuvuc 
    INNER JOIN bophan bp ON kh.id_bophan = bp.id_bophan
    INNER JOIN tiendocongviec td ON kh.id_kehoachgiaoviec = td.id_kehoachgiaoviec
  WHERE td.id_nguoidung = '" . $id_user . "'
  ";
  }
  
  $query = mysqli_query($connect,$sql);
?>
<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Kế hoạch giao việc</div>
    <div class="p-4 mt-14 grid">
      <div class="justify-self-end">
        <?php 
          if($vaitro == 'QLBP'){
        ?>
            <a href="themkehoach.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
              Thêm Kế hoạch <i class="fa-solid fa-plus"></i>
            </a>
        <?php
          }
        ?>

      </div>
    </div>
    <div class="mb-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
              <th class="px-3 py-3 border border-slate-300">
                KHU VỰC
              </th>
              <th class="px-3 py-3 border border-slate-300">
                BỘ PHẬN PHỤ TRÁCH
              </th>
              <th class="px-3 py-3 border border-slate-300">
                XEM CHI TIẾT	
              </th>
              <?php 
                if($vaitro == 'QLBP'){
              ?>
                <th class="px-3 py-3 border border-slate-300">
                  XÓA
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
              <td scope="row" class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                <?php echo $row['tenkhuvuc']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                <?php echo $row['tenbophan']; ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border border-slate-300">
                <a class="text-blue-800" href="chitietkehoach.php?&id=<?php echo $row['id_kehoachgiaoviec']; ?>">
                  <i class="fa-solid fa-eye"></i>
                </a>
              </td>
              <?php 
                if($vaitro == 'QLBP'){
              ?>
              <td><a onclick="return Del('<?php echo $row['tenkh'] ?>')" class="btn btn-danger" href="xoakehoach.php?&id=<?php echo $row['id_kehoachgiaoviec']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              <?php
                }
              ?>
            </tr>
            <?php  }  ?>
          </tbody>
        </table>
        <script>
          function Del(tenkh){
              return confirm("Bạn chắc chắn muốn xóa kế hoạch: " + tenkh + "?");
            }
        </script>
      </div>

    </div>
  </div>
</div>

</body>

</html>