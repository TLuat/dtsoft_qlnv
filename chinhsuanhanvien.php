<?php
$activePage = "Nhân viên";
include "inc/header.php";
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Chỉnh sửa Nhân sự</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium">Mã Nhân sự</label>
                        <input type="text" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium">Địa chỉ</label>
                        <input type="text" id="last_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                    </div>
                    <div>
                        <label for="company" class="block mb-2 text-sm font-medium">Họ & tên</label>
                        <input type="text" id="company" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>
                    </div>  
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium">Giới tính</label>
                        <select id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                            <option selected>Nam</option>
                            <option value="">Nữ</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                        <input type="email" id="email" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc@gmail.com" required>
                    </div>
                    <div>
                        <label for="visitors" class="block mb-2 text-sm font-medium">Số điện thoại</label>
                        <input type="number" id="visitors" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Chức vụ</label>
                    <select id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                        <option selected>-- Chọn Chức vụ --</option>
                        <option value="US">Cần Thơ</option>
                        <option value="CA">Nha Trang</option>
                        <option value="FR">HCM</option>
                        <option value="DE">Hà Nội</option>
                    </select>
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
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>