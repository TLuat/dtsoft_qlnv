<?php
include "db/connect.php";
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM kehoachgiaoviec
    INNER JOIN khuvuc ON kehoachgiaoviec.id_khuvuc = khuvuc.id_khuvuc 
    INNER JOIN bophan ON khuvuc.id_khuvuc = bophan.id_khuvuc
    WHERE id_kehoachgiaoviec = '" . $id . "' ";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);

    $sql1 = "SELECT * FROM kehoachgiaoviec kh
    INNER JOIN tiendocongviec td ON kh.id_kehoachgiaoviec = td.id_kehoachgiaoviec
    INNER JOIN nguoidung nd ON td.id_nguoidung = nd.id_nguoidung
    WHERE kh.id_kehoachgiaoviec = '" . $id . "' ";
    $query1 = mysqli_query($connect, $sql1);
    $query2 = mysqli_query($connect, $sql1);


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
<style>	
	@media print{
		#print {
			display:none;
		}
	}
	@media print {
		#PrintButton {
			display: none;
		}
	}
    td{
        text-align: center;
    }
</style>
<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="p-4 mt-14 grid">
      <div class="justify-self-start">

      </div>
    </div>
    <div class="mb-4 mt-5">
      <a>
        <img src="assets/img/logo.jpg" style="width: 300px;" />
      </a>
        <h2>
          Thông tin kế hoạch "<?php echo $row['tenkh']; ?>"
        </h2>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
              <th class="px-3 py-3 border border-slate-300">
                NGÀY BẮT ĐẦU |
              </th>
              <th class="px-3 py-3 border border-slate-300">
              NGÀY KẾT THÚC DỰ KIẾN |
              </th>
              <th class="px-3 py-3 border border-slate-300">
              NGÀY KẾT THÚC THỰC TẾ
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
            </tr>
          </tbody>
        </table>

        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
              <th class="px-3 py-3 border border-slate-300">
              KHU VỰC THỰC HIỆN |
              </th>
              <th class="px-3 py-3 border border-slate-300">
              BỘ PHẬN PHỤ TRÁCH |
              </th>
              <th class="px-3 py-3 border border-slate-300">
              TIẾN ĐỘ KẾ HOẠCH
              </th>
            </tr>
          </thead>
          <tbody class="text-black text-center">
            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
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
        <h2 class="text-center mb-5 font-bold text-lg uppercase">
          Các công việc trong kế hoạch
        </h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-gray-500 dark:text-gray-400">
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
      </div>
    </div>
    <button id="PrintButton" onclick="PrintPage()">Print</button>
  </div>
  <script type="text/javascript">
	function PrintPage() {
		window.print();
	}
    </script>
  </body>

  </html>