$(document).ready(function(){

    // MENU DO TOPO
    $(window).on("scroll", function(){
        if($(window).scrollTop() > 100){
            $("header").addClass("active");
        } else {
            $("header").removeClass("active");
        }
    });

	// MENU RESPONSIVO
	if($(document).width() < 992){
		$('.mobile-click').click(function(){
			$('.menu-links').toggle('slow');
		});
	}

	// SLIDE HOME
	$(".slide-home").slick({
    	autoplay: true,
    	autoplaySpeed: 5000,
    	slidesToShow: 1,
    	slidesToScroll: 1,
  		dots: true,
        prevArrow: "<button class='slick-arrow slick-prev'> <i class='fa fa-chevron-left' aria-hidden='true'></i> </button>",
        nextArrow: "<button class='slick-arrow slick-next'> <i class='fa fa-chevron-right' aria-hidden='true'></i> </button>"
    });

    //SLIDE CAMPAIGN
    $(".slide-campaign").slick({
    	autoplay: true,
    	autoplaySpeed: 3000,
		slidesToShow: 1,
		slidesToScroll: 1,
  		infinite: true,
    	speed: 500,
		fade: true,
		cssEase: 'linear'
    });

    // FADE IN ANIMATION
    $(window).scroll( function(){
    
        $('.fades').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).animate({'top': '0px', 'opacity':'1'},500);    
            }
        }); 

        $('.fadein').each( function(i){
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).animate({'right': '0px', 'left': '0px', 'opacity':'1'},700);    
            }
        }); 
    
    });

    //SCROLL LINKS
    $('a[rel="relativeanchor"]').click(function(){

        $("nav").removeClass("open-menu");
        $(".mobile-links").slideToggle(300);
        $("body").css("overflow", "visible");

        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top - 50
        }, 500);
        return false;
    });



});