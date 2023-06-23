<?php
$activePage = "Kế hoạch giao việc";
include "inc/header.php";
?>
<?php 
    $sql = "SELECT * FROM kehoachgiaoviec";
    $sql_bophan = "SELECT * FROM bophan";
    $query_bophan = mysqli_query($connect,$sql_bophan);
    $sql_khuvuc = "SELECT * FROM khuvuc";
    $query_khuvuc = mysqli_query($connect,$sql_khuvuc);
    if(isset($_POST['sbm'])){
        if(!empty($_POST['tenkh']) && !empty($_POST['id_khuvuc']) && !empty($_POST['motakh']) && !empty($_POST['id_bophan']) && !empty($_POST['ngaybatdau']) && !empty($_POST['ngayktdukien']) && !empty($_POST['ngayktthucte'])) {
            $tenkh = $_POST['tenkh'];
            $id_khuvuc = $_POST['id_khuvuc'];
            $id_bophan = $_POST['id_bophan'];
            $ngaybatdau = $_POST['ngaybatdau'];
            $ngayktdukien = $_POST['ngayktdukien'];
            $ngayktthucte = $_POST['ngayktthucte'];
            $motakh = $_POST['motakh'];
            $sql_check = "SELECT * FROM bophan Where bophan.id_bophan = $id_bophan and bophan.id_khuvuc = $id_khuvuc";
            $query_check = mysqli_query($connect,$sql_check);
            $check_done = mysqli_num_rows($query_check);
            if($check_done != 0){
                $sql = "INSERT INTO kehoachgiaoviec (tenkh, id_khuvuc, id_bophan, ngaybatdau, ngayktdukien, ngayktthucte, motakh)
                VALUES ('$tenkh', '$id_khuvuc', '$id_bophan','$ngaybatdau','$ngayktdukien','$ngayktthucte','$motakh')";
                $query = mysqli_query($connect,$sql);
                echo'<script>alert("Thêm kế hoạch thành công!")</script>';
            }
            else{
                echo'<script>alert("Thêm kế hoạch thất bại! Bộ phận này không có trong khu vực này!")</script>';
            }
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
                    <label for="" class="block mb-2 text-sm font-medium">Tên Kế hoạch</label>
                    <input type="text" name="tenkh" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập tên kế hoạch" required>
                </div>  
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Khu vực</label>
                    <select id="countries" name="id_khuvuc" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <?php 
                            while($row_khuvuc = mysqli_fetch_assoc($query_khuvuc)){?>
                                <option value="<?php echo $row_khuvuc['id_khuvuc']; ?>"><?php echo $row_khuvuc['tenkhuvuc']; ?></option>
                        <?php } ?>
                    </select>
                </div>        
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Bộ phận</label>
                    <select id="countries" name="id_bophan" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <?php 
                            while($row_bophan = mysqli_fetch_assoc($query_bophan)){?>
                                <option value="<?php echo $row_bophan['id_bophan']; ?>"><?php echo $row_bophan['tenbophan']; ?></option>
                        <?php } ?>
                    </select>
                </div>        
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày bắt đầu</label>
                    <input type="datetime-local" name="ngaybatdau" class="form-control" >
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc dự kiến</label>
                    <input type="datetime-local" name="ngayktdukien" class="form-control" >
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Ngày Kết thúc thực tế</label>
                    <input type="datetime-local" name="ngayktthucte" class="form-control" >
                </div>     
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium">Mô tả kế hoạch</label>
                    <textarea id="message" name="motakh" rows="4" class="block p-2.5 w-full text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập mô tả kế hoạch"></textarea>
                </div> 
                <button name=sbm type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm kế hoạch</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>