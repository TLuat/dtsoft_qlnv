<?php
$activePage = "Nhân viên";
include "inc/header.php";
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Thêm Kế hoạch</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Mã Kế hoạch</label>
                    <input type="text" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Tên Kế hoạch</label>
                    <input type="text" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>  
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Bộ phận</label>
                    <select id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                        <option selected>-- Chọn Bộ phận --</option>
                        <option value="US">Cần Thơ</option>
                        <option value="CA">Nha Trang</option>
                        <option value="FR">HCM</option>
                        <option value="DE">Hà Nội</option>
                    </select>
                </div> 
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Khu vực</label>
                    <select id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                        <option selected>-- Chọn khu vực --</option>
                        <option value="US">Cần Thơ</option>
                        <option value="CA">Nha Trang</option>
                        <option value="FR">HCM</option>
                        <option value="DE">Hà Nội</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Khu vực</label>
                    <select id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                        <option selected>-- Chọn khu vực --</option>
                        <option value="US">Cần Thơ</option>
                        <option value="CA">Nha Trang</option>
                        <option value="FR">HCM</option>
                        <option value="DE">Hà Nội</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày bắt đầu</label>
                    <input
                        type="date"
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                        placeholder="Select a date" />
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc dự kiến</label>
                    <input
                        type="date"
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                        placeholder="Select a date" />
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc thực tế</label>
                    <input
                        type="date"
                        class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required
                        placeholder="Select a date" />
                </div>     
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium">Mô tả kế hoạch</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div> 
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>