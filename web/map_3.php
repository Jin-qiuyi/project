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

		<style type="text/css">
			#allmap{width:100%;height:100%;position:absolute;right:0px;}
			#weibo{width:30%;height:50%;position:absolute;right:10px;top:100px;overflow-y:auto; overflow-x:auto;}
		</style>

		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=VVcI1ugiEkoIfEhK0RD9h8GADwGoCEb1"></script>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="assets/images/logo.png" alt="" height="24">
                        </span>
                        <i>
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </i>
                    </a>
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
				<div id="allmap"></div>				
				<div id="weibo"></div>
				<?php
					ini_set("memory_limit","-1");
					class MyDB extends SQLite3{
						function __construct(){
							$this->open('/home/web/qiuyi/SMASAC/.spyproject/data.db');
						}
					}
					$db = new MyDB();

					$sql ="select weibo_id,location,substr(time,0,11) as time,event from rainstorm_info where weibo_id in (select weibo_id from rainstorm_info where time between '2019-11-01 00:00' and '2020-4-15 00:00' group by location,substr(time,0,11) having count(weibo_id)>10) order by time ASC";
 
					$ret = $db->query($sql);
					
					$location=array();
					$time=array();
					$event=array();
					
					$weibo=array();

					$lng=array();
					$lat=array();

					$num_rows=0;
					if(!$ret){
						echo $db->lastErrorMsg();
					}
					else{
						while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
							$num_rows=$num_rows+1;
							$location[]=$row['location'];
							$time[]=$row['time'];
							$event[]=$row['event'];

							$sql="select * from coordinate where shortname='".strval($row['location'])."'";
							$ret2=$db->query($sql);
							$row2 = $ret2->fetchArray(SQLITE3_ASSOC);
							$lng[]=$row2['lng'];
							$lat[]=$row2['lat'];

							$sql ="SELECT * from rainstorm_info where location='".strval($row['location'])."'and time between '2019-11-01 00:00' and '2020-04-13 00:00' limit 20;";

							$ret3=$db->query($sql);
							$original_text=array();
							while($row3 = $ret3->fetchArray(SQLITE3_ASSOC)){
								$sql ="SELECT * from rainstorm_originaltext where weibo_id='".strval($row3['weibo_id'])."'";
								$ret4=$db->query($sql);
								while($row4 = $ret4->fetchArray(SQLITE3_ASSOC)){
								$text=array('weibo_id'=>$row4['weibo_id'],'user_id'=>$row4['user_id'],'time'=>$row4['time'],'text'=>$row4['original_text']);
								$original_text[]=$text;
								}
							}
							$weibo[]=$original_text;
						}
					}

					$db->close();
					if($num_rows==0){
						echo '<script language="javascript">alert("There is no data during this period");history.back(-1);</script>';
					}

					$locationjson=json_encode($location);
					$timejson=json_encode($time);
					$eventjson=json_encode($event);

					$lngjson=json_encode($lng);
					$latjson=json_encode($lat);

					$weibojson=json_encode($weibo);

					echo "<script type=\"text/javascript\">
						var loc=$locationjson;
						var tim=$timejson;
						var ev=$eventjson;

						var lng=$lngjson;
						var lat=$latjson;

						var weibo_text=$weibojson;
					</script>
					";
				?>
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



		<script language='javascript'>
			
			var _page_index = 0;
			var PAGE_SIZE = 4;
			var _page_count = 0;
			var _start_index = 0;
			var _end_index = 4;
			var rows=0;

			var status=0; //0:原文，1:筛选后，2:地理位置
			
			function create_table(startIndex, endIndex)
			{
				var str = "";
				for(var i = startIndex; i <= endIndex; ++i)
				{
					//str="<div class='col-mail col-mail-1'><a class='title' href='#'>weibo id:"+String(weibo_text[rows][i]['weibo_id'])+'</a><div class="date">'+String(weibo_text[rows][i]['time'])+'</div></div><div class="col-mail col-mail-2"><a  class="subject" href="#">'+weibo_text[rows][i]['text']+'</a></div>';
					//str="<div class='col-mail col-mail-1'><div class='date'>weibo id:"+String(weibo_text[rows][i]['weibo_id'])+'&nbsp;&nbsp;time:'+String(weibo_text[rows][i]['time'])+'</div></div><div class="col-mail col-mail-2"><div class="date">'+weibo_text[rows][i]['text']+'</div></div>';
					
					str="<div class='col-mail col-mail-1'><a href='detail.php?id="+String(weibo_text[rows][i]['weibo_id'])+"' class='title'>weibo id:"+String(weibo_text[rows][i]['weibo_id'])+'&nbsp;&nbsp;time:'+String(weibo_text[rows][i]['time'])+'</a></div><div class="col-mail col-mail-2"><div class="date">'+weibo_text[rows][i]['text']+'</div></div>';

					console.log(str);

					var complete=document.getElementById(String(i%4));
					complete.innerHTML = str;
				}
				
				for (var k= startIndex;k <= endIndex;k++){
					var aa=document.getElementById(String(k%4)).innerHTML;
					var reg = new RegExp(String(loc[rows]), 'g');
					aa = aa.replace(reg, '<font color="#FF6633">'+loc[rows]+'</font>');
					var bb=document.getElementById(String(k%4));
					bb.innerHTML=aa;
				}

				if( endIndex%4 !=0){
					for(var i=endIndex%4;i<=4;i++){
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





			var map = new BMap.Map("allmap"); // 创建Map实例
			var t = document.getElementById("weibo");
			//t.value="Welcome to use the map labeling service"+"\n"+"The crises have been marked on the map. You could click the marker for details, and the original texts of the related microblogs would be displayed here.";
			map.centerAndZoom("西安", 5);  // 初始化地图,用城市名设置地图中心点
			map.addControl(new BMap.MapTypeControl()); //添加地图类型控件
			map.setCurrentCity("深圳");   // 设置地图显示的城市 此项是必须设置的
			map.enableScrollWheelZoom(true);  //开启鼠标滚轮缩放
			var point = new BMap.Point(116.404, 39.915);
			//var marker = new BMap.Marker(point); // 创建点
			var marker=new Array();
			map.addOverlay(marker); //添加点
			map.removeOverlay(marker); //删除点
			var myGeo = new BMap.Geocoder();

			for (i = 0; i < loc.length; i++) {
				(function(index){
					var address = new BMap.Point(lng[index], lat[index]);
					marker[index] = new BMap.Marker(address);	
					var opts = {
						width: 100,  // 信息窗口宽度
						height: 110,  // 信息窗口高度
						title: "灾难信息" // 信息窗口标题
					}
					marker[index].addEventListener("click", function (e) {
						content="地点："+loc[index]+"<br/>时间："+tim[index]+"<br/>详情："+ev[index]+"\n";
						var infoWindow = new BMap.InfoWindow(content, opts); // 创建信息窗口对象
						this.openInfoWindow(infoWindow,address); //开启信息窗口

						_page_index = 0;
						PAGE_SIZE = 4;
						_rows_count = weibo_text[index].length;
						_page_count = 0;
						_start_index = 0;
						_end_index = 4;
						rows=index;

						t.style.background="#FFFFFF";
						t.innerHTML="";
						t.innerHTML='<div class="card"><ul class="message-list">';
						for (k=0;k<4 && k<weibo_text[index].length;k++){
							//t.innerHTML=t.innerHTML+"<li id='"+String(k)+"'><div class='col-mail col-mail-1'><a class='title' href='#'>weibo id:"+String(weibo_text[index][k]['weibo_id'])+'</a><div class="date">'+String(weibo_text[index][k]['time'])+'</div></div><div class="col-mail col-mail-2"><a class="subject" href="#">'+weibo_text[index][k]['text']+'</a></div></li>';
							//t.innerHTML=t.innerHTML+"<li id='"+String(k)+"'><div class='col-mail col-mail-1'><div class='date'>weibo id:"+String(weibo_text[index][k]['weibo_id'])+"&nbsp;&nbsp;time:"+String(weibo_text[index][k]['time'])+'</div></div><div class="col-mail col-mail-2"><div class="date">'+weibo_text[index][k]['text']+'</div></div></li>';
							t.innerHTML=t.innerHTML+"<li id='"+String(k)+"'><div class='col-mail col-mail-1'><a href='detail.php?id="+String(weibo_text[index][k]['weibo_id'])+"' class='title'>weibo id:"+String(weibo_text[index][k]['weibo_id'])+"&nbsp;&nbsp;time:"+String(weibo_text[index][k]['time'])+'</a></div><div class="col-mail col-mail-2"><div class="date">'+weibo_text[index][k]['text']+'</div></div></li>';
							t.innerHTML=t.innerHTML+"<div style='min-height:20px;'></div>";
						}

						for (k=0;k<4 && k<weibo_text[index].length;k++){
							var aa=document.getElementById(String(k)).innerHTML;
							var reg = new RegExp(String(loc[index]), 'g');
							aa = aa.replace(reg, '<font color="#FF6633">'+loc[index]+'</font>');
							var bb=document.getElementById(String(k));
							bb.innerHTML=aa;
						}
						t.innerHTML=t.innerHTML+'</ul></div><div class="row m-t-20"><div class="col-5"><div class="btn-group float-right"><button type="button" class="btn btn-sm btn-success waves-effect" onclick="onPre()"><i class="fa fa-chevron-left"></i></button><button type="button" class="btn btn-sm btn-success waves-effect" onclick="onNext()"><i class="fa fa-chevron-right"></i></button></div></div></div>';
					});
					map.addOverlay(marker[index]);
				})(i);
			}
			
			getBoundary("中国");
			function getBoundary(sRegion) {
				var bdary = new BMap.Boundary();
				bdary.get(sRegion, function (rs) { //获取行政区域
					var count = rs.boundaries.length; //行政区域的点有多少个
					for (var i = 0; i < count; i++) {
						var ply = new BMap.Polygon(rs.boundaries[i], { strokeWeight: 2, strokeColor: "#4A7300", fillColor: "#FFF8DC" }); //建立多边形覆盖物
						map.addOverlay(ply); //添加覆盖物
					}
				});
			}
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