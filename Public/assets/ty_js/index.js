var tabpanel;
var dns = '';
//跑马灯刷新时间
var refreshTime = $('#refreshTime').val()*100000;
if (refreshTime == null || refreshTime == undefined || refreshTime == '') {
	refreshTime = 500000;
}
$(function() {
	tabpanel = new TabPanel(
			{
				renderTo : 'tab',
				autoResizable : false,
				height : $(window).height() - 210,
				border : 'none',
				active : 0,
				maxLength : 11,
				items : [ {
					id : 'myIndex',
					title : '我的首页',
					html : '<iframe id="homeIframe" src="/contacts/announcements/welcome" width="100%" height="100%" frameborder="0"></iframe>',
					closable : false
				} ]
			});
	var restOfDays=$("#restOfDays").val();
	if(restOfDays!='null'){
		$("#pwdModalBill").modal("show");
		$("#pwdModal").modal("hide");
	}
	
	//租户管理员登录余额不足提醒
	else if($("#balance").length>0){
		var balance=$("#balance").val();
		if(balance<=200){
			$("#pwdModal").modal("show");
			$("#pwdModalBill").modal("hide");
		}
	}
	
	var tenant_id=$("#currentUserTenantId").val();
	var customServiceUrl=$("#customServiceUrl").val();
	$.ajax({
		url:customServiceUrl+'/api/get_staffs?tenant_id='+tenant_id,
		type:'get',
		success:function(data){
			var msg = data.data;
			
			/*if(msg.salesman){
				$(".telcon .telcon-group:eq(0) p").html('<span class="name">'+data.data.salesman.name+'</span><span class="phoneNumber">'+data.data.salesman.telephone+'</span>')
			}else{
				$(".telcon .telcon-group:eq(0) p").html('信息未配置')
			};
			if(msg.technician){
				$(".telcon .telcon-group:eq(1) p").html('<span class="name">'+data.data.technician.name+'</span><span class="phoneNumber">'+data.data.technician.telephone+'</span>')
			}else{
				$(".telcon .telcon-group:eq(1) p").html('信息未配置')
			};
			if(msg.service){
				$(".telcon .telcon-group:eq(2) p").html('<span class="name">'+data.data.service.name+'</span><span class="phoneNumber">'+data.data.service.telephone+'</span>')
			}else{
				$(".telcon .telcon-group:eq(2) p").html('信息未配置')
			};
			*/
			if(data.code == 404 || data.code==1000){
				return false;
			}
			if(msg.salesman.name && msg.salesman  ){
				$(".contact:eq(0) h3 .name").html(data.data.salesman.name);
				var strHtml = '<p>手机：<span>'+data.data.salesman.cellphone+'</span></p>'
				+'<p>分机：<span>'+data.data.salesman.telephone+'</span></p>'
				+'<p>QQ：<span>'+data.data.salesman.qq+'</span></p>'
				+'<p>邮箱：<span>'+data.data.salesman.email+'</span></p>';
				$(".contact:eq(0) .existDiv").html(strHtml);
				
			}else {
				$(".contact:eq(0) h3 .name").html("信息未配置");
			};
			if(msg.technician.name && msg.technician){
				$(".contact:eq(2) h3 .name").html(data.data.technician.name);
				var strHtml = '<p>手机：<span>'+data.data.technician.cellphone+'</span></p>'
				+'<p>分机：<span>'+data.data.technician.telephone+'</span></p>'
				+'<p>QQ：<span>'+data.data.technician.qq+'</span></p>'
				+'<p>邮箱：<span>'+data.data.technician.email+'</span></p>';
				$(".contact:eq(2) .existDiv").html(strHtml);
				
			}else {
				$(".contact:eq(2) h3 .name").html("信息未配置");
			};
			if(msg.service.name && msg.service){
				$(".contact:eq(1) h3 .name").html(data.data.service.name);
				var strHtml = '<p>手机：<span>'+data.data.service.cellphone+'</span></p>'
				+'<p>分机：<span>'+data.data.service.telephone+'</span></p>'
				+'<p>QQ：<span>'+data.data.service.qq+'</span></p>'
				+'<p>邮箱：<span>'+data.data.service.email+'</span></p>';
				$(".contact:eq(1) .existDiv").html(strHtml);
			}else {
				$(".contact:eq(1) h3 .name").html("信息未配置");
			};
		}
	});

});

function doClick(element, id, code, title, url) {
	$("#sidebar .nav").find("li .submenu li").removeClass("active");
	$(element).parent("li").addClass("active");
	$(element).parent().parent().parent().addClass("active").siblings()
			.removeClass("active").removeClass("open").find(".submenu").hide();
	var position = tabpanel.getTabPosision(id);
	if (tabpanel.tabs.length < 11) {
		if (typeof position == 'string') {
			tabpanel
					.addTab({
						id : id,
						title : title,
						html : '<iframe id="callIframe'
								+ code
								+ '" src="'
								+ url
								+ '" width="100%" height="100%" frameborder="0"></iframe>',
						closable : true
					})
			var _h = 860;
			$("iframe").attr("height", _h);
			$("#tab,tabpanel,.tabpanel_content").css("height", _h);
		} else {
			if (code == 'Announcement' || code == 'TodoList'
					|| code == 'Account' || code == 'ContactHistory') {
				tabpanel.kill(position);
				tabpanel
						.addTab({
							id : id,
							title : title,
							html : '<iframe id="callIframe'
									+ code
									+ '" src="'
									+ url
									+ '" width="100%" height="100%" frameborder="0"></iframe>',
							closable : true
						})
				var _h = 860;
				$("iframe").attr("height", _h);
				$("#tab,tabpanel,.tabpanel_content").css("height", _h);
			} else {
				if (code != 'Monitor')
					tabpanel.refresh(position);
				tabpanel.show(position);
			}
		}
	} else {
		showMessage("当前已打开较多的页面,请先关闭一些!");
	}
}
function monitor() {
	if (dns != '') {
		cti.stopAgentsMonitoring(dns);
		dns = '';
	}
}

function horse(element, type, id) {
	if (type)
		doClick(element, '43', 'TodoList', '待办事项', '/contacts/todolists/' + id);
	else
		doClick(element, '44', 'Announcement', '公告管理',
				'/contacts/announcements/' + id);
}
// 公告管理--更多
function toAnns(element) {
	doClick(element, '44', 'Announcement', '公告管理', '/contacts/announcements');
}

// 代办事项--更多
function toDolists(element) {
	doClick(element, '43', 'TodoList', '我的待办', '/contacts/todolists');
}

// 子页面调用时使用parent.cancel()
function cancel() {
	var id = tabpanel.getActiveTab().id;
	tabpanel.kill(id);
	document.body.scrollTop = 0;
}
function cancel1() {// 子页面调用时使用parent/top.cancel()
	var id = tabpanel.getActiveTab().id;
	tabpanel.kill(id);
	document.body.scrollTop = 0;
}

function todo(element, type, id) {
	$("#li_" + id).remove();
	do_count();
	top.horse(element, type, id);
	document.body.scrollTop = 0;

}
$.fn.textScroll = function() {
	var speed = 60, flag = null, tt, that = $(this), child = that.children();
	var p_w = that.width(), w = child.width();
	child.css({
		left : p_w
	});
	var t = (w + p_w) / speed * 1000;
	function play(m) {
		var tm = m == undefined ? t : m;
		child.animate({
			left : -w
		}, tm, "linear", function() {
			$(this).css("left", p_w);
			play();
		});
	}
	child.on({
		mouseenter : function() {
			var l = $(this).position().left;
			$(this).stop();
			tt = (-(-w - l) / speed) * 1000;
		},
		mouseleave : function() {
			play(tt);
			tt = undefined;
		}
	});
	play();
}
function getTextScroll() {
	$.ajax({
		url : "/contacts/indexMessage",
		method : 'get',
		data : {},
		success : function(data) {
			var todo = data.objects.todo;
			var announcement = data.objects.announcement;
			if (todo != null) {
				$('#todo').html(todo);
			}
			if (announcement != null) {
				$('#announcement').html(announcement);
			}
			$("#tipscon").textScroll();
		},
		error : function() {
			console.log("request error")
		}
	});
}

setInterval(getTextScroll(), refreshTime)
//设置弹屏自动保存时间的js
function autoSaveTime(){
	var autoSaveTime=$('#autoSaveTime').val();
	var autoSave=$('#enableAutoSave').is(':checked');
	var ex = /^[0-9]*[1-9][0-9]*$/ ; 
	var lastAutoSave=false;
	if('true'==$('#lastAutoSave').val()){
		lastAutoSave=true;
	}
	//如果填写的是数字并且勾选了启用，点击关闭时向远端服务器发起保存的请求
	if(autoSaveTime!=undefined&&!isNaN(autoSaveTime)){
		//如果有更改的话
		var url='/admin/users/updateAutoSaveTime';
		if($('#lastAutoSaveTime').val()!=autoSaveTime||lastAutoSave!=autoSave){
			//判断数据是否符合规范
			if(ex.test(autoSaveTime)){
				$.ajax({
					type : 'POST',
					url : url,
					data : {
						userId:$('#currentUserId').val(),
						autoSaveTime:autoSaveTime,
						autoSave:autoSave
					},
					dataType : 'json',
					async : false,
					success : function(data) {
						if (data.success == false) {		
							art.alert(data.msg);
						}else{
							art.alert('更新成功！');
							$('#lastAutoSaveTime').val(autoSaveTime);
							$('#currentUserId').val(autoSaveTime);
							$('#lastAutoSave').val(autoSave);
						}
					}
				});
			}else{
				reset($('#lastAutoSave').val(),$('#lastAutoSaveTime').val());
				art.alert('请填写符合规范的正整数！');
			}
		}
	}else{
		reset($('#lastAutoSave').val(),$('#lastAutoSaveTime').val());
		art.alert('请填写符合规范的正整数！');
	}
}
function reset(autoSave,autoSaveTime){
	$('#autoSaveTime').val($('#lastAutoSaveTime').val());
	if(autoSave){
		$('#enableAutoSave').prop("checked",true); 
	}else{
		$('#enableAutoSave').prop("checked",false);
	}
}
// 弹屏中 保存并就绪时调用的修改坐席状态的方法
function ready() {
	cti.agentReady();
	$("#phoneNumber").focus();
}
function dealyReady(isAutoSave,autoSaveTime) {
	if(isAutoSave!=undefined&&isAutoSave=='true'&&!isNaN(autoSaveTime)){
		setTimeout("ready()",autoSaveTime*1000);
	}	
}