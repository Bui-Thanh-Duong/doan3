<?php
	require("../../../../data/conn.php");
	require("../../func.php");
	
	session_start();

	if (isset ($_SESSION['username'])!="")
	{
		$username = $_SESSION['username'];
		
		$managerment = getmanagerment ($conn, $username);
		$ql = mysqli_fetch_array($managerment);
		$employeeID = $ql["employeeID"];
		$fullname = $ql["fullname"];
		$roleID = $ql["roleID"];
		$avatar = $ql["avatar"];
		$gender = $ql["gender"];
		$birthday = $ql["birthday"];
		$status = $ql["status"];
		$createAT = $ql["createAT"];
		$email = $ql["email"];
		$phone = $ql["phone"];
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="author" content="codedthemes">
      <!-- Favicon icon -->
      <link rel="icon" href="../../../../images/note/logongang.jpg" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
	  <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
  </head>

  <body>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
               <div class="navbar-wrapper">
                   <div class="navbar-logo">
                       <a class="mobile-menu" id="mobile-collapse" href="#!">
                           <i class="ti-menu"></i>
                       </a>
                       <div class="mobile-search">
                           <div class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control" placeholder="Enter Keyword">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <a href="index.php">
                           <img class="img-fluid" src="../../../../images/note/logongang.jpg" alt="Theme-Logo" />
                       </a>
                       <a class="mobile-options">
                           <i class="ti-more"></i>
                       </a>
                   </div>

                   <div class="navbar-container container-fluid">
                       <ul class="nav-left">
                           <li>
                               <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                           </li>
                           <li class="header-search">
                               <div class="main-search morphsearch-search">
                                   <div class="input-group">
                                       <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                       <input type="text" class="form-control">
                                       <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                   </div>
                               </div>
                           </li>
                           <li>
                               <a href="#!" onclick="javascript:toggleFullScreen()">
                                   <i class="ti-fullscreen"></i>
                               </a>
                           </li>
                       </ul>
                       <ul class="nav-right">
                           <li class="header-notification">
                               <a href="#!">
                                   <i class="ti-bell"></i>
                                   <span class="badge bg-c-pink"></span>
                               </a>
                               <ul class="show-notification">
                                   <li>
                                       <h6>Thông báo</h6>
                                       <label class="label label-danger">Mới</label>
                                   </li>
                                   <li>
                                       <div class="media">
                                           <img class="d-flex align-self-center img-radius" src="../../../../images/note/logongang.jpg" alt="Generic placeholder image">
                                           <div class="media-body">
                                               <h5 class="notification-user">Bùi Thành Dương</h5>
                                               <p class="notification-msg">Xin chào, Baro!</p>
                                               <span class="notification-time">30 phút trước</span>
                                           </div>
                                       </div>
                                   </li>
                               </ul>
                           </li>
                           
                           <li class="user-profile header-notification">
                               <a href="#!">
                                   <img src="../../images/note/logongang.jpg" class="img-radius" alt="User-Profile-Image">
                                   <span>
									<?php
										if (isset($fullname)!="") {
											echo "<span>Hi, " . $fullname . "!</span>";
										}
									?>
								   </span>
                                   <i class="ti-angle-down"></i>
                               </a>
                               <ul class="show-notification profile-notification">
                                   <li>
                                       <a href="">
                                           <i class="ti-user"></i> Tài khoản
                                       </a>
                                   </li>
                                   <li>
                                       <a href="">
                                       <i class="ti-layout-sidebar-left"></i> Đăng xuất
                                   </a>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Hệ thống quản lý nhà hàng</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>T</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Trang chủ</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý chi nhánh</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Danh sách chi nhánh</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Thêm chi nhánh</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý tài chính</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Doanh thu</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Chi tiêu</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Quản lý nhà hàng</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý nhân viên</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Danh sách nhân viên</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Phân quyền</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý kho</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Xuất kho</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Nhập kho</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý cơ sở vật chất</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Đồ dùng</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Dụng cụ</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
										<li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Nội thất</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý thực đơn</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Danh sách món ăn</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Danh mục món ăn</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
										<li class=" ">
                                            <a href="">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Thêm món ăn</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Khác</div>
                            <ul class="pcoded-item pcoded-left-item">
								<li>
                                    <a href="../index.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Đăng xuất</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
							</ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row">

                                            <!-- order-card start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-blue order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Tổng bills trong một ngày</h6>
                                                        <h2 class="text-right"><i class="ti-shopping-cart f-left"></i>
															<span>
																<?php
																	$tongsobillsngay = gettongsobillsngay ($conn);
																	$tsbn = mysqli_fetch_array($tongsobillsngay);
																	echo $tsbn["tongsobillngay"];
																?>
															</span>
														</h2>
                                                        <p class="m-b-0">Tổng bills
															<span class="f-right">
																<?php
																	$tongsobills = gettongsobills ($conn);
																	$tsb = mysqli_fetch_array($tongsobills);
																	echo $tsb["tongsobill"];
																?>
															</span>
														</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-green order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Chi nhánh doanh thu cao nhất</h6>
                                                        <h2 class="text-right"><i class="ti-tag f-left"></i>
															<span>
																<?php
																	$doanhthunhat = getdoanhthhhunhat ($conn);
																	$dtn = mysqli_fetch_array($doanhthunhat);
																	echo number_format($dtn["doanhthunhat"], '0', ',', '.');
																?>đ
															</span>
														</h2>
                                                        <p class="m-b-0"><?php echo $dtn["branch"]?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-yellow order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Doanh thu tháng</h6>
                                                        <h2 class="text-right"><i class="ti-reload f-left"></i>
															<span>
																<?php
																	$tongdoanhthuthang = gettongdoanhthuthang ($conn);
																	$tdtt = mysqli_fetch_array($tongdoanhthuthang);
																	echo number_format($tdtt["tongdoanhthuthang"], '0', ',', '.');
																?>đ
															</span>
														</h2>
                                                        <p class="m-b-0">Tổng doang thu
															<span class="f-right">
																<?php
																	$tongdoanhthu = gettongdoanhthu ($conn);
																	$tdt = mysqli_fetch_array($tongdoanhthu);
																	echo number_format($tdt["tongdoanhthu"], '0', ',', '.');
																?>đ
															</span>
														</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card bg-c-pink order-card">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20">Tổng lợi nhuận</h6>
                                                        <h3 class="text-right"><i class="ti-wallet f-left"></i>
															<span>
																<?php
																	$tongdoanhthuthang = gettongdoanhthuthang ($conn);
																	$tdtt = mysqli_fetch_array($tongdoanhthuthang);
																	
																	$tongchitieuthang = gettongchitieuthang($conn);
																	$tctt = mysqli_fetch_array($tongchitieuthang);
																	
																	$loinhuanthang = $tdtt["tongdoanhthuthang"] - $tctt["tongchitieuthang"];
																	echo number_format($loinhuanthang, '0', ',', '.');
																?>đ
															</span>
														</h3>
                                                        <p class="m-b-0">Tổng doanh thu
															<span class="f-right">
																<?php
																	$tongdoanhthu = gettongdoanhthu ($conn);
																	$tdt = mysqli_fetch_array($tongdoanhthu);
																	
																	$tongchitieu = gettongchitieu($conn);
																	$tct = mysqli_fetch_array($tongchitieu);
																	
																	$loinhuan = $tdt["tongdoanhthu"] - $tct["tongchitieu"];
																	echo number_format($loinhuan, '0', ',', '.');
																?>đ
															</span>
														</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- order-card end -->

                                            <!-- statustic and process start -->
                                            <div class="col-lg-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Thống kê</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-chevron-left"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-times close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <canvas id="Statistics-chart" height="225"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Đánh giá từ người dùng</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <span class="d-block text-c-blue f-24 f-w-600 text-center">
															<?php
																$tongdanhgia = gettongdanhgia ($conn);
																$tdg = mysqli_fetch_array($tongdanhgia);
																echo $tdg["tongfb"];
															?>
														</span>
                                                        <canvas id="feedback-chart" height="100"></canvas>
                                                        <div class="row justify-content-center m-t-15">
                                                            <div class="col-auto b-r-default m-t-5 m-b-5">
                                                                <h4>
																	<?php
																		$danhgiatot = getdanhgiatot ($conn);
																		$dgt = mysqli_fetch_array($danhgiatot);
																		echo ($dgt["tongfbt"]*100)/$tdg["tongfb"];
																	?>%
																</h4>
                                                                <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Tích cực</p>
                                                            </div>
                                                            <div class="col-auto m-t-5 m-b-5">
                                                                <h4>
																	<?php
																		$danhgiatot = getdanhgiatot ($conn);
																		$dgt = mysqli_fetch_array($danhgiatot);
																		echo 100 - (($dgt["tongfbt"]*100)/$tdg["tongfb"]);
																	?>%
																</h4>
                                                                <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Tiêu cực</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="fas fa-hamburger text-c-blue d-block f-40"></i> 
                                                        <h4 class="m-t-20">Với 
															<span class="text-c-blue" style="font-size: 30px">
																<?php
																	$tongmenu = gettongmenu ($conn);
																	$tm = mysqli_fetch_array($tongmenu);
																	echo $tm["tongmenu"];
																?>
															</span> món ăn
														</h4>
                                                        <p class="m-b-20">Tận hưởng các món ngon, trải nghiệm tuyệt vời</p>
                                                        <button class="btn btn-primary btn-sm btn-round"><a href="" style="color: white; font-size: 12px;">Xem danh sách</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="fas fa-user-plus text-c-green d-block f-40"></i>
                                                        <h4 class="m-t-20">
															<span class="text-c-blgreenue" style="font-size: 30px">
																+<?php
																	$tongkhachhang = gettongkhachhang ($conn);
																	$tkh = mysqli_fetch_array($tongkhachhang);
																	echo $tkh["tongkhachhang"];
																?>
															</span> Khách hàng
														</h4>
                                                        <p class="m-b-20">Chúng tôi luôn lắng nghe khách hàng!</p>
                                                        <button class="btn btn-success btn-sm btn-round"><a href="" style="color: white; font-size: 12px;">Xem danh sách</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="card">
                                                    <div class="card-block text-center">
                                                        <i class="fa fa-puzzle-piece text-c-pink d-block f-40"></i>
														<h4 class="m-t-20">
															<span class="text-c-blgreenue" style="font-size: 30px">
																+<?php
																	$tongnhanvien = gettongnhanvien ($conn);
																	$tnv = mysqli_fetch_array($tongnhanvien);
																	echo $tnv["tongnhanvien"];
																?>
															</span> Nhân viên
														</h4>
                                                        <p class="m-b-20">Đội ngũ nhân viên, sức mạnh của chúng ta!</p>
                                                        <button class="btn btn-danger btn-sm btn-round"><a href="" style="color: white; font-size: 12px;">Xem danh sách</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- social statustic end -->
											<div class="col-sm-12">
                                                <div class="card tabs-card">
                                                    <div class="card-block p-0">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs md-tabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Chi nhánh</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Nhân viên</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Entertainment</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Big Data</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block">
                                                            <div class="tab-pane active" id="home3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Mã chi nhánh</th>
                                                                            <th>Tên chi nhánh</th>
                                                                            <th>Số điện thoại</th>
                                                                            <th>Địa chỉ</th>
                                                                            <th>Ngày bắt đầu hoạt động</th>
                                                                            <th>Trạng thái</th>
                                                                        </tr>
																		<?php
																			$danhsachchinhanh = getdanhsachchinhanh ($conn);
																			while ($dscn = mysqli_fetch_array($danhsachchinhanh))
																			{
																		?>
                                                                        <tr>
                                                                            <td><?php echo $dscn["branchID"]?></td>
                                                                            <td><?php echo $dscn["branch"]?></td>
                                                                            <td><?php echo $dscn["phone"]?></td>
                                                                            <td><?php echo $dscn["address"]?></td>
                                                                            <td><?php echo date("d/m/Y", strtotime($dscn["createAT"]))?></td>
                                                                            <td>
																					<?php
																						if(isset($dscn["status"]) && $dscn["status"])
																						{
																					?>
																						<span class="label label-success">Đang hoạt động</div>
																					<?php
																						}
																						else{
																					?>
																						<span class="label label-danger">Ngưng hoạt động</span>
																					<?php
																						}
																					?>
																			</td>
                                                                        </tr>
																		<?php
																			}
																		?>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="profile3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="assets/images/product/prod3.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002653</td>
                                                                            <td>Eugine Turner</td>
                                                                            <td>04-01-2017</td>
                                                                            <td><span class="label label-success">Delivered</span></td>
                                                                            <td>#7234417</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002156</td>
                                                                            <td>Jacqueline Howell</td>
                                                                            <td>03-01-2017</td>
                                                                            <td><span class="label label-warning">Pending</span></td>
                                                                            <td>#7234454</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="messages3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002413</td>
                                                                            <td>Jane Elliott</td>
                                                                            <td>06-01-2017</td>
                                                                            <td><span class="label label-primary">Shipping</span></td>
                                                                            <td>#7234421</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002156</td>
                                                                            <td>Jacqueline Howell</td>
                                                                            <td>03-01-2017</td>
                                                                            <td><span class="label label-warning">Pending</span></td>
                                                                            <td>#7234454</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="settings3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002413</td>
                                                                            <td>Jane Elliott</td>
                                                                            <td>06-01-2017</td>
                                                                            <td><span class="label label-primary">Shipping</span></td>
                                                                            <td>#7234421</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002344</td>
                                                                            <td>John Deo</td>
                                                                            <td>05-01-2017</td>
                                                                            <td><span class="label label-danger">Faild</span></td>
                                                                            <td>#7234486</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Load More</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- users visite and profile end -->

                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script>
"use strict";
$(document).ready(function() {
  function f() {
    return {
      title: { display: !1 },
      tooltips: { 
        enabled: true, 
        intersect: !1, 
        mode: "nearest", 
        xPadding: 10, 
        yPadding: 10, 
        caretPadding: 10 
      },
      legend: { display: !1, labels: { usePointStyle: !1 }},
      responsive: !0,
      maintainAspectRatio: !0,
      hover: { mode: "index" },
      scales: {
        xAxes: [{
          display: !1, 
          gridLines: !1, 
          scaleLabel: { display: !0, labelString: "Tháng" }
        }],
        yAxes: [{
          display: !1, 
          gridLines: !1, 
          scaleLabel: { display: !0, labelString: "Giá trị" },
          ticks: { beginAtZero: !0 }
        }]
      },
      elements: { point: { radius: 4, borderWidth: 12 }},
      layout: { padding: { left: 0, right: 0, top: 0, bottom: 0 }}
    };
  }

  $(function() {
    var h = document.getElementById("Statistics-chart").getContext("2d");
    var j = h.createLinearGradient(500, 0, 100, 0);
    j.addColorStop(0, "#fd93a8");
    j.addColorStop(1, "#FC6180");

    var g = h.createLinearGradient(500, 0, 100, 0);
    g.addColorStop(1, "#56CCF2");
    g.addColorStop(0, "#2F80ED");

    var i = new Chart(h, {
      type: "line",
      data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
        datasets: [
          {
            label: "Doanh thu",
            borderColor: g,
            pointBorderColor: g,
            pointBackgroundColor: g,
            pointHoverBackgroundColor: g,
            pointHoverBorderColor: g,
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 0,
            fill: false,
            borderWidth: 4,
            data: [
			<?php
				$thongkethang = getthongkethang($conn);
				while ($tkt = mysqli_fetch_array($thongkethang))
				{
				echo $tkt["thongkethang"] . ",";
				}
			?>
			] // Dữ liệu cho 12 tháng
          },
          {
            label: "Chi tiêu",
            borderColor: j,
            pointBorderColor: j,
            pointBackgroundColor: j,
            pointHoverBackgroundColor: j,
            pointHoverBorderColor: j,
            pointBorderWidth: 10,
            pointHoverRadius: 10,
            pointHoverBorderWidth: 1,
            pointRadius: 0,
            fill: false,
            borderWidth: 4,
            data: [
			<?php
				$thongkechitieu = getthongkechitieu($conn);
				while ($tkt = mysqli_fetch_array($thongkechitieu))
				{
				echo $tkt["thongkethang"] . ",";
				}
			?>
			] // Dữ liệu cho 12 tháng
          }
        ]
      },
      options: {
        legend: { position: "top" },
        tooltips: {
          enabled: true, 
          intersect: !1, 
          mode: "nearest", 
          xPadding: 10, 
          yPadding: 10, 
          caretPadding: 10 
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "rgba(0,0,0,0.5)",
              fontStyle: "bold",
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 20
            },
            gridLines: { drawTicks: false, display: false }
          }],
          xAxes: [{
            gridLines: { drawTicks: false, display: false },
            ticks: { 
              padding: 20, 
              fontColor: "rgba(0,0,0,0.5)", 
              fontStyle: "bold" 
            }
          }]
        }
      }
    });
  });

  var a = document.getElementById("feedback-chart").getContext("2d");
  var c = {
    type: "doughnut",
    data: {
      datasets: [{
        data: [<?php echo ($dgt["tongfbt"]*100)/$tdg["tongfb"];?>, <?php echo 100 - ($dgt["tongfbt"]*100)/$tdg["tongfb"];?>],
        backgroundColor: ["#4099ff", "#81c1fd"],
        label: "Dataset 1",
        borderWidth: 0
      }],
      labels: ["Tích cực", "Tiêu cực"]
    },
    options: {
      responsive: true,
      legend: { display: false },
      title: { display: false, text: "Biểu đồ Doughnut của Chart.js" },
      animation: { animateScale: true, animateRotate: true }
    }
  };
  
  window.myDoughnut = new Chart(a, c);

  function e(h, g, i) {
    if (i == null) {
      i = "rgba(0,0,0,0)";
    }
    return {
      labels: ["1", "2", "3", "4", "5", "6", "7"],
      datasets: [{
        label: "",
        borderColor: h,
        borderWidth: 2,
        hitRadius: 0,
        pointHoverRadius: 0,
        pointRadius: 3,
        pointBorderWidth: 2,
        pointHoverBorderWidth: 12,
        pointBackgroundColor: Chart.helpers.color("#fff").alpha(1).rgbString(),
        pointBorderColor: Chart.helpers.color(h).alpha(1).rgbString(),
        pointHoverBackgroundColor: h,
        pointHoverBorderColor: Chart.helpers.color("#000000").alpha(0).rgbString(),
        fill: true,
        backgroundColor: i,
        data: g
      }]
    };
  }

  var a = document.getElementById("seo-card1").getContext("2d");
  var d = a.createLinearGradient(300, 0, 0, 300);
  d.addColorStop(1, "#b9fdef");
  d.addColorStop(0, "#2ed8b6");

  var b = new Chart(a, {
    type: "line",
    data: e("#2ed8b6", [100, 80, 100, 150, 190, 200, 160], d),
    options: f(),
  });

  var d = a.createLinearGradient(300, 0, 0, 300);
  d.addColorStop(1, "#b5d8ff");
  d.addColorStop(0, "#4099ff");

  var a = document.getElementById("seo-card2").getContext("2d");
  var b = new Chart(a, {
    type: "line",
    data: e("#4099ff", [100, 80, 100, 150, 190, 200, 160], d),
    options: f(),
  });
});

</script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vartical-demo.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
