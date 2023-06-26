<?php
$activePage = "Kế hoạch giao việc";
include "inc/header.php";
?>
<?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM kehoachgiaoviec
    where id_kehoachgiaoviec = '" . $id . "' ";
    $query_up = mysqli_query($connect,$sql);
    $row_up = mysqli_fetch_assoc($query_up);
    if(isset($_POST['sbm'])){
        if(!empty($_POST['tenkh']) && !empty($_POST['ngaybatdau']) && !empty($_POST['ngayktdukien']) && !empty($_POST['ngayktthucte'])) {
            $tenkh = $_POST['tenkh'];
            $ngaybatdau = $_POST['ngaybatdau'];
            $ngayktdukien = $_POST['ngayktdukien'];
            $ngayktthucte = $_POST['ngayktthucte'];
            $sql = "UPDATE kehoachgiaoviec SET tenkh = '$tenkh', ngaybatdau = '$ngaybatdau', ngayktdukien = '$ngayktdukien', ngayktthucte = '$ngayktthucte'
            Where id_kehoachgiaoviec = '$id';"; 
            $query = mysqli_query($connect,$sql);
            echo'<script>alert("Chỉnh sửa kế hoạch thành công!")</script>';
        }else{
                echo '<script>alert("Chỉnh sửa kế hoạch thất bại! Hãy điền đầy đủ tất cả các mục")</script>';
            }
    }
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Chỉnh sửa Kế hoạch</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Tên Kế hoạch</label>
                    <input type="text" name="tenkh" require value="<?php echo $row_up['tenkh']; ?>" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>        
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày bắt đầu</label>
                    <input type="date" name="ngaybatdau" class="form-control" require value="<?php echo $row_up['ngaybatdau']; ?>">
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc dự kiến</label>
                    <input type="date" name="ngayktdukien" class="form-control" require value="<?php echo $row_up['ngayktdukien']; ?>">
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc thực tế</label>
                    <input type="date" name="ngayktthucte" class="form-control" require value="<?php echo $row_up['ngayktthucte']; ?>">
                </div>     
                <button name=sbm type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thay đổi</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>