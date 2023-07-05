<?php
$activePage = "Kế hoạch giao việc";
include "inc/header.php";
?>
<?php 
    $id_kv = $_SESSION['id_khuvuc'];
    $id_bp = $_SESSION['id_bophan'];
    if(isset($_POST['sbm'])){
        if(!empty($_POST['tenkh']) && !empty($id_bp) && !empty($id_kv) && !empty($_POST['id_kehoachgiaoviec']) && !empty($_POST['ngaybatdau']) && !empty($_POST['ngayktdukien'])) {
            $id_kehoachgiaoviec = $_POST['id_kehoachgiaoviec'];
            $id_khuvuc = $id_kv;
            $id_bophan = $id_bp;
            $tenkh = $_POST['tenkh'];
            $ngaybatdau = $_POST['ngaybatdau'];
            $ngayktdukien = $_POST['ngayktdukien'];
            $sql = "INSERT INTO kehoachgiaoviec (id_kehoachgiaoviec ,tenkh, id_khuvuc, id_bophan, ngaybatdau, ngayktdukien)
            VALUES ('$id_kehoachgiaoviec','$tenkh', '$id_khuvuc', '$id_bophan','$ngaybatdau','$ngayktdukien')";
            $query = mysqli_query($connect,$sql);
            echo'<script>alert("Thêm kế hoạch thành công!")</script>';
        }else{
                echo '<script>alert("Thêm kế hoạch thất bại! Hãy điền đầy đủ tất cả các mục")</script>';
            }
    }
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Thêm kế hoạch</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">ID Kế hoạch</label>
                    <input type="text" name="id_kehoachgiaoviec" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập ID kế hoạch" required>
                </div>   
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Tên Kế hoạch</label>
                    <input type="text" name="tenkh" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập tên kế hoạch" required>
                </div>         
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày bắt đầu</label>
                    <input type="datetime-local" name="ngaybatdau" class="form-control" >
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc dự kiến</label>
                    <input type="datetime-local" name="ngayktdukien" class="form-control" >
                </div>   
                <button name=sbm type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm kế hoạch</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>