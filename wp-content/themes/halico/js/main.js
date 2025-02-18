$('.menu-icon').on('click', function(e) {
	$('body').addClass('menu-open');
})

$('.menu-close').on('click', function(e) {
	$('body').removeClass('menu-open');
})
$('.main-navigation').on('click', function(e) {
	if($(e.target).hasClass('main-navigation')) $('body').removeClass('menu-open');
});

$('#menu-main > .menu-item-has-children > a').on('touchstart', function(e) {
	if (isMobile()) {
		e.preventDefault();
		$('#menu-main > .menu-item-has-children > ul').hide();
		$(this).siblings('ul').show();
	}
	
})

$(window).on('load', function() {
	$('.banner__w1').addClass('go');
	$('.banner__w2').addClass('go');
})

// check mobile
function isMobile() {
	return $('.menu-icon').is(":visible");
}


// slick_on_mobile($('.home-news__slide'));
// slick on mobile
// function slick_on_mobile(slider, settings){
// $(window).on('load resize', function() {
// 	if ($(window).width() > 767) {
// 		if (slider.hasClass('slick-initialized')) {
// 			slider.slick('unslick');
// 		}
// 		return
// 	}
// 	if (!slider.hasClass('slick-initialized')) {
// 		return slider.slick({
// 			slidesToShow: 1,
// 			slidesToScroll: 1
// 		});
// 	}
// });
// };

/* effect on homepage */
$('.section').on('inview', function(event, isInView) {
	if (isInView) {
	  	$(this).addClass('inview');
	} else {
		$(this).removeClass('inview');
	}
});

$('.btn-duoi18').on('click', function(e) {
	$('.modal18__first').hide();
	$('.modal18__not').show();
});

$('.btn-tren18').on('click', function(e) {
	Cookies.set('halico_18', '1', { expires: 365 });
	Cookies.set('halico_18', '1');
	$.modal.close();
});

/*$('#modal18 .modal18__button').on('click', function(e) {
	e.preventDefault();
	var valid = true;
	$('.modal18__input').removeClass('invalid');
	$('.modal18__input').each(function() {
		var val = parseInt($(this).val());
		if (
			Number.isInteger(val) && parseInt($(this).val()) > 0 && 
			val >= parseInt($(this).attr('min')) && val <= parseInt($(this).attr('max'))
		) {
			$(this).removeClass('invalid');
		} else {
			valid = false;
			$(this).addClass('invalid');
		}
	})

	if (valid) {
		// get age
		var dob = new Date($('#modal18 input[name="year"]').val(), $('#modal18 input[name="month"]').val(), $('#modal18 input[name="day"]').val());
		var diff_ms = Date.now() - dob.getTime();
		var age_dt = new Date(diff_ms); 
		if (Math.abs(age_dt.getUTCFullYear() - 1970) >= 18) {
			Cookies.set('halico_18', '1', { expires: 365 });*/
			/*
			if($('#modal18 input[name="remember"]:checked').length) {
				Cookies.set('halico_18', '1', { expires: 365 });
			} else {
				Cookies.set('halico_18', '1');
			}
			*/
			/*$.modal.close();
		} else {
			$('.modal18__first').hide();
			$('.modal18__not').show();
		}
	}
});*/

// console.log(Cookies.get('halico_18'));
if (Cookies.get('halico_18') == undefined) {
	$('#modal18').modal({
		clickClose: false,
		showClose: false
	});
}

$(".paroller, [data-paroller-factor]").paroller({
	factor: 0.1,            // multiplier for scrolling speed and offset
	factorXs: 0.1,           // multiplier for scrolling speed and offset
	type: 'foreground',     // background, foreground
	direction: 'vertical', // vertical, horizontal
	// transition: 'transform 0.2s ease-in' // CSS transition
});
$(".paroller2").paroller({
	factor: -0.1,            // multiplier for scrolling speed and offset
	factorXs: 0.1,           // multiplier for scrolling speed and offset
	type: 'foreground',     // background, foreground
	direction: 'vertical', // vertical, horizontal
	// transition: 'transform 0.2s ease-in' // CSS transition
});
$(".paroller3").paroller({
	factor: -0.03,            // multiplier for scrolling speed and offset
	factorXs: 0.05,           // multiplier for scrolling speed and offset
	type: 'foreground',     // background, foreground
	direction: 'vertical', // vertical, horizontal
	// transition: 'transform 0.2s ease-in' // CSS transition
});

/* change URL by seclect box */
$('#codongFilter').on('change', function(e) {
	var currentURL = window.location.href;
	var params = window.location.search;
	if (params != undefined) currentURL = currentURL.replace(window.location.search, '');
	window.location.href = currentURL + '?y=' + $(this).val();
})

/* play video */
$('#mainbannerVideoPlay').on('click', function(e) {
	$(this).hide();
	$('#mainbannerVideo').show();
})

/* history */
$('.history__years').slick({
	// infinite: true,
	slidesToShow: 3,
	slidesToScroll: 1,
	// centerMode: true,
	focusOnSelect: true,
	autoplay: true,
	prevArrow: '<a href="javascript:void(0)" class="slick-prev"></a>',
	nextArrow: '<a href="javascript:void(0)" class="slick-next"></a>',
	asNavFor: '.history__contents'
});
$('.history__contents').slick({
	// infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	// autoplay: true,
	adaptiveHeight: true,
	arrows: false,
	asNavFor: '.history__years'
});
$('.tech-slider').slick({
  dots: true,
  autoplay: true,
  pauseOnHover: false,
  infinite: false,
  prevArrow: '<a href="javascript:void(0)" class="slick-prev"></a>',
  nextArrow: '<a href="javascript:void(0)" class="slick-next"></a>',
  slidesToShow: 1,
  slidesToScroll: 1
});
// On before slide change
$('.history__years').on('afterChange', function(event, currentSlide){
	if (currentSlide.currentSlide == 0) $('.history__years .slick-prev').fadeOut('fast');
		else $('.history__years .slick-prev').fadeIn('fast');
});
$('.history__years .slick-prev').attr('style','');

/* product image zoom */
$('a.zoom').each(function() {
	$(this).zoom({
		url: $(this).attr('href')
	});
})

/* product others */
$('.product__other').slick({
	slidesToShow: 2,
	slidesToScroll: 2,
	arrows: false,
	dots: true,
	mobileFirst: true,

	responsive: [
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3
		  }
		},
		{
		  breakpoint: 1200,
		  settings: {
			slidesToShow: 5,
			slidesToScroll: 5,
			arrows: true,
			dots: false,
		  }
		}
	]
})

$('.product__slideshow').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	dots: true
});

$('.home-news__slide').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	infinite: true,
	arrows: false,
	dots: true,
	adaptiveHeight: true,
	mobileFirst: true,
	responsive: [
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 4
		  }
		}
	]
});
$('.home-news__slide .slick-dots').append('<li class="home-news__slide__link"><a href="http://halico.com.vn/category/tin-halico/">View all</a></li>');
$('.home-news__slide__arrows .prev').on('click', function(e) {
	$('.home-news__slide').slick('slickPrev');
});
$('.home-news__slide__arrows .next').on('click', function(e) {
	$('.home-news__slide').slick('slickNext');
});
