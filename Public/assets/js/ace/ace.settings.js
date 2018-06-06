(function(C,B){C("#ace-settings-btn").on(ace.click_event,function(D){D.preventDefault();C(this).toggleClass("open");C("#ace-settings-box").toggleClass("open")});C("#ace-settings-navbar").on("click",function(){ace.settingFunction.navbar_fixed(null,this.checked)});C("#ace-settings-sidebar").on("click",function(){ace.settingFunction.sidebar_fixed(null,this.checked)});C("#ace-settings-breadcrumbs").on("click",function(){ace.settingFunction.breadcrumbs_fixed(null,this.checked)});C("#ace-settings-add-container").on("click",function(){ace.settingFunction.main_container_fixed(null,this.checked)});C("#ace-settings-compact").on("click",function(){if(this.checked){C("#sidebar").addClass("compact");var D=C("#ace-settings-hover");if(D.length>0){D.removeAttr("checked").trigger("click")}}else{C("#sidebar").removeClass("compact");C("#sidebar[data-sidebar-scroll=true]").ace_sidebar_scroll("reset")}if(ace.vars["old_ie"]){ace.helper.redraw(C("#sidebar")[0],true)}});C("#ace-settings-highlight").on("click",function(){if(this.checked){C("#sidebar .nav-list > li").addClass("highlight")}else{C("#sidebar .nav-list > li").removeClass("highlight")}if(ace.vars["old_ie"]){ace.helper.redraw(C("#sidebar")[0])}});C("#ace-settings-hover").on("click",function(){if(C("#sidebar").hasClass("h-sidebar")){return}if(this.checked){C("#sidebar li").addClass("hover").filter(".open").removeClass("open").find("> .submenu").css("display","none")}else{C("#sidebar li.hover").removeClass("hover");var D=C("#ace-settings-compact");if(D.length>0&&D.get(0).checked){D.trigger("click")}}C(".sidebar[data-sidebar-hover=true]").ace_sidebar_hover("reset");C(".sidebar[data-sidebar-scroll=true]").ace_sidebar_scroll("reset");if(ace.vars["old_ie"]){ace.helper.redraw(C("#sidebar")[0])}});var A=this;C(document).on("settings.ace",function(I,J,D,F,H){var G="";switch(J){case"navbar_fixed":G="ace-settings-navbar";break;case"sidebar_fixed":G="ace-settings-sidebar";break;case"breadcrumbs_fixed":G="ace-settings-breadcrumbs";break;case"main_container_fixed":G="ace-settings-add-container";break}if(G&&(G=document.getElementById(G))){C(G).prop("checked",D);try{if(H==true){ace.settings.saveState(G,"checked")}}catch(E){}}});ace.settingFunction={navbar_fixed:function(D,G,F,E){if(ace.vars["very_old_ie"]){return false}var D=D||"#navbar";if(typeof D==="string"){D=C(D).get(0)}if(!D){return false}var G=G||false;var F=typeof F!=="undefined"?F:true;var I;C(document).trigger(I=C.Event("presettings.ace"),["navbar_fixed",G,D,F]);if(I.isDefaultPrevented()){return false}if(E!==false&&!G){var H=C("#sidebar");if(H.hasClass("sidebar-fixed")){ace.settingFunction.sidebar_fixed(H.get(0),false,F)}}if(G){C(D).addClass("navbar-fixed-top")}else{C(D).removeClass("navbar-fixed-top")}if(F){ace.settings.saveState(D,"class","navbar-fixed-top",G)}C(document).trigger("settings.ace",["navbar_fixed",G,D,F])},sidebar_fixed:function(G,F,E,D){if(ace.vars["very_old_ie"]){return false}var G=G||"#sidebar";if(typeof G==="string"){G=C(G).get(0)}if(!G){return false}var F=F||false;var E=typeof E!=="undefined"?E:true;var I;C(document).trigger(I=C.Event("presettings.ace"),["sidebar_fixed",F,G,E]);if(I.isDefaultPrevented()){return false}if(D!==false){if(F){ace.settingFunction.navbar_fixed(null,true,E)}else{ace.settingFunction.breadcrumbs_fixed(null,false,E)}}var H=C("#menu-toggler");if(F){C(G).addClass("sidebar-fixed");H.addClass("fixed")}else{C(G).removeClass("sidebar-fixed");H.removeClass("fixed")}if(E){ace.settings.saveState(G,"class","sidebar-fixed",F);if(H.length!=0){ace.settings.saveState(H[0],"class","fixed",F)}}C(document).trigger("settings.ace",["sidebar_fixed",F,G,E])},breadcrumbs_fixed:function(G,F,E,D){if(ace.vars["very_old_ie"]){return false}var G=G||"#breadcrumbs";if(typeof G==="string"){G=C(G).get(0)}if(!G){return false}var F=F||false;var E=typeof E!=="undefined"?E:true;var H;C(document).trigger(H=C.Event("presettings.ace"),["breadcrumbs_fixed",F,G,E]);if(H.isDefaultPrevented()){return false}if(F&&D!==false){ace.settingFunction.sidebar_fixed(null,true,E)}if(F){C(G).addClass("breadcrumbs-fixed")}else{C(G).removeClass("breadcrumbs-fixed")}if(E){ace.settings.saveState(G,"class","breadcrumbs-fixed",F)}C(document).trigger("settings.ace",["breadcrumbs_fixed",F,G,E])},main_container_fixed:function(D,F,H){if(ace.vars["very_old_ie"]){return false}var F=F||false;var H=typeof H!=="undefined"?H:true;var D=D||"#main-container";if(typeof D==="string"){D=C(D).get(0)}if(!D){return false}var E;C(document).trigger(E=C.Event("presettings.ace"),["main_container_fixed",F,D,H]);if(E.isDefaultPrevented()){return false}var G=C("#navbar-container");if(F){C(D).addClass("container");C(G).addClass("container")}else{C(D).removeClass("container");C(G).removeClass("container")}if(H){ace.settings.saveState(D,"class","container",F);if(G.length!=0){ace.settings.saveState(G[0],"class","container",F)}}if(navigator.userAgent.match(/webkit/i)){C("#sidebar").toggleClass("menu-min");setTimeout(function(){C("#sidebar").toggleClass("menu-min")},10)}C(document).trigger("settings.ace",["main_container_fixed",F,D,H])}}})(jQuery);