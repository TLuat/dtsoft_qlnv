<?php 
 include_once('db/connect.php');
 if (session_id() === '')
  session_start();
if(!isset($_SESSION['id_vaitro'])) {
    header('Location: login.php');
}
 $id_vt = $_SESSION['id_vaitro'];
 $id_bp = $_SESSION['id_bophan'];
 $id_kv = $_SESSION['id_khuvuc'];
 $id_nd = $_SESSION['id_nguoidung'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/logos/dtsoft.png">
  <title>
      Admin
  </title>

	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <link rel="stylesheet" href="/assets/css/style.css"> -->
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
  <style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

    .dataTables_wrapper{
      margin: 15px;
    }

    .dataTables_wrapper select{
      margin: 15px;
      background-color: white;
      border: 2px solid gainsboro;
    }
    .dataTables_wrapper .dataTables_filter input{
      margin: 15px;
      background-color: white;
      border: 2px solid gainsboro;
    }


		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>
 

</head>

<body class="g-sidenav-show bg-slate-50" id="draggable">
  <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-400 dark:border-gray-100 text-black">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
          <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
              <a href="index.php" class="flex ml-2 md:mr-24">
                <img src="assets/img/logo.jpg" class="h-12 mr-3" alt="FlowBite Logo" />
              </a>
            </div>
	    <div class="divToHide flex items-center justify-start relative inline-flex items-center p-0.5 mb-2 mr-2 text-sm font-medium rounded-lg border border-blue-900">
              <span class="relative px-5 py-2.5 bg-white rounded-md border-r border-blue-900">
                <i class="fa-regular fa-user"></i>
                  <?php 
                    $sql = "SELECT tenvaitro from vaitro where id_vaitro = '" . $_SESSION['id_vaitro'] ."'";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['tenvaitro'];
                  ?>
              </span>
              <?php
              if ($_SESSION['id_bophan'] != NULL){
                $sql = "SELECT tenbophan from bophan where id_bophan = '" . $_SESSION['id_bophan'] ."'";
                $result = mysqli_query($connect, $sql);
                $row_bophan = mysqli_fetch_array($result);
              ?>
              <span class="relative px-5 py-2.5 bg-white rounded-md border-r border-blue-900">
                 <i class="fa-solid fa-cheese"></i>
                  <?php
                      echo $row_bophan['tenbophan'];       
                  ?>
              </span>
              <?php
              } else echo '';
              ?>
              <?php
              if ($_SESSION['id_vaitro'] != 'QTHT'){
              ?>
              <span class="relative px-5 py-2.5 bg-white rounded-md">
                  <i class="fa-solid fa-globe"></i>
                  <?php 
                    $sql = "SELECT tenkhuvuc from khuvuc where id_khuvuc = '" . $_SESSION['id_khuvuc'] ."'";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['tenkhuvuc'];
                  ?>
              </span>
              <?php
              }
              ?>
            </div>	  
            <div class="flex items-center divToHide">
                <div class="flex items-center ml-3">
                  <div class="flex">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                      <span class="sr-only">Open user menu</span>
                      <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">                      
                    </button>
                    <span class="text-black p-1 cursor-pointer" data-dropdown-toggle="dropdown-user"><?php echo $_SESSION['tennguoidung']; ?></span>
                  </div>
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                    <!-- <div class="px-4 py-3" role="none">
                      <p class="text-sm text-gray-900 dark:text-black" role="none">
                        Neil Sims
                      </p>
                      <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                        neil.sims@flowbite.com
                      </p>
                    </div> -->
                    <ul class="py-1" role="none">
                       <?php
                      if($_SESSION['id_vaitro'] == 'QLBP' || $_SESSION['id_vaitro'] == 'NS'){
                      ?>
                      <li>
                        <a href="thongtincanhan.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                      </li>
                      <?php
                      }
                      ?>
                      <li>
                        <a href="process_signout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </nav>
      
      <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:border-gray-100
      h-96 overflow-y-scroll scrollbar-thick scrollbar-thumb-blue-500 scrollbar-track-blue-100
      " aria-label="Sidebar">
         <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
               <li class="border-b rounded">
                  <a href="index.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="34" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                  </svg>
                     <span class="ml-3">Trang chủ</span>
                  </a>
               </li>

               <?php if($_SESSION['id_vaitro'] == 'QLKV' || $_SESSION['id_vaitro'] == 'QLBP') { ?>
               <li class="border-b rounded">
                  <a href="nhanvien.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="34" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                </svg>
                     <span class="flex-1 ml-3 whitespace-nowrap">Nhân sự</span>
                     <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-white">40</span>
                  </a>
               </li>
                <?php } ?>

              <?php if($_SESSION['id_vaitro'] == 'QLKV') { ?>
               <li class="border-b rounded">
                  <a href="bophan.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-flipboard" width="34" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3.973 3h16.054c.537 0 .973 .436 .973 .973v4.052a.973 .973 0 0 1 -.973 .973h-5.025v4.831c0 .648 -.525 1.173 -1.173 1.173h-4.829v5.025a.973 .973 0 0 1 -.974 .973h-4.053a.973 .973 0 0 1 -.973 -.973v-16.054c0 -.537 .436 -.973 .973 -.973z" />
                  </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Bộ Phận</span>
                  </a>
               </li>
               <?php } ?>

               <?php if ($id_vt != "QLKV" && $id_vt != 'QTHT'){ ?>
               <li class="border-b rounded">
                  <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-black hover:bg-gray-200" aria-controls="dropdown-cv" data-collapse-toggle="dropdown-ct">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-target-arrow" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                      <path d="M12 7a5 5 0 1 0 5 5" />
                      <path d="M13 3.055a9 9 0 1 0 7.941 7.945" />
                      <path d="M15 6v3h3l3 -3h-3v-3z" />
                      <path d="M15 9l-3 3" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Chỉ Tiêu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                  <ul id="dropdown-ct" class="hidden py-2 space-y-2">
                  <?php if ($id_vt == "QLBP"){ ?>
                    <li>
                      <a href="chitieu.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-black dark:hover:bg-gray-200">Danh sách chỉ tiêu</a>
                    </li>
                  <?php } ?>
                  
                    <li>
                      <a href="baocaochitieu.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-black dark:hover:bg-gray-200">Báo cáo chỉ tiêu</a>
                    </li>
                  </ul>
               </li>
               <?php } ?>

               <?php if ($id_vt == "QTHT"){ ?>
               <li class="border-b rounded">
                  <a href="khuvuc.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-view-360" width="34" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 12m-4 0a4 9 0 1 0 8 0a4 9 0 1 0 -8 0" />
                    <path d="M3 12c0 2.21 4.03 4 9 4s9 -1.79 9 -4s-4.03 -4 -9 -4s-9 1.79 -9 4z" />
                  </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Khu vực</span>
                  </a>
               </li>
               <?php } ?>
                
               <?php if ($id_vt != "QLKV" && $id_vt != 'QTHT'){ ?>
               <li>
                  <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-black hover:bg-gray-200" aria-controls="dropdown-cv" data-collapse-toggle="dropdown-cv">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cell" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M8 4l-4 2v5l4 2l4 -2v-5z" />
                      <path d="M12 11l4 2l4 -2v-5l-4 -2l-4 2" />
                      <path d="M8 13v5l4 2l4 -2v-5" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Công việc</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                  <ul id="dropdown-cv" class="hidden py-2 space-y-2">
                    <?php
                    if ($id_vt == "QLBP"){
                    ?>
                    <li>
                      <a href="congviec.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-black dark:hover:bg-gray-200">Danh sách công việc</a>
                    </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($id_vt == "NS"){
                    ?>
                    <li>
                      <a href="capnhattiendocongviec.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-black dark:hover:bg-gray-200">Cập nhật tiến độ</a>
                    </li>
                    <?php
                    }
                    ?>
                  </ul>
               </li>
               <?php } ?>

               <?php
                    if ($id_vt == "QLBP" || $id_vt == "NS"){
                ?>
               <li class="border-b rounded">
                  <a href="kehoachgiaoviec.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-devices" width="34" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M13 9a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1v-10z" />
                    <path d="M18 8v-3a1 1 0 0 0 -1 -1h-13a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h9" />
                    <path d="M16 9h2" />
                  </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Kế hoạch</span>
                  </a>
               </li>
               <?php } ?>

               
               <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-black hover:bg-gray-200" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil" width="34" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                      <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z" />
                    </svg>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap">Đánh giá</span>
                      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">  
                    <?php if ($id_vt == "QLKV" || $id_vt == "QLBP"){ ?>
                      <li>
                         <a href="danhgia.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-black dark:hover:bg-gray-200">Đánh giá</a>
                      </li>
                    <?php } ?>
                      <li>
                         <a href="ketquadanhgia.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-black dark:hover:bg-gray-200">Kết quả đánh giá</a>
                      </li>            
                </ul>
             </li>
             
     <!-- Tài KHoản -->
        <?php if ($id_vt == "QTHT"){ ?>
               <li class="pt-5">Tài khoản</li>
                <li class="border-b rounded">
                    <a href="user.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-700 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                      <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <?php } ?>
                <!-- <li class="border-b rounded">
                    <a href="login.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-700 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                      <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-black hover:bg-gray-100 dark:hover:bg-gray-200">
                      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-700 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                      <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                    </a>
                </li> -->
            </ul>
         </div>
      </aside>
