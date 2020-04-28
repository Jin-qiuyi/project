<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Social media monitor for crisis</title>
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
											<a href='history.php?type=0&relevant=0'>全部</a>
                                            <a href="history.php?type=1&relevant=0">地震</a>
                                            <a href="history.php?type=2&relevant=0">台风</a>
                                            <a href="history.php?type=3&relevant=0">暴雨</a>
                                        </div>


                                        <h6 class="m-t-30">标签</h6>

                                        <div class="mail-list m-t-20">
										<?php
											$type = $_GET['type'];
											$relevant = $_GET['relevant'];
											echo'
                                            <a href="history.php?type='.$type.'&relevant=1"><span class="mdi mdi-arrow-right-drop-circle text-info float-right"></span>只保留相关微博</a>
                                            <a href="history.php?type='.$type.'&relevant=0"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right"></span>全部微博</a>';
										?>
                                        </div>
                                    </div>
                                    <!-- End Left sidebar -->


                                    <!-- Right Sidebar -->
                                    <div class="email-rightbar mb-3">
                                        
                                        <div class="card">
                                            <div class="btn-toolbar p-3" role="toolbar">
                                            </div>
                                            <ul class="message-list">
											<?php
												class MyDB extends SQLite3{
													function __construct(){
														$this->open('/home/web/qiuyi/SMASAC/.spyproject/data.db');
													}
												}
												$type = $_GET['type'];
												$relevant = $_GET['relevant'];

												$db = new MyDB();
										//——————————————————————————————————————————————————————————————数据库原文————————————————————————————————————————————————————————————————————————————————————————
												if($type==0 && $relevant==0){
													$sql ="SELECT * from complete order by time DESC limit 1000;";
												}
												else if($type==1 && $relevant==0){
													$sql ="SELECT * from complete where category='地震' order by time DESC limit 1000;";
												}
												else if($type==2 && $relevant==0){
													$sql ="SELECT * from complete where category='台风' order by time DESC limit 1000;";
												}
												else if($type==3 && $relevant==0){
													$sql ="SELECT * from complete where category='暴雨' order by time DESC limit 1000;";
												}
												
												else if($type==0 && $relevant==1){
													$sql ="SELECT * from complete where isnoise='1' order by time DESC limit 1000;";
												}
												else if($type==1 && $relevant==1){
													$sql ="SELECT * from complete where category='地震' and isnoise='1' order by time DESC limit 1000;";
												}
												else if($type==2 && $relevant==1){
													$sql ="SELECT * from complete where category='台风' and isnoise='1' order by time DESC limit 1000;";
												}
												else if($type==3 && $relevant==1){
													$sql ="SELECT * from complete where category='暴雨' and isnoise='1' order by time DESC limit 1000;";
												}

												$ret = $db->query($sql);

												$isnoise=array();
												$weibo_id=array();
												$user_id=array();
												$time=array();		
												$text=array();

												$weibo_id_pos=array();
												$user_id_pos=array();
												$time_pos=array();		
												$text_pos=array();

												$location=array();
												$num_rows=0;

												if(!$ret){
													echo $db->lastErrorMsg();
												}
												else{
													while($row = $ret->fetchArray(SQLITE3_ASSOC)){
														$isnoise[]=$row['isnoise'];
														$weibo_id[]=$row['weibo_id'];
														$user_id[]=$row['user_id'];
														$time[]=$row['time'];
														$text[]=$row['original_text'];

														if($row['isnoise']=='1'){
															$weibo_id_pos[]=$row['weibo_id'];
															$user_id_pos[]=$row['user_id'];
															$time_pos[]=$row['time'];
															$text_pos[]=$row['original_text'];
															$location[]=$row['location'];
														}
														$num_rows=$num_rows+1;

														if($num_rows<=15){
															if($row['isnoise']=='1'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div><div class="col-mail col-mail-2"><a href="detail.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-info float-right">相关</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
															else{
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div><div class="col-mail col-mail-2"><a href="detail.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right">不相关</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
														}
													}
												}

												$weibojson=json_encode($weibo_id);
												$userjson=json_encode($user_id);
												$timejson=json_encode($time);
												$textjson=json_encode($text);
												$isnoisejson=json_encode($isnoise);

												$weibojson_pos=json_encode($weibo_id_pos);
												$userjson_pos=json_encode($user_id_pos);
												$timejson_pos=json_encode($time_pos);
												$textjson_pos=json_encode($text_pos);

												$locationjson=json_encode($location);


												echo "<script type=\"text/javascript\">
														var weiboid=$weibojson;
														var userid=$userjson;
														var time=$timejson;
														var text=$textjson;
														var isnoise=$isnoisejson;

														var weiboid_pos=$weibojson_pos;
														var userid_pos=$userjson_pos;
														var time_pos=$timejson_pos;
														var text_pos=$textjson_pos;


													</script>
												";
											?>
                                        </ul>
                                    </div> <!-- card -->

                                    <div class="row m-t-20">
                                        <!--<div class="col-7">
                                            Showing 1 - 20 of 1,524
                                        </div>-->
                                        <div class="col-5">
                                            <div class="btn-group float-right">
                                                <button type="button" class="btn btn-sm btn-success waves-effect" onclick="onPre()"><i class="fa fa-chevron-left"></i></button>
                                                <button type="button" class="btn btn-sm btn-success waves-effect" onclick="onNext()"><i class="fa fa-chevron-right"></i></button>
                                            </div>
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



		<script language='javascript'>
			
			var _page_index = 0;
			var PAGE_SIZE = 20;
			var _rows_count = weiboid.length;
			var _page_count = 0;
			var _start_index = 0;
			var _end_index = 4;

			var status=0; //0:原文，1:筛选后，2:地理位置
			
			function create_table(startIndex, endIndex)
			{
				var str = "";
				for(var i = startIndex; i <= endIndex; ++i)
				{
					if(isnoise[i]=='1'){
						str="<div class='col-mail col-mail-1'><a href='detail.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div> <div class="col-mail col-mail-2"><a href="detail.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-info float-right">相关</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div>";
					}
					else{
						str="<div class='col-mail col-mail-1'><a href='detail.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div> <div class="col-mail col-mail-2"><a href="detail.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right">不相关</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div>";
					}

					console.log(str);

					var complete=document.getElementById(String(i%20));
					complete.innerHTML = str;
				}
				

				if( endIndex%20 !=0){
					for(var i=endIndex%20;i<=20;i++){
						var str="";
						var complete=document.getElementById(String(i));
						complete.innerHTML = str;
					}
				}
			}
			
			function count_page_count(rows_count, page_size)
			{
				var page_count = 0;
				if(rows_count % page_size == 0)
				{
					page_count = rows_count / page_size;
				}
				else
				{
					page_count = parseInt(rows_count / page_size) + 1;
				}
				return page_count;
			}
			
			function show_page_complete()
			{
				var spnRowsCount = document.getElementById("spnRowsCount");
				var spnPageCount = document.getElementById("spnPageCount");
				var spnPageIndex = document.getElementById("spnPageIndex");
				var spnPageSize = document.getElementById("spnPageSize");
				
				_page_count = count_page_count(_rows_count, PAGE_SIZE);
				
				spnRowsCount.innerText = _rows_count;
				spnPageCount.innerText = _page_count;
				spnPageIndex.innerText = _page_index + 1;
				spnPageSize.innerText = PAGE_SIZE;
				
				
			}
			
			function get_index(page_index, page_size, rows_count)
			{
				var start_index = 0;
				var end_index = 0;
				
				start_index = page_index * page_size;
				end_index = (page_index + 1) * page_size - 1;
				console.log(rows_count);
				if(end_index >= rows_count)
				{
					end_index = rows_count - 1;
				}
				
				return {"start_index" : start_index, "end_index" : end_index};
			}
			
			function onFirst()
			{
				if(_page_index == 0)
				{
					alert("已经是第一页");
					return;
				}
				
				_page_index = 0;
				index = get_index(_page_index, PAGE_SIZE, _rows_count);
				show_page_complete();
				create_table(index.start_index, index.end_index);
			}
			
			function onPre()
			{			
				if(_page_index == 0)
				{
					alert("已经是第一页");
					return;
				}
				_page_index = _page_index - 1;
				
				index = get_index(_page_index, PAGE_SIZE, _rows_count);
				//show_page_complete();
				create_table(index.start_index, index.end_index);
			}
			
			function onNext()
			{
				if(_page_index == _page_count - 1)
				{
					alert("已经是最后一页");
					return;
				}
				_page_index = _page_index + 1;
				
				index = get_index(_page_index, PAGE_SIZE, _rows_count);
				//show_page_complete();
				create_table(index.start_index, index.end_index);
			}
			
			function onLast()
			{
				if(_page_index == _page_count - 1)
				{
					alert("已经是最后一页");
					return;
				}
				
				_page_index = _page_count - 1;
				
				index = get_index(_page_index, PAGE_SIZE, _rows_count);
				show_page_complete();
				create_table(index.start_index, index.end_index);
			}




			show_page_complete();

		</script>
				

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