<?php
$activePage = "Chỉnh Sửa Bộ Phận";
include "inc/header.php";
?>

<div class="container-fluid">
    <a class="btn btn-info text-white" href="bophan.php"><i class="fa fa-long-arrow-left"></i> Trở về</a>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">CHỈNH SỬA BỘ PHẬN</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive  p-0">
                        <div class="card-body">
                            <form role="form">
                                <div class="form-group form-group-sm">
                                    <label class="form-label">Tên bộ phận</label>
                                    <div class="form-control form-control-sm  input-group input-group-outline mb-3">
                                        <input type="text" id="namecv" class="form-control" placeholder="Nhập vào tên bộ phận" required value="Tester">
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="form-label">Khu vực</label>
                                    <div class="form-control form-control-sm input-group input-group-outline mb-3">
                                        <select class="form-control">
                                            <option selected>-- Chọn khu vực --</option>
                                            <option value="0">Hà Nội</option>
                                            <option value="1">TP. Hồ Chí Minh</option>
                                            <option value="2" selected>TP. Cần Thơ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-group-sm">
                                    <label class="form-label">Tên công việc chuyên môn</label>
                                    <div class="form-control form-control-sm  input-group input-group-outline mb-3">
                                        <input type="text" value="Lập trình" id="namecv" class="form-control" placeholder="Nhập vào tên công việc chuyên môn" required>
                                    </div>
                                </div>
                                
                             
                                
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg bg-gradient-success btn-lg w-20 mt-4 mb-0">Chỉnh sửa bộ phận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-4  ">
        <div class="container-fluid">
        </div>
    </footer>
</div>
</main>
</body>

</html>