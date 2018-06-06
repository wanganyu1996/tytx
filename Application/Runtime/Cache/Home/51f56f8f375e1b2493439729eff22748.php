<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>租户管理</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/css/font-awesome.css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/css/chosen.css" />
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/jquery-ui.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.css" />
		<![endif]-->
			<link rel="stylesheet" href="/tytx1/Public/assets/css/datepicker.css" />
	<link rel="stylesheet" href="/tytx1/Public/assets/css/chosen.css" />
	<link rel="stylesheet" href="/tytx1/Public/assets/css/popup.css"/>
	<link rel="stylesheet" href="/tytx1/Public/assets/css/define.css" type="text/css" />

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/assets/js/html5shiv.js"></script>
		<script src="/assets/js/respond.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="page-content" >
			<div class="page-header">
				<h1><small><i class="ace-icon fa fa-angle-double-right"></i>任务提醒</small></h1>
			</div>
			<div class="row">
				<div class="col-sm-6" id="notice">
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title lighter smaller">
								<span class="icon"><a href="/contacts/announcements/welcome" class="tip" data-original-title="重新加载"><i class="ace-icon fa fa-refresh"></i></a></span>
								最新公告
								<span class="label pull-right inline badge" >
	              					<a href="javascript:void(0);" class="tip" data-original-title="更多" onclick="top.toAnns(this);"> 0 </a>
	            				</span>
							</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div class="widget-content nopadding">
									<ul class="recent-posts">
											<li>
												<div class="article-post"><span class="detail-info">暂无公告内容</span></div>
											</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6" id="notice">
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title lighter smaller">
								<span class="icon"><a href="" class="tip" data-original-title="重新加载"><i class="ace-icon fa fa-refresh"></i></a></span>
								待办提醒
								<span class="label pull-right inline badge">
					              <a href="javascript:void(0);" onclick="top.toDolists(this);" class="tip" data-original-title="更多">0 </a>
					            </span>
							</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div class="widget-content nopadding">
									<ul class="recent-posts">
										<li>
											<div class="article-post"><span class="detail-info">今日无待办内容</span></div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

  
	</body>
	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="/tytx1/Public/assets/js/jquery.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="/assets/js/jquery1x.js"></script>
<![endif]-->
	<script src="/tytx1/Public/assets/js/bootstrap.js"></script>
	<script src="/tytx1/Public/assets/js/jquery-ui.js"></script>
	<!-- page specific plugin scripts -->
	<script src="/tytx1/Public/assets/js/jquery-ui.custom.js"></script>
	<script src="/tytx1/Public/assets/js/jquery.ui.touch-punch.js"></script>
	<!--<script src="/assets/assets/js/ace/elements.aside.js"></script>-->

	<script src="/tytx1/Public/assets/js/ace/ace.js"></script>
	<script src="/tytx1/Public/assets/js/chosen.jquery.js"></script>
	
</html>