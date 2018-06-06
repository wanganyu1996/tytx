<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>统一通信 钉铛呼叫中心</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" type="image/png" href="/tytx1/Public/favicon.png">
		
		<link rel="stylesheet" href="/tytx1/Public/assets/css/popup.css"/>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/css/font-awesome.css" />
		
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/css/aero.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="/tytx1/Public/assets/ty_css/icons.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/assets/js/html5shiv.js"></script>
		<script src="/assets/js/respond.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/TabPanel.css" type="text/css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/ty_css/cti/css/softphone.css" />
		<script src="/tytx1/Public/assets/js/jquery.js"></script>
		<style>
			/*homepage css*/
			.navbar{min-height:55px;}
			.ace-nav > li{height:55px;line-height:55px;}
			.user-info{top:11px;}
			ul,li{list-style:none;}
			#noticeList span{margin-right:220px;}
			.help li{border-top:solid 1px #e4ecf3;}
			.help li h3{font-size:14px;font-weight:normal;margin-top:5px;margin-bottom:5px;}
			.help li p{font-size:12px;margin:3px 0 5px;line-height:20px;color:#555;}
			#navbar .dropdown-menu{right:0px;min-width:150px;}
			#navbar-container{padding:0;}
			/*电话热线 style*/
			#ace-settings-container{top:104px;position:fixed;z-index:9999999999;}
			.btn.btn-app.ace-settings-btn.btn-xs{width:32px;}
			.btn.btn-app.ace-settings-btn{opacity:1}
			.ace_set_title{padding:0 5px;color:#ffb34b;font-size:16px;line-height:30px;border-bottom:solid 1px #ffb34b}
			
			.telcon h3{font-size:14px;font-weight:normal;margin:8px 0 8px;color:#333333;}
			.telcon p{font-size:14px;margin:0;color:#999999;}
			.ace-settings-box.open{max-height:220px;}		
			#ace-settings-btn{text-shadow:none;}
			.ace-settings-box.open{padding:0;}
			.ace_set_title{padding:0 14px;}
			.telcon{padding:6px 14px;}
			.telcon p .name{display:inline-block;width:60px;}
			.pdl-10{padding-left:10px;}			
			.wrap{margin:0px auto;text-align:center;}
			
			#formModal{width:480px;position:fixed;left:50%;top:20%;margin-left:-250px;}
			#formModal .modal-body{background:#fff;}
			#formModal .modal-body .form-group{width:100%;}
			#formModal .modal-header{overflow:hidden;height:38px;}
			#formModal .modal-title{line-height:1;color:#669fc7;font-size:17px;}
			#formModal .close{font-size:24px;margin-top:-8px;color:#8b9aa3;font-weight:bold;opacity:.4;filter:alpha(opacity=40);}
			#formModal h4{margin-top:-4px;}
			#formModal .form-group{overflow:auto;zoom:1;}
			.ace-nav>li{border-left:none;}
			a:hover{
			  text-decoration:none;
			}
			
        .modify{
			  position:absolute;
			  width:360px;
			  height:auto;
			  top:100%;
			  left:40%;
			  z-index:999;
			  display:none;
			  background:#FFFAFA;
			}
			#fund{
				float:right;
			}
		</style>
	</head>

	<body class="no-skin">
		
		<!-- #section:basics/navbar.layout -->
		<!--
		<div class="ace-settings-container" id="ace-settings-container">
		 <input id="currentTenantId" name="currentTenantId" value="25362" type="hidden"/>
		 <input id="currentTenantUrl" name="currentTenantUrl" value="" type="hidden"/>
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-phone bigger-130"></i>
								客<br/>服<br/>热<br/>线
							</div>

							<div class="ace-settings-box clearfix " id="ace-settings-box">
								<div class="ace_set_title smaller lighter orange">	统一通信客服热线 4001181178</div>
								<div class="telcon">
									<span >
						<h3>销售经理</h3>
							<p>
							<span class="name">魏宝阳</span>
							<span class="phoneNumber">13813995344</span>
							</p>
					</span>
					<span >
						<h3>技术经理</h3>
							<p>
							<span class="name">陶家源</span>
							<span class="phoneNumber">4001181178转分机号：812</span>
							</p>
						<!--<p><span class="name">张三三</span><span class="phoneNumber">13813894138</span></p>-->
				<!--	</span>
					<span >
						<h3>客服经理</h3>
							<p>
							<span class="name">宋圆圆</span>
							<span class="phoneNumber">4001181178转分机号：801</span>
							</p>
						<!--<p><span class="name">张三三</span><span class="phoneNumber">13813894138</span></p>-->
				<!--	</span>
								</div>
							</div>
						</div>
						-->
						
		
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							统一通信
						</small>
					</a>
				</div>
<div class="phonecontainer">
	<div class="phone">
		<div id="softphoneTools">
			<div id="agentstatDiv" class="agentStat_notReady"></div>
			<div id="agentstatWord">
				<span id="agentState"><font color = "#FF7575">示忙</font></span>&nbsp;<span id="agentStateTimer"><font color = "#FF7575">00:17</font></span>
			</div>
			<div id="line1Image" class="line1Image_on_idle" title="线路1" disabled="disabled"></div>
			<div id="line2Image" class="line2Image_off_disabled" title="线路2" disabled="disabled"></div>
			<div id="phoneNumberInput">
				<table width="100%" class="dataTable " border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="phoneNumberInputLeft"></td>
							<td class="phoneNumberInputCenter">
								<div style="padding-left:2px;padding-bottom:3px; height:36px;">
									<input name="phoneNumber" id="phoneNumber" type="text" class="phoneNumberBox" value="" maxlength="16">
									<div class="timel">
										<table width="152" class="dataTable " border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td width="90"><span id="phoneStatWord" class="pointer" title="Busy"><span><img id="stateImage" src="/tytx1/Public/assets/ty_css/cti/img/phone_idle.gif" width="10" height="8" border="0"><span id="lineState" class="statWord"></span></span>
														</span>
													</td>
													<td width="62" align="right" class="nobreak"><span class="statWord"><span id="line1Timer"></span><span id="line2Timer"></span></span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</td>
							<td class="phoneNumberInputRight"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="dialBg"><img src="/tytx1/Public/assets/ty_css/cti/img/dialBg.png"></div>
			<div id="dialImage" title="呼叫" class="dialImage_disabled" disabled="disabled"></div>
			<div id="disconImage" title="挂机" class="disconImage_disabled" disabled=""></div>
			<div id="holdImage" title="保持" class="holdImage_disabled" disabled=""></div>
			<div id="transferImage" title="转接" class="transferImage_disabled" disabled=""></div>
			<div id="transferSelfImage" title="一键转接" class="transferSelfImage_disabled" disabled=""></div>
			<div id="ivrImage" title="IVR" class="ivrImage_disabled" disabled=""></div>
			<div id="conferenceImage" title="电话会议" class="conferenceImage_disabled" disabled=""></div>
		</div>
		<div id="statMenu" style="display: none;">
			<table width="100%" class="dataTable " border="0" cellspacing="0" cellpadding="0" id="agentStateTable">
				<tbody>
					<tr>
						<td class="title">坐席状态</td>
					</tr>
					<tr>
						<td id="as_ready" class="notCurrentMenu">就绪</td>
					</tr>
					<tr>
						<td id="as_notready1" class="notCurrentMenu">示忙</td>
					</tr>
					<tr>
						<td id="as_notready2" class="notCurrentMenu">123</td>
					</tr>
					<tr>
						<td id="splitTd">
							<div style="height:1px;background-color:#333333;overflow:hidden"></div>
						</td>
					</tr>
					<tr>
						<td id="as_login" class="notCurrentMenu"><img src="/tytx1/Public/assets/ty_css/cti/img/blank.gif" border="0" align="absmiddle">登入</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>				
				
				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<input type="hidden" id="restOfDays" value="null"/>
							<input type="hidden" id="balance" value="7400.949"/>
							<li style="color:#fff;padding-right:10px;">
								当前余额&nbsp;<em class="cash" ><?php echo ($money); ?></em>&nbsp;元
								 <?php if(session('id')==1){?>
								<span id="alertRecharge" style="text-decoration:underline;font-size:14px;margin-left:6px;">余额修改</span>
								 <?php }?>
								<span id="selfRecharge" style="text-decoration:underline;font-size:14px;margin-left:6px;">去充值</span>
								
							    <script>
								    $(function(){
									        $("#alertRecharge").click(function(){
												  $('.modify').css('display','block');
											})
									})
								</script>
							</li>
							 <!--修改余额界面-->
                             <div  class = "modify">
							         <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span id = "dele" aria-hidden="true">×</span></button>
											<script>
											  $(function(){
											      
                                                     $('#dele').click(function(){
													   $('.modify').css('display','none');
													 
													 })												  
											  })
											</script>
									<h5 class="modal-title" id="myModalLabel">余额修改</h5>
									 </div>
									<div class="input-group" id="fund">
										 <input id = "money" type="text" class="form-control">
										 <span class="input-group-addon">元</span>
									</div>
									 <div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true"  id = "saveMoney">保存</button>
               						 <!--保存余额修改处--> 
     								  <script>
                                                   $(function(){
														 var money = 0;
                                                         $('#saveMoney').click(function(){
														    money = $('#money').val();
														    $.ajax({
																url:"<?php echo U('editMoney');?>",
																type:'post',
																dataType:'json',
																data:{'money':money},
																success:function(msg){
																	 alert(msg.success);
																	 $('.cash').html(money);
																	 $('.modify').css('display','none');
																//保存成功后弹出对话框
																}
															 });
														    //alert(money);
														 })		
												   })
                                            </script> 											
									</div>
                             </div>
			<!--个人信息显示页面-->				
							<div class="modal fade bs-example-modal-sm" id="formModalsec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
											<h4 class="modal-title" id="myModalLabel">emp1008</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">企业ID</label>
												</label>
												<label class="col-sm-93 control-label text-left" for="form-field-1">
													<label class="middle">25362</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">企业名称</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">南京腾拓房产经纪有限公司</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">企业编号</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">NJ201625362</label>
												</label>
											</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
														<label class="middle">当前余额</label>
													</label>
													<label class="col-sm-9 control-label text-left" for="form-field-1">
														<label class="middle">7400.949元</label>
														<a id="chargeDetail" class="btn btn-sm ">财务状况</a>
													</label>
													<span id="selfRecharge" style="text-decoration:underline;font-size:14px;margin-left:6px;">去充值</span>
												</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">坐席名称</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">emp1008</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">座席工号</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">emp1008</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">坐席分机</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">1008</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">坐席组</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">悦庭销售一组</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">联系电话</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">13888888888</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">个性外显号码</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">15380939836</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">联系邮箱</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle">emp1008@25362.cc</label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle" style="margin-top:11px">自动保存弹屏</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
												<input type="hidden" id="lastAutoSave" value="false"/>
													<input type="hidden" id="lastAutoSaveTime" value="30"/>
													<label class="middle">通话结束</label><input type="text" maxlength="3" class="form-control" style="width:40px;margin:0 5px;display:inline-block" id="autoSaveTime" value="30"/><label class="middle">秒后，自动保存弹屏并就绪</label>
													<div class="checkbox inline">
														<label>														
															<input type="checkbox" class="ace mr-4" id="enableAutoSave"  value="0">
															<span class="lbl"></span>
															启用
														</label>
													</div>
												</label>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2" onclick="autoSaveTime()">关闭</button>
											
										</div>
									</div>
									<div class="modal fade bs-example-modal-sm" id="pwdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
											<h4 class="modal-title" id="myModalLabel">余额提醒</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
													<label class="middle">您的话费仅剩：</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle"></label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-12 control-label no-padding-right text-center" for="form-field-1">
													<span style="font-weight:bold;font-size:26px;color:red;">7400.949元</span>
												</label>
											</div>
											<div class="form-group">
									
												<label class="col-sm-12 control-label text-left" for="form-field-1">
													<label class="middle">建议您尽快联系商务人员进行充值，以免余额不足影响业务。</label>
												</label>
											</div>											
										</div>
										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2">知道了</button>
											
										</div>

									</div>	
									
									<div class="modal fade bs-example-modal-sm" id="pwdModalBill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
											<h4 class="modal-title" id="myModalLabel">试用期限通知</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
												<label class="col-sm-6 control-label no-padding-right" for="form-field-1">
													<label class="middle">您当前的套餐为试用套餐</label>
												</label>
												<label class="col-sm-9 control-label text-left" for="form-field-1">
													<label class="middle"></label>
												</label>
											</div>
											<div class="form-group">
												<label class="col-sm-12 control-label no-padding-right text-center" for="form-field-1">
														<span style="font-weight:bold;font-size:26px;color:red;">试用时间已结束</span>
												</label>
											</div>
											<div class="form-group">
									
												<label class="col-sm-12 control-label text-left" for="form-field-1">
													<label class="middle">如需继续使用，请开通座席套餐。</label>
												</label>
											</div>											
										</div>
										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2">知道了</button>
											
										</div>

									</div>		
					<!----------------------------------->
					<li class="green">
							<input type="hidden" id="currentUserTenantId" value="25362">
							<input type="hidden" id="customServiceUrl" value="https://boss.uccc.cc:5001">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
								<i class="ace-icon fa fa-question-circle-o"></i>
								客服
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-question-circle-o"></i>
									获取帮助
								</li>

								<li class="dropdown-content help" style="position: relative;">
									<div class="scroll-track scroll-active" style="display: block; height: 500px;">
										<div class="scroll-bar" style="height: 111px; top: 0px;"></div></div>
										<div class="scroll-content">
										<ul class="dropdown-menu dropdown-navbar">
											<li class="clearfix">
												<h3 class="blue">服务总线</h3>
												<p>4001181178</p>
											</li>
											<li class="clearfix contact">
												<h3 class="blue">销售经理 <span class="pdl-10 name">魏宝阳</span></h3>
												<div class="existDiv"><p>手机：<span>13813995344</span></p><p>分机：<span></span></p><p>QQ：<span></span></p><p>邮箱：<span></span></p></div>
											</li>
											<li class="clearfix contact">
												<h3 class="blue">客服经理 <span class="pdl-10 name">宋圆圆</span></h3>
												<div class="existDiv"><p>手机：<span></span></p><p>分机：<span>4001181178转分机号：801</span></p><p>QQ：<span>4001181178</span></p><p>邮箱：<span></span></p></div>
											</li>
											<li class="clearfix contact">
												<h3 class="blue">技术经理 <span class="pdl-10 name">陶家源</span></h3>
												<div class="existDiv"><p>手机：<span></span></p><p>分机：<span>4001181178转分机号：812</span></p><p>QQ：<span>712665937</span></p><p>邮箱：<span></span></p></div>
											</li>
										</ul>
									
								</div>
							</li>
							</ul>
							</li>
					<!------------------------------------>
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/tytx1/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎,</small>
									<?php echo ($username); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#formModalsec" data-toggle="modal">
										<i class="ace-icon fa fa-user"></i>
										个人信息							
									</a>
								</li>
								<li>
									<a href="#formModal" data-toggle="modal">
										<i class="ace-icon fa fa-lock"></i> 修改密码
									</a>
								</li>
								
								<li class="divider"></li>

								<li>
									<a href="<?php echo U('logout');?>">
										<i class="ace-icon fa fa-power-off"></i> 退出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>
				</div>
				<!-- /section:basics/navbar.dropdown -->
			</div>
			<!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try {
					ace.settings.loadState('main-container')
				} catch (e) {}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try {
						ace.settings.loadState('sidebar')
					} catch (e) {}
				</script>

				
				<!-- /.sidebar-shortcuts -->
<!--左侧栏目页面-->
				<ul class="nav nav-list">
                         <?php foreach($btn as $k=>$v):?>
                        <li class="<?php if($k==0) echo 'open';?>">
                            <a href="#" class="dropdown-toggle">
                                <i class="<?php echo ($v["icon"]); ?>"></i>
							<span class="menu-text">
							<?php echo ($v["pri_name"]); ?>
							</span>

                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>

                            <ul class="submenu">
                                 <?php foreach($v['children'] as $k1=>$v1):?>
                                    <li class="">
                                        <a href="javascript:;" onclick = "<?php echo ($v1["controller_name"]); echo ($v1["action_name"]); ?>()">
                                            <i class="menu-icon fa fa-caret-right"></i> <?php echo ($v1["pri_name"]); ?>
                                        </a>
                                        <script>
										      function <?php echo ($v1["controller_name"]); echo ($v1["action_name"]); ?>(){
												 var iframe = document.getElementById("iframe");
												 var str="<?php echo U($v1['module_name'].'/'.$v1['controller_name'].'/'.$v1['action_name']);?>";
												 iframe.src = "<?php echo U($v1['module_name'].'/'.$v1['controller_name'].'/'.$v1['action_name'])?>" ;
											  }
										</script> 
                                        <b class="arrow"></b>
                                    </li>
                                    <?php endforeach;?>
                                
                                 
                                  
                                
                                  
                            </ul>
                        </li>
                        <?php endforeach;?>

<!--下面是需要实现的功能-->
				</ul>
				<!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				     
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
			</div>
	        <div class="breadcrumbs ace-save-state" id="breadcrumbs" style="overflow:hidden;padding-left:30px;line-height:30px;background:url(/tytx1/Public/assets/img/light.png) 7px center no-repeat #f5f5f5">
						<div id="tipscon" style="position:relative; white-space:nowrap; overflow:hidden; height:30px;margin-top:5px;">
							<div id="noticeList" style="position: absolute; top: 0px; height: 30px; left: 1003.9px;">
								<span id="announcement">1.添加外显号码请在左侧‘系统管理’-&gt;‘号码管理’中添加。2.充值请点击上方余额旁的‘自助充值’，使用支付宝即充即到账。</span>
								<span id="todo">暂无最新待办</span>
								<script>
								     $(function(){
								         
										 var left = 1100;
										 var value;
										 function go(){
										     
											 left-=1;
											 if(left<=0){
											   left = 1100;
											 }
											 value = left+"px";
											 $('#noticeList').css('left',value);
											 
										 }
										 setInterval(go,15);
										 
									 });
								</script>
							</div>
						</div>
			</div>
			
	<iframe  id = "iframe" src = "<?php echo U('welcome');?>" width= "800" frameborder = "0" height = "600"></iframe>
		<script>
	    //调用函数
        var pagestyle = function() {
            var rframe = $("#iframe");
            //ie7默认情况下会有上下滚动条，去掉上下15像素
            var w = $(window).width()-210;
            rframe.width(w);
        }
        //注册加载事件
        $("#iframe").load(pagestyle);
        //注册窗体改变大小事件   
        $(window).resize(pagestyle);
	
	
	</script>
 <!--修改密码界面-->
            <div class="modal fade bs-example-modal-sm" id="formModal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">密码修改</h4>
                        </div>
                        <div class="modal-body wrap" >
                        <?php if(session('id')==1){?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <label class="middle">姓名</label>
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control pull-left" id="username" style="width:200px;" name="username"/>
                                    <span id="repeatPassword" style="color: rgb(185, 33, 161);line-height:34px;"></span>
                                </div>
                            </div>
                         <?php }?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <label class="middle">新密码</label>
                                </label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control pull-left" style="width:200px;" id="newPwd" name="newPwd"/>
                                    <span id="newPassword" style="color: rgb(185, 33, 161);line-height:34px;"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <label class="middle">重复密码</label>
                                </label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control pull-left" id="repeatPwd" style="width:200px;" name="repeatPwd"/>
                                    <span id="repeatPassword" style="color: rgb(185, 33, 161);line-height:34px;"></span>
                                </div>
                            </div>
                         </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2">取消</button>
                            <button class="btn btn-sm" type="button" onclick="doClear();">重置</button>
                            <button class="btn btn-sm btn-info" type="button" id="change">确定</button>                            
                        </div>
                    </div>
					
					
<!--版权信息-->					
			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							 <a href = "adminer.html">©</a>2016 统一通信 苏ICP备12012229号-1
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>

		<!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="/tytx1/Public/assets/js/jquery.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/assets/js/jquery1x.js"></script>
<![endif]-->
		<script type="text/javascript">
			if ('ontouchstart' in document.documentElement) document.write("<script src='./js/jquery.mobile.custom.js'>" + "<" + "/script>");
		</script>
		<script src="/tytx1/Public/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script src="/tytx1/Public/assets/js/jquery-ui.custom.js"></script>
		<script src="/tytx1/Public/assets/js/jquery.ui.touch-punch.js"></script>
		<!--<script src="/assets/js/ace/elements.aside.js"></script>-->
		<script src="/tytx1/Public/assets/js/ace/ace.js"></script>
		<script src="/tytx1/Public/assets/js/ace/ace.sidebar.js"></script>
		<script src="/tytx1/Public/assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="/tytx1/Public/assets/js/tabpanel/TabPanel.js"></script>
		<script src="/tytx1/Public/assets/js/cti/artDialog.min.js"></script>
		<script src="/tytx1/Public/assets/js/cti/artDialog.plugins.min.js"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-utils.js"></script>
		<script src="/tytx1/Public/assets/js/ace/ace.settings.js"></script>
		<script src="/tytx1/Public/assets/ty_js/index.js"></script>
		<script src="/tytx1/Public/assets/ty_js/tenant/selfRecharge.js"></script>
		
		<script src="/tytx1/Public/assets/js/cti/jquery.json-2.2.min.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/jquery.utils.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/reconnecting-websocket.min.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/websocket.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-utils.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-core.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-api.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-event.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/callback.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-ui.js" type="text/javascript"></script>
		<script type="text/javascript">
			/*var mshost = "tytx-hz.uccc.cc";
			    var msport = "8291";
			    var flag = true;
			    var hide_no = "block";
			    var isPopup = "false";
			    var _thisQueues = new Array();
			    var _queues = "25362_8003,";
			    if(_queues!=""){
			        var arrTemp = _queues.split(",");
			        for(var index=0;index<arrTemp.length;index++){
			            if(arrTemp[index]!=""){
			                _thisQueues.push(arrTemp[index]);
			            }
			        }
			    }
			    cti.Agent.getInstance().init('25362_1008','13888888888', '1008', _thisQueues);
			    */
		</script>
		<script src="/tytx1/Public/assets/js/cti/cti-websocket.js" type="text/javascript"></script>
		<script src="/tytx1/Public/assets/js/cti/cti-main.js"></script>
		<script src="/tytx1/Public/assets/js/jquery.validate.js"></script>
		<script src="/tytx1/Public/assets/ty_js/user/changePwd.js"></script>
		<script>
			$("#chargeDetail").click(function(){
				$("#formModalsec").modal("hide");
				var id = $("li [rel-class='DebitsRecord']").attr("rel-id");
				var url = $("li [rel-class='DebitsRecord']").attr("rel-url");
				doClick(this, id,'DebitsRecord', '交易明细', url);
			});
		</script>
	</body>

</html>