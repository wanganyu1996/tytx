//dialog init
$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
	_title: function(title) {
		var $title = this.options.title || '&nbsp;'
		if (("title_html" in this.options) && this.options.title_html == true)
			title.html($title);
		else title.text($title);
	}
}));

$(function() {
	//时间查询加载默认值
	var value=$("#timeType").val();
	$("#time_type option[value="+value+"]").attr("selected", true);
	if ($("#time_type option:selected").val() == 99) {
		//某一天
		$(".dateDiv").show();
		$(".rangeDateDiv").hide();
	} else if ($("#time_type option:selected").val() == 100) {//自定义
		$(".rangeDateDiv").show();
		$(".dateDiv").hide();
	} else {
		$(".dateDiv").hide();
		$(".rangeDateDiv").hide();
	}
	
	//时间查询
	$("#time_type").change(function() {
		if ($("#time_type option:selected").val() == 99) {
			//某一天
			$(".dateDiv").show();
			$(".rangeDateDiv").hide();
		} else if ($("#time_type option:selected").val() == 100) {//自定义
			$(".rangeDateDiv").show();
			$(".dateDiv").hide();
		} else {
			$(".dateDiv").hide();
			$(".rangeDateDiv").hide();
		}
	});
	
	//时间初始化
	$('.date-picker').datepicker({
		language: "cn",
		autoclose: true,
		todayHighlight: true,
		startDate: -Infinity
	}).next().on(ace.click_event, function() {
		$(this).prev().focus();
	});
		
	//更多选择条件
	$("#moreCondition").on('click', function() {
		$("#formModal").modal("show");
	});
	
	//更多选择条件--坐席
	$("#userId").change(function(){
		$("#userId").attr("value",$("#userId option:selected").val());
	});
	
	//更多选择条件--radio click event
	$("input[type='radio']").click(function(){
		$("#callType").val($(this).val());
	});
	
	//更多选择条件--select change event
	$("#mode").on("change",function(){
		$("#mode").attr("value",$("#mode option:selected").val());
	})
			
	//chosen
	$('.chosen-select').chosen({
		allow_single_deselect: true
	});
	$("#userId_chosen").css("width",'100%');
	$(".chosen-container").addClass("pull-left");
	
	//时间精确到分
	$('#startDate').datetimepicker({
		 format: 'YYYY-MM-DD HH:mm',//use this option to display seconds
		 icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-arrows ',
			clear: 'fa fa-trash',
			close: 'fa fa-times'
		 }
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	$('#endDate').datetimepicker({
		 format: 'YYYY-MM-DD HH:mm',//use this option to display seconds
		 icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-arrows ',
			clear: 'fa fa-trash',
			close: 'fa fa-times'
		 }
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	
});

//录音打包
function toRar() {
	
	var dialog = $("#dialog-export").removeClass('hide').dialog({
		modal: true,
		position: {
			my: "center top+50",
			at: "center top+50",
			of: window
		},
		title: "<div class='widget-header widget-header-small'><h4 class='smaller'>系统提示</h4></div>",
		title_html: true,
		buttons: [{
			text: "取消",
			"class": "btn btn-minier",
			click: function() {
				$(this).dialog("close");
			}
		}, {
			text: "确定",
			"class": "btn btn-primary btn-minier",
			click: function() {
				$(this).dialog("close");
				//打包
				var time_type = $("#time_type").val();
		        var d_time = new Array();
		        if(time_type=='30'){
		            art.alert('单次打包内容不可超过一周!');
		            return;
		        } else if(time_type=='100') {
		            var d1 = $("#startDate").val();
		            var d2 = $("#endDate").val();
		            if((new Date(d2).getTime() - new Date(d1).getTime())>=7*24*3600*1000){
		                art.alert('单次打包内容不可超过一周!');
		                return;
		            }
		        }else if(time_type=='99'&&$('#oneDay').val()==''){
		        	 art.alert('请选择日期!');
		                return;
		        }
		       
		        $(".sub_btn").fadeOut("normal",function(){
		            $(".sub_alert").fadeIn("normal");
		        });
		        var data = $('#queryForm').serialize();
		        $.post("../go/outPutRar", data, function(data){
		        	 ajaxobj=eval("("+data+")"); 
		            if(ajaxobj.success==true){
		            	$(".sub_alert").text("打包成功！请到打包历史中下载。");
		            }else{
		                $(".sub_alert").text(ajaxobj.msg);
		            }
		        });
			}
		}]
	});
}

function feeInfo(){
	$("#btn-fee").hide();
	$("#feeView").show();
	return false;
}

//试听
function showplay(tenantId,fileName,flag,ele){
	
	$.ajax({
		type : 'GET',
		url : '/test_tytx/index.php/Home/Go/showPlay',
		data : {
			tenantId : tenantId,
			fileName:fileName
		},
		dataType : 'json',
		async : false,
		success : function(data) {
			if (data.success == false) {
				art.alert(data.msg);
			}else{
				if(flag!=''&&flag==1){
					
					var _html = '<audio  id="player" autoplay="autoplay" controls>'+
					'<source src="/test_tytx/Public/Uploads/'+data.recordsrc+'" />'+
					'</audio>';
					var dialog = $("#dialog-listen").removeClass('hide').dialog({
						modal: true,
						position: {
							my: "center top+50",
							at: "center top+50",
							of: window
						},
						width:440,
						height:200,
						title: "<div class='widget-header widget-header-small'><h4 class='smaller'>试听</h4></div>",
						title_html: true,
						buttons: [{
							text: "关闭",
							"class": "btn btn-minier",
							click: function() {
								$(this).dialog("close");
								var player = new MediaElementPlayer('#player');
								player.pause();
							}
						}]
					}).html(_html);
					$('audio').mediaelementplayer();
					$('#dialog-listen').bind('dialogclose', function(event, ui) {
						var player = new MediaElementPlayer('#player');
						player.pause();
					});
				}else{
					$(ele).attr("href",data.objects.fileUrl);
				}
			}
		}
	});
}

function doClear(){
	//呼叫类型
    $("input[name='state']").removeAttr("checked");
    //呼叫类型隐藏域
    $("#callType").attr("value","1");
    //坐席
    $("#userId option[value='0']").attr("selected",true);
    $("select[name='userId']").trigger("chosen:updated"); 
    //呼叫方式
    $("select[name='mode']").find('option').removeAttr("selected");
    $("select[name='mode']").trigger("liszt:updated");
    $("#mode").val("all");
    //通话时长
    $("input:text").val('');
}

jQuery.validator.addMethod("num", function(value, element) {
	return this.optional(element) || /^\d+$/.test(value);
}, "请输入数字！")

//表单验证
$('#queryForm').validate({
	errorElement: 'div',
	errorClass: 'help-block',
	focusInvalid: false,
	ignore: "",
	rules: {		
		"minTime":{
			"num":"required"
		},
		"maxTime":{
			"num":"required"
		}		
	},
	messages: {		
	},
	highlight: function(e) {
		$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
	},
	success: function(e) {
		$(e).closest('.form-group').removeClass('has-error'); //.addClass('has-info');
		$(e).remove();
	},
	errorPlacement: function(error, element) {
		if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
			var controls = element.closest('div[class*="col-"]');
			if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
			else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
		} else if (element.is('.select2')) {
			error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
		} else if (element.is('.chosen-select')) {
			error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
		} else if(element.is('input[name=minLength]') || element.is('input[name=maxLength]')) {
			error.insertAfter(element);
		}else error.insertAfter(element.parent());
	},
	submitHandler: function(form) {
		console.log('success');
		return true;
	},
	invalidHandler: function(form) {
		console.log("error");
	}
});