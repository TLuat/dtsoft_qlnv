<?php

include "inc/header.php";
include "db/database.php";

$id_nd = $_SESSION['id_nguoidung'];
$id_vt = $_SESSION['id_vaitro'];
$id_bp = $_SESSION['id_bophan'];
$id_kv = $_SESSION['id_khuvuc'];
?>

<?php
// Kiểm tra xem form đã được submit hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Reload lại trang
    echo '<script>window.location.href = window.location.href;</script>';
}
?>

<?php

if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "Lỗi rồi";
} else {
    $id = $_GET['id']; // Lấy mã kế hoạch trên host
}

$sql = "SELECT * FROM kehoachgiaoviec WHERE  id_kehoachgiaoviec = '$id'";
$result = mysqli_query($ketnoi, $sql);
$row = mysqli_fetch_array($result);

$ngaybatdau = $row["ngaybatdau"];
$ngayktdukien = $row["ngayktdukien"];
$ngayktthucte = $row["ngayktthucte"];
$id_bophan = $row["id_bophan"];
$id_khuvuc = $row["id_khuvuc"];

$sql_bophan = "SELECT `tenbophan` FROM `bophan` WHERE `id_bophan` = '" . $id_bophan . "'";
$result_bophan = mysqli_query($ketnoi, $sql_bophan);
$row_bophan = mysqli_fetch_array($result_bophan);
$tenbophan = $row_bophan["tenbophan"];

$sql_khuvuc = "SELECT `tenkhuvuc` FROM `khuvuc` WHERE `id_khuvuc` = '" . $id_khuvuc . "'";
$result_khuvuc = mysqli_query($ketnoi, $sql_khuvuc);
$row_khuvuc = mysqli_fetch_array($result_khuvuc);
$tenkhuvuc = $row_khuvuc["tenkhuvuc"];
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="mb-3 drop-shadow-lg"><a href="danhgia.php" class="bg-blue-700 p-2 text-white font-bold rounded-lg uppercase"><i class="fa-sharp fa-solid fa-arrow-left"></i> Trở về</a></div>
        <div class="mb-5 font-bold uppercase text-center underline text-xl drop-shadow-lg">Chi tiết Đánh giá</div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="items-center justify-center h-24 rounded bg-white">
                <p class="text-base mt-4 ml-3 mb-3"><b>Mã kế hoạch:</b> <?php echo $id ?></p>
                <p class="text-base ml-3"><b>Trạng thái:</b>
                    <?php                 
                        $sql_trangthai = "SELECT trangthai FROM kehoachgiaoviec WHERE id_kehoachgiaoviec = '. $id'";
                        $result_trangthai = mysqli_query($ketnoi, $sql);
                        $row_trangthai = mysqli_fetch_array($result_trangthai);
                        $trangthaidanhgia = $row_trangthai["trangthai"];

                        if ($trangthaidanhgia=='Không đạt') {
                            echo '<span class="bg-red-500 rounded p-1 text-white font-bold">Không đạt</span>';
                        } else if($trangthaidanhgia=='Đạt') {
                            echo '<span class="bg-green-500 rounded p-1 text-white font-bold">Đạt</span>';
                        } else if($trangthaidanhgia=='Chưa đạt') {
                            echo '<span class="bg-yellow-500 rounded p-1 text-white font-bold">Chưa đạt</span>';
                        } else {
                            echo '<span class="bg-red-500 rounded p-1 text-white font-bold">Chưa đánh giá</span>';
                        }
                        
                    ?>
                </p>
            </div>
            <div class="items-center justify-center h-24 rounded bg-white text-center">
                <p class="text-base mt-4 mb-3"><b>Bô phận:</b> <?php echo $tenbophan ?></p>
                <p class="text-base"><b>Khu vực:</b> <?php echo $tenkhuvuc ?></p>
            </div>
            <div class="items-center justify-center pb-5 rounded bg-white text-center">
                <p class="text-base mt-4 mb-3"><b>Thởi gian bắt đầu:</b> <?php echo $ngaybatdau ?></p>
                <p class="text-base mt-4 mb-3"><b>Thởi gian kết thúc dự kiến:</b> <?php echo $ngayktdukien ?></p>
                <p class="text-base"><b>Thởi gian kết thúc thực tế:</b> <?php echo $ngayktthucte ?></p>
            </div>
        </div>
    </div>

    <hr class="bg-pink-400 rounded p-1">
    <div class="mb-4 mt-5">
        <div class="text-center">
            Tổng chỉ tiêu đề ra cho kế hoạch <?php echo $id ?>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th class="px-3 py-3 border border-slate-300">
                            Tên chỉ tiêu
                        </th>
                        <th class="px-3 py-3 border border-slate-300">
                            Tổng chỉ tiêu cần đạt
                        </th>
                        <th class="px-3 py-3 border border-slate-300">
                            Tổng chỉ đạt được
                        </th>
                        <th class="px-3 py-3 border border-slate-300">
                            Hoàn thành (%)
                        </th>
                        <th class="px-3 py-3 border border-slate-300">
                            Đánh giá
                        </th>
                    </tr>
                </thead>
                <tbody class="text-black text-center">
                <?php
                    $sql2 = "SELECT chitieu.tenchitieu, SUM(theodoikehoach.chitieudatduoc) AS tongchitieuđatuoc, SUM(theodoikehoach.chitieucandat) AS tongchitieucandat
                    FROM theodoikehoach
                    INNER JOIN chitieu ON theodoikehoach.id_chitieu = chitieu.id_chitieu
                    WHERE theodoikehoach.id_kehoachgiaoviec = '" . $id . "'
                    GROUP BY chitieu.tenchitieu";

                    $result2 = mysqli_query($ketnoi, $sql2);

                    while ($row2 = mysqli_fetch_array($result2)) {
                        $tenchitieu = $row2["tenchitieu"];
                        $tongchitieuđatuoc = $row2["tongchitieuđatuoc"];
                        $tongchitieucandat = $row2["tongchitieucandat"];
                        $đatduoc = number_format($tongchitieuđatuoc, 0, '.', '.');
                        $candat = number_format($tongchitieucandat, 0, '.', '.');


                        
                ?>

                <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                    <td class="px-3 py-4 text-black border-r border-slate-300">
                        <?php echo $tenchitieu ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                        <?php echo $candat?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                        <?php
                        if ($tongchitieuđatuoc) {
                            echo $đatduoc;
                        } else echo "Chưa báo cáo";
                        ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                        <?php
                        if ($tongchitieuđatuoc) {
                            $phanTramHoanThanh = ($tongchitieuđatuoc / $tongchitieucandat) * 100;
                            echo round($phanTramHoanThanh, 2) . "%";
                        } else echo "--";
                        ?>
                    </td>
                    <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                        <?php
                        if ($tongchitieuđatuoc) {
                            if ($phanTramHoanThanh >= 75) echo "Đạt";
                            else if ($phanTramHoanThanh < 75) echo "Không đạt";
                            else echo "Chưa đạt";
                        } else echo "--";
                        ?>
                    </td>
                </tr>

                <?php
                    }
                ?>

                    <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                        <td class="px-3 py-4 text-black">
                        </td>
                        <td class="px-3 py-4 font-medium whitespace-nowrap">
                        </td>
                        <td class="px-3 py-4 font-medium whitespace-nowrap">
                        </td>
                        <?php 
                        if($id_vt == 'QLBP' && isset($tongchitieuđatuoc)) {
                        ?>
                        <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">
                            ĐÁNH GIÁ TỔNG THỂ:
                        </td>
                        <td class="px-3 py-4 font-medium whitespace-nowrap text-lg">
                            <?php 
                                $sql_kehoach = "SELECT * FROM `kehoachgiaoviec` WHERE `id_kehoachgiaoviec` = '" . $id . "'";
                                $result_kehoach = mysqli_query($ketnoi, $sql_kehoach);
                                $row_kehoach = mysqli_fetch_array($result_kehoach);
                                $trangthaikehoach = $row_kehoach["trangthai"];
                            ?>
                            <form class="flex" action="" method="POST">
                                <select name="trangthai" class="text-center bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" <?php if($trangthaikehoach == '') echo 'selected' ?>>-- Chọn Đánh gá --</option>
                                    <option value="Đạt" <?php if($trangthaikehoach == 'Đạt') echo 'selected' ?>>Đạt</option>
                                    <option value="Chưa Đạt" <?php if($trangthaikehoach == 'Chưa Đạt') echo 'selected' ?>>Chưa Đạt</option>
                                    <option value="Không Đạt" <?php if($trangthaikehoach == 'Không Đạt') echo 'selected' ?>>Không Đạt</option>
                                </select>
                                <button type="submit" class="ml-3 drop-shadow-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Lưu
                                </button>
                            </form>
                            <?php
                                if(isset($_POST['trangthai'])){
                                    $trangthai = $_POST['trangthai']; 

                                    $sql = "UPDATE kehoachgiaoviec SET trangthai = '$trangthai' WHERE id_kehoachgiaoviec = '$id'";
                                    $result = mysqli_query($ketnoi, $sql);
                                    if ($result) {
                                        echo "Cập nhật trạng thái thành công.";
                                    } else {
                                        echo "Cập nhật trạng thái thất bại: " . mysqli_error($ketnoi);
                                    }
                                }
    
                            ?>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr class="bg-pink-400 rounded p-1 mt-5">
        <div class="mb-4 mt-5">
            <div class="text-center">
                Danh sách nhân viên thuộc kế hoạch <?php echo $id ?>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-700">
                        <tr>
                            <th class="px-3 py-3 border border-slate-300">
                                Tên nhân sự
                            </th>
                            <th class="px-3 py-3 border border-slate-300">
                                Tên chỉ tiêu
                            </th>
                            <th class="px-3 py-3 border border-slate-300">
                                Chỉ tiêu cần đạt
                            </th>
                            <th class="px-3 py-3 border border-slate-300">
                                Chỉ đạt được
                            </th>
                            <th class="px-3 py-3 border border-slate-300">
                                Hoàn thành (%)
                            </th>
                            <th class="px-3 py-3 border border-slate-300">
                                Đánh giá
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-black text-center">

                        <?php
                        $sql3 = "SELECT * FROM theodoikehoach WHERE id_kehoachgiaoviec = '" . $id . "'";
                        $result3 = mysqli_query($ketnoi, $sql3);

                        while ($row3 = mysqli_fetch_array($result3)) {
                            $id_nguoidung = $row3["id_nguoidung"];
                            $id_chitieu = $row3["id_chitieu"];
                            $chitieudatduoc = $row3["chitieudatduoc"];
                            $chitieucandat = $row3["chitieucandat"];

                            $sql_nguoidung = "SELECT * FROM `nguoidung` WHERE `id_nguoidung` = '" . $id_nguoidung . "'";
                            $result_nguoidung = mysqli_query($ketnoi, $sql_nguoidung);
                            $row_nguoidung = mysqli_fetch_array($result_nguoidung);
                            $tennguoidung = $row_nguoidung["tennguoidung"];

                            $sql_chitieu = "SELECT * FROM `chitieu` WHERE `id_chitieu` = '" . $id_chitieu . "'";
                            $result_chitieu = mysqli_query($ketnoi, $sql_chitieu);
                            $row3_chitieu = mysqli_fetch_array($result_chitieu);
                            $tenchitieu = $row3_chitieu["tenchitieu"];

                        ?>
                            <tr class="bg-white border-b dark:border-gray-700 hover:bg-gray-50">
                                <td class="px-3 py-4 text-black border-r border-slate-300">
                                    <?php echo $tennguoidung ?>
                                </td>
                                <td class="px-3 py-4 text-black border-r border-slate-300">
                                    <?php echo $tenchitieu ?>
                                </td>
                                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                    <?php echo $chitieucandat ?>
                                </td>
                                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                    <?php
                                    if ($chitieudatduoc) {
                                        echo $chitieudatduoc;
                                    } else echo "Chưa báo cáo";
                                    ?>
                                </td>
                                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                    <?php
                                    if ($chitieudatduoc) {
                                        $phanTramHoanThanh = ($chitieudatduoc / $chitieucandat) * 100;
                                        echo round($phanTramHoanThanh, 2) . "%";
                                    } else echo "--";

                                    ?>
                                </td>
                                <td class="px-3 py-4 font-medium whitespace-nowrap border-r border-slate-300">
                                    <?php
                                    if ($chitieudatduoc) {
                                        if ($phanTramHoanThanh >= 75) echo "Đạt";
                                        else if ($phanTramHoanThanh < 75) echo "Không đạt";
                                        else echo "Chưa đạt";
                                    } else echo "--";
                                    ?>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>

</html>
