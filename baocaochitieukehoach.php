<?php
$activePage = "Báo cáo chỉ tiêu";
include "inc/header.php";
?>
<?php 
    $id_user = $_SESSION['id_nguoidung'];
    $id = $_GET['id'];
    $sql_ct = "SELECT DISTINCT td.id_chitieu, ct.tenchitieu FROM theodoikehoach td
    INNER JOIN chitieu ct ON td.id_chitieu = ct.id_chitieu
    WHERE id_kehoachgiaoviec = '$id'";
    $query_ct = mysqli_query($connect,$sql_ct);
    if(isset($_POST['sbm'])){
        if(!empty($_POST['id_chitieu']) && !empty($_POST['chitieudatduoc']) && !empty($id)) {
            $id_chitieu = $_POST['id_chitieu'];
            $chitieudatduoc = $_POST['chitieudatduoc'];
            // $sql_check = "SELECT * FROM theodoikehoach WHERE id_nguoidung = '$id_user' AND id_chitieu = '$id_chitieu' AND id_kehoachgiaoviec = '$id' ";
            // $query_check = mysqli_query($connect,$sql_check);
            // $row_check = mysqli_fetch_assoc($query_check);
            // if($row_check == ""){
            $sql_check_baocao = "SELECT * FROM theodoikehoach WHERE id_nguoidung = '$id_user' AND id_chitieu = '$id_chitieu' AND id_kehoachgiaoviec = '$id' LIMIT 1";
            $query_check_baocao = mysqli_query($connect,$sql_check_baocao);
            $row_check_baocao = mysqli_fetch_assoc($query_check_baocao);
            
            if($row_check_baocao == ''){
                $sql_check = "SELECT * FROM theodoikehoach WHERE id_chitieu = '$id_chitieu' AND id_kehoachgiaoviec = '$id' LIMIT 1";
                $query_check = mysqli_query($connect,$sql_check);
                $row_check = mysqli_fetch_assoc($query_check);
                if($row_check != ""){
                    if($row_check['id_nguoidung'] == NULL){
                        $sql = "UPDATE theodoikehoach
                        SET id_nguoidung = '$id_user',chitieudatduoc = '$chitieudatduoc'
                        WHERE id_nguoidung IS NULL AND id_chitieu = '$id_chitieu' AND id_kehoachgiaoviec = '$id';";
                        $query = mysqli_query($connect,$sql);
                        echo'<script>alert("Báo cáo chỉ tiêu thành công!")</script>';
                    }elseif($row_check['id_nguoidung'] != $id_user){
                        $chitieucandat = $row_check['chitieucandat'];
                        $sql = "INSERT INTO theodoikehoach (id_nguoidung, id_chitieu, id_kehoachgiaoviec, chitieucandat ,chitieudatduoc)
                        VALUES ('$id_user', '$id_chitieu', '$id', '$chitieucandat','$chitieudatduoc')";
                        $query = mysqli_query($connect,$sql);
                        echo'<script>alert("Báo cáo chỉ tiêu thành công!")</script>';
                    }
                }
            }else{
                echo'<script>alert("Bạn đã báo cáo chỉ tiêu này rồi!")</script>';
            }
        }else{
                echo '<script>alert("Báo cáo chỉ tiêu thất bại! Hãy điền đầy đủ tất cả các mục")</script>';
            }
    }
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
    <div class="mb-4 font-bold text-lg uppercase text-center">Báo cáo chỉ tiêu</div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 rounded">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Chỉ tiêu</label>
                    <select id="countries" name="id_chitieu" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <?php 
                            while($row_ct = mysqli_fetch_assoc($query_ct)){?>
                                <option value="<?php echo $row_ct['id_chitieu']; ?>"><?php echo $row_ct['tenchitieu']; ?></option>
                        <?php } ?>
                    </select>
                </div> 
                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium">Giá trị đạt được</label>
                    <input placeholder="Giá trị chỉ tiêu" name="chitieudatduoc" id="first_name" class=" border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nhập tên kế hoạch" required>
                </div>        
                <button name=sbm type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nộp báo cáo</button>
            </form>

        </div>

    </div>
  </div>
</div>

</body>

</html>