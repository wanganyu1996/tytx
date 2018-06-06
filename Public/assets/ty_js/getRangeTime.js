$(function(){
	var timeType=$("#timeType").val();
	if(timeType!="100"){
		getTimeValue(timeType);
	}
	$("#time_type").change(function(){
		if($("#time_type option:selected").val() != '99' && $("#time_type option:selected").val() != '100'){
			getTimeValue($("#time_type option:selected").val());
		}else{
            $("#oneDay").val('');
            $("#startDate").val('');
            $("#endDate").val('');

		}
	});
	$(".onedaytime").change(function(){
		getTimeValue(99);
	});
	$("#startDateTextBox").blur(function(){
		$('#startTime').val($(this).val()+':00.000');
	});
	$("#endDateTextBox").blur(function(){
		$('#endTime').val($(this).val()+':59.999');
	});
	$("#startDate").blur(function(){
		$('#startTime').val($(this).val()+':00.000');
	});
	$("#endDate").blur(function(){
		$('#endTime').val($(this).val()+':59.999');
	});
	$("#one_month").change(function(){
		var date = $(this).val();
		var mindate = getCurrentMonthFirst(date);
		var maxdate = getCurrentMonthLast(date);
		$('#startTime').val(mindate);
		$('#endTime').val(maxdate);
	});

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
function getTimeValue(type){
	var date = new Date();
	if(type == 99){
		date = $('.onedaytime').val();
		$('#startTime').val(date+' 00:00:00.000');
		$('#endTime').val(date+' 23:59:59.999');
		return ;
	}
	if(type == 31){
		/*var date = $("#one_month").val();*/
		var mindate = getCurrentMonthFirst();
		var maxdate = getCurrentMonthLast();
		$('#startTime').val(mindate);
		$('#endTime').val(maxdate);
		return ;
	}
	if(type == 1){
		date.setDate(date.getDate()-1);
	}
	var maxYear = date.getFullYear();
	var maxMonth = date.getMonth()+1;
	var maxDay = date.getDate();
	maxMonth = maxMonth < 10 ? '0'+maxMonth : maxMonth;
	maxDay = maxDay < 10 ? '0'+maxDay : maxDay;
	switch(type){
		case '7':
			date.setDate(date.getDate()-7);break;
		case '30':
			date.setDate(date.getDate()-30);break;
	}
	var minYear = date.getFullYear();
	var minMonth = date.getMonth()+1;
	var minDay = date.getDate();
	minMonth = minMonth < 10 ? '0'+minMonth : minMonth;
	minDay = minDay < 10 ? '0'+minDay : minDay;
	
	$('#startTime').val(minYear+'-'+minMonth+'-'+minDay+' 00:00:00.000');
	$('#endTime').val(maxYear+'-'+maxMonth+'-'+maxDay+' 23:59:59.999');
}

function checkDate(){
	if($("#time_type option:selected").val()== '99'){
		if($(".onedaytime").val() == ''){
			art.alert("时间不能为空");
			return false;
		}
	}
	if($("#time_type option:selected").val()== '31'){
		if($("#one_month").val() == ''){
			art.alert("月份不能为空");
			return false;
		}
	}
	if($("#time_type option:selected").val()== '100'){
		var startDate = new Date($("#startDate").val());
		var endDate = new Date($("#endDate").val());
		if($("#startDate").val() == '' || $("#endDate").val() == ''){
			art.alert("自定义时间不能为空");
			return false;
		}else if(startDate.getTime()> endDate.getTime()){
			art.alert("开始时间不能大于结束时间");
			return false;
		}
	}
	return true;
}

function getCurrentMonthFirst(){
	var date=new Date();
	date.setDate(1);
	var minYear = date.getFullYear();
	var minMonth = date.getMonth()+1;
	var minDay = date.getDate();
	minMonth = minMonth < 10 ? '0'+minMonth : minMonth;
	minDay = minDay < 10 ? '0'+minDay : minDay;
 return minYear+'-'+minMonth+'-'+minDay+' 00:00:00.000';
}

function getCurrentMonthLast(){
	var date=new Date();
	var currentMonth=date.getMonth();
	var nextMonth=++currentMonth;
	var nextMonthFirstDay=new Date(date.getFullYear(),nextMonth,1);
	var oneDay=1000*60*60*24;
	date = new Date(nextMonthFirstDay-oneDay);
	var maxYear = date.getFullYear();
	var maxMonth = date.getMonth()+1;
	var maxDay = date.getDate();
	maxMonth = maxMonth < 10 ? '0'+maxMonth : maxMonth;
	maxDay = maxDay < 10 ? '0'+maxDay : maxDay;
	return maxYear+'-'+maxMonth+'-'+maxDay+' 23:59:59.999';
}