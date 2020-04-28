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

        <link rel="stylesheet" href="../plugins/morris/morris.css">

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
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="text-uppercase verti-label text-white-50">受灾人数</h6>
                                                <div class="text-white">
                                                    <h6 class="text-uppercase mt-0 text-white-50">2019年受灾人数</h6>
                                                    <h3 class="mb-3 mt-0">1.3亿人次</h3>
                                                    <div class="">
                                                        <span class="badge badge-light text-info"> -25% </span> <span class="ml-2">相对五年均值</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-cube-outline display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="text-uppercase verti-label text-white-50">灾难造成的经济损失</h6>
                                                <div class="text-white">
                                                    <h6 class="text-uppercase mt-0 text-white-50">2019年经济损失</h6>
                                                    <h3 class="mb-3 mt-0">3270.9亿</h3>
                                                    <div class="">
                                                        <span class="badge badge-light text-info"> -24% </span> <span class="ml-2">相对五年均值</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-buffer display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="text-uppercase verti-label text-white-50">灾难中的房屋倒塌数</h6>
                                                <div class="text-white">
                                                    <h6 class="text-uppercase mt-0 text-white-50">2019年房屋倒塌数</h6>
                                                    <h3 class="mb-3 mt-0">12.6万间</h3>
                                                    <div class="">
                                                        <span class="badge badge-light text-info"> -57% </span> <span class="ml-2">相对五年均值</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-buffer display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="text-uppercase verti-label text-white-50">微博活跃用户</h6>
                                                <div class="text-white">
                                                    <h6 class="text-uppercase mt-0 text-white-50">2019年底微博月活跃人数</h6>
                                                    <h3 class="mb-3 mt-0">5.16亿</h3>
                                                    <div class="">
                                                        <span class="badge badge-light text-info"> +5400万 </span> <span class="ml-2">相对2018年底</span>
                                                    </div>
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="mdi mdi-buffer display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <h4 class="header-title mb-4">系统功能</h4>
													<p>目前自然该系统主要针对国内的三项自然灾害的数据进行统计,其中包括地震、台风和暴雨。</p>
                                                    <div class="p-3">
                                                        <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="pills-first-tab" data-toggle="pill" href="#pills-first" role="tab" aria-controls="pills-first" aria-selected="true">地图标注</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-second-tab" data-toggle="pill" href="#pills-second" role="tab" aria-controls="pills-second" aria-selected="false">历史文本</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="pills-third-tab" data-toggle="pill" href="#pills-third" role="tab" aria-controls="pills-third" aria-selected="false">数据统计</a>
                                                            </li>
                                                        </ul>
                                                        
                                                        <div class="tab-content">
                                                            <div class="tab-pane show active" id="pills-first" role="tabpanel" aria-labelledby="pills-first-tab">
                                                                <div class="p-3">
                                                                    <p class="text-muted">受灾地点将以地图标注的方式进行可视化，同时微博原文和分析后的数据也将进行展示。该功能基于百度地图进行开发。</p>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="pills-second" role="tabpanel" aria-labelledby="pills-second-tab">
                                                                <div class="p-3">
                                                                    <p class="text-muted">系统会收集灾难相关的微博原文，并予以展示。同时，文本分类的结果将与微博原文同时展示。</p>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="pills-third" role="tabpanel" aria-labelledby="pills-third-tab">
                                                                <div class="p-3">
                                                                    <p class="text-muted">通过对微博原文的分类和分析，很多统计信息可以从中提取出，如用户对某灾难的关注程度等。</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-xl-8 border-right">
													<h4 class="mt-0 header-title mb-4">微博数量变化趋势</h4>
													<div id="morris-area-example" class="dashboard-charts morris-charts"></div>
												</div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
								<div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title mb-4">微博总数量</h4>
                                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
							</div>
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <h4 class="header-title mb-4">新增功能</h4>
													<p>2019年12月以来，湖北省武汉市部分医院陆续发现了多例有华南海鲜市场暴露史的不明原因肺炎病例，现已证实为2019新型冠状病毒感染引起的急性呼吸道传染病。2020年2月28日，世卫组织新冠肺炎情况每日报告，地区及全球风险级别均提升为最高级别“非常高”。根据评估，世卫组织认为当前新冠肺炎疫情可被称为全球大流行（pandemic）。</p>
                                                    <p>该系统将社交媒体中有关新冠肺炎的动态加入监测范围。</p>
                                                </div>
												<div class="col-xl-8 border-right">
													<h4 class="mt-0 header-title mb-4">微博数量变化趋势</h4>
													<div id="morris-area-example2" class="dashboard-charts morris-charts"></div>
												</div>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
								<div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title mb-4">微博各类别数量</h4>
                                            <div id="morris-donut-example2" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
							 </div>
                        </div> <!-- end page content-->
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
            

		<?php
			class MyDB extends SQLite3{
				function __construct(){
					$this->open('/home/web/qiuyi/SMASAC/.spyproject/data.db');
				}
			}
			class MyDB2 extends SQLite3{
				function __construct(){
					$this->open('/home/web/qiuyi/SMASAC/.spyproject/NCP.db3');
				}
			}
			$sql1 = "SELECT substr(time,0,8) as time, count(*) as count from earthquake_originaltext group by substr(time,0,8)";
			$sql2 = "SELECT substr(time,0,8) as time, count(*) as count from typhoon_originaltext group by substr(time,0,8)";
			$sql3 = "SELECT substr(time,0,8) as time, count(*) as count from rainstorm_originaltext group by substr(time,0,8)";

			$db = new MyDB();
			$ret1 = $db->query($sql1);
			$ret2 = $db->query($sql2);
			$ret3 = $db->query($sql3);

			$count1=array();
			$count2=array();
			$count3=array();

			$time1=array();
			$time2=array();
			$time3=array();

			$tot=0;
			if(!$ret1){
				echo $db->lastErrorMsg();
			}
			else{
				while($row = $ret1->fetchArray(SQLITE3_ASSOC)){
					$count1[]=(int)$row['count'];
					$time1[]=$row['time'];
				}
			}

			if(!$ret2){
				echo $db->lastErrorMsg();
			}
			else{
				while($row = $ret2->fetchArray(SQLITE3_ASSOC)){
					$count2[]=(int)$row['count'];
					$time2[]=$row['time'];
				}
			}

			if(!$ret3){
				echo $db->lastErrorMsg();
			}
			else{
				while($row = $ret3->fetchArray(SQLITE3_ASSOC)){
					$count3[]=(int)$row['count'];
					$time3[]=$row['time'];
				}
			}

			$data=array();

			for($x=0;$x<count($count2);$x++){
				if(count($count1)<count($count2)+1 && $x==count($count2)-1){
					$data[]=array('y'=>$time2[$x],'a'=>0,'b'=>$count2[$x],'c'=>$count3[$x]);
					break;
				}
				$data[]=array('y'=>$time1[$x+1],'a'=>$count1[$x+1],'b'=>$count2[$x],'c'=>$count3[$x]);
			}

			$countjson1=json_encode($count1);
			$countjson2=json_encode($count2);
			$countjson3=json_encode($count3);

			$timejson1=json_encode($time1);
			$timejson2=json_encode($time2);
			$timejson3=json_encode($time3);

			$datajson=json_encode($data);
//————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————

			$sql1 = "SELECT count(*) as count from earthquake_originaltext";
			$sql2 = "SELECT count(*) as count from typhoon_originaltext";
			$sql3 = "SELECT count(*) as count from rainstorm_originaltext";
			
			$ret1 = $db->query($sql1);
			$ret2 = $db->query($sql2);
			$ret3 = $db->query($sql3);

			$data2=array();
			$count=array();

			if(!$ret1){
				echo $db->lastErrorMsg();
			}
			else{
				while($row = $ret1->fetchArray(SQLITE3_ASSOC)){
					$a=(int)$row['count'];
					$count[]=$a;
					$data2[]=array('label'=>'地震', 'value'=>$a);
				}
			}

			if(!$ret2){
				echo $db->lastErrorMsg();
			}
			else{
				while($row = $ret2->fetchArray(SQLITE3_ASSOC)){
					$b=(int)$row['count'];
					$count[]=$b;
					$data2[]=array('label'=>'台风', 'value'=>$b);
				}
			}

			if(!$ret3){
				echo $db->lastErrorMsg();
			}
			else{
				while($row = $ret3->fetchArray(SQLITE3_ASSOC)){
					$c=(int)$row['count'];
					$count[]=$c;
					$data2[]=array('label'=>'暴雨', 'value'=>$c);
				}
			}
			$datajson2=json_encode($data2);
			$countnew=json_encode($count);
//————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————
			$sql1="select substr(time,0,11) as time,count(*) as count from NCP_new group by substr(time,0,11)";
			$db2 = new MyDB2();
			$ret1 = $db2->query($sql1);
			$data3=array();
			if(!$ret1){
				echo $db2->lastErrorMsg();
			}
			else{
				while($row = $ret1->fetchArray(SQLITE3_ASSOC)){
					$data3[]=array('y'=>$row['time'],'a'=>(int)$row['count']);
				}
			}
			$datajson3=json_encode($data3);
//————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————————
			$sql1="select category, count(*) as count from classify group by category";
			$ret1 = $db2->query($sql1);
			$data4=array();
			if(!$ret1){
				echo $db2->lastErrorMsg();
			}
			else{
				while($row = $ret1->fetchArray(SQLITE3_ASSOC)){
					if($row['category']=='situation'){
						$data4[]=array('label'=>'发展趋势','value'=>(int)$row['count']);
					}
					if($row['category']=='case'){
						$data4[]=array('label'=>'确诊情况','value'=>(int)$row['count']);
					}
					if($row['category']=='economy'){
						$data4[]=array('label'=>'经济影响','value'=>(int)$row['count']);
					}
					if($row['category']=='aid'){
						$data4[]=array('label'=>'医疗救助','value'=>(int)$row['count']);
					}
					if($row['category']=='policy'){
						$data4[]=array('label'=>'相关政策','value'=>(int)$row['count']);
					}
					if($row['category']=='else'){
						$data4[]=array('label'=>'其他','value'=>(int)$row['count']);
					}
				}
			}
			$datajson4=json_encode($data4);

			echo "<script language='javascript'>
					var count1=$countjson1;
					var count2=$countjson2;
					var count3=$countjson3;

					var time1=$timejson1;
					var time2=$timejson2;
					var time3=$timejson3;

					var areaData=$datajson;
					var donutData=$datajson2;
					var areaData2=$datajson3;
					var donutData2=$datajson4;

					var count=$countnew;
			</script>";	
		?>


        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>

        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <script src="../plugins/peity/jquery.peity.min.js"></script>

        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>
		<script src="../plugins/chartist/js/chartist.min.js"></script>
        <script src="../plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>

		<script src="../plugins/peity/jquery.peity.min.js"></script>
		<script src="../plugins/peity/jquery.peity.js"></script>

		<script src="assets/pages/morris.init.js"></script>
		<script src="assets/pages/chartist.init.js"></script>

        <script src="assets/js/app.js"></script>

		<script language='javascript'>
		    Morris.Area({
				element: 'morris-area-example',
				pointSize: 0,
				lineWidth: 0,
				data: areaData,
				xkey:  'y',
				ykeys: ['a', 'b', 'c'],
				labels:  ['地震', '台风', '暴雨'],
				resize: true,
				gridLineColor: '#eee',
				hideHover: 'auto',
				lineColors: ['#99CC00', '#f16c69', '#28bbe3'],
				fillOpacity: .7,
				behaveLikeLine: true
			});

			Morris.Donut({
				element: 'morris-donut-example',
				data: donutData,
				resize: true,
				colors: ['#f0f1f4', '#f16c69', '#28bbe3']
			});
			
			$('.peity-donut').each(function () {
				$(this).peity("donut", $(this).data());
			});

			Morris.Area({
				element: 'morris-area-example2',
				pointSize: 0,
				lineWidth: 0,
				data: areaData2,
				xkey:  'y',
				ykeys: ['a'],
				labels:  ['疫情'],
				resize: true,
				gridLineColor: '#eee',
				hideHover: 'auto',
				lineColors: ['#f16c69'],
				fillOpacity: .7,
				behaveLikeLine: true
			});

			Morris.Donut({
				element: 'morris-donut-example2',
				data: donutData2,
				resize: true,
				colors: ['#f0f1f4', '#f16c69', '#28bbe3','#FFCC33','#9999FF','#99CC00']
			});
			
			$('.peity-donut').each(function () {
				$(this).peity("donut", $(this).data());
			});
		</script>

    </body>

</html>