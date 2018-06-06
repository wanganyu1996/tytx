$(function() {
	//form validate
	$("form").submit(function(e){
        //$("#search").hide();
        if(checkDate()) {
        //$(this).attr('data-remote','true');
        }else {
            return false;
        }
    });
});
	
//查询日期校验
function checkDate() {
    var flag = true;
    $("input").each(function(){
        if($(this).attr('data_type')!=undefined){
            if(!formvalid(this)){
                flag=false;
                return false;
            }
        }
    });
  return flag;
}

function formvalid(obj){
    if ($(obj).attr('data_type').toLowerCase()=="date_search" && obj.value == '' && !$(obj).is(":hidden")) {
    	art.alert('日期项不能为空！');
        return false;
    }
    if ($(obj).attr('data_type').toLowerCase()=="date_search" && obj.value != '' && !$("#oneDay").is(":hidden") && toDate($(obj).val()) > toDate(getToday())) {
    	art.alert('日期不能大于今天！');
        return false;
    }
    if(!$('#startDate').is(":hidden") && toDate($('#startDate').val()).getTime() > new Date().getTime()){
    	art.alert('开始时间不能大于当前时间！');
        return false;
    }
    if(!$('#endDate').is(":hidden") && toDate($('#endDate').val()).getTime() > new Date().getTime()){
    	art.alert('结束时间不能大于当前时间！');
        return false;
    }
    if(!$('#startDate').is(":hidden") && toDate($('#startDate').val()) > toDate($('#endDate').val())){
    	art.alert('结束时间不能小于开始时间！');
        return false;
    }
    return true;
}

function toDate(date){
	return new Date(date.replace(/\-/g, "\/")); 
}
function getToday(){
	var myDate = new Date();
	return myDate.toLocaleDateString(); 
}