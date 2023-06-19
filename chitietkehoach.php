<?php
$activePage = "Quản lý kết quả đánh giá";
include "inc/header.php";
include "db/database.php";
include "classes/nhansu.php";
?>


<div class="p-4 sm:ml-64">
  <div class="p-4 mt-14">
    <div class="mb-5 font-bold text-lg uppercase">Chi tiết Kế hoạch</div>
    <div class="p-4 mt-14 grid">
      <div class="justify-self-start">
        <a href="chinhsuakehoach.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Chỉnh sửa kế hoạch <i class="fa-solid fa-pen-to-square"></i>
        </a>
      </div>
    </div>
    <div class="mb-4 mt-5">
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
              TIẾN ĐỘ KẾ HOẠCH
              </th>
            </tr>
          </thead>
          <tbody class="text-black text-center">
            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
              <td class="px-3 py-4 text-black border-r border-slate-300">
                7/6/2023
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
               10/6/2023
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                9/6/2023
              </td>
              <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                100%
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <hr class="bg-pink-400 rounded p-1 mt-5">
      <div class="mb-4 mt-5">
        <div class="text-center">
          Các công việc trong kế hoạch
        </div>
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
              <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                <td class="px-3 py-4 text-black border-r border-slate-300">
                  1
                </td>
                <td class="px-3 py-4 text-black border-r border-slate-300">
                  Công việc 1
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  7/6/2023
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  10/6/2023
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  9/6/2023
                </td>
                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                  100%
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