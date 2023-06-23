<?php
$activePage = "Quản lý bộ phận";
include "inc/header.php";
include "db/connect.php";
$sql = "SELECT b.*, k.tenkhuvuc FROM bophan b INNER JOIN khuvuc k ON b.id_khuvuc = k.id_khuvuc";
$result = mysqli_query($connect, $sql);
?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Quản lý bộ phận</div>
    <div class="p-4 mt-14 grid">
     
      <div class="justify-self-end">
        <a href="thembophan.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Thêm Bộ Phận <i class="fa-solid fa-plus"></i>
        </a>
      </div>
    </div>
    <div class="mb-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
              <th class="px-3 py-3">
                <div class="flex items-center">
                  STT
                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                      <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                    </svg></a>
                </div>
              </th>
              <th class="px-3 py-3">
                Tên bộ phận
              </th>
              <th class="px-3 py-3">
              Tên khu vực
              </th>
              <th class="px-3 py-3">
              Công việc chuyên môn
              </th>
              <th class="px-3 py-3">
              Sửa
              </th>
              <th class="px-3 py-3">
                Xóa
              </th>
            </tr>
          </thead>
          <tbody class="text-black text-center">
          <?php  foreach($result as $each): ?>
            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
              <td class="px-5 text-left"><?php  echo $each['id_bophan'] ?></td>
              <td class="text-center"><?php  echo $each['tenbophan'] ?></td>
              <td scope="row" class="px-3 py-4 text-black">
              <?php  echo $each['tenkhuvuc'] ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap">
              <?php  echo $each['cvchuyenmon'] ?>
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap">
              <a href="chinhsuabophan.php?id_bophan=<?php echo $each['id_bophan'] ?>"><i class="fa fa-pencil text-danger" aria-hidden="true"></i></a>
              </td>
              
              <td class="px-3 py-4 font-medium whitespace-nowrap" onclick="return confirm('Bạn có chắc chắc muốn xóa?');">
                    <h6 class="mb-0 text-sm">
                      <a href='process_xoabophan.php?id_bophan=<?php echo $each['id_bophan']; ?>'>
                        Xóa
                      </a>
                    </h6>
                  </td>
            </tr>
            <?php endforeach ?> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<footer class="footer py-4  ">
  <div class="container-fluid">
  </div>
</footer>
</div>
</main>
</body>

</html>