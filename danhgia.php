<?php
$activePage = "Quản lý kết quả đánh giá";
include "inc/header.php";
include "db/database.php";

?>


<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-5 font-bold uppercase text-center underline text-xl drop-shadow-lg">Đánh giá</div>
        <div class="p-4 mt-14 flex grid">
            <div class="flex">
                <?php 
                if($id_vt == 'QLKV' || $id_vt == 'QTHT'){
                ?>
                <div class="shadow-md bg-white p-2 rounded-lg">
                <label for="countries" class="block mb-2 text-base font-medium text-gray-900">Chọn bộ phận</label>
                <select id="filter-select1" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">-- Tất cả --</option>
                    <option value="Kinh doanh">Kinh doanh</option>
                    <option value="TKBT">TKBT</option>
                    <option value="Nguồn lực">Nguồn lực</option>
                    <option value="Tester">Tester</option>
                </select>
                </div>
                <?php    
                }
                ?>

                <?php 
                if($id_vt == 'QTHT'){
                ?>
                <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
                <label class="block mb-2 text-base font-medium text-gray-900">Chọn khu vực</label>
                <select id="filter-select2" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">-- Tất cả --</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                    <option value="Nha Trang">Nha Trang</option>
                </select>
                </div>
                <?php    
                }
                ?>
                <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
                    <label class="block mb-2 text-base font-medium text-gray-900">Chọn Trạng Thái đánh giá</label>
                    <select id="filter-select3" class="bg-gray-500 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">-- Tất cả --</option>
                        <option value="Đã đánh giá">Đã đánh giá</option>
                        <option value="Chưa đánh giá">Chưa đánh giá</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-gray-500 dark:text-gray-400" id="myTable3">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th class="px-3 py-3">
                            Mã kế hoạch
                        </th>
                        <th class="px-3 py-3">
                            Bộ phận
                        </th>
                        <th class="px-3 py-3">
                            Khu vực
                        </th>
                        <th class="px-3 py-3">
                            Ngày kết thúc dự kiến
                        </th>
                        <th class="px-3 py-3">
                            Ngày kết thúc thực tế
                        </th>
                        <th class="px-3 py-3">
                            Tiến độ
                        </th>
                        <th class="px-3 py-3">
                            Kết quả
                        </th>
                        <th class="px-3 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black text-center">

                    <?php
                    $id_nd = $_SESSION['id_nguoidung'];
                    $id_vt = $_SESSION['id_vaitro'];
                    $id_bp = $_SESSION['id_bophan'];
                    $id_kv = $_SESSION['id_khuvuc'];

                    if ($id_vt == "NS" or $id_vt == "QLBP") {
                        $condition = "id_bophan = '" . $id_bp . "'";
                    } else {
                        $condition = "id_khuvuc = '" . $id_kv . "'";
                    }
                    
                    $sql = "SELECT * FROM kehoachgiaoviec";
                    
                    if (!empty($condition)) {
                        $sql .= " WHERE $condition";
                    }
                    
                    // $sql .= " ORDER BY id_kehoachgiaoviec LIMIT 5";

                    $result = mysqli_query($ketnoi, $sql);
                    $stt = 0;

                    while ($row = mysqli_fetch_array($result)) {
                        $stt++;

                        $id_kehoachgiaoviec = $row["id_kehoachgiaoviec"];
                        $ngaybatdau = $row["ngaybatdau"];
                        $ngayktdukien = $row["ngayktdukien"];
                        $ngayktthucte = $row["ngayktthucte"];
                        $id_bophan = $row["id_bophan"];
                        $madanhgia = $row["id_khuvuc"];
                        $id_khuvuc = $row["id_khuvuc"];
                        $trangthai = $row["trangthai"];

                        $sql_bophan = "SELECT `tenbophan`,`id_khuvuc` FROM `bophan` WHERE `id_bophan` = '" . $id_bophan . "'";
                        $result_bophan = mysqli_query($ketnoi, $sql_bophan);
                        $row_bophan = mysqli_fetch_array($result_bophan);
                        $tenbophan = $row_bophan["tenbophan"];
                        

                        $sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `id_khuvuc` = '" . $id_khuvuc . "'";
                        $result_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
                        $row_khuvuc = mysqli_fetch_array($result_khuvuc);
                        $tenkhuvuc = $row_khuvuc["tenkhuvuc"];


                    ?>
                        <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                            <td scope="row" class="px-3 py-4 text-black">
                                <?php echo $id_kehoachgiaoviec ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenbophan ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenkhuvuc ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $ngayktdukien ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $ngayktthucte ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                               <?php 
                                    $date1 = new DateTime($ngayktdukien);
                                    $date2 = new DateTime($ngayktthucte);
                                    
                                    $diff = $date1->diff($date2);
                                    
                                    if($ngayktthucte!=''){
                                        if ($diff->days > 0) {
                                            echo "Trễ tiến độ";
                                        } elseif ($diff->days < 0) {
                                            echo "Đúng tiến độ";
                                        } else {
                                            echo "Đúng tiến độ";
                                        }
                                    } else echo "--"
                               ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap text-center">
                                <?php 
                                    if ($trangthai=='-- Chọn đánh giá --' or $trangthai=='') {
                                        echo 'Chưa đánh giá';
                                    } 
                                    else if ($trangthai == 'Đạt') echo '<span class="bg-green-500 rounded p-1 text-white font-bold">Đạt</span>';
                                    else if ($trangthai == 'Không Đạt') echo '<span class="bg-red-500 rounded p-1 text-white font-bold">Không Đạt</span>';
                                    else echo '<span class="bg-yellow-500 rounded p-1 text-white font-bold">Chưa Đạt</span>';
                    
                                ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap text-center">
                                <a class="bg-blue-700 p-1 text-white rounded-lg uppercase" href="chitietdanhgia.php?id=<?php echo $id_kehoachgiaoviec ?>">
                                    Đánh giá
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    

                </tbody>
            </table>
        </div>

    </div>
</div>
</div>

<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#myTable3').DataTable({
                responsive: false,
                search: "",
                searchPlaceholder: "Search..."
            })
            // .columns.adjust()
            .responsive.recalc();

        $('#filter-select1, #filter-select2, #filter-select3').change(function() {
            var filterValue1 = $('#filter-select1').val();
            var filterValue2 = $('#filter-select2').val();
            var filterValue3 = $('#filter-select3').val();

            // Áp dụng bộ lọc vào DataTable
            table.columns(1).search(filterValue1); // Lọc cột 1 bằng giá trị của select 1
            table.columns(2).search(filterValue2);
            table.columns(5).search(filterValue3);

            table.draw(); // Vẽ lại DataTable
        });

        // Custom styling for search input
        // $('.dataTables_filter input').addClass('bg-gray-100 border border-gray-300 py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500');

        // Clear default search icon
        // $('.dataTables_filter label::before').remove();
        // $('.dataTables_filter label::after').remove();
        // $('.dataTables_filter label').addClass('');
        // $('.dataTables_filter input').addClass('m-2 bg-white text-white border');

        // $('.dataTables_filter label').append('<i class="fa-solid fa-magnifying-glass"></i>');
        $('.dataTables_filter input').attr('placeholder', 'Tìm kiếm ...');
    });
</script>

</body>

</html>
