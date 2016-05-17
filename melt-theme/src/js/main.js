jQuery(document).ready(function($) {

	$('.home-sammy').slick({
		arrows: false,
		dots: true,
		autoplay: true,
  		autoplaySpeed: 0,
  		speed: 10000,
  		centerMode: true,
	    cssEase: 'linear',
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    variableWidth: true,
	    infinite: true,
	    initialSlide: 1,
	});

	var truck = $('.truck')
    truck.addClass('is-driving');
    console.log('start your engines');
    truck.one('webkitAnimationEnd oanimationend oAnimationEnd msAnimationEnd animationend',
    function(e) {
	    truck.removeClass('is-driving');
	    truck.addClass('is-stopped');
	    console.log('finished');
  	});

    // $('#section-home .js-stretch').each(function(){
    // 	$(this).backstretch( $(this).data('backstretch'));
    // });

    $('.eh').matchHeight();

    new WOW().init();

});
