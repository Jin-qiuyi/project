<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Agroxa - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">

                </div>

                 <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="dropdown notification-list d-none d-sm-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0"> 
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form> 
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell noti-icon"></i>
                                <span class="badge badge-pill badge-info noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                    Notifications
                                </h6>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>
                            </div>        
                        </li>
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                </a>                                                                   
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

          <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="home.php" class="waves-effect">
                                    <i class="mdi mdi-home"></i><span class="badge badge-primary float-right">3</span> <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> 历史文本 <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="history.php?type=0&relevant=0">自然灾害</a></li>
									<li><a href="history2.php?type=0">疫情</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-maps"></i><span> 地图标注 <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span></a>
                                <ul class="submenu">
                                    <li><a href="map_.php">地震</a></li>
									<li><a href="map_2.php">台风</a></li>
									<li><a href="map_3.php">暴雨</a></li>
                                </ul>
                            </li>

							<li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-finance"></i><span> 统计特征 <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="statistical.php">自然灾害</a></li>
                                    <li><a href="statistical2.php">疫情</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
										<h4 class="page-title">Dashboard</h4>
										<ol class="breadcrumb">
											<li class="breadcrumb-item active">Welcome to social media monitor for crisis</li>
										</ol>
									</div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Left sidebar -->
                                    <div class="email-leftbar card">
                                        <div class="mail-list m-t-20">
											<h6 class="m-t-30">内容</h6>
                                            <a href="#">疫情</a>
                                        </div>
                                    </div>
                                    <!-- End Left sidebar -->
            
            
                                    <!-- Right Sidebar -->
                                    <div class="email-rightbar mb-3">
                                        <?php
											class MyDB extends SQLite3{
													function __construct(){
														$this->open('/home/web/qiuyi/SMASAC/.spyproject/NCP.db3');
													}
											}
											$id = $_GET['id'];
											$sql ="SELECT * from classify where weibo_id='".$id."';";

											$db = new MyDB();
											$ret = $db->query($sql);
											if(!$ret){
												echo $db->lastErrorMsg();
											}
											else{
												while($row = $ret->fetchArray(SQLITE3_ASSOC)){
													$weibo_id=$row['weibo_id'];
													$user_id=$row['user_id'];
													$time=$row['time'];
													$text=$row['original_text'];
												}
											}
										?>
                                        <div class="card">
                                            <div class="btn-toolbar p-3" role="toolbar"></div>
                                            <div class="card-body">
                                                <div class="media m-b-30">
                                                    <img class="d-flex mr-3 rounded-circle thumb-md" src="assets/images/users/user-1.jpg" alt="Generic placeholder image">
                                                    <div class="media-body">
														<?php
															echo '<h4 class="font-14 m-0">weibo id:'.$weibo_id.'&nbsp;&nbsp;user id:'.$user_id.'</h4>';
															echo '<small class="text-muted">'.$time.'</small>';
														?>
                                                    </div>
                                                </div>
													<?php
														echo '<p id="p">'.$text.'</p>';
													?>

													<?php
														$sql ="SELECT * from category where weibo_id='".$id."';";
														$ret = $db->query($sql);
														if(!$ret){
															echo $db->lastErrorMsg();
														}
														else{
															while($row = $ret->fetchArray(SQLITE3_ASSOC)){
																$region=$row['region'];
																$locationjson=json_encode($region);
																echo "<script language='javascript'>
																		var loc=$locationjson;
																	</script>
																";
															}
														}
													?>

													<script language='javascript'>
														var aa=document.getElementById("p").innerHTML;
														var reg = new RegExp(String(loc), 'g');
														aa = aa.replace(reg, '<font color="#FF6633">'+loc+'</font>');
														var bb=document.getElementById("p");
														bb.innerHTML=aa;
													</script>
                                                <hr/>
            
                                            </div>
            
                                        </div>
            
                                    </div> <!-- end Col-9 -->
            
                                </div>
            
                            </div><!-- End row -->

                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>

        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

</html>