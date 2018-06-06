<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>统一通信 钉铛呼叫中心</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" type="image/png" href="/tytx1/Public/favicon.png">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/css/font-awesome.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.css" />
		<![endif]-->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace-rtl.css" />
		<link rel="stylesheet" href="/tytx1/Public/assets/css/popup.css"/>
		<link rel="stylesheet" href="/tytx1/Public/assets/ty_css/login.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/assets/js/html5shiv.js"></script>
		<script src="/assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger logo">
												
											</h4>

											<div class="space-6"></div>
											<form  method="post" id="formLogin" action="<?php echo U('Index/index');?>" onsubmit="return login();true">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="tenantCode" name="tenantCode" type="text" class="form-control" placeholder="企业编号" value=""/>
															<i class="ace-icon fa fa-building "></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="agentName" name="agentName" type="text" class="form-control" placeholder="员工编号" value=""/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="password" name="password" type="password" class="form-control" placeholder="登录密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="loginCode" name="loginCode" type="text" maxlength="4" placeholder="验证码" style="width:60%;display:inline"/>
															<img src="<?php echo U('login/loginImage');?>" id="loginImg" onclick="this.src=this.src"+"?"+Math.random() title="单击刷新" style="display:inline"/>
														</span>
													</label>
													<span class="error red"></span>

													<div class="clearfix">
													<a href="#formModal" data-toggle="modal">忘记密码？</a>
														<button  type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登录</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
                    
											<div class="browserTips" style="display:none">您的浏览器可能存在兼容问题，推荐使用Chrome浏览器<a href="https://tytx-hz.uccc.cc:8291//assets/ChromeStandalone_51.0.2704.106_Setup.exe" class="red">前往下载</a></div>
											<div class="social-or-login center">
												<span class="bigger-110"></span>
											</div>

											<div class="space"></div>

											<div class="social-login center">
												<div class="uccc-info">
											        <span class="phone">400-118-1178</span>
											        <span class="email"><a href="mailto:uccc@uccc.cc">uccc@uccc.cc</a></span>
											        <span class="qq" style="padding-right: 0;"><a href="tencent://message/?uin=4001181178&amp;Menu=yes">400-118-1178</a></span>
											      </div>
											</div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div class="copyright">
												©2016 统一通信 苏ICP备12012229号-1
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
<div class="modal fade bs-example-modal-sm" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style=" padding-right: 17px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">密码修改</h4>
                        </div>
                        <div class="modal-body wrap">
                            <p class="text-center">请联系管理员</p>
                         </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm" data-dismiss="modal" aria-hidden="true">知道了</button>                          
                        </div>
                    </div>
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="/tytx1/Public/assets/js/jquery.js"></script>
		<script src="/tytx1/Public/assets/js/bootstrap.js"></script>
		<script src="/tytx1/Public/assets/js/jquery.cookie.js"></script>
		<script src="/tytx1/Public/assets/ty_js/login.js"></script>		
		<!-- <![endif]-->

		<!--[if IE]>
		<script src="/assets/js/jquery1x.js"></script>
		<script src="/assets/js/jquery.cookie.js"></script>
		<script src="/assets/ty_js/login.js"></script>		
		<![endif]-->
	</body>
</html>