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

	    $('ul.nav a').on('click', function(event) {
	        event.preventDefault();
	        var targetID = $(this).attr('href');
	        var targetST = $(targetID).offset().top - 48;
	        $('body, html').animate({
	            scrollTop: targetST + 'px'
	        }, 300);
	    });
	});
})(jQuery);