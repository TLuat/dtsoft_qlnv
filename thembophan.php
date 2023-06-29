<?php
$activePage = "Thêm Bộ Phận";
include "inc/header.php";
include "db/connect.php";
$id_khuvuc = $_SESSION['id_khuvuc'];
$sql = "SELECT * FROM khuvuc where id_khuvuc='$id_khuvuc'";
$result = mysqli_query($connect, $sql);
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-4 font-bold text-lg uppercase text-center">THÊM BỘ PHẬN</div>
        <div class="mb-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
                <form action="process_thembophan.php" method="POST">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Mã bộ phận</label>
                            <input type="text" name="id_bophan" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                        </div>
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium">Tên bộ phận</label>
                            <input type="text" name="tenbophan" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium">Khu vực</label>
                            <select name="id_khuvuc" id="countries" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                                <option selected>-- Chọn khu vực --</option>
                                <?php foreach ($result as $each) : ?>
                                    <option value="<?php echo $each['id_khuvuc'] ?>"><?php echo $each['tenkhuvuc'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium">Tên công việc chuyên môn</label>
                            <input type="text" name="cvchuyenmon" id="last_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        
                    </div>
                   
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

</body>

</html>