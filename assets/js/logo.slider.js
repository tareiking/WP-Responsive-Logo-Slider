(function($) {
	$(document).ready(function() {
	    $('.responsive').slick({
	        dots: true,
	        infinite: false,
	        speed: 300,
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        responsive: [{
	            breakpoint: 1024,
	            settings: {
	                slidesToShow: 3,
	                slidesToScroll: 3,
	                infinite: true,
	                dots: true
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