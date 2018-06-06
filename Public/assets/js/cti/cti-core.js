jQuery.namespace("cti");var timerIDs=new Map();cti.TimerObj=function(){this.timerRunning=false;this.second=0;this.minute=0;this.hour=0;this.timeoutObj=null};cti.showTimer=function(A){var B=timerIDs.get(A);if(B==null||B==undefined){B=new cti.TimerObj()}B.second++;if(B.second==60){B.second=0;B.minute+=1}if(B.minute==60){B.minute=0;B.hour+=1}B.timeValue=((B.minute<10)?"0":"")+B.minute;B.timeValue+=((B.second<10)?":0":":")+B.second;if(B.hour>0){B.timeValue=((B.hour<10)?"0":"")+B.hour+":"+B.timeValue}$("#"+A+"Timer").html(B.timeValue);B.timeoutObj=setTimeout("cti.showTimer('"+A+"')",1000);B.timerRunning=true;timerIDs.put(A,B)};cti.stopTimer=function(A){var B=timerIDs.get(A);if(B!=null&&B.timerRunning){B.timerRunning=false;clearTimeout(B.timeoutObj);if(A=="agentState"||A=="line1"||A=="line2"){B.second=0;B.minute=0;B.hour=0;timerIDs.put(A,B)}}B=null;$("#"+A+"Timer").html("")};cti.startTimer=function(A){if(A=="agentState"){cti.stopTimer(A);cti.showTimer(A)}else{var B=timerIDs.get(A);if(B==null||B.timerRunning==false){cti.stopTimer(A);cti.showTimer(A)}}};cti.Agent=function(){this.state="Logout";this.choosedState="Logout";this.reason=-1;this.workingLineNumber=0;this.thisDN="";this.pstnDN="";this.agentID="";this.thisQueues=new Array()};cti.Agent.instance=null;cti.Agent.getInstance=function(){if(cti.Agent.instance==null){cti.Agent.instance=new cti.Agent()}return cti.Agent.instance};cti.Agent.prototype.init=function(A,B,C,D){this.thisDN=A;this.pstnDN=B;this.agentID=C;this.thisQueues=D};cti.Agent.prototype.setState=function(A){this.state=A};cti.Agent.prototype.getState=function(){return this.state};cti.Agent.prototype.setChoosedState=function(A){this.choosedState=A};cti.Agent.prototype.getChoosedState=function(){return this.choosedState};cti.Agent.prototype.setReason=function(A){this.reason=A};cti.Agent.prototype.getReason=function(){return this.reason};cti.Agent.prototype.getWorkingLineNumber=function(){return this.workingLineNumber};cti.Agent.prototype.getThisDN=function(){return this.thisDN};cti.Agent.prototype.getPstnDN=function(){return this.pstnDN};cti.Agent.prototype.getAgentID=function(){return this.agentID};cti.Agent.prototype.getThisQueues=function(){return this.thisQueues};cti.Agent.prototype.updateAgentState=function(B,A){this.setState(B);if(B!="NotReady"){this.setReason(A)}};cti.Agent.prototype.changeAgentState=function(B,A){if(B=="Ready"){if(this.workingLineNumber==0){$("#agentstatDiv").attr("class","agentStat_ready");cti.updateContent("agentState","就绪");if(this.getChoosedState()!=B){this.setChoosedState(B);cti.startTimer("agentState")}}this.setReason(-1)}else{if(B=="NotReady"){if(this.workingLineNumber==0){$("#agentstatDiv").attr("class","agentStat_notReady");if(A==3){cti.updateContent("agentState","示忙")}else{if(A==5){cti.updateContent("agentState","休息")}else{if(A==0){cti.updateContent("agentState","整理")}else{this.setReason(3);cti.updateContent("agentState","示忙")}}}if(this.getChoosedState()!=B){this.setChoosedState(B);cti.startTimer("agentState")}if(this.getReason()!=A){this.setReason(A);cti.startTimer("agentState")}}}else{if(B=="Busy"){this.workingLineNumber+=1;$("#agentstatDiv").attr("class","agentStat_busy");cti.updateContent("agentState","忙碌");if(this.getChoosedState()!=B){this.setChoosedState(B);cti.startTimer("agentState")}}else{if(B=="Idle"){this.workingLineNumber-=1;if(this.workingLineNumber==0){if(this.getState()=="Ready"){$("#agentstatDiv").attr("class","agentStat_ready");cti.updateContent("agentState","就绪");if(this.getChoosedState()!=B){this.setChoosedState(B);cti.startTimer("agentState")}}else{if(this.getState()=="NotReady"){$("#agentstatDiv").attr("class","agentStat_notReady");if(A==3){cti.updateContent("agentState","示忙")}else{if(A==5){cti.updateContent("agentState","休息")}else{if(A==0){cti.updateContent("agentState","整理")}else{this.setReason(3);cti.updateContent("agentState","示忙")}}}if(this.getChoosedState()!=B){this.setChoosedState(B);cti.startTimer("agentState")}}}}}else{if(B=="Logout"){$("#agentstatDiv").attr("class","agentStat_offLine");cti.updateContent("agentState","登出");if(this.getChoosedState()!=B){this.setChoosedState(B);cti.startTimer("agentState")}}}}}}};cti.LineData=function(){this.stateImage="";this.lineState="";this.phoneNumber="";this.callType=-1;this.callId="";this.parties=new Array()};cti.Line=function(){this.MAX_LINES=2;this.lineId=0;this.lineDatas=new Array(this.MAX_LINES)};cti.Line.instance=null;cti.Line.getInstance=function(){if(cti.Line.instance==null){cti.Line.instance=new cti.Line()}return cti.Line.instance};cti.Line.prototype.init=function(){for(var A=0;A<this.MAX_LINES;A++){this.lineDatas[A]=new cti.LineData()}};cti.Line.prototype.getLineData=function(A){return this.lineDatas[A]};cti.Line.prototype.getFreeLine=function(){var A=-1;for(var B=0;B<this.MAX_LINES;B++){if(this.lineDatas[B].callId==""){A=B;break}}if(A==this.MAX_LINES){showMessage("没有空闲线路")}return A};cti.Line.prototype.getTalkingLine=function(){var A=-1;for(var B=0;B<this.MAX_LINES;B++){if(this.lineDatas[B].lineState=="Talking"){A=B;break}}if(A==this.MAX_LINES){showMessage("没有通话线路")}return A};cti.Line.prototype.getLineByCallId=function(A){for(var B=0;B<this.MAX_LINES;B++){if(this.lineDatas[B].callId==A){return B}}};cti.Line.prototype.getLineKey=function(B){var A="";switch(B){case 0:A="line1";break;case 1:A="line2";break}return A};cti.Line.prototype.setCurrentLineId=function(A){this.lineId=A};cti.Line.prototype.getCurrentLineId=function(){return this.lineId};cti.Line.prototype.stateChange=function(H,E,C,I,J,D){var J=D.otherDN;switch(H){case STATUS.IDLE:cti.Agent.getInstance().changeAgentState("Idle");this.lineDatas[E].lineState="";this.lineDatas[E].phoneNumber="";this.lineDatas[E].callType=-1;this.lineDatas[E].callId="";this.lineDatas[E].stateImage="assets/ty_css/cti/img/phone_idle.gif";var F=document.getElementById("callIframe"+I);var G=$("#lastAutoSave").val();var K=parseInt($("#lastAutoSaveTime").val());if(F){F.contentWindow.autoSave(G,K)}dealyReady(G,K);break;case STATUS.DIALING:cti.Agent.getInstance().changeAgentState("Busy");this.lineDatas[E].lineState="Dialing";this.lineDatas[E].phoneNumber=J!=null?J:"";this.lineDatas[E].callType=C;this.lineDatas[E].callId=I;this.lineDatas[E].stateImage="assets/ty_css/cti/img/phone_busy.gif";break;case STATUS.ESTABLISHED:if(I==""||I==null){break}this.lineDatas[E].parties=new Array();this.lineDatas[E].lineState="Talking";this.lineDatas[E].callType=C;this.lineDatas[E].callId=I;this.lineDatas[E].parties.push(J);this.lineDatas[E].phoneNumber=J!=null&&J!="Unknown"?J:"";if(D.otherRole==PARTYROLE.OBSERVABLE){this.lineDatas[E].lineState="Monitoring"}break;case STATUS.RINGING:cti.Agent.getInstance().changeAgentState("Busy");this.lineDatas[E].lineState="Ringing";this.lineDatas[E].callType=C;this.lineDatas[E].callId=I;this.lineDatas[E].phoneNumber=J!=null&&J!="Unknown"?J:"";this.lineDatas[E].stateImage="assets/ty_css/cti/img/phone_busy.gif";break;case STATUS.HELD:this.lineDatas[E].lineState="Hold";break;case STATUS.RETRIEVED:this.lineDatas[E].lineState="Talking";break;default:break}if(E==this.getCurrentLineId()){var A=this.lineDatas[E].phoneNumber.hideNumber();var A=this.lineDatas[E].phoneNumber;var B="";if($("#numberRole").val()=="false"&&!(/#+/.test($("#phoneNumber").val()))){if(/^1\d+/.test(A)){A=A.replace(A.substring(3,7),"####")}else{A=A.replace(A.substring(A.length-4),"####")}$("#phoneNumber").val(A)}if(!$("#phoneNumber").val()||H==2){$("#phoneNumber").val(A)}$("#lineState").html(this.lineDatas[E].lineState);$("#stateImage").attr("src",this.lineDatas[E].stateImage)}};cti.Line.prototype.isPhoneIdle=function(){var A=true;for(var B=0;B<this.MAX_LINES;B++){if(this.lineDatas[B].lineState!=""){A=false;break}}return A};cti.updateContent=function(A,B){$("#"+A).html(B)};cti.indexOf=function(B,A){if(B.length<1){return -1}for(var C=0;C<B.length;C++){if(B[C]==A){return C}}};$(document).ready(function(){cti.Line.getInstance().init()});