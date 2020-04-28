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
                                            <a href="#">疫情</a>
                                        </div>


                                        <h6 class="m-t-30">标签</h6>

                                        <div class="mail-list m-t-20">
											<a href="history2.php?type=0"><span class="mdi mdi-arrow-right-drop-circle text-light float-right"></span>全部</a>
                                            <a href="history2.php?type=1"><span class="mdi mdi-arrow-right-drop-circle text-info float-right"></span>发展趋势</a>
                                            <a href="history2.php?type=2"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right"></span>确诊情况</a>
											<a href="history2.php?type=3"><span class="mdi mdi-arrow-right-drop-circle text-danger float-right"></span>经济影响</a>
											<a href="history2.php?type=4"><span class="mdi mdi-arrow-right-drop-circle text-success float-right"></span>医疗救助</a>
											<a href="history2.php?type=5"><span class="mdi mdi-arrow-right-drop-circle text-primary float-right"></span>相关政策</a>
											<a href="history2.php?type=6"><span class="mdi mdi-arrow-right-drop-circle text-dark float-right"></span>其他</a>
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
														$this->open('/home/web/qiuyi/SMASAC/.spyproject/NCP.db3');
													}
												}

												$db = new MyDB();
												$type = $_GET['type'];
										//——————————————————————————————————————————————————————————————数据库原文————————————————————————————————————————————————————————————————————————————————————————
												if($type==0){
													$sql ="SELECT * from classify order by time DESC limit 1000;";		
												}
												else if($type==1){
													$sql ="SELECT * from classify where category='situation' order by time DESC limit 1000;";
												}
												else if($type==2){
													$sql ="SELECT * from classify where category='case' order by time DESC limit 1000;";
												}
												else if($type==3){
													$sql ="SELECT * from classify where category='economy' order by time DESC limit 1000;";
												}
												else if($type==4){
													$sql ="SELECT * from classify where category='aid' order by time DESC limit 1000;";
												}
												else if($type==5){
													$sql ="SELECT * from classify where category='policy' order by time DESC limit 1000;";
												}
												else if($type==6){
													$sql ="SELECT * from classify where category='else' order by time DESC limit 1000;";
												}
												$ret = $db->query($sql);

												$category=array();
												$weibo_id=array();
												$user_id=array();
												$time=array();		
												$text=array();
												$num_rows=0;

												if(!$ret){
													echo $db->lastErrorMsg();
												}
												else{
													while($row = $ret->fetchArray(SQLITE3_ASSOC)){
														$weibo_id[]=$row['weibo_id'];
														$user_id[]=$row['user_id'];
														$time[]=$row['time'];
														$category[]=$row['category'];
														$text[]=$row['original_text'];
														$num_rows=$num_rows+1;

														if($num_rows<=20){
															if($row['category']=='situation'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail2.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-info float-right">发展趋势</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
															if($row['category']=='economy'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail2.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div><div class="col-mail col-mail-2"><a href="detail2.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-danger float-right">经济影响</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
															if($row['category']=='case'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail2.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div> <div class="col-mail col-mail-2"><a href="detail2.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right">确诊病例</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
															if($row['category']=='aid'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail2.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div> <div class="col-mail col-mail-2"><a href="detail2.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-success float-right">医疗救助</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
															if($row['category']=='policy'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail2.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div> <div class="col-mail col-mail-2"><a href="detail2.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-primary float-right">相关政策</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
															if($row['category']=='else'){
																echo "<li id='".($num_rows-1)."'><div class='col-mail col-mail-1'><a href='detail2.php?id=".$row['weibo_id']."' class='title'>weibo id:".$row['weibo_id'].'</a></div> <div class="col-mail col-mail-2"><a href="detail2.php?id='.$row['weibo_id'].'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-dark float-right">其他</span>'.substr($row['original_text'],3).'</a><div class="date">'.substr($row['time'],0,10)."</div></div></li>";
															}
														}
													}
												}

												$weibojson=json_encode($weibo_id);
												$userjson=json_encode($user_id);
												$timejson=json_encode($time);
												$textjson=json_encode($text);
												$categoryjson=json_encode($category);


												echo "<script type=\"text/javascript\">
														var weiboid=$weibojson;
														var userid=$userjson;
														var time=$timejson;
														var text=$textjson;
														var category=$categoryjson;
													</script>
												";
											?>

                                        </ul>
                                    </div> <!-- card -->

                                    <div class="row m-t-20">
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
					if(category[i]=='situation'){
						str="<div class='col-mail col-mail-1'><a href='detail2.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-info float-right">发展趋势</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div></li>";
					}
					if(category[i]=='economy'){
						str="<div class='col-mail col-mail-1'><a href='detail2.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-danger float-right">经济影响</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div></li>";
					}
					if(category[i]=='case'){
						str="<div class='col-mail col-mail-1'><a href='detail2.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-warning float-right">确诊病例</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div></li>";
					}
					if(category[i]=='aid'){
						str="<div class='col-mail col-mail-1'><a href='detail2.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-success float-right">医疗救助</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div></li>";
					}
					if(category[i]=='policy'){
						str="<div class='col-mail col-mail-1'><a href='detail2.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-primary float-right">相关政策</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div></li>";
					}
					if(category[i]=='else'){
						str="<div class='col-mail col-mail-1'><a href='detail2.php?id="+String(weiboid[i])+"' class='title'>weibo id:"+String(weiboid[i])+'</a></div><div class="col-mail col-mail-2" style="min-height:100px;"><a href="detail2.php?id='+String(weiboid[i])+'" class="subject"><span class="mdi mdi-arrow-right-drop-circle text-dark float-right">其他</span>'+String(text[i].substr(1))+'</a><div class="date">'+String(time[i].substr(0,10))+"</div></div></li>";
					}

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
				//show_page_complete();
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




			//show_page_complete();

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