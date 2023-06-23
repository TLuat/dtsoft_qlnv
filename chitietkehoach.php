<?php
$activePage = "Chi tiết kế hoạch";
include "inc/header.php";
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM kehoachgiaoviec
    INNER JOIN khuvuc ON kehoachgiaoviec.id_khuvuc = khuvuc.id_khuvuc 
    INNER JOIN bophan ON khuvuc.id_khuvuc = bophan.id_khuvuc
    WHERE id_kehoachgiaoviec = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);

    $sql1 = "SELECT * FROM kehoachgiaoviec kh
    INNER JOIN tiendocongviec td ON kh.id_kehoachgiaoviec = td.id_kehoachgiaoviec
    INNER JOIN nguoidung nd ON td.id_nguoidung = nd.id_nguoidung
    WHERE kh.id_kehoachgiaoviec = $id";
    $query1 = mysqli_query($connect, $sql1);
    $query2 = mysqli_query($connect, $sql1);


    $tongtiendo = 0;
    $tong = 0;
    $i =1;
    while($row2 = mysqli_fetch_assoc($query2)){$i++; $tong += $row2['phantramhoanthanh'];  }  
    if($tong == 0){
      $tongtiendo = 0;
    }else{
      $tongtiendo = $tong/($i-1);
    }
?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-5 font-bold text-lg uppercase">Chi tiết Kế hoạch </div>
    <div class="p-4 mt-14 grid">
      <div class="justify-self-start">
        <a href="chinhsuakehoach.php?&id=<?php echo $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Chỉnh sửa kế hoạch <i class="fa-solid fa-pen-to-square"></i>
        </a>
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
                <?php echo $tongtiendo ?>%
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
          <table id="myTable" class="w-full text-sm text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-700">
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
                  <?php echo $row1['tgbatdau']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['tgketthucdukien']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['tgketthucthucte']; ?>
                  </td>
                  <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  <?php echo $row1['phantramhoanthanh']; ?>%
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

  </body>

  </html>