(function($) {
	$(document).ready(function() {
		// Show the full amount (3) of items in a full content area
	    $('.content .slider.responsive').slick({
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
	                slidesToShow: 3,
	                slidesToScroll: 3,
	            }
	        }, {
	            breakpoint: 600,
	            settings: {
	                slidesToShow: 2,
	                slidesToScroll: 2
	            }
	        }, {
	            breakpoint: 480,
	            settings: {
	                slidesToShow: 1,
	                slidesToScroll: 1
	            }
	        }]
	    });
	    // Show less slider (1) items when in a sidebar
		$('.sidebar .slider.responsive').slick({
	        dots: false,
	        arrows: true,
	        infinite: true,
	        autoplay: true,
	        speed: 200,
	        slidesToShow: 1,
	        slidesToScroll: 1,
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