<?php
$activePage = "Kế hoạch giao việc";
include "inc/header.php";
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Thêm công việc vào kế hoạch</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card-body">
                            <form role="form">
                                <div class="input-group input-group-outline mb-3">
                                    <!-- <label class="form-label">Bộ phận</label>
                                    <input type="email" class="form-control"> -->
                                    <select class="form-control">
                                        <option value="0">Mã công việc</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <!-- <label class="form-label">Khu vực</label>
                                    <input type="password" class="form-control"> -->
                                    <select class="form-control">
                                        <option value="0">Người phụ trách</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Thêm công việc</button>
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