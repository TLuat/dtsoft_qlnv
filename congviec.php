<?php
$activePage = "Quản Lý Công Việc";
include "inc/header.php";
?>

<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase">Công việc</div>
    <div class="p-4 mt-14 flex grid">
      <div class="flex">
        <div>
          <label for="countries" class="block mb-2 text-base font-medium text-gray-900">Chọn bộ phận</label>
          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>-- Tất cả --</option>
            <option value="US">Kinh doanh</option>
            <option value="CA">TKBT</option>
            <option value="FR">Nguồn lực</option>
            <option value="DE">Tester</option>
          </select>
        </div>
        <div class="ml-5">
          <label for="countries" class="block mb-2 text-base font-medium text-gray-900">Chọn khu vực</label>
          <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>-- Tất cả --</option>
            <option value="US">Cần Thơ</option>
            <option value="CA">Nha Trang</option>
            <option value="FR">HCM</option>
            <option value="DE">Vinh</option>
          </select>
        </div>
        <div class="ml-5">
          <div>
            <label for="visitors" class="block mb-2 text-base font-medium text-gray-900">Năm</label>
            <input type="number" id="visitors" min="1900" max="2099" step="1" value="2023" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
          </div>
        </div>
      </div>
      <div class="justify-self-end">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
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
                Bộ phận thực hiện
              </th>
              <th class="px-3 py-3">
                Khu vực thực hiện
              </th>
              <th class="px-3 py-3">
                Số lượng công việc
              </th>
              <th class="px-3 py-3">
                Tiến độ
              </th>
              <th class="px-3 py-3">
                
              </th>
            </tr>
          </thead>
          <tbody class="text-black text-center">
            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
              <td class="px-5 text-left">1</td>
              <td class="text-center">Bộ phận 1</td>
              <td scope="row" class="px-3 py-4 text-black">
                Khu vực 1
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap">
                3
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap">
                60%
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap">
                <a href="listcongviec.php" class="ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top">Xem chi tiết
              </td>
            </tr>
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