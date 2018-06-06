// Custom JS
jQuery(function(){


	/* Instantiate FastClick
   	---------------------------------------------------------------------------------------------*/
	FastClick.attach(document.body);



	/* WOW.js scroll animations
   	---------------------------------------------------------------------------------------------*/
	new WOW().init();

	
	
	/* Gets the relative filepath to the theme from the footer element, stores as variable
   	---------------------------------------------------------------------------------------------*/
	var filepath = jQuery('#filepath').text();



	/* Swipe sliders
   	---------------------------------------------------------------------------------------------*/

	// Swiper slider (slider 1)
	if (jQuery('.slider-container').length) {
		var swiper = new Swiper('.slider-container', swiperOptions);
	}

	
});



/* Declare slider variables
---------------------------------------------------------------------------------------------*/

// Swiper slider (slider 1)
var interleaveOffset = -0.5;
var interleaveEffect = {
  	onProgress: function(swiper, progress) { 
	    for (var i = 0; i < swiper.slides.length; i++){
	      
	      	var slide = swiper.slides[i];
	      	var translate, innerTranslate;
	      	progress = slide.progress;
	            
	      	if (progress > 0) {
	        	translate = progress * swiper.width;
	        	innerTranslate = translate * interleaveOffset;        
	      	}
	      	else {        
	        	innerTranslate = Math.abs( progress * swiper.width ) * interleaveOffset;
	        	translate = 0;
	      	}
            if (i == 0) {
                // console.log(progress + ' <- progress');
            }

	      	$(slide).css({
	        	transform: 'translate3d(' + translate + 'px,0,0)'
	      	});

	      	$(slide).find('.slide-inner').css({
	        	transform: 'translate3d(' + innerTranslate + 'px,0,0)'
	      	});
	    }
  	},
  	onTouchStart: function(swiper) {
    	for (var i = 0; i < swiper.slides.length; i++){
      		$(swiper.slides[i]).css({ transition: '' });
    	}
  	},
  	onSetTransition: function(swiper, speed) {
	    for (var i = 0; i < swiper.slides.length; i++) {
	      	$(swiper.slides[i])
	        	.find('.slide-inner')
	        	.andSelf()
	        	.css({ transition: speed + 'ms' });
	    }
  	}
};
var swiperOptions = {
	pagination: '.slider-dots',
    paginationClickable: true,
    paginationBulletRender: function (swiper, index, className) {
        return '<li class="' + className + '"></li>';
    },
  	loop: true,
  	speed: 1400,
  	grabCursor: true,
  	watchSlidesProgress: true,
  	mousewheelControl: false,
  	keyboardControl: false,
  	noSwiping: true
};
swiperOptions = $.extend(swiperOptions, interleaveEffect);
