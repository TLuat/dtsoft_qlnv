<?php
$activePage = "Quản lý kết quả đánh giá";
include "inc/header.php";
include "db/database.php";
include "classes/nhansu.php";
?>


<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-5 font-bold uppercase text-center underline text-xl drop-shadow-lg">Đánh giá</div>
        <div class="p-4 mt-14 flex grid">
            <div class="flex">
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
                <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
                    <label class="block mb-2 text-base font-medium text-gray-900">Chọn khu vực</label>
                    <select id="filter-select2" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">-- Tất cả --</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                        <option value="Nha Trang">Nha Trang</option>
                    </select>
                </div>
                <div class="ml-5 shadow-md bg-white p-2 rounded-lg">
                    <label class="block mb-2 text-base font-medium text-gray-900">Chọn Trạng Thái đánh giá</label>
                    <select id="filter-select3" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            <table class="w-full text-sm text-gray-500 dark:text-gray-400" id="myTable">
                <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700">
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
                            Tiến độ
                        </th>
                        <th class="px-3 py-3">
                            Trạng thái
                        </th>
                        <th class="px-3 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black text-center">

                    <?php
                    $sql = "SELECT * FROM kehoachgiaoviec ORDER BY makehoach LIMIT 5";
                    $result = mysqli_query($ketnoi, $sql);
                    $stt = 0;

                    while ($row = mysqli_fetch_array($result)) {
                        $stt++;

                        $makehoach = $row["makehoach"];
                        $thoigianbatdau = $row["thoigianbatdau"];
                        $thoigianketthucdukien = $row["thoigiandukien"];
                        $thoigianketthuc = $row["thoigianketthuc"];
                        $mabophan = $row["mabophan"];
                        $makhuvuc = $row["makhuvuc"];
                        $madanhgia = $row["makhuvuc"];

                        $sql_bophan = "SELECT `tenbophan` FROM `bophan` WHERE `mabophan` = '" . $mabophan . "'";
                        $result_bophan = mysqli_query($ketnoi, $sql_bophan);
                        $row_bophan = mysqli_fetch_array($result_bophan);
                        $tenbophan = $row_bophan["tenbophan"];

                        $sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `makhuvuc` = '" . $makhuvuc . "'";
                        $result_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
                        $row_khuvuc = mysqli_fetch_array($result_khuvuc);
                        $tenkhuvuc = $row_khuvuc["tenkhuvuc"];


                    ?>
                        <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                            <td scope="row" class="px-3 py-4 text-black">
                                <?php echo $makehoach ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenbophan ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $tenkhuvuc ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                <?php echo $thoigianketthucdukien ?>
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap">
                                Đã hoàn thành
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap text-center">
                                Chưa đánh giá
                            </td>
                            <td class="px-3 py-4 font-medium whitespace-nowrap text-center">
                                <a class="text-blue-800" href="chitietdanhgia.php?id=<?php echo $makehoach ?>">Chi tiết</a>
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

        var table = $('#myTable').DataTable({
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