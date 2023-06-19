<?php
$activePage = "Quản lý bộ phận";
include "inc/header.php";
?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-info shadow border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Quản lý bộ phận</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">

            <div class="bg-gradient-info" style="width: 15%;border-radius:5px ;float: left;margin-left: 15px;padding: 5px;">
              <a href="thembophan.php"><i class="fa fa-plus" aria-hidden="true"></i> Thêm bộ phận mới</a>
            </div>
            <br>

            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">STT </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên bộ phận</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên khu vực</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Công việc chuyên môn</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sửa</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Xóa</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>
                    <h6 class="mb-0 text-sm">1</h6>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">Tester</h6>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">Cần Thơ</h6>
                  </td>
                  <td class="align-middle text-center text-sm">

                    <h6 class="mb-0 text-sm">Lập trình</h6>

                  </td>

                  <td>

                    <h6 class="mb-0 text-sm"><a href="chinhsuabophan.php"><i class="fa fa-pencil text-danger" aria-hidden="true"></i></a></h6>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">
                      <a href="#">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                    </h6>
                  </td>
                </tr>
              </tbody>
            </table>

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