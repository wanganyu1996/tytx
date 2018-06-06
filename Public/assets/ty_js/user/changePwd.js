$(function() {
$('#changePwd').validate({
	errorElement: 'div',
	errorClass: 'help-block',
	focusInvalid: false,
	ignore: "",
	rules: {	
		"pwd": {
			required: true
		},
		"encryptedPassword": {
			required: true,
			equalTo: "#pwd"
		}
	},
	messages: {
		"pwd": {
			required: "请输入密码",
		},
		"encryptedPassword": {
			required: "请再次输入密码",
			equalTo: "两次输入密码不一致"
		}
	},
	highlight: function(e) {
		$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
	},
	success: function(e) {
		$(e).closest('.form-group').removeClass('has-error'); // .addClass('has-info');
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
		} else error.insertAfter(element.parent());
	},
	submitHandler: function(form) {
		console.log('success');
		form.submit();
	},
	invalidHandler: function(form) {
		console.log("error");
		return false;
	}
});


$("#change").click(function () {	
    var newPwd = $("#newPwd").val();  
    var repeatPwd = $("#repeatPwd").val();
    var userName=$("#username").val();

    if (newPwd == "" || newPwd == null || newPwd.length<6) {
        $("#newPassword").html("密码长度至少6位");
    } else {
    	if(newPwd != repeatPwd){    		
    		$("#repeatPassword").html("两次密码不一致");
    		$("#newPassword").hide();
    	} else{
    	
    		 $.ajax({
                 type: "get",
                 url: "/tytx/index.php/Home/index/changePwd",
                 async: true,
                 data: {
                 	newPwd: newPwd,
                 	username:userName
                 },
                 dataType: 'json',
                 success: function (data) {               	 
                	 $("#formModal").modal('hide');
                     //art.alert("密码修改成功");
                	 art.alert(data.msg);
                     $("#newPwd").val("");
                 	 $("#repeatPwd").val("");
                 	 $("#username").val("");
                 	 window.location.reload();//刷新当前页面.
                 	 //history.go(0);
                 },
                 error: function (data) {
                     console.info("错误链接");
                 },
             });
    		
    	}
}
    

});


});

//重置
function doClear(){
	$("#newPwd").val("");
	$("#repeatPwd").val("");
}
