<?php
$activePage = "Báo cáo chỉ tiêu";
include "inc/header.php";
?>
<?php 
    $id_user = $_SESSION['id_nguoidung'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM theodoikehoach WHERE id_kehoachgiaoviec = '$id'";
    $sql_ct = "SELECT * FROM chitieu";
    $query_ct = mysqli_query($connect,$sql_ct);
    if(isset($_POST['sbm'])){
        if(!empty($_POST['id_chitieu']) && !empty($_POST['chitieucandat']) && !empty($id)) {
            $id_chitieu = $_POST['id_chitieu'];
            $chitieucandat = $_POST['chitieucandat'];
            $id_kehoachgiaoviec = $id;

            $sql_check = "SELECT * FROM theodoikehoach WHERE id_chitieu = '$id_chitieu' AND id_kehoachgiaoviec = '$id' ";
            $query_check = mysqli_query($connect,$sql_check);
            $row_check = mysqli_fetch_assoc($query_check);

            if($row_check == ''){
                $sql = "INSERT INTO theodoikehoach (id_chitieu, chitieucandat, id_kehoachgiaoviec)
                VALUES ('$id_chitieu', '$chitieucandat', '$id_kehoachgiaoviec')";
                $query = mysqli_query($connect,$sql);
                echo'<script>alert("Đặt chỉ tiêu thành công!")</script>';
            }else{
                echo'<script>alert("Bạn đã đặt chỉ tiêu này cho kế hoạch này rồi!")</script>';
            }
            
        }else{
                echo '<script>alert("Đặt chỉ tiêu thất bại! Hãy điền đầy đủ tất cả các mục")</script>';
            }
    }
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Đặt chỉ tiêu</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Tên chỉ tiêu</label>
                    <select id="countries" name="id_chitieu" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <?php 
                            while($row_ct = mysqli_fetch_assoc($query_ct)){?>
                                <option value="<?php echo $row_ct['id_chitieu']; ?>"><?php echo $row_ct['tenchitieu']; ?></option>
                        <?php } ?>
                    </select>
                </div> 
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Giá trị cần đạt</label>
                    <input placeholder="Giá trị chỉ tiêu" name="chitieucandat" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập tên kế hoạch" required>
                </div>        
                <button name=sbm type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>