if(window.parent.length>0)
{
	window.top.location=self.document.location
}
if(!!window.ActiveXObject||"ActiveXObject" in window)
{
	$(".browserTips").show()
}
else{
	$(".browserTips").hide()
}

$(function(){
//	var B=$.cookie("tenantCode");
//	var A=$.cookie("agentName");
//	if(B!=undefined)
//	{
//		$("#tenantCode").val(B)
//	}
//	if(A!=undefined)
//	{
//		$("#agentName").val(A)
//	}
});

function login(){
	var A=false;
	if($("#tenantCode").val()=="")
	{
		$(".error").html("企业编号不能为空！");
		return false
	}else
	{
		if($("#agentName").val()=="")
		{
			$(".error").html("员工编号不能为空！");
			return false
		}
		else{
			if($("#password").val()=="")
			{
				$(".error").html("登录密码不能为空！");
				return false
			}else{
				if($("#loginCode").val()=="")
				{
					$(".error").html("验证码不能为空！");return false
				}
				else{
					$(".error").html("");
					$.ajax({
						type:"POST",
						url:"../login/login",
						data:$("#formLogin").serialize(),
						dataType:"json",
						async:false,
						success:function(B){
							if(B.success==false){
								$(".error").html(B.msg);
								if(B.success==false){
									resetImg();
									$("#loginCode").val("")
								}
								A=false
							}else{
//								$.cookie("tenantCode",$("#tenantCode").val(),{path:"/login"});
//							    $.cookie("agentName",$("#agentName").val(),{path:"/login"});
								A=true
								}
							}
						})
				}
			}
		}
	}
return A
}

$("#tenantCode").blur(function(){
	$(".error").html("");
	$.ajax({
		type:"POST",
		url:"../login/login",
		data:$("#formLogin").serialize(),
		dataType:"json",
		async:false,
		success:function(A){
			if(A.success==false){
				$(".error").html(A.msg);
				result=false
			}else{
				result=true
			}
		}
	})
});

function resetImg(){
	var A="../login/loginImage";
	$("#loginImg").attr("src",A)
};