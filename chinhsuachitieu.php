<?php
$activePage = "Chỉ Tiêu";
include "inc/header.php";
?>
<?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM chitieu where id_chitieu = '$id'";
    $query_up = mysqli_query($connect,$sql);
    $row_up = mysqli_fetch_assoc($query_up);
    if(isset($_POST['sbm'])){
        if(!empty($_POST['tenchitieu']) && !empty($_POST['id_chitieu']) ) {
            $id_chitieu = $_POST['id_chitieu'];
            $tenchitieu = $_POST['tenchitieu'];
            $sql = "UPDATE chitieu SET tenchitieu = '$tenchitieu',id_chitieu = '$id_chitieu'  Where id_chitieu = '$id';"; 
            $query = mysqli_query($connect,$sql);
            echo'<script>alert("Chỉnh sửa chỉ tiêu thành công!")</script>';
        }else{
                echo '<script>alert("Chỉnh sửa chỉ tiêu thất bại! Hãy điền đầy đủ tất cả các mục")</script>';
            }
    }
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Chỉnh sửa chỉ tiêu</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">ID chỉ tiêu</label>
                    <input require value="<?php echo $row_up['id_chitieu']; ?>" name="id_chitieu" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập tên kế hoạch" required>
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Tên chỉ tiêu</label>
                    <input require value="<?php echo $row_up['tenchitieu']; ?>" name="tenchitieu" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập tên kế hoạch" required>
                </div>         
                <button name=sbm type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Chỉnh sửa chỉ tiêu</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>