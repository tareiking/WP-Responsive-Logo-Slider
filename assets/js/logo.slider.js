(function($) {
	$(document).ready(function() {
	    $('.responsive').slick({
	        dots: false,
	        arrows: true,
	        infinite: true,
	        autoplay: true,
	        speed: 200,
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        responsive: [{
	            breakpoint: 1024,
	            settings: {
	                arrows: true,
	                slidesToShow: 3,
	                slidesToScroll: 3,
	            }
	        }, {
	            breakpoint: 600,
	            settings: {
	                slidesToShow: 2,
	                arrows: true,
	                slidesToScroll: 2
	            }
	        }, {
	            breakpoint: 480,
	            settings: {
	                arrows: true,
	                slidesToShow: 1,
	                slidesToScroll: 1
	            }
	        }]
	    });

	   $('.slick-back').on('click', function(event) {
	   		event.preventDefault();
	   		$('.responsive').slickPrev();
	   });

	   $('.slick-forward').on('click', function(event) {
	   		event.preventDefault();
	   		$('.responsive').slickNext();
	   });
	});
})(jQuery);