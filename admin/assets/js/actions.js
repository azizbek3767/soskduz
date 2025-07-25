jQuery.cookie=function(b,j,m){if(typeof j!="undefined"){m=m||{};if(j===null){j="";m.expires=-1}var e="";if(m.expires&&(typeof m.expires=="number"||m.expires.toUTCString)){var f;if(typeof m.expires=="number"){f=new Date();f.setTime(f.getTime()+(m.expires*24*60*60*1000))}else{f=m.expires}e="; expires="+f.toUTCString()}var l=m.path?"; path="+(m.path):"";var g=m.domain?"; domain="+(m.domain):"";var a=m.secure?"; secure":"";document.cookie=[b,"=",encodeURIComponent(j),e,l,g,a].join("")}else{var d=null;if(document.cookie&&document.cookie!=""){var k=document.cookie.split(";");for(var h=0;h<k.length;h++){var c=jQuery.trim(k[h]);if(c.substring(0,b.length+1)==(b+"=")){d=decodeURIComponent(c.substring(b.length+1));break}}}return d}};

(function ($) {
    'use strict';
    var Pages = function () {
        this.AUTHOR = "LIFE STYLE";
        this.pageScrollElement = 'html, body';
        this.$body = $('body');
        this.setUserOS();
        this.setUserAgent();
    }
    Pages.prototype.setUserOS = function () {
        var OSName = "";
        if (navigator.appVersion.indexOf("Win") != -1) OSName = "windows";
        if (navigator.appVersion.indexOf("Mac") != -1) OSName = "mac";
        if (navigator.appVersion.indexOf("X11") != -1) OSName = "unix";
        if (navigator.appVersion.indexOf("Linux") != -1) OSName = "linux";
        this.$body.addClass(OSName);
    }
    Pages.prototype.setUserAgent = function () {
        if (navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
            this.$body.addClass('mobile');
        } else {
            this.$body.addClass('desktop');
            if (navigator.userAgent.match(/MSIE 9.0/)) {
                this.$body.addClass('ie9');
            }
        }
    }

    Pages.prototype.getUserAgent = function () {
        return $('body').hasClass('mobile') ? "mobile" : "desktop";
    }

    Pages.prototype.initSidebar = function (context) {
      $('[data-pages="sidebar"]', context).each(function () {
          var $sidebar = $(this)
          $sidebar.sidebar($sidebar.data())
      })
    }

    Pages.prototype.init = function () {
        this.initSidebar();
    }
    $.Pages = new Pages();
    $.Pages.Constructor = Pages;
})(window.jQuery);;


$(document).ready(function(){        
    
    /* PROGGRESS START */
    $.mpb("show",{value: [0,50],speed: 5});        
    /* END PROGGRESS START */
    
    var html_click_avail = true;
    
    $("html").on("click", function(){ if(html_click_avail) $(".x-navigation-horizontal li, .x-navigation-minimized li").removeClass('active'); });        
    $(".x-navigation-horizontal .panel").on("click",function(e){ e.stopPropagation(); });    
    
    /* WIDGETS (DEMO)*/
/*
    $(".widget-remove").on("click",function(){
      $(this).parents(".widget").fadeOut(400,function(){
        $(this).remove();
        $("body > .tooltip").remove();
      });
      return false;
    });
*/
    /* END WIDGETS */
    
    /* Gallery Items */
    $(".gallery-item .iCheck-helper").on("click",function(){
        var wr = $(this).parent("div");
        if(wr.hasClass("checked")){
            $(this).parents(".gallery-item").addClass("active");
        }else{            
            $(this).parents(".gallery-item").removeClass("active");
        }
    });
    $("#gallery-toggle-items").on("click",function(){
        $(".gallery-item").each(function(){
            var wr = $(this).find(".iCheck-helper").parent("div");
            if(wr.hasClass("checked")){
                $(this).removeClass("active");
                wr.removeClass("checked");
                wr.find("input").prop("checked",false);
            }else{            
                $(this).addClass("active");
                wr.addClass("checked");
                wr.find("input").prop("checked",true);
            }
        });
    });
    /* END Gallery Items */

    // XN PANEL DRAGGING
/*
    $( ".xn-panel-dragging" ).draggable({
        containment: ".page-content", handle: ".panel-heading", scroll: false,
        start: function(event,ui){
            html_click_avail = false;
            $(this).addClass("dragged");
        },
        stop: function( event, ui ) {
            $(this).resizable({
                maxHeight: 400,
                maxWidth: 600,
                minHeight: 200,
                minWidth: 200,
                helper: "resizable-helper",
                start: function( event, ui ) {
                    html_click_avail = false;
                },
                stop: function( event, ui ) {
                    $(this).find(".panel-body").height(ui.size.height - 82);
                    $(this).find(".scroll").mCustomScrollbar("update");
                                            
                    setTimeout(function(){
                        html_click_avail = true; 
                    },1000);
                                            
                }
            })
            
            setTimeout(function(){
                html_click_avail = true; 
            },400);            
        }
    });
*/
    // END XN PANEL DRAGGING
    

    jQuery('#navigation_sidebar').scrollbar({
      "autoScrollSize": true,
        "scrollY": $('.external-scroll_y')
    });
    jQuery('.table-responsive').scrollbar({
      "autoScrollSize": true,
        "scrollx": $('.external-scroll_x')
    });
    
    /* DROPDOWN TOGGLE */
    $(".dropdown-toggle").on("click",function(){
        onresize();
    });
    /* DROPDOWN TOGGLE */
    
    /* MESSAGE BOX */
    $(".mb-control").on("click",function(){
        var box = $($(this).data("box"));
        if(box.length > 0){
            box.toggleClass("open");
            var sound = box.data("sound");
            if(sound === 'alert')
                playAudio('alert');
            if(sound === 'fail')
                playAudio('fail');
        }        
        return false;
    });
    $(".mb-control-close").on("click",function(){
       $(this).parents(".message-box").removeClass("open");
       return false;
    });    
    /* END MESSAGE BOX */
    
    /* CONTENT FRAME */
    $(".content-frame-left-toggle").on("click",function(){
        $(".content-frame-left").is(":visible") 
        ? $(".content-frame-left").hide() 
        : $(".content-frame-left").show();
        page_content_onresize();
    });
    $(".content-frame-right-toggle").on("click",function(){
        $(".content-frame-right").is(":visible") 
        ? $(".content-frame-right").hide() 
        : $(".content-frame-right").show();
        page_content_onresize();
    });    
    /* END CONTENT FRAME */
    
    /* MAILBOX */
    $(".mail .mail-star").on("click",function(){
        $(this).toggleClass("starred");
    }); 
    $(".mail-checkall .iCheck-helper").on("click",function(){
        var prop = $(this).prev("input").prop("checked");
        $(".mail .mail-item").each(function(){            
            var cl = $(this).find(".mail-checkbox > div");            
            cl.toggleClass("checked",prop).find("input").prop("checked",prop);                        
        }); 
        
    });
    /* END MAILBOX */
    
    /* PANELS */
    $(".panel-fullscreen").on("click",function(){
        panel_fullscreen($(this).parents(".panel"));
        return false;
    });
    $(".panel-collapse").on("click",function(){
        panel_collapse($(this).parents(".panel"));
        $(this).parents(".dropdown").removeClass("open");
        return false;
    });    
    $(".panel-remove").on("click",function(){
        panel_remove($(this).parents(".panel"));
        $(this).parents(".dropdown").removeClass("open");
        return false;
    });
    $(".panel-refresh").on("click",function(){
        var panel = $(this).parents(".panel");
        panel_refresh(panel);

        setTimeout(function(){
            panel_refresh(panel);
        },3000);
        
        $(this).parents(".dropdown").removeClass("open");
        return false;
    });
    /* EOF PANELS */
    
    /* ACCORDION */
    $(".accordion .panel-title a").on("click",function(){
        
        var blockOpen = $(this).attr("href");
        var accordion = $(this).parents(".accordion");        
        var noCollapse = accordion.hasClass("accordion-dc");
        
        
        if($(blockOpen).length > 0){            
            
            if($(blockOpen).hasClass("panel-body-open")){
                $(blockOpen).slideUp(200,function(){
                    $(this).removeClass("panel-body-open");
                });
            }else{
                $(blockOpen).slideDown(200,function(){
                    $(this).addClass("panel-body-open");
                });
            }
            
            if(!noCollapse){
                accordion.find(".panel-body-open").not(blockOpen).slideUp(200,function(){
                    $(this).removeClass("panel-body-open");
                });                                           
            }
            
            return false;
        }
        
    });
    /* EOF ACCORDION */
    
    /* DATATABLES/CONTENT HEIGHT FIX */
    $(".dataTables_length select").on("change",function(){
        onresize();
    });
    /* END DATATABLES/CONTENT HEIGHT FIX */
    
    /* TOGGLE FUNCTION */
    $(".toggle").on("click",function(){
        var elm = $("#"+$(this).data("toggle"));
        if(elm.is(":visible"))
            elm.addClass("hidden").removeClass("show");
        else
            elm.addClass("show").removeClass("hidden");
        
        return false;
    });
    /* END TOGGLE FUNCTION */
    
    /* MESSAGES LOADING */
    $(".messages .item").each(function(index){
        var elm = $(this);
        setInterval(function(){
            elm.addClass("item-visible");
        },index*300);              
    });
    /* END MESSAGES LOADING */
    
    /* LOCK SCREEN */
    $(".lockscreen-box .lsb-access").on("click",function(){
        $(this).parent(".lockscreen-box").addClass("active").find("input").focus(); 
        return false;
    });
    $(".lockscreen-box .user_signin").on("click",function(){        
        $(".sign-in").show();
        $(this).remove();
        $(".user").hide().find("img").attr("src","assets/images/users/no-image.jpg");
        $(".user").show();
        return false;
    });
    /* END LOCK SCREEN */
    x_navigation();
});

$(function(){            
    onload();
    /* PROGGRESS COMPLETE */
    $.mpb("update",{value: 100, speed: 5, complete: function(){            
      $(".mpb").fadeOut(200,function(){ $(this).remove(); });
    }});
    /* END PROGGRESS COMPLETE */  
});

$(window).resize(function(){
    x_navigation_onresize();
    page_content_onresize();
});

function onload(){
    x_navigation_onresize();    
    page_content_onresize();  
}

function page_content_onresize(){
  $(".page-content, .content-frame-body, .content-frame-right, .content-frame-left").css("width","").css("height","");
  
  var content_minus = 0;
  content_minus = ($(".page-container-boxed").length > 0) ? 40 : content_minus;
  content_minus += ($(".page-navigation-top-fixed").length > 0) ? 50 : 0;
  
  var content = $(".page-content");
  var sidebar = $(".page-sidebar");
  
  if(content.height() < $(document).height() - content_minus){        
    content.height($(document).height() - content_minus);
  }        
  
  if(sidebar.height() > content.height()){        
    content.height(sidebar.height());
  }
  
  if($(window).width() > 1024){
    if($(".page-sidebar").hasClass("scroll")){
      if($("body").hasClass("page-container-boxed")){
        var doc_height = $(document).height() - 40;
      }else{
        var doc_height = $(window).height();
      }
      $(".page-sidebar").height(doc_height);   
    }
    if($(".content-frame-body").height() < $(document).height()-162){
      $(".content-frame-body,.content-frame-right,.content-frame-left").height($(document).height()-162);            
    }else{
      $(".content-frame-right,.content-frame-left").height($(".content-frame-body").height());
    }
    $(".content-frame-left").show();
    $(".content-frame-right").show();
  }else{
    $(".content-frame-body").height($(".content-frame").height()-80);
    if($(".page-sidebar").hasClass("scroll"))
      $(".page-sidebar").css("height","");
  }
  
  if($(window).width() < 1200){
    if($("body").hasClass("page-container-boxed")){
      $("body").removeClass("page-container-boxed").data("boxed","1");
    }
  }else{
    if($("body").data("boxed") === "1"){
      $("body").addClass("page-container-boxed").data("boxed","");
    }
  }
}

/* PANEL FUNCTIONS */
function panel_fullscreen(panel){    
    
    if(panel.hasClass("panel-fullscreened")){
        panel.removeClass("panel-fullscreened").unwrap();
        panel.find(".panel-body,.chart-holder").css("height","");
        panel.find(".panel-fullscreen .fa").removeClass("fa-compress").addClass("fa-expand");        
        
        $(window).resize();
    }else{
        var head    = panel.find(".panel-heading");
        var body    = panel.find(".panel-body");
        var footer  = panel.find(".panel-footer");
        var hplus   = 30;
        
        if(body.hasClass("panel-body-table") || body.hasClass("padding-0")){
            hplus = 0;
        }
        if(head.length > 0){
            hplus += head.height()+21;
        } 
        if(footer.length > 0){
            hplus += footer.height()+21;
        } 

        panel.find(".panel-body,.chart-holder").height($(window).height() - hplus);
        
        
        panel.addClass("panel-fullscreened").wrap('<div class="panel-fullscreen-wrap"></div>');        
        panel.find(".panel-fullscreen .fa").removeClass("fa-expand").addClass("fa-compress");
        
        $(window).resize();
    }
}

function panel_collapse(panel,action,callback){

    if(panel.hasClass("panel-toggled")){        
        panel.removeClass("panel-toggled");
        
        panel.find(".panel-collapse .fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");

        if(action && action === "shown" && typeof callback === "function")
            callback();            

        onload();
                
    }else{
        panel.addClass("panel-toggled");
                
        panel.find(".panel-collapse .fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");

        if(action && action === "hidden" && typeof callback === "function")
            callback();

        onload();        
        
    }
}
function panel_refresh(panel,action,callback){        
    if(!panel.hasClass("panel-refreshing")){
        panel.append('<div class="panel-refresh-layer"><img src="img/loaders/default.gif"/></div>');
        panel.find(".panel-refresh-layer").width(panel.width()).height(panel.height());
        panel.addClass("panel-refreshing");
        
        if(action && action === "shown" && typeof callback === "function") 
            callback();
    }else{
        panel.find(".panel-refresh-layer").remove();
        panel.removeClass("panel-refreshing");
        
        if(action && action === "hidden" && typeof callback === "function") 
            callback();        
    }       
    onload();
}
function panel_remove(panel,action,callback){    
    if(action && action === "before" && typeof callback === "function") 
        callback();
    
    panel.animate({'opacity':0},200,function(){
        panel.parent(".panel-fullscreen-wrap").remove();
        $(this).remove();        
        if(action && action === "after" && typeof callback === "function") 
            callback();
        
        
        onload();
    });    
}
/* EOF PANEL FUNCTIONS */

/* X-NAVIGATION CONTROL FUNCTIONS */
function x_navigation_onresize(){    
    
    var inner_port = window.innerWidth || $(document).width();
    
    if(inner_port < 1025){               
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation li.active").removeClass("active");
            
        $(".x-navigation-horizontal").each(function(){            
            if(!$(this).hasClass("x-navigation-panel")){                
                $(".x-navigation-horizontal").addClass("x-navigation-h-holder").removeClass("x-navigation-horizontal");
            }
        });
        
    }else{        
        if($(".page-navigation-toggled").length > 0){
            x_navigation_minimize("close");
        }       
        
        $(".x-navigation-h-holder").addClass("x-navigation-horizontal").removeClass("x-navigation-h-holder");                
    }
}

function x_navigation_minimize(action){
    
    if(action == 'open'){
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");
        $(".x-navigation-minimize").find(".fa").removeClass("fa-indent").addClass("fa-outdent");
        $(".page-sidebar").css('overflow', 'hidden'); 
        $("#page_sidebar").addClass("scroll-wrapper"); 
        $("#navigation_sidebar").addClass("menu-items");
    }
    
    if(action == 'close'){
        $(".page-container").addClass("page-container-wide");
        $(".page-sidebar .x-navigation").addClass("x-navigation-minimized");
        $(".x-navigation-minimize").find(".fa").removeClass("fa-outdent").addClass("fa-indent");
        $(".page-sidebar").css('overflow', 'inherit');
        $("#page_sidebar").removeClass("scroll-wrapper");
        $("#navigation_sidebar").removeClass("menu-items");
    }
    
    $(".x-navigation li.active").removeClass("active");
    
}

function x_navigation(){
  $(".x-navigation-control").click(function(){
    //$('data-pages="sidebar"')
    $('.page-sidebar-fixed').toggleClass("x-navigation-open");
    $('#page_sidebar').toggleClass("x-navigation-open");
   onresize();
    return false;
  });

  if($(".page-navigation-toggled").length > 0){
    x_navigation_minimize("close");
  }    
    
  $(".x-navigation-minimize").click(function(){
    if($(".page-sidebar .x-navigation").hasClass("x-navigation-minimized")){
      $(".page-container").removeClass("page-navigation-toggled");
      x_navigation_minimize("open");
    }else{            
      $(".page-container").addClass("page-navigation-toggled");
      x_navigation_minimize("close");            
    }
    onresize();
    return false;        
  });
       
  $(".x-navigation li > a").click(function(){  
    var li = $(this).parent('li');        
    var ul = li.parent("ul");
    ul.find(" > li").not(li).removeClass("active");    
  });
    
  $(".x-navigation li").click(function(event){
    event.stopPropagation();
    var li = $(this);
    if(li.children("ul").length > 0 || li.children(".panel").length > 0 || $(this).hasClass("xn-profile") > 0){
      if(li.hasClass("active")){
        li.removeClass("active");
        li.find("li.active").removeClass("active");
      }else
        li.addClass("active");
        onresize();
        if($(this).hasClass("xn-profile") > 0)
          return true;
        else
          return false;
    }                                     
  });
 /*
 $('.x-navigation a').click(function (event) {
       if ($(this).children('.sub-menu') === false) {
            return;
        }
        var el = $(this);
        var parent = $(this).parent().parent();
        var li = $(this).parent();
        var sub = $(this).parent().children('.sub-menu');
        
        if (li.hasClass("xn-openable active")) {
            li.removeClass("active");
            sub.slideUp(200, function() { li.removeClass("active"); });
        } else {
            console.log(parent);
            parent.children('li.xn-openable').children('.sub-menu').slideUp(200);
            parent.children('li.xn-openable').removeClass('active');
            li.addClass("active");
            sub.slideDown(200, function() { li.addClass("active");});
        }
    });
*/
    
  /* XN-SEARCH */
  $(".xn-search").on("click",function(){ $(this).find("input").focus(); })
  /* END XN-SEARCH */
    
}
/* EOF X-NAVIGATION CONTROL FUNCTIONS */

/* СТРАНИЦА О ИЗМЕНЕНИИ ВРЕМЕНИ */
function onresize(timeout){    
    timeout = timeout ? timeout : 200;
    setTimeout(function(){ page_content_onresize(); },timeout);
}
/* EOF PAGE ON RESIZE WITH TIMEOUT */

/* PLAY SOUND FUNCTION */
function playAudio(file){
  if(file === 'alert')
    document.getElementById('audio-alert').play();
  if(file === 'fail')
    document.getElementById('audio-fail').play();    
}
/* END PLAY SOUND FUNCTION */

/* PAGE LOADING FRAME */
function pageLoadingFrame(action,ver){    
    
    ver = ver ? ver : 'v2';
    
    var pl_frame = $("<div></div>").addClass("page-loading-frame");
    
    if(ver === 'v2')
        pl_frame.addClass("v2");
    
    var loader = new Array();
    loader['v1'] = '<div class="page-loading-loader"><img src="img/loaders/page-loader.gif"/></div>';
    loader['v2'] = '<div class="page-loading-loader"><div class="dot1"></div><div class="dot2"></div></div>';
    
    if(action == "show" || !action){
        $("body").append(pl_frame.html(loader[ver]));
    }
    
    if(action == "hide"){
        
        if($(".page-loading-frame").length > 0){
            $(".page-loading-frame").addClass("removed");

            setTimeout(function(){
                $(".page-loading-frame").remove();
            },800);        
        }
        
    }
    
}

/* END PAGE LOADING FRAME */

/* NEW OBJECT(GET SIZE OF ARRAY) */
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
/* EOF NEW OBJECT(GET SIZE OF ARRAY) */
$("#userbox").click(function() { $("#userbox").toggleClass("show");}); 

// мини сайбар 
$('#mini').click(function(){
		var userSidebar = $(this).attr("data-user"); var userSidebarVal = $(this).attr("data-val");
    $.ajax({type: 'POST', async: false, url: "functions.php", data: {userSidebarVal: userSidebarVal, userSidebar: userSidebar}, dataType: 'json', success : function(data){ /* console.log(data.msg); */} });
});



// сортировать картинки в галереи
function sortImage(imageId, sort, url) {
    $.post(url+'.php', { num: sort, imageId: imageId, action: 'sortPictures' }, function(data){
        if (data.update === 1){
            successSortImageMessage();
        }
    }, 'json');
}
// TODO не забыть заметь imageId на id во все пуктах добавление контента
// удаление картинки из галереи
function deletePicture(imageId, url){
    $.post(url+'.php', { imageId: imageId, action: 'deletePicture' }, function(res){
        if (res.del == 1){
            deleteImageMessage();
            $('.item-'+ imageId).addClass("hide");
        } else {
            deleteImageError()
        }
    }, 'json');
}


// удаление картинок из галереи в статьях
$('.delete_image').click(function(){	
    var delAiricleGalId = $(this).attr("data-id");
	console.log($(this).attr("data-id"));
	$.ajax({
  	type: 'POST',
  	url: 'functions.php',
  	data: {delAiricleGalId: delAiricleGalId, delAiricleGalImg: 'deleteImage'},
  	dataType: 'json',
  	cache: false,
  	success: function(response){
      if (response == 1){
       deleteImageMessage()	
       $('.item-'+ delAiricleGalId).addClass("hide");
      } else {
        deleteImageError()	
      }
    }
	});     
});


// удаление картинок из галереи в разделах
$('.remove_image').click(function(){	
	var delSectionGalId = $(this).attr("data-id");
	$.ajax({
      	type: 'POST',
      	url: 'functions.php',
      	data: {delSectionGalId: delSectionGalId, delSectionGalImg: 'deleteImage'},
      	dataType: 'json',
      	cache: false,
      	success: function(response){
        if (response == 1){
            deleteImageMessage();
            $('.item-'+ delSectionGalId).addClass("hide");
        } else {
            deleteImageError();
        }    
	}});     
});
// Рассылка писем
$("#subscribe_send").on('click', function(){
    $.ajax({
        url : 'subscribe.php',
        type: 'POST',
        data : {
            subject: $('#subscribe_subject').val(),
            message: tinymce.get('subscribe_message').getContent(),
            action: 'send'
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data.code === true){
                sendSuccessMessage();
            } else {
                sendErrorMessage();
                console.log(data);
            }
        }
    });
});

// редактор   
/*
tinymce.init({
  selector: '.description',
  height: 400,
  menubar: true,
  schema: "html5",
  language:"ru",
  plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    "searchreplace visualblocks visualchars insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons paste code wordcount"
  ],
  toolbar: " bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | formatselect | link unlink | imageupload media | forecolor backcolor  | preview code | removeformat",
  relative_urls: false,
  remove_script_host: false,
  setup: function(editor) {
    initImageUpload(editor);
  }
});  

function initImageUpload(editor) {
  // создание ввода и вставка в DOM
  var inp = $('<input id="tinymce-uploader" type="file" name="file" accept="image/*" style="display:none">');
  $(editor.getElement()).parent().append(inp);

  // добавьте кнопку загрузить изображение на панель инструментов редактора
  editor.addButton('imageupload', {
    text: '',
    icon: 'image',
    onclick: function(e) { // при нажатии кнопки на панели инструментов открыть файл выбрать модель
      inp.trigger('click');
    }
  });

  // когда выбрали файл, загрузите его на сервер
  inp.on("change", function(e){ uploadFile($(this), editor);});
}

function uploadFile(inp, editor) {
  var input = inp.get(0);
  var data = new FormData();
  data.append('contentImage', input.files[0]);
  
  $.ajax({url: 'functions.php',type: 'POST',dataType: "json",data: data,processData: false,contentType: false, success: function(data) {
      console.log(data);
     
      if (data.code == "200"){
        editor.insertContent('<img class="content-img" src="' + data.url + '">');
         $('.upload-image').removeClass('alert-danger').addClass('alert-success').html(data.msg).fadeIn(1000).fadeOut(3000);	
        } else {
          $('.upload-image').removeClass('alert-success').addClass('alert-danger').html(data.error).fadeIn(1000).fadeOut(3000);	
        }
    }
  });
}  
*/  
  


// idleTime = 0;
// $(document).ready(function () {
//   var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
//
//   $(this).mousemove(function (e) {
//       idleTime = 0;
//   });
//   $(this).keypress(function (e) {
//       idleTime = 0;
//   });
// });



