/**
 * author:ZHL 2011.06.27
**/

jQuery.namespace('cti');

$(document).ready(function(){
	
	cti.getLineIdByName = function(buttonName){
		var lineId = 0;
		if(buttonName === "line1Image"){
			lineId = 0;
		}else if(buttonName === "line2Image"){
			lineId = 1;
		}
		return lineId;
	};
	
	cti.getLineNameById = function(lineId){
		var lineName = "";
		if(lineId === 0){
			lineName = "line1Image";
		}else if(lineId === 1){
			lineName = "line2Image";
		}
		return lineName;
	};
	cti.changeLineState = function(buttonName) {
		if(buttonName == "line1Image"){
			$("#line1Timer").attr("style", "display = ''");
			$("#line2Timer").attr("style", "display = 'none'");
		}
		if(buttonName == "line2Image"){
			$("#line1Timer").attr("style", "display = 'none'");
			$("#line2Timer").attr("style", "display = ''");
		}
		var lineId = cti.getLineIdByName(buttonName);
		var lineData = cti.Line.getInstance().getLineData(lineId);
		$("#phoneNumber").attr("value", lineData.phoneNumber);
		cti.updateContent("lineState", lineData.lineState);
		if(lineData.stateImage!==""){
			$("#stateImage").attr("src", lineData.stateImage);
		}else{
			$("#stateImage").attr("src", "/tytx/Public/assets/ty_css/cti/img/phone_idle.gif");
		}
	};
	
	cti.changeLineButton = function(){
		for(var lineId = 0; lineId < 2; lineId++){
			var isOrNotCurrent = "_off";
			if (cti.Line.getInstance().getCurrentLineId() == lineId){
				isOrNotCurrent = "_on";
			}
			var lineData = cti.Line.getInstance().getLineData(lineId);
			var lineName = cti.getLineNameById(lineId);
			if (lineData.lineState == "Ringing")
				cti.UIManager.getInstance().changeLineButton(lineName, isOrNotCurrent, "_ringing");
			else if (lineData.lineState == "Dialing")
				cti.UIManager.getInstance().changeLineButton(lineName, isOrNotCurrent, "_dialing");
			else if (lineData.lineState == "Talking")
				cti.UIManager.getInstance().changeLineButton(lineName, isOrNotCurrent, "_talking");
			else if (lineData.lineState == "Hold")
				cti.UIManager.getInstance().changeLineButton(lineName, isOrNotCurrent, "_hold");
			else
				cti.UIManager.getInstance().changeLineButton(lineName, isOrNotCurrent, "_idle");
		}
	};
	
	cti.changeCtiButton = function(lineId){
		var lineData = cti.Line.getInstance().getLineData(lineId);
		if (lineData.lineState == "Ringing")
			cti.UIManager.getInstance().changeButtonWhenRinging();
		else if (lineData.lineState == "Dialing")
			cti.UIManager.getInstance().changeButtonWhenDialing();
		else if (lineData.lineState == "Talking")
			cti.UIManager.getInstance().changeButtonWhenTalking(0);
		else if (lineData.lineState == "Hold")
			cti.UIManager.getInstance().changeButtonWhenHold();
		else
			cti.UIManager.getInstance().changeButtonWhenIdle();
		
	};
	
	cti.onCTIClick = function(event) {
		var buttonName = event.data.buttonName;
		if(buttonName=="line1Image"){
			if(cti.Line.getInstance().getCurrentLineId()!=0){
				cti.Line.getInstance().setCurrentLineId(0);
				cti.changeLineButton();
				cti.changeCtiButton(0);
				cti.changeLineState(buttonName);
			}
		}else if(buttonName=="line2Image"){
			if(cti.Line.getInstance().getCurrentLineId()!=1){
				cti.Line.getInstance().setCurrentLineId(1);
				cti.changeLineButton();
				cti.changeCtiButton(1);
				cti.changeLineState(buttonName);
			}
		}else if(buttonName=="dialImage"){
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
			if(lineData.lineState == "Ringing"){
				cti.answerCall(lineId);
			}else if(lineData.lineState == "" && cti.Agent.getInstance().getState() != 'Logout'){
				var phoneNumber = $("#phoneNumber").val();
				cti.makeCall(phoneNumber);
			}
		}else if(buttonName=="disconImage"){
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
			if(lineData.lineState == ""){
				showMessage("当前线路没有电话,无需挂断");
			}else{
				cti.releaseCall(lineId);
			}
			
		}else if(buttonName=="holdImage"){
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
			if(lineData.lineState == "Hold"){
				var phoneNumber = $("#phoneNumber").val();
				cti.retrieveCall(lineId);
			}else if(lineData.lineState == "Talking"){
				cti.holdCall(lineId);
			}
		}else if(buttonName=="transferImage"){
			var phoneNumber = $("#phoneNumber").val();
			
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
            var callingPhoneNumber = lineData.phoneNumber;
            var thisExten = cti.Agent.getInstance().getThisDN().split('_')[1];
            if(callingPhoneNumber == $('#phoneNumber').val()){
                showMessage('不能转接当前正在接通的号码');
            }else if($('#phoneNumber').val() == thisExten){
                showMessage('不能转接自己');
            } else {
                if(lineData.lineState == "Talking"){
                    cti.singleStepTransfer(lineId, phoneNumber);
                }else{
                    showMessage("当前线路未在通话中，不能转接");
                }
            }
		}else if(buttonName=="transferSelfImage"){
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
			var callingPhoneNumber = lineData.phoneNumber;
            var pstn = cti.Agent.getInstance().getPstnDN();
            if(callingPhoneNumber == pstn){
                showMessage('不能转接当前正在接通的号码');
            }else if(pstn == ''){
                showMessage('PSTN不能为空');
            } else {
                if(lineData.lineState == "Talking"){
                    cti.singleStepTransfer(lineId, pstn);
                }else{
                    showMessage("当前线路未在通话中，不能转接");
                }
            }
		}else if(buttonName=="ivrImage"){
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
			cti.transferToIVR(lineId,"","");
		}else if(buttonName=="conferenceImage"){
			var phoneNumber = $("#phoneNumber").val();
			var lineId = cti.Line.getInstance().getCurrentLineId();
			var lineData = cti.Line.getInstance().getLineData(lineId);
			if(lineData.lineState == "Talking"){
				cti.singleStepConference(lineId, phoneNumber);
			}else{
				showMessage("当前线路未在通话中，不能会议");
			}
		}
	};
	
	cti.onCTIMouseOver = function(event) {
		var buttonName = event.data.buttonName;
    	var currentClass = $("#"+buttonName).attr("class");
    	if(currentClass.lastIndexOf("_enabled") > -1){
    		$("#"+buttonName).attr("class", buttonName+"_over");
		}
	};
	
	cti.onCTIMouseOut = function(event) {
		var buttonName = event.data.buttonName;
		var currentClass = $("#"+buttonName).attr("class");
    	if(currentClass.lastIndexOf("_over") > -1){
    		$("#"+buttonName).attr("class", buttonName+"_enabled");
		}
	};
	
	cti.onCTIMouseDown = function(event) {
		var buttonName = event.data.buttonName;
		var currentClass = $("#"+buttonName).attr("class");
		if(buttonName=="dialImage"){
			if(currentClass.lastIndexOf("_over") > -1){
				$("#"+buttonName).attr("class", buttonName+"_down");
			}
			else if(currentClass.lastIndexOf("_flash") > -1 || currentClass.lastIndexOf("_ringing") > -1 || currentClass.lastIndexOf("_dialing") > -1){
				$("#"+buttonName).attr("class", buttonName+"_flash_down");
			}
		}
		else{
			if(currentClass.lastIndexOf("_over") > -1){
				$("#"+buttonName).attr("class", buttonName+"_down");
			}
		}
	};
	
	cti.onCTIMouseUp = function(event) {
		var buttonName = event.data.buttonName;
		var currentClass = $("#"+buttonName).attr("class");
		if(buttonName=="dialImage"){
			if(currentClass.lastIndexOf("_flash_down") > -1){
				$("#"+buttonName).attr("class", buttonName+"_flash");
			}
			else if(currentClass.lastIndexOf("_down") > -1){
				$("#"+buttonName).attr("class", buttonName+"_over");
			}
		}
		else{
			if(currentClass.lastIndexOf("_down") > -1){
				$("#"+buttonName).attr("class", buttonName+"_over");
			}
		}
	};
	
	$("#line1Image").bind('click',{buttonName:'line1Image'},cti.onCTIClick);
	$("#line2Image").bind('click',{buttonName:'line2Image'},cti.onCTIClick);
	
	$("#dialImage").bind('click',{buttonName:'dialImage'},cti.onCTIClick);
	$("#dialImage").bind('mouseover',{buttonName:'dialImage'},cti.onCTIMouseOver);
	$("#dialImage").bind('mouseout',{buttonName:'dialImage'},cti.onCTIMouseOut);
	$("#dialImage").bind('mousedown',{buttonName:'dialImage'},cti.onCTIMouseDown);
	$("#dialImage").bind('mouseup',{buttonName:'dialImage'},cti.onCTIMouseUp);

	$("#disconImage").bind('click',{buttonName:'disconImage'},cti.onCTIClick);
	$("#disconImage").bind('mouseover',{buttonName:'disconImage'},cti.onCTIMouseOver);
	$("#disconImage").bind('mouseout',{buttonName:'disconImage'},cti.onCTIMouseOut);
	$("#disconImage").bind('mousedown',{buttonName:'disconImage'},cti.onCTIMouseDown);
	$("#disconImage").bind('mouseup',{buttonName:'disconImage'},cti.onCTIMouseUp);
	
	$("#holdImage").bind('click',{buttonName:'holdImage'},cti.onCTIClick);
	$("#holdImage").bind('mouseover',{buttonName:'holdImage'},cti.onCTIMouseOver);
	$("#holdImage").bind('mouseout',{buttonName:'holdImage'},cti.onCTIMouseOut);
	$("#holdImage").bind('mousedown',{buttonName:'holdImage'},cti.onCTIMouseDown);
	$("#holdImage").bind('mouseup',{buttonName:'holdImage'},cti.onCTIMouseUp);
	
	$("#transferImage").bind('click',{buttonName:'transferImage'},cti.onCTIClick);
	$("#transferImage").bind('mouseover',{buttonName:'transferImage'},cti.onCTIMouseOver);
	$("#transferImage").bind('mouseout',{buttonName:'transferImage'},cti.onCTIMouseOut);
	$("#transferImage").bind('mousedown',{buttonName:'transferImage'},cti.onCTIMouseDown);
	$("#transferImage").bind('mouseup',{buttonName:'transferImage'},cti.onCTIMouseUp);
	
	$("#transferSelfImage").bind('click',{buttonName:'transferSelfImage'},cti.onCTIClick);
	$("#transferSelfImage").bind('mouseover',{buttonName:'transferSelfImage'},cti.onCTIMouseOver);
	$("#transferSelfImage").bind('mouseout',{buttonName:'transferSelfImage'},cti.onCTIMouseOut);
	$("#transferSelfImage").bind('mousedown',{buttonName:'transferSelfImage'},cti.onCTIMouseDown);
	$("#transferSelfImage").bind('mouseup',{buttonName:'transferSelfImage'},cti.onCTIMouseUp);
	
	$("#ivrImage").bind('click',{buttonName:'ivrImage'},cti.onCTIClick);
    $("#ivrImage").bind('mouseover',{buttonName:'ivrImage'},cti.onCTIMouseOver);
    $("#ivrImage").bind('mouseout',{buttonName:'ivrImage'},cti.onCTIMouseOut);
    $("#ivrImage").bind('mousedown',{buttonName:'ivrImage'},cti.onCTIMouseDown);
    $("#ivrImage").bind('mouseup',{buttonName:'ivrImage'},cti.onCTIMouseUp);
	
	$("#conferenceImage").bind('click',{buttonName:'conferenceImage'},cti.onCTIClick);
	$("#conferenceImage").bind('mouseover',{buttonName:'conferenceImage'},cti.onCTIMouseOver);
	$("#conferenceImage").bind('mouseout',{buttonName:'conferenceImage'},cti.onCTIMouseOut);
	$("#conferenceImage").bind('mousedown',{buttonName:'conferenceImage'},cti.onCTIMouseDown);
	$("#conferenceImage").bind('mouseup',{buttonName:'conferenceImage'},cti.onCTIMouseUp);
	
	//set agent login
	var onDoLogin = function(item) {
    	cti.agentLogin();
  	};
  	
	//set agent not ready
	var onSetNotReady = function() {
		if(cti.Agent.getInstance().getState()=='Logout'){
			showMessage('坐席未登入，不能切换状态');
			return;
		}
		if(cti.Agent.getInstance().getWorkingLineNumber()>0){
			showMessage('坐席正在通话中，禁止切换状态');
			return;
		}
    	cti.agentNotReady();
  	};
  	
  	//set agent not ready with reason
	var onSetNotReadyWithReason = function(reason) {
		if(cti.Agent.getInstance().getState()=='Logout'){
			showMessage('坐席未登入，不能切换状态');
			return;
		}
		if(cti.Agent.getInstance().getWorkingLineNumber()>0){
			showMessage('坐席正在通话中，禁止切换状态');
			return;
		}
    	cti.agentNotReady(reason);
  	};
  	
  	//set agent ready
	var onSetReady = function(item) {
		if(cti.Agent.getInstance().getState()=='Logout'){
			showMessage('坐席未登入，不能切换状态');
			return;
		}
		if(cti.Agent.getInstance().getWorkingLineNumber()>0){
			showMessage('坐席正在通话中，禁止切换状态');
			return;
		}
    	cti.agentReady();
  	};
  	
  	//set agent logout
	var onDoLogout = function() {
		if(cti.Agent.getInstance().getWorkingLineNumber()>0){
			showMessage('坐席正在通话中，禁止切换状态');
			return;
		}
		cti.agentLogout();
  	};
	
	$(document).click(function(){$("#statMenu").hide();});
	
	$("#agentstatDiv").bind('click',function(evt){
		for (i=$("#agentStateTable").get(0).rows.length-1;i>=1; i--){
			$("#agentStateTable").get(0).deleteRow(i);
		}
		var state = cti.Agent.getInstance().getState();
		var reason = cti.Agent.getInstance().getReason();
		var noCurrentImg = "/tytx/Public/assets/ty_css/cti/img/blank.gif";
		var currentImg = "/tytx/Public/assets/ty_css/cti/img/dot.gif";
		$("#agentStateTable").get(0).insertRow(1).insertCell(0).id = "as_ready";
		if(state=='Ready'){
			$("#as_ready").html("<img src='"+currentImg+"' border='0' align='absmiddle'>就绪");
		}else{
			$("#as_ready").html("<img src='"+noCurrentImg+"' border='0' align='absmiddle'>就绪");
		}
		$("#as_ready").addClass("notCurrentMenu").mouseover(function(){
			this.className='currentMenu';
		}).mouseout(function(){
			this.className='notCurrentMenu';
		}).click(function(){
			onSetReady();
		});
		
		/*$("#agentStateTable").get(0).insertRow(2).insertCell(0).id = "as_notready";
		if(state=='NotReady'){
			$("#as_notready").html("<img src='"+currentImg+"' border='0' align='absmiddle'>离席");
		}else{
			$("#as_notready").html("<img src='"+noCurrentImg+"' border='0' align='absmiddle'>离席");
		}
		$("#as_notready").addClass("notCurrentMenu").mouseover(function(){
			this.className='currentMenu';
		}).mouseout(function(){
			this.className='notCurrentMenu';
		}).click(function(){
			onSetNotReady();
		});*/
		$("#agentStateTable").get(0).insertRow(2).insertCell(0).id = "as_notready1";
		if(state=='NotReady' && reason==3){
			$("#as_notready1").html("<img src='"+currentImg+"' border='0' align='absmiddle'>示忙");
		}else{
			$("#as_notready1").html("<img src='"+noCurrentImg+"' border='0' align='absmiddle'>示忙");
		}
		$("#as_notready1").addClass("notCurrentMenu").mouseover(function(){
			this.className='currentMenu';
		}).mouseout(function(){
			this.className='notCurrentMenu';
		}).click(function(){
			onSetNotReadyWithReason(3);
		});
		
		$("#agentStateTable").get(0).insertRow(3).insertCell(0).id = "as_notready2";
		if(state=='NotReady' && reason==5){
			$("#as_notready2").html("<img src='"+currentImg+"' border='0' align='absmiddle'>休息");
		}else{
			$("#as_notready2").html("<img src='"+noCurrentImg+"' border='0' align='absmiddle'>休息");
		}
		$("#as_notready2").addClass("notCurrentMenu").mouseover(function(){
			this.className='currentMenu';
		}).mouseout(function(){
			this.className='notCurrentMenu';
		}).click(function(){
			onSetNotReadyWithReason(5);
		});
		/*modify end.*/
		
		$("#agentStateTable").get(0).insertRow(4).insertCell(0).id="splitTd";
		$("#splitTd").html("<div style='height:1px;background-color:#333333;overflow:hidden'></div>");
		
		if(state=='Logout'){
			$("#agentStateTable").get(0).insertRow(5).insertCell(0).id = "as_login";
			$("#as_login").html("<img src='"+noCurrentImg+"' border='0' align='absmiddle'>登入");
			$("#as_login").addClass("notCurrentMenu").mouseover(function(){
				this.className='currentMenu';
			}).mouseout(function(){
				this.className='notCurrentMenu';
			}).click(function(){
				onDoLogin();
			});
		}else{
			$("#agentStateTable").get(0).insertRow(4).insertCell(0).id = "as_logout";
			$("#as_logout").html("<img src='"+noCurrentImg+"' border='0' align='absmiddle'>登出");
			$("#as_logout").addClass("notCurrentMenu").mouseover(function(){
				this.className='currentMenu';
			}).mouseout(function(){
				this.className='notCurrentMenu';
			}).click(function(){
				onDoLogout();
			});
		}
		$("#statMenu").show();
		if (window.event) {
			window.event.cancelBubble = true;
		} else {
			evt.stopPropagation();
		}
	});
});

cti.UIManager = function(){
	this._initialized = false;
};
	
cti.UIManager.instance = null;

cti.UIManager.getInstance = function(){
	if (cti.UIManager.instance == null) {
		cti.UIManager.instance = new cti.UIManager();
	}
	return cti.UIManager.instance;
};

cti.UIManager.prototype.changeButtonWhenLogin = function(){
	if(!this._initialized){
		this._initialized = true;
		this.changeLineToEnabled("line1Image","_on","_idle");
		this.changeLineToEnabled("line2Image","_off","_idle");
		this.changeToEnabled("dialImage");
	}
};

cti.UIManager.prototype.changeButtonWhenNotReady = function(){
	if(!this._initialized){
		this._initialized = true;
		this.changeLineToEnabled("line1Image","_on","_idle");
		this.changeLineToEnabled("line2Image","_off","_idle");
		this.changeToEnabled("dialImage");
	}
};
					
cti.UIManager.prototype.changeButtonWhenReady = function(){
	if(!this._initialized){
		this._initialized = true;
		this.changeLineToEnabled("line1Image","_on","_idle");
		this.changeLineToEnabled("line2Image","_off","_idle");
		this.changeToEnabled("dialImage");
	}
};

cti.UIManager.prototype.changeButtonWhenLogout = function(){
	this._initialized = false;
	this.changeLineToDisabled("line1Image","_off","_idle");
	this.changeLineToDisabled("line2Image","_off","_idle");
	this.changeToDisabled("dialImage");
};

cti.UIManager.prototype.changeButtonWhenRinging = function(){
	this.changeToRinging("dialImage");
	this.changeToEnabled("disconImage");
	this.changeToDisabled("holdImage");
	this.changeToDisabled("transferImage");
	this.changeToDisabled("transferSelfImage");
	this.changeToDisabled("ivrImage");
	this.changeToDisabled("conferenceImage");
};

cti.UIManager.prototype.changeButtonWhenDialing = function(){
	this.changeToDialing("dialImage");
	this.changeToEnabled("disconImage");
	this.changeToDisabled("holdImage");
	this.changeToDisabled("transferImage");
	this.changeToDisabled("transferSelfImage");
	this.changeToDisabled("ivrImage");
	this.changeToDisabled("conferenceImage");
};

cti.UIManager.prototype.changeButtonWhenTalking = function(campaignType){
	this.changeToTalking("dialImage");
	this.changeToEnabled("disconImage");
	var lineId = cti.Line.getInstance().getCurrentLineId();
	var lineData = cti.Line.getInstance().getLineData(lineId);
	if(lineData.callType == 1){
		this.changeToEnabled("holdImage");
		this.changeToDisabled("transferImage");
		this.changeToDisabled("transferSelfImage");
		this.changeToDisabled("ivrImage");
		this.changeToDisabled("conferenceImage");
	}else if(lineData.callType == 4){
		this.changeToDisabled("holdImage");
		this.changeToDisabled("transferImage");
		this.changeToDisabled("transferSelfImage");
		this.changeToDisabled("ivrImage");
		this.changeToDisabled("conferenceImage");
	}else{
		this.changeToEnabled("holdImage");
		this.changeToEnabled("transferImage");
		this.changeToEnabled("ivrImage");
		if (campaignType==null || campaignType == 0) {
			this.changeToEnabled("conferenceImage");
		}
		if (lineData.callType == 2) {
			this.changeToEnabled("transferSelfImage");
		}
	}
};

cti.UIManager.prototype.changeButtonWhenHold = function(){						
	this.changeToTalking("dialImage");
	//this.changeToDisabled("disconImage");
	this.changeToEnabled("holdImage");
	this.changeToDisabled("transferImage");
	this.changeToDisabled("transferSelfImage");
	this.changeToDisabled("ivrImage");
	this.changeToDisabled("conferenceImage");
};

cti.UIManager.prototype.changeButtonWhenIdle = function(){
	this.changeToEnabled("dialImage");
	this.changeToDisabled("disconImage");
	this.changeToDisabled("holdImage");
	this.changeToDisabled("transferImage");
	this.changeToDisabled("transferSelfImage");
	this.changeToDisabled("ivrImage");
	this.changeToDisabled("conferenceImage");
};

cti.UIManager.prototype.changeToEnabled = function(buttonName){
	var currentClass = $("#"+buttonName).attr("class");
    if(currentClass.lastIndexOf("_enabled") == -1){
    	$("#"+buttonName).attr("class", buttonName+"_enabled");
    	$("#"+buttonName).attr("disabled", false);
    }
};

cti.UIManager.prototype.changeToDisabled = function(buttonName){
	var currentClass = $("#"+buttonName).attr("class");
    if(currentClass.lastIndexOf("_disabled") == -1){
    	$("#"+buttonName).attr("class", buttonName+"_disabled");
    	$("#"+buttonName).attr("disabled", true);
    }
};

cti.UIManager.prototype.changeLineToEnabled = function(buttonName,isCurrent,status){
	var currentClass = $("#"+buttonName).attr("class");
	$("#"+buttonName).attr("class", buttonName+isCurrent+status);
	$("#"+buttonName).attr("disabled", false);
};

cti.UIManager.prototype.changeLineToDisabled = function(buttonName){
	var currentClass = $("#"+buttonName).attr("class");
	$("#"+buttonName).attr("class", buttonName+"_off"+"_disabled");
	$("#"+buttonName).attr("disabled", true);
};

cti.UIManager.prototype.changeLineButton = function(buttonName,isCurrent,status){
	var currentClass = $("#"+buttonName).attr("class");
	$("#"+buttonName).attr("class", buttonName+isCurrent+status);
};

cti.UIManager.prototype.changeToRinging = function(buttonName){
	var currentClass = $("#"+buttonName).attr("class");
    if(currentClass.lastIndexOf("_ringing") == -1){
    	$("#"+buttonName).attr("class", buttonName+"_ringing");
    }
};

cti.UIManager.prototype.changeToDialing = function(buttonName){
	var currentClass = $("#"+buttonName).attr("class");
    if(currentClass.lastIndexOf("_dialing") == -1){
    	$("#"+buttonName).attr("class", buttonName+"_dialing");
    }
};

cti.UIManager.prototype.changeToTalking = function(buttonName){
	var currentClass = $("#"+buttonName).attr("class");
    if(currentClass.lastIndexOf("_talking") == -1){
    	$("#"+buttonName).attr("class", buttonName+"_talking");
    }
};
