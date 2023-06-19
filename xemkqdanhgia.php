<?php 
$activePage = "Xem kết quả đánh giá";
include "inc/header.php";
include "db/database.php";
include "classes/nhansu.php";
?>

    <!-- End Navbar -->
    <div class="container-fluid py-1">
      <h5 class="mb-1 text-info">
        <a class="text-info" href="ketquadanhgia.php"><i class="fa fa-chevron-left" aria-hidden="true"></i> Trở về</a>
      </h5>

      <div class="row">
        <div class="col-md-5 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Thông tin nhân sự</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column ">

                  <?php
                  $ns = new Nhansu();
                  $show_nhansu = $ns->show_nhansu();

                    if (isset($show_nhansu)) {
                      $result = $show_nhansu->fetch(PDO::FETCH_ASSOC)
                    ?>
                        <h6 class="mb-3 text-sm"><?php echo $result['tennguoidung'] ?></h6>
                        <span class="mb-2 text-sm">Mã Số: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $result['id_nguoidung'] ?></span></span>
                        <span class="mb-2 text-sm">Email Address:<span class="text-dark ms-sm-2 font-weight-bold"><?php echo $result['email'] ?></span></span>
                        <span class="mb-2 text-sm">Bộ phận: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $result['tennguoidung'] ?></span></span>
                        <span class="mb-2 text-sm">Khu vực:<span class="text-dark ms-sm-2 font-weight-bold"><?php echo $result['tennguoidung'] ?></span></span>
                        <span class="mb-2 text-sm">Công việc chuyên môn:<span class="text-dark ms-sm-2 font-weight-bold"><?php echo $result['tennguoidung'] ?></span></span>
                    <?php
                      
                    }
                    ?>


                  </div>
                  <div class="ms-auto text-end">
                    <!-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a> -->
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-7 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Kết quả đánh giá</h6>
                  <span class="badge badge-sm bg-gradient-success mt-3">Đạt</span>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="chinhsuadanhgia.php"><i class="material-icons text-sm me-2">edit</i>Chỉnh sửa đánh giá</a>
                </div>
              </div>
              
            </div>
            <div class="card-body pt-4 p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Công việc</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Công việc 1</h6>
                    </div>
                  </div>
                    
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    <table class="table mr-2">
                        <td class="align-middle text-center">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold">100%</span>
                            <div>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="pl-5">
                              Hoàn thành
                        </td>
                    </table>
                  </div>
                </li>
                
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Công việc 2</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    <table class="table">
                        <td class="align-middle text-center">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold">100%</span>
                            <div>
                              <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="" style="margin-left: 20px;">
                            Hoàn thành
                        </td>
                    </table>
                  </div>
                </li>
              </ul>

              <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Chỉ tiêu</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Chỉ tiêu doanh số</h6>
                    </div>
                  </div>

                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    Đạt
                  </div>
                </li>
                
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Phát triển khách hàng</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    Đạt
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">priority_high</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Hỗ trợ khách hàng</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-warning text-sm font-weight-bold">
                      Chưa đạt
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer py-4  ">
        
      </footer>
    </div>
  </main>

</body>


</html>