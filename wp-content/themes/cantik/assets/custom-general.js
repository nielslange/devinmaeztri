(function($) {
	// Check if site is viewed on smartphone
	function isMobile() {
		return $(document).width() < 768 ? true : false;
	}

	// Close mobile navbar if user clicked menu item
	if ( isMobile() ) {
		$('.navbar-collapse a').click(function() {
			$('.navbar-collapse').collapse('toggle');
		});
	}

	// Show scroll to top button after user scrolled 100px down
	$('.scrollup').hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    // Scroll up to top of page after user clicked button
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    // Add scooth scroll to site
    var offset = isMobile() ? -50 : -50; 
    $("ul.nav a").smoothScroll({ 
    	speed: 1e3,
    	offset: offset
    });
    
    
	$('.navbar').affix({
		offset: {
			top: $('#header-image > img').height() - 5
		}
	});
})( jQuery );