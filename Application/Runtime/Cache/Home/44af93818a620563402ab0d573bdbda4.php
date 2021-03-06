<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
<head>
		<meta charset="UTF-8">
		<title>租户管理</title>
		<meta name="description" content="overview &amp; stats">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/chosen.css">
		<link rel="stylesheet" href="/tytx1/Public/assets/css/bootstrap.css">
		<link rel="stylesheet" href="/tytx1/Public/assets/css/font-awesome.css">
       
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/jquery-ui.css">
		<!-- text fonts -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace-fonts.css">
		<!-- ace styles -->
		<link rel="stylesheet" href="/tytx1/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style">

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.css" />
		<![endif]-->
			<link rel="stylesheet" href="/tytx1/Public/assets/css/datepicker.css">
	
	<link rel="stylesheet" href="/tytx1/Public/assets/css/bootstrap-timepicker.css">
	<!--列表页面使用 -->
	<link rel="stylesheet" href="/tytx1/Public/assets/css/popup.css" type="text/css">
	<link rel="stylesheet" href="/tytx1/Public/assets/css/define.css" type="text/css">
	<link rel="stylesheet" href="/tytx1/Public/assets/css/aero.css">
	<link rel="stylesheet" href="/tytx1/Public/assets/ty_css/mediaelementplayer.min.css">
	 <script src="/tytx1/Public/assets/js/jquery.js"></script>
	<style>
		#formModal .form-group{margin-bottom:10px;}
		#formModal .form-group .control-label{margin-top:5px;}
		#formModal .form-group .radio{margin:4px 14px 0 0;}
.mejs-duration{display:none;}
		.mejs-audio{margin-top:30px;}
		.pdr-10{padding-right:12px;}

.showInfo1{
		  position:absolute;
          top:20%;
          left:22%;
          right:15%;
		  background:white;		
          width:50em;
		  height;20em;
		  z-index:40;	
          display:none;	

		  }
		.showInfo2{
		  position:absolute;
          top:43%;
          left:22%;
          right:15%;
		  background:white;		
          width:55em;
		  height:8em;
		  z-index:40;
          display:none;  
		  text-align:center;
		 
		}
		.controlVoice{
         
          padding-left:300px;
        }
         .divY{   
            width: 440px;   
            height: auto;   
            background-color: #FCFCFC;  
			text-align:left;
			
            display:none;	
           	z-index:800;
			padding-bottom:2px;
        }
    
         .center-in-center{   
            position: absolute;   
            top: 50%;   
            left: 50%;   
            -webkit-transform: translate(-50%, -50%);   
            -moz-transform: translate(-50%, -50%);   
            -ms-transform: translate(-50%, -50%);   
            -o-transform: translate(-50%, -50%);   
            transform: translate(-50%, -50%);   
        } 

        
       .pages a,.pages span {
    display:inline-block;
    padding:4px 7px;
    margin:0 2px;
    border:1px solid #D5D4D4;
    -webkit-border-radius:1px;
    -moz-border-radius:1px;
    border-radius:1px;
}

.controlButton{
  text-align:right;
  background-color:#eff3f8;
  height:60px;
  padding-top:16px;
  padding-right:16px;
}
.controlAudio{
  width:420px;
}
.pages a,.pages li {
    display:inline-block;
    list-style: none;
    text-decoration:none; color:#077ee3;
}

.pages a:hover{
    border-color:#077ee3;
}
.pages span.current{
    background:#077ee3;
    color:#FFF;
    font-weight:700;
    border-color:#077ee3;
}

.long-tr th{
	text-align: center
}
.long-td td{
	text-align: center
}
#main{
    
    background:rgba(1,1,1,0.25);
}
.divstyle{
	position: absolute;
	top: 0;
	left: 0;
	right:0;
	bottom:0;
	width:100%;
	height:100%;
	background-color: rgba(1,1,1,0.25);
	-moz-opacity: 0.8;
	opacity:0.8;
	z-index:100;
	filter: alpha(opacity=40);
	display:none;
}
	</style>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/assets/js/html5shiv.js"></script>
		<script src="/assets/js/respond.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class = "divstyle"></div>
	 <div id = "divYY" class="divY center-in-center">
	    
	 </div>   
	<div class="page-content" id="show">
	   <div class = "showInfo1" id = "formThree">
			                           <div class="modal-header">
									   
											<button type="button" class="close" id = "closeInfo3"><span aria-hidden="true">×</span></button>
											<script> 
											     $(function(){
												    
													$('#closeInfo3').click(function(){
													   
													  $('#formThree').css("display","none");
													  
													})
												 
												 })
											</script>
											
										</div>
	<!----表单提交添加----->							<form action = "<?php echo U('add');?>" method = "post"  enctype="multipart/form-data">		
										<div class="modal-body">
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">呼叫时间</font></label>
													<div class="col-sm-10">
													   <input id = "timetype" name="calltime" type="text" class="form-control" id="inputEmail3" >
													  
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">主教号码</font></label>
													<div class="col-sm-10">
													  <input type="text"  name="callnum" class="form-control" id="inputEmail3" >
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">被叫号码</font></label>
													<div class="col-sm-10">
													  <input type="text" class="form-control" name="callednum" id="inputEmail3" >
													</div>
											</div>
												<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">接听时间</font></label>
													<div class="col-sm-10">
													  <input type="text" name="answertime" class="form-control" id="answertime" >
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">结束时间</font></label>
													<div class="col-sm-10">
													  <input type="text" name="endtime" class="form-control" id="endtime" >
													</div>
											</div>
												<div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">通话时长</font></label>
													<div class="col-sm-10">
													  <input type="text"  name="talktime" class="form-control" id="inputEmail3" >
													</div>
												</div>
											<div class="form-group">
												   <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">话费</font></label>
													<div class="col-sm-10">
													  <input type="text" name="telfare" class="form-control" id="inputEmail3" >
													</div>
											</div>
											<div class="form-group">
												   <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">坐席名称</font></label>
													<div class="col-sm-10">
													  <input type="text" name="tablename" class="form-control" id="inputEmail3" >
													</div>
											</div>
											<div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">呼叫方式</font></label>
													<div class="col-sm-10">
													  <input name = "callmode" type = "radio" value="1"><font size = "3px">呼出</font>
													  <input name = "callmode" type = "radio" value="2"><font size = "3px">呼入</font>
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">外呼类型</font></label>
													<div class="col-sm-10">
													 <font size = "3px"><input name = "calltype" type = "radio" value="1" >任务</font>
													 <font size = "3px"><input name = "calltype" type = "radio" value="2">手动</font>
													</div>
											</div>
											<div class="form-group">
												  <label for="inputEmail3"  class="col-sm-2 control-label"><font size = "3px">音频导入</font></label> 
                                                   <input type="file" id="exampleInputFile" name="record">
                                                    <p class="help-block"><font size = "１px">导入格式为mp3的音频</font></p> 
											</div>
											
										</div>
										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2" onclick="autoSaveTime()">保存</button>
											
										</div>
								</form>		
			</div>   
	<!---通话记录单条修改页面---->
	        <div class = "showInfo1" id = "formOne">
			                           <div class="modal-header">
											<button type="button" class="close" id = "closeInfo"><span aria-hidden="true">×</span></button>
											<script> 
											     $(function(){
													$('#closeInfo').click(function(){
													  $('#formOne').css("display","none");
													  
													})
												 
												 })
											</script>
											<h4 class="modal-title" id="myModalLabel"><font color = "lightblue">被叫号码</font></h4>
										</div>
	<!----表单修改----->							<form action = "/tytx1/index.php/Home/Go/showInfo.html" method = "post"  enctype="multipart/form-data">
	                                    <input type="hidden" name="id" id="id" value=""/>		
										<div class="modal-body">
											
											<div class=" form-group" >
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">呼叫时间</font></label>
													<div class="col-sm-10 ">
															<input type="text"  name="calltime" id="calltime" class="form-control "  value="">
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">主叫号码</font></label>
													<div class="col-sm-10">
													  <input type="text"  name="callnum" class="form-control" id="callnum" >
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">被叫号码</font></label>
													<div class="col-sm-10">
													  <input type="text" name="callednum" class="form-control" id="callednum" >
													</div>
											</div>
												<div class="form-group">
													<label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">通话时长</font></label>
													<div class="col-sm-10">
													  <input type="text" class="form-control" name="talktime"  id="talktime" >
													</div>
												</div>
											<div class="form-group">
												   <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">话费</font></label>
													<div class="col-sm-10">
													  <input type="text"  name="telfare" class="form-control" id="telfare" >
													</div>
											</div>
											<div class="form-group">
												   <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">坐席名称</font></label>
													<div class="col-sm-10">
													  <input  type="text"  name="tablename" class="form-control" id="tablename" >
													</div>
											</div>
											<div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">呼叫方式</font></label>
													<div class="col-sm-10">
													  <input name = "callmode" id="callmode" type = "radio"  value="1"><font size = "3px">呼出</font>
													 <input name = "callmode"  id="callmode" type = "radio" value="2" > <font size = "3px">呼入</font>
													</div>
											</div>
											<div class="form-group">
												    <label for="inputEmail3" class="col-sm-2 control-label"><font size = "3px">外呼类型</font></label>
													<div class="col-sm-10">
													 <input name = "calltype" id="calltype" type="radio" value="1" ><font size = "3px">任务</font>
													 <input name = "calltype" id="calltype" type="radio" value="2" ><font size = "3px">手动</font>
													</div>
											</div>
											<div class="form-group">
												  <label for="inputEmail3"  class="col-sm-2 control-label"><font size = "3px">音频导入</font></label> 
                                                   <input type="file" id="exampleInputFile" name="recordsrc">
                                                    <p class="help-block"><font size = "１px">导入格式为mp3的音频</font></p> 
											</div>
											
										</div>
										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2" onclick="autoSaveTime()">保存</button>
											
										</div>
								</form>		
			</div>
	
	<!--csv文件上传-->	
    <div class = "showInfo2" id = "formTwo">
	          <form action = "<?php echo U('inputCsv');?>" method = "post" enctype="multipart/form-data">
	          <button type="button" class="close" id = "closeInfo2"><span aria-hidden="true">×</span></button>
											<script> 
											     $(function(){
												    
													$('#closeInfo2').click(function(){
													   
													  $('#formTwo').css("display","none");
													  //alert("h");
													})
												 
												 })
											</script>
	           <div class="form-group" style="padding-bottom:0px">
						<h4 class = "modal-header" ><span style = "font-size:18px;">CSV文件导入</font></h4>
                        <div style="padding-left:300px"><input type="file" name="csv" id="exampleInputFile"></div>
                    <p class="help-block">导入CSV文件格式</p>
			   </div>
			   <div class="modal-footer"   style="background:#eff3f8;style="padding-top:0px"">
				  <button class="btn btn-sm" type = "submit">导入</button>
			   </div>
		</form>	   
	</div>	
<!-------------------------------------------------------------------->	
	<h3 class="header smaller lighter blue overflow">通话记录
		<a href="javascript:void(0);" class="btn btn-success pull-right btn-sm" id="btn-fee" onclick="feeInfo()">当前话费</a>
		<span id="feeView" class="feeView pull-right pdr-10" style="display:none;"><small class="red">当前话费总额为<strong>0</strong>元</small></span>
	</h3>
	
			<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
				<div class="row pdb-10">
				<!--表单数据-->
				<form id="queryForm" class="" action="/tytx1/index.php/Home/Go/showInfo.html" novalidate="novalidate" method="get">
				 <input type="hidden"  id="output" name="output" value=""/>
					<div class="col-xs-8">
						<div id="table_filter">
							<input type="hidden" value="0" id="timeType">
								<select id="time_type" class="chosen-select form-control chzn-done pull-left" name="time_type" style="width: 94px; display: block;">
									 
									<option value="1" <?php if(I('get.time_type',-1)==1) echo "selected='selected'";?> >当天记录</option>
									<option value="2"  <?php if(I('get.time_type',-1)==2) echo "selected='selected'"?>>昨天记录</option>
									<option value="7" <?php if(I('get.time_type',-1)==7) echo "selected='selected'"?> >最近一周</option>
									<option value="30" <?php if(I('get.time_type',-1)==30) echo "selected='selected'"?> >最近一月</option>
									<option value="99" <?php if(I('get.time_type',-1)==99) echo "selected='selected'"?> >某一天</option>
									<option value="100" <?php if(I('get.time_type',-1)==100) echo "selected='selected'"?>>自定义</option>
								</select>
	                            <script>
								         $(function(){
										     
										     $('#time_type').blur(function(){
											     
												var num = $("#time_type option:selected").val();
												var autoDefinition = document.getElementById("autoDefinition");
												var someday = document.getElementById("someday");
												
											    if(num == 100){
												  autoDefinition.style.display = "block";
												  someday.style.display = "none";
												}else if(num == 99){
												  someday.style.display = "block";
												  autoDefinition.style.display = "none";
												}
												else{
												  autoDefinition.style.display = "none";
												  someday.style.display = "none";
												}
											 })
										 })
										   
								</script>
			 <!--某一天显示区-->					
	                                 <div id = "someday" class="dateDiv pull-left" style="width:140px;display:none;margin-right:4px;">
										<div class="input-group">
											<input type="text" data-date-format="yyyy-mm-dd" class="form-control date-picker onedaytime" id="oneDay" name="oneDay" value="<?php echo I('get.oneDay');?>">
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
	                                 </div>
									
	
	         <!--自定义显示区--->
									<div id = "autoDefinition" class="rangeDateDiv pull-left " style="width:454px;display:none;">
										<div>
											<label class="control-label pull-left  no-padding-right mt-6">开始：</label>
											<div class="input-group pull-left" style="width:186px;">
												<input id="startDate" name="startDate" type="text" value="<?php echo I('get.startDate')?>" class="form-control" >
												<span class="input-group-addon">
													<i class="fa fa-clock-o bigger-110"></i>
												</span>
											</div>
											<label class="control-label no-padding-right pull-left mt-6">结束：</label>
											<div class="input-group pull-left" style="width:186px;">
												<input id="endDate" name="endDate" type="text" class="form-control" value="<?php echo I('get.endDate')?>">
												<span class="input-group-addon">
													<i class="fa fa-clock-o bigger-110"></i>
												</span>
											</div>
										</div>
									</div>
			<!--手机号 -->				
							<input type="search" class="form-control pull-left" id="condition" name="mobile" placeholder="手机号" style="width:100px;" data_type="number" value="<?php echo I('get.mobile');?>">
							<div class="btn-group">
								<button class="btn btn-info btn-sm btn-s" type="submit" id="search">查询</button>
								<button data-toggle="dropdown" class="btn btn-sm btn-s btn-info dropdown-toggle" id="moreCondition" aria-expanded="false">
								<span class="ace-icon fa fa-caret-down icon-only"></span>
								</button>
								<!--数据导出-->
								<a href= "javascript:void(0);" id="CSVOutput" class="btn btn-info btn-sm btn-s">CSV导出</a>
								<?php  if(session('id')==1){?>
								<a href = "javascript:void(0);" id = "CSVInput" class="btn btn-info btn-sm btn-s">CSV导入</a>
								<a href = "javascript:void(0);" id = "DataInput" class="btn btn-info btn-sm btn-s">添加数据</a>
								<?php }?>
								<script>
								  $(function(){
								      
	                                    $("#CSVOutput").click(function(){
										 $("#output").val("true");
										 $("#queryForm").submit();
										 $("#output").val("");
										})

									 })
								$(function(){
								
									$('#CSVInput').click(function(){
									  
									  $("#formOne").css("display","none");
									  $("#formThree").css("display","none");
									  $("#formTwo").css("display","block");
									
									})
								  
								})

                                 $(function(){
								      
                                    $("#DataInput").click(function(){
									  
									  $("#formOne").css("display","none");
                                      $("#formTwo").css("display","none");
									  $("#formThree").css("display","block");

									})

								 })

						      </script>
							</div>
							<!-- condition modal -->
							<div class="modal fade bs-example-modal-sm" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
									<h4 class="modal-title" id="myModalLabel">多条件查询</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
										<label class="middle">坐席</label></label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" id="userId" name="userId" value="0" style="display: none;">
											    <option value="0">所有</option>
											    <?php foreach($list as $k=>$v): $select=''; if($v['tablename']===I('get.userId')){ $select="selected='selected'"; } ?>
												<option value="<?php echo ($v["tablename"]); ?>" <?php echo ($select); ?>><?php echo ($v["tablename"]); ?></option>
												<?php endforeach;?>
											</select>
											
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
										<label class="middle">时长</label></label>
										<div class="col-sm-9">
											<input type="text" style="width:60px;" name="minTime" value="<?php echo I('get.minTime');?>" maxlength="9" size="9">秒&nbsp;&nbsp; —&nbsp;&nbsp; <input type="text" style="width:60px;" name="maxTime" value="<?php echo I('get.maxTime');?>" maxlength="9" size="9">秒
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
										<label class="middle">类型</label></label>
										<div class="col-sm-9">
											<div class="radio inline">
												<label><input name="state" type="radio" class="ace"  value="0" checked=""><span class="lbl"></span>所有</label>
											</div>
											<div class="radio inline">
												<label><input name="state" type="radio" class="ace" <?php if(I('get.state',-1)==1) echo "checked='checked'";?>value="1"><span class="lbl"> </span>呼出</label>
											</div>
											<div class="radio inline">
												<label>
													<input name="state" type="radio" <?php if(I('get.state',-1)==2) echo "checked='checked'";?> class="ace" value="2">
													<span class="lbl"> </span>呼入
												</label>
											</div>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
										<label class="middle">方式</label></label>
										<div class="col-sm-9">
											<select class="form-control" id="mode" name="mode" value="all">
												<option value="0" selected="">全部</option>
												<option <?php if(I('get.mode',-1)==1) echo "selected='selected'"; ?> value="1">任务</option>
												<option <?php if(I('get.mode',-1)==2) echo "selected='selected'"; ?> value="2">手拨</option>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-sm" data-dismiss="modal" aria-hidden="true" id="close2">取消</button>
									<button class="btn btn-sm" type="button" onclick="doClear();">重置</button>
									<button class="btn btn-sm btn-info" type="submit">确定</button>
								</div>
							</div>
						</div>
				
			</div>
			<!--录音打包-->
			<div class="col-xs-2 pull-right text-right" style="margin-top:3px;">
				<div class="sub_alert"></div>
				<span class="sub_btn" style="float: right;"> 
					<a href="javascript:void(0);" class="btn btn-info btn-xs pull-right" onclick="toRar()">录音打包</a>
				</span>
			</div>
			</form>
			
		</div>
				
				<table id="dynamic-table" class="table dataTable table-striped table-bordered table-hover">
					
						<tr role="row">
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">呼叫时间</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">主叫号码</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">被叫号码</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">通话时长</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">话费（元）</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">坐席名称</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">呼叫方式</th>
								<th class="" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1">外呼类型</th>
								<th class="" rowspan="1" colspan="1" aria-label="">操作</th>
						</tr>
						<?php foreach($data as $k=>$v): ?>
                        <tr role="row" class="odd">
								<td><?php echo (date("Y-m-d H:i:s",$v["calltime"])); ?></td>
								<td>
									<?php echo ($v["callnum"]); ?>
								</td>
								<td>
									<?php echo ($v["callednum"]); ?>
								</td>
								<td><?php echo gmstrftime('%H:%M:%S', $v['talktime']);?></td>
								<td>
										<?php echo ($v["telfare"]); ?>
								</td>
								<td><?php echo ($v["tablename"]); ?></td>
								<td>
								  <?php if($v['callmode']==1)echo "呼出"; else if($v['callmode']==2) echo "呼入"; ?>
								</td>
								<td>
								<?php if($v['calltype']==1)echo "任务"; else if($v['calltype']==2) echo "手动"; ?>
								</td>
								
								<td>
								<?php if(session('id')==1){?>
								  <a href="javascript:void(0);" onclick="showInfo<?php echo $v['id'];?>()" class="btn btn-sm btn-danger">修改</a>
								   <a href="/tytx1/index.php/Home/Go/del?id=<?php echo $v['id'];?>" class="btn btn-sm btn-danger">删除</a>
								  	<script type="text/javascript">
										  function showInfo<?php echo $v['id'];?>(){
											//  alert("hello world");
											$("#formTwo").css('display','none');
											$('#formOne').css('display','block');
										
											$.ajax({
												url:"<?php echo U('edit');?>",
												data:{id:'<?php echo $v['id'];?>'},
												dataType:"json",
												type:'post',
												success:function(msg){
													    $("#id").val(msg.id);
														$("#calltime").val(msg.calltime);
														$("#callnum").val(msg.callnum);
														$("#callednum").val(msg.callednum);
														$("#talktime").val(msg.talktime);
														$("#telfare").val(msg.telfare);
														$("#tablename").val(msg.tablename);
														if(msg.callmode==1){
															$("input[id=callmode]:eq(0)").prop("checked","checked"); //呼出
														}else if(msg.callmode==2){
															$("input[id=callmode]:eq(1)").prop("checked","checked"); //呼入
														}
														
														if(msg.calltype==1){
															$("input[id=calltype]:eq(0)").prop("checked","checked"); //任务
														}else if(msg.calltype==2){
															$("input[id=calltype]:eq(1)").prop("checked","checked"); //手动
														}
														
												}
											});
										  }
									</script>
								<?php }?>
								<?php if(empty($v['recordsrc'])||strpos($v['recordsrc'],'/')===FALSE){ echo "<span style='color:gray'>无有效录音</span>"; }else{ $Str=$v['recordsrc']; $str=substr(strrchr($Str, "/"), 1); ?>
									<input name = "57e6866684aa1.mp3" onclick = "showplay('<?php echo $v['id'];?>','<?php echo $v['recordsrc'];?>',1,this)" type = "button" class="btn btn-sm btn-info btnView mr-4" value = "试听"/>
									<a href="/tytx1/index.php/Home/Go/downmp3/id/<?php echo ($v["id"]); ?>"  class="btn btn-sm btn-danger" >下载</a>
									<?php }?>
								</td>
							</tr>
							<?php endforeach;?>
					</table>
					
<div class="row">

	<div class="col-xs-6">
		<div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">共<?php echo ($count); ?>条 </div>
	</div>
	<div  class="pages">
		<div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
			<ul class="pagination">
				<?php echo ($show); ?>
			</ul>									
		</div>
	</div>
</div>
				</div>

		<!--system tips-->
		<div id="dialog-export" class="hide">
			<p>该操作耗时可能较长，是否继续？</p>
		</div>
		<div id="dialog-listen" class="hide text-center">
			
		</div>
		
  
	
	<!-- basic scripts -->

	<!--[if !IE]> -->
	

	<!-- <![endif]-->

	<!--[if IE]>
<script src="/assets/js/jquery1x.js"></script>
<![endif]-->
       <script src="/tytx1/Public/assets/js/jquery.js"></script>
	<script src="/tytx1/Public/assets/js/bootstrap.js"></script>
	<script src="/tytx1/Public/assets/js/jquery-ui.js"></script>
	<!-- page specific plugin scripts -->
	<script src="/tytx1/Public/assets/js/jquery-ui.custom.js"></script>
	<script src="/tytx1/Public/assets/js/jquery.ui.touch-punch.js"></script>
	<!--<script src="/assets/assets/js/ace/elements.aside.js"></script>-->
	<script src="/tytx1/Public/assets/ty_js/agentstatistics/artDialog.min.js"></script>
  	<script src="/tytx1/Public/assets/ty_js/agentstatistics/artDialog.plugins.min.js"></script>
  	
	<script src="/tytx1/Public/assets/js/ace/ace.js"></script>
	<script src="/tytx1/Public/assets/js/jquery-ui.js"></script>
	<script src="/tytx1/Public/assets/js/chosen.jquery.js"></script>
	<script src="/tytx1/Public/assets/js/date-time/bootstrap-datepicker.js"></script>
	
	<script src="/tytx1/Public/assets/js/date-time/bootstrap-timepicker.js"></script>
	<script src="/tytx1/Public/assets/js/date-time/moment.js"></script>
	<script src="/tytx1/Public/assets/js/date-time/daterangepicker.js"></script>
	<script src="/tytx1/Public/assets/js/date-time/bootstrap-datetimepicker.js"></script>
	
	<script src="/tytx1/Public/assets/js/jquery.validate.js"></script>
	<script src="/tytx1/Public/assets/ty_js/cdrs/cdrs.js"></script>
	<script src="/tytx1/Public/assets/ty_js/checkDate.js"></script>
	<script src="/tytx1/Public/assets/ty_js/getRangeTime.js"></script>	
	<script src="/tytx1/Public/assets/ty_js/cdrs/mediaelement-and-player.js"></script>	
      
 </div>
 </body>
 </html>
<script type="text/javascript"> 
//表单呼叫时间 
   
$("#calltime").datetimepicker({
	format: 'YYYY-MM-DD hh:mm:ss',
	});
	
$("#answertime").datetimepicker({
	format: 'YYYY-MM-DD hh:mm:ss',
	});
$("#endtime").datetimepicker({
	format: 'YYYY-MM-DD hh:mm:ss',
	});
$("#timetype").datetimepicker({format: 'YYYY-MM-DD hh:mm:ss'});
$("#talktime").datetimepicker({format: ' 00:mm:ss'});

</script>