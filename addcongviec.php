<?php
$activePage = "Nhân viên";
include "inc/header.php";
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase">Thêm công việc</div>
        <div class="mb-4">
            <div>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <a href="listcongviec.php"><i class="fa-solid fa-arrow-left"></i> Trở về</a>
            </button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <form>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Tên công việc</label>
                            <input type="text" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên công việc" required>
                        </div>
                        <div>
                            <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã kế hoạch</label>
                            <select id="default" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn mã kế hoạch --</option>
                                <option value="KH01">Kế hoạch 1</option>
                                <option value="KH02">Kế hoạch 2</option>
                                <option value="KH03">Kế hoạch 3</option>
                                <option value="KH04">Kế hoạch 4</option>
                            </select>
                        </div>
                        <div>
                            <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Khu vực thực hiện</label>
                            <select id="default" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn khu vực --</option>
                                <option value="KV01">Khu vực 1</option>
                                <option value="KV02">Khu vực 2</option>
                                <option value="KV03">Khu vực 3</option>
                                <option value="KV04">Khu vực 4</option>
                            </select>
                        </div>
                        <div>
                            <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bộ phận thực hiện</label>
                            <select id="default" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn bộ phận --</option>
                                <option value="BP01">Bộ phận 1</option>
                                <option value="BP02">Bộ phận 2</option>
                                <option value="BP03">Bộ phận 3</option>
                                <option value="BP04">Bộ phận 4</option>
                            </select>
                        </div>
                        <div>
                            <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Người thực hiện</label>
                            <select id="default" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                                <option selected>-- Chọn mã nhân sự --</option>
                                <option value="NS01">Nhân sự 1</option>
                                <option value="NS02">Nhân sự 2</option>
                                <option value="NS03">Nhân sự 3</option>
                                <option value="NS04">Nhân sự 4</option>
                            </select>
                        </div>
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Tên nhân sự</label>
                            <input for="visitors" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tên nhân sự"></input>
                        </div>
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Chức vụ</label>

                            <input for="visitors" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Chức vụ"></input>

                        </div>

                        <div>

                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả</label>
                            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập vào mô tả công việc..."></textarea>

                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm công việc</button>
            </div>

            </form>

        </div>

    </div>
</div>
</div>

</body>

</html>