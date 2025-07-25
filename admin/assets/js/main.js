$(function() {

  var formElements = function(){                
    var feDatepicker = function(){                        
      if($(".datepicker").length > 0){
        $(".datepicker").datepicker({format: 'yyyy-mm-dd'});                
        $("#dp-2,#dp-3,#dp-4").datepicker(); // Sample
      }           
    }// END Bootstrap datepicker
        
    var feTimepicker = function(){
      if($(".timepicker").length > 0) $('.timepicker').timepicker();
      if($(".timepicker24").length > 0) $(".timepicker24").timepicker({minuteStep: 5,showSeconds: true,showMeridian: false});
    }// END Bootstrap timepicker
        
    var feDaterangepicker = function(){
      if($(".daterange").length > 0) $(".daterange").daterangepicker({format: 'YYYY-MM-DD',startDate: '2013-01-01',endDate: '2013-12-31'});
    } // END Daterangepicker
        
    var feSelect = function(){
      if($(".select").length > 0){
        $(".select").selectpicker();
        $(".select").on("change", function(){
          if($(this).val() == "" || null === $(this).val()){
            if(!$(this).attr("multiple"))
            $(this).val("").find("option").removeAttr("selected").prop("selected",false);
          }else{
            $(this).find("option[value="+$(this).val()+"]").attr("selected",true);
          }
        });
      }
    }//END Bootstrap select
        
    //Validation Engine
    var feValidation = function(){
      if($("form[id^='validate']").length > 0){
        var prefix = "valPref_";
        $("form[id^='validate'] .select").each(function(){
          $(this).next("div.bootstrap-select").attr("id", prefix + $(this).attr("id")).removeClass("validate[required]");
        });
        $("form[id^='validate']").validationEngine('attach', {
          promptPosition : "bottomLeft", 
          scroll: false,
          onValidationComplete: function(form, status){
            form.validationEngine("updatePromptsPosition");
          },
          prettySelect : true,
          usePrefix: prefix 
        });              
      }
    }//END Validation Engine
        
    var feMasked = function(){            
      if($("input[class^='mask_']").length > 0){
        $("input.mask_tin").mask('99-9999999');
        $("input.mask_ssn").mask('999-99-9999');        
        $("input.mask_date").mask('9999-99-99');
        $("input.mask_product").mask('999999');
        $("input.mask_phone").mask('+999 99 999-99-99');
        $("input.mask_phone_ext").mask('99 (999) 999-9999? x99999');
        $("input.mask_credit").mask('9999-9999-9999-9999');        
        $("input.mask_percent").mask('99%');
        $("input.mask_zoom").mask('99');
        $("input.mask_maps_height").mask('999px');
        $("input.mask_color").mask('#999999');
      }            
    }
        
    var feTooltips = function(){            
      $("body").tooltip({selector:'[data-toggle="tooltip"]',container:"body"});
    }//END Bootstrap tooltip
       
    var fePopover = function(){            
      $("[data-toggle=popover]").popover();
      $(".popover-dismiss").popover({trigger: 'focus'});
    }//END Bootstrap Popover
        
    var feTagsinput = function(){
      if($(".tagsinput").length > 0){
        $(".tagsinput").each(function(){
          if($(this).data("placeholder") != ''){
            var dt = $(this).data("placeholder");
           }else
              var dt = 'add a tag';
              $(this).tagsInput({width: '100%',height:'auto',defaultText: dt});
        });
      }
    }// END Tagsinput
    
    var feTagsinputList = function(){
      if($("#listIp").length > 0){
        $("#listIp").each(function(){
          
            $("#listIp").tagsInput({width: '100%',height:'auto',defaultText: 'Добавить IP', maxChars: 32});
        });
      }
    }
      
    var feiCheckbox = function(){
      if($(".icheckbox").length > 0){
        $(".icheckbox,.iradio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});
      }
    }// END iCheckbox
        
    var feBsFileInput = function(){
      if($("input.fileinput").length > 0){
        $("input.fileinput").bootstrapFileInput();                               
      }
    }//END Bootstrap file input
        
    return {
		  init: function(){                    
        feDatepicker();                    
        feTimepicker();
        feSelect();
        feValidation();
        feMasked();
        feTooltips();
        fePopover();
        feTagsinput();
        feTagsinputList();
        feiCheckbox();
        feBsFileInput();
        feDaterangepicker();
      }
    }
  }();

  var uiElements = function(){

    var uiDatatable = function(){
      if($(".datatable").length > 0){                
        $(".datatable").dataTable();
        $(".datatable").on('page.dt',function () { onresize(100); });
      }
            
      if($(".datatable_simple").length > 0){                
        $(".datatable_simple").dataTable({"ordering": false, "info": false, "lengthChange": false,"searching": false});
        $(".datatable_simple").on('page.dt',function () { onresize(100); });                
      }            
    }//END Datatable        
        
    var uiRangeSlider = function(){
      //Default Slider with start value
      if($(".defaultSlider").length > 0){                
        $(".defaultSlider").each(function(){                    
          var rsMin = $(this).data("min");
          var rsMax = $(this).data("max");
          $(this).rangeSlider({                        
            bounds: {min: 1, max: 200},
            defaultValues: {min: rsMin, max: rsMax}
          });                    
        });                                
      }//End Default
            
      if($(".dateSlider").length > 0){                
        $(".dateSlider").each(function(){
          $(this).dateRangeSlider({
            bounds: {min: new Date(2012, 1, 1), max: new Date(2015, 12, 31)},
            defaultValues:{min: new Date(2012, 10, 15),max: new Date(2014, 12, 15)}
          });
        });                                                
      }//End date range slider
                     
      if($(".rangeSlider").length > 0){                
        $(".rangeSlider").each(function(){                    
          var rsMin = $(this).data("min");
          var rsMax = $(this).data("max");
          $(this).rangeSlider({
            bounds: {min: 1, max: 200},
            range: {min: 20, max: 40},
            defaultValues: {min: rsMin, max: rsMax}
          });                    
        });                                
      }//End
            
      if($(".stepSlider").length > 0){                
        $(".stepSlider").each(function(){
          var rsMin = $(this).data("min");
          var rsMax = $(this).data("max");
          $(this).rangeSlider({                        
            bounds: {min: 1, max: 200},
            defaultValues: {min: rsMin, max: rsMax},
            step: 10
          });    
        });                                                
      }//End
    }//END RangeSlider
        
    var uiKnob = function(){ if($(".knob").length > 0){ $(".knob").knob(); } }
        
    var uiSmartWizard = function(){
      if($(".wizard").length > 0){
        $(".wizard > ul").each(function(){
          $(this).addClass("steps_"+$(this).children("li").length);
        });//end
                
        if($("#wizard-validation").length > 0){          
          var validator = $("#wizard-validation").validate({
            rules: {
              youremail: {required: true,email: true },
              name: {required: true,minlength: 3,maxlength: 20},
              phone: {required: true,maxlength: 20},
              site: {required: true,url: true},
              subject: {required: true,minlength: 5,maxlength: 200},
              message: {required: true,minlength: 20,maxlength: 1000}
            }
          });
        }// End of example
                
        $(".wizard").smartWizard({                        
          onLeaveStep: function(obj){
            var wizard = obj.parents(".wizard");
            if(wizard.hasClass("wizard-validation")){
              var valid = true;
              $('input,textarea',$(obj.attr("href"))).each(function(i,v){
                valid = validator.element(v) && valid;
              });
              if(!valid){
                wizard.find(".stepContainer").removeAttr("style");
                validator.focusInvalid();                                
                return false;
              }
            }    
            return true;
          },
          onShowStep: function(obj){                        
            var wizard = obj.parents(".wizard");
            if(wizard.hasClass("show-submit")){
              var step_num = obj.attr('rel');
              var step_max = obj.parents(".anchor").find("li").length;
              if(step_num == step_max){                             
                obj.parents(".wizard").find(".actionBar .btn-primary").css("display","block");
              }                         
            }
            return true;
          }
        });
      }            
    }
        
    var uiOwlCarousel = function(){
      if($(".owl-carousel").length > 0){
        $(".owl-carousel").owlCarousel({mouseDrag: false, touchDrag: true, slideSpeed: 300, paginationSpeed: 400, singleItem: true, navigation: false,autoPlay: true});
      }
    }
        
/*
    var uiScroller = function(){      
      if($(".scroll").length > 0){
        $(".scroll").mCustomScrollbar({axis:"y", autoHideScrollbar: true, scrollInertia: 20, advanced: {autoScrollOnFocus: false}});
      }
    }
*/// END Custom Content Scroller
    
    var uiSparkline = function(){
      if($(".sparkline").length > 0)
        $(".sparkline").sparkline('html', { enableTagOptions: true,disableHiddenCheck: true});   
    }// End sparkline              
       
    $(window).resize(function(){
      if($(".owl-carousel").length > 0){
        $(".owl-carousel").data('owlCarousel').destroy();
        uiOwlCarousel();
      }
    });
       
    return {
      init: function(){
        uiDatatable();
        uiRangeSlider();
        uiKnob();
        uiSmartWizard();
        uiOwlCarousel();
        //uiScroller();
        uiSparkline();
      }
    }      
  }();

/*
    var templatePlugins = function(){
        var tp_clock = function(){
        function tp_clock_time(){
            var now     = new Date();
            var hour    = now.getHours();
            var minutes = now.getMinutes();                    
            
            hour = hour < 10 ? '0'+hour : hour;
            minutes = minutes < 10 ? '0'+minutes : minutes;
            
            $(".plugin-clock").html(hour+"<span>:</span>"+minutes);
        }
        if($(".plugin-clock").length > 0){
              tp_clock_time();
              window.setInterval(function(){ tp_clock_time(); },10000);
        }
    }
        
    var tp_date = function(){
      if($(".plugin-date").length > 0){        
          var days = ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'];
          var months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];  
          var now     = new Date();
          var day     = days[now.getDay()];
          var date    = now.getDate();
          var month   = months[now.getMonth()];
          var year    = now.getFullYear();
          $(".plugin-date").html(day+", "+month+" "+date+", "+year);
        }    
    }
        
    return {
      init: function(){ tp_clock(); tp_date(); }
    }
  }();
*/
    
    /*var fullCalendar = function(){
      var calendar = function(){
        if($("#calendar").length > 0){
          function prepare_external_list(){
            $('#external-events .external-event').each(function() {
              var eventObject = {title: $.trim($(this).text())};
              $(this).data('eventObject', eventObject);
              $(this).draggable({ zIndex: 999, revert: true, revertDuration: 0 });
            });                    
          }
                
          var date = new Date();
          var d = date.getDate();
          var m = date.getMonth();
          var y = date.getFullYear();

          prepare_external_list();

          var calendar = $('#calendar').fullCalendar({
            header: { left: 'prev,next today', center: 'title', right: 'month,agendaWeek,agendaDay' },
            editable: true,
            eventSources: {url: "assets/ajax_fullcalendar.php"},
            droppable: true,
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
              var title = prompt('Event Title:');
              if (title) {
                calendar.fullCalendar('renderEvent', {title: title,start: start,end: end,allDay: allDay}, true); } calendar.fullCalendar('unselect'); },
                 drop: function(date, allDay) {
                  var originalEventObject = $(this).data('eventObject');
                  var copiedEventObject = $.extend({}, originalEventObject);
                  copiedEventObject.start = date;
                  copiedEventObject.allDay = allDay;
                  $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                  if ($('#drop-remove').is(':checked')) { $(this).remove(); } }
                });
                $("#new-event").on("click",function(){
                  var et = $("#new-event-text").val();
                  if(et != ''){
                    $("#external-events").prepend('<a class="list-group-item external-event">'+et+'</a>');
                    prepare_external_list();
                  }
                });  
            }            
        } 
        return { init: function(){ calendar(); } }
    }();*/
    
    formElements.init();
    uiElements.init();
    //templatePlugins.init();    
    
    //fullCalendar.init();
    
    /* My Custom Progressbar */
    $.mpb = function(action,options){

      var settings = $.extend({
        state: '',            
        value: [0,0],
        position: '',
        speed: 20,
        complete: null
      },options);

      if(action == 'show' || action == 'update'){            
        if(action == 'show'){
          $(".mpb").remove();
          var mpb = '<div class="mpb '+settings.position+'"> <div class="mpb-progress'+(settings.state != '' ? ' mpb-'+settings.state: '')+'" style="width:'+settings.value[0]+'%;"></div> </div>';
          $('body').append(mpb);
        }            
        var i  = $.isArray(settings.value) ? settings.value[0] : $(".mpb .mpb-progress").width();
        var to = $.isArray(settings.value) ? settings.value[1] : settings.value;            
            
        var timer = setInterval(function(){
          $(".mpb .mpb-progress").css('width',i+'%'); i++;
          if(i > to){
            clearInterval(timer);
            if($.isFunction(settings.complete)){ settings.complete.call(this); }
          }
        }, settings.speed);
      }
      if(action == 'destroy'){ $(".mpb").remove(); }                     
    }
    /* Eof My Custom Progressbar */
    
  // New selector case insensivity        
  $.expr[':'].containsi = function(a, i, m) { return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0; };              
});
