

$(document).ready(function(){



	$('#search').change(function(){

    if($(this).prop('checked')) $('[type="search"]').trigger('focus')

	})

	$('[type="search"]').focusout(function(){

	    $('#search').prop('checked','')

	})

	/*AOS*/

    if( "AOS" in window ){

      AOS.init({

        offset: 100,

        once: true,

        duration: 1100,

        delay: 150

      });

      setTimeout(function() { AOS.refresh(); }, 1);

    }

	/*FANCYBOX*/

	if ($("[data-fancybox]").length != 0)

		$("[data-fancybox]").fancybox({

			afterShow: function(instance, current) {},

			animationEffect : "zoom",

			animationDuration : 800,

			thumbs : {

				autoStart   : true

			},

			touch : false,

			transitionDuration : 366,

			transitionEffect: "zoom-in-out"

		});



	/*Подключение owl carousel*/

	$('.main-carousel').owlCarousel({

	    loop: true, // Зациклирование

	    margin: 0, // Отступы

	    nav: true, // Навигация

	    dots: true, // Точки

	    dotsEach:true,



	    navText: [

	    	'<svg class="flickity-button-icon btn-left" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>',

	    	'<svg class="flickity-button-icon btn-right" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>'

	    	],

	    responsive:{

	        0:{

	            items:1

	        },

	        600:{ 

	            items:1

	        },

	        1000:{

	            items:1

	        }

	    }

	});

	$('.waw-carousel').owlCarousel({

	    loop: true, // Зациклирование

	    margin: 0, // Отступы

	    nav: true, // Навигация

	    dots: false, // Точки

	    dotsEach:true,

	    

	    navText: [

	    	'<svg class="flickity-button-icon btn-left" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>',

	    	'<svg class="flickity-button-icon btn-right" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>'

	    	],

	    responsive:{

	        0:{

	            items:1

	        },

	        600:{ 

	            items:2

	        },

	        1000:{

	            items:4

	        }

	    }

	});

	

	$('.charity-carousel').owlCarousel({

	    loop: true, // Зациклирование

	    margin: 5, // Отступы

	    nav: false, // Навигация

	    dots: true, // Точки

	    dotsEach:false,

	    

	    navText: [

	    	'<svg class="flickity-button-icon btn-left" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>',

	    	'<svg class="flickity-button-icon btn-right" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>'

	    	],

	    responsive:{

	        0:{

	            items:1

	        },

	        600:{ 

	            items:2

	        },

	        1000:{

	            items:4

	        }

	    }

	});

	$('.partners-carousel').owlCarousel({

	    loop: true, // Зациклирование

	    margin: 15, // Отступы

	    nav: true, // Навигация

	    dots: false, // Точки

	    dotsEach:false,

	    autoplay:true,

	    autoplayHoverPause:true,

	    autoplayTimeout:1500,

	    navText: [

	    	'<svg class="flickity-button-icon btn-left" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>',

	    	'<svg class="flickity-button-icon btn-right" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>'

	    	],

	    responsive:{

	        0:{

	            items:1

	        },

	        600:{ 

	            items:2

	        },

	        1000:{

	            items:4

	        }

	    }

	});

	$('.idea-carousel').owlCarousel({

	    loop: false, // Зациклирование

	    margin: 15, // Отступы

	    nav: false, // Навигация

	    dots: true, // Точки

	    dotsEach:true,

	    startPosition:1,

	    navText: [

	    	'<svg class="flickity-button-icon btn-left" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>',

	    	'<svg class="flickity-button-icon btn-right" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>'

	    	],

	    responsive:{

	        0:{

	            items:1

	        },

	        600:{ 

	            items:1

	        },

	        1000:{

	            items:2

	        }

	    }

	});

	$(".js-select").select2({

    tags: false,

    allowClear: false

  });

	

 	$("[data-text-limit]").map(function( i, el ){

      el = $(el);

      var text = el.text();

      var textLimit = el.attr("data-text-limit");



      if( text.length > textLimit*1 ){

        text = text.substring(0, textLimit )

        el.text( text+ " ..." );

      }

    });

 	// Прибавление-убавление значении



    (function(){

      var form = $("[data-counter]") || null;;

      if( !form )

        return;

      var cntfactor = form.attr("data-counter")*1;



      $(document).on("click", "[data-counter-btn]", function(){

        var cntVal;

        var cntInput = $(this).closest( form ).find("[data-counter-input]");

        

        cntVal = (cntInput.val()*1);



        if( $(this).hasClass("plus") )

          cntVal = cntVal + cntfactor;

        if( $(this).hasClass("minus") & cntVal > 0 )

          cntVal = cntVal - cntfactor;

        if( isNaN( cntVal ) || cntVal < 0) cntVal = 0;

        cntInput.val( cntVal ).attr("value", cntVal)

      })

      $(".cnt-input").on( "keypress", function(e){

        //console.log(this, e);

      } )



    })();



 //закрывание предыдущих табов 

	var tabContent = $('header .tab-content');

	tabContent.find('[data-toggle="collapse"]').on("click", function(){

		tabContent.find(".collapse").collapse("hide");

	})

	//расстановка цифр

	function spaceBetweenNum(str, char) {

	  str = str+"";

	  char = char || ","

	  var pattern = /(-?\d+)(\d{3})/;

	  while (pattern.test(str))

	    str = str.replace(pattern, "$1"+char+"$2");

	  return str;

	}

    //Событие заполнения

  	$('.another-amount').on("keypress",function (e){ 

	  	var input = $('.sum');

	  	for(var i=0;i<input.length;i++){

	  		input[i].checked = false;	

	  	}

    });

    //Обратное событие заполнения

    $('.sum').on("change",function (e){

    	var a = $('.another-amount');

    	a[0].value = '';

    });

	//SCROLL

    var minMenu = $(".header-scroll") || null;

    var headerRange = false;

    var staffProgressStatus = false;

    $(window).on("scroll", function(e) {



      //Адаптация хедера при скролинге

      if ($(window).scrollTop() > 90 && headerRange == false) {



        headerRange = true;

        if (minMenu) minMenu.addClass("scrolled");



      } else if ($(window).scrollTop() < 90 && headerRange == true) {

        headerRange = !true;

        if (minMenu) minMenu.removeClass("scrolled");

      } //.originalEvent.wheelDelta





    });

    $(window).trigger("scroll");







// Проверка на заполненность

    $(".form-control").on("keyup", function(){

      var that = $(this);

      if( that.val().length )

        that.addClass("filled")

      else

        that.removeClass("filled");

    })





});

//maskedinput

$(document).ready(function(){
	$("#search-mob").attr("checked","checked") ;
})

//$.mask.definitions['h'] = "[0-9]";

$("#date").mask("hh/hh/hhhh");

$("#phone").mask("+998 (hh)hhh-hh-hh",{autoclear: false});

//.mask("999-99-9999");



// Анимация цифр

var counterAnimateContainer = $(".counter-animate-container") || null;

$(window).on("scroll.animate", function(){

  if( counterAnimateContainer.length && !counterAnimateContainer.hasClass("counter-animate-started") && scrolledDiv( counterAnimateContainer ) ){

      counterAnimateContainer.addClass("counter-animate-started");

      setTimeout(function(){

        $(".counter-animate").map( function(i, el){

          var el = $(el);

          var num = el.text()*1;

          if( isNaN(num) )

            return;

          var cnt = 0;

          el.text(cnt)

          var interval = setInterval(function(){

            el.text( Math.round(cnt += num/(2*25) ) )

            if( cnt >= num ){

              clearInterval( interval );

              el.text( num );

            }

          }, 75);

         }, 2000);

      });

  }

});

function scrolledDiv(el) {

  try {

    var docViewTop = $(window).scrollTop(),

      docViewBottom = docViewTop + $(window).height(),

      elTop = $(el).offset().top,

      elBottom = elTop + $(el).height() / 1.8;

  } catch (err) {

    console.error();

  }

  return elBottom <= docViewBottom && elTop >= docViewTop;

}













console.log("end script");