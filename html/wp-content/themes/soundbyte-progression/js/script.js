/*  Table of Contents
01. MENU ACTIVATION
02. GALLERY JAVASCRIPT
03. FITVIDES RESPONSIVE VIDEOS
04. MOBILE MENU
05. SCROLLTOFIXED
06. ISOTOPE
07. SCROLL TO TOP MENU JS
08. SELET BOX UI
09. prettyPhoto JS
*/


jQuery(document).ready(function($) {
	'use strict';


/*
=============================================== 01. MENU ACTIVATION  ===============================================
*/

	 jQuery('nav#site-navigation ul.sf-menu').superfish({
			 	popUpSelector: 'ul.sub-menu,.sf-mega', 	// within menu context
	 			delay:      	400,                	// one second delay on mouseout
	 			speed:      	200,               		// faster animation speed
		 		speedOut:    	200,             		// speed of the closing animation
				animation: 		{opacity: 'show'},		// animation out
				animationOut: 	{opacity: 'hide'},		// adnimation in
		 		cssArrows:     	true,              		// set to false
			 	autoArrows:  	true                    // disable generation of arrow mark-up
	 });


	 jQuery('#footer-menu-progression ul.sf-menu').superfish({
			 	popUpSelector: 'ul.sub-menu,.sf-mega', 	// within menu context
	 			delay:      	400,                	// one second delay on mouseout
	 			speed:      	200,               		// faster animation speed
		 		speedOut:    	200,             		// speed of the closing animation
				animation: 		{opacity: 'show'},		// animation out
				animationOut: 	{opacity: 'hide'},		// adnimation in
		 		cssArrows:     	true,              		// set to false
			 	autoArrows:  	true                    // disable generation of arrow mark-up
	 });



/*
=============================================== 02. GALLERY JAVASCRIPT  ===============================================
*/

    $('.gallery-progression').flexslider({
		animation: "fade",
		slideDirection: "horizontal",
		slideshow: false,
		slideshowSpeed: 7000,
		animationSpeed: 250,
		directionNav: true,
		controlNav: true
    });




/*
=============================================== 03. FITVIDES RESPONSIVE VIDEOS  ===============================================
*/

	$("#content-pro").fitVids();

/*
=============================================== 04. MOBILE MENU  ===============================================
*/

  	$('ul.mobile-menu-progression').slimmenu({
  	    resizeWidth: '1200',
  	    collapserTitle: 'Menu',
  	    easingEffect:'easeInOutQuint',
  	    animSpeed:'medium',
  	    indentChildren: false,
  		childrenIndenter: '- '
  	});


	var clickOrTouch = (('ontouchend' in window)) ? 'touchend' : 'click';

	$(".mobile-menu-icon-progression").on(clickOrTouch, function(e) {
	   $(".site-header-progression").toggleClass("active-menu-icon-progression");
	});

 /*
=============================================== 05. SCROLLTOFIXED  ===============================================
*/

	if ($(this).width() > 959) {
    $('#sticky-header-progression').scrollToFixed();
	}

    var header = $(".menu-default-progression");
       $(window).scroll(function() {

		   if ($(this).width() > 959) {

	           var scroll = $(window).scrollTop();

	           if (scroll >= 2) {
	               header.removeClass('menu-default-pro').addClass("menu-resized-pro");
	           } else {
	               header.removeClass("menu-resized-pro").addClass('menu-default-pro');
	           }

		   }

       });

/*
=============================================== 06. ISOTOPE  ===============================================
*/


	var $winsize = $(window).width();
    var $isotopewidth = $('.isotope').width();
	var $guttersize = $isotopewidth * 0.04;
    if ($( ".iso-container-pro" ).hasClass( "full-width-progression" )) {
        var $guttersize = 0;
    }


	var $isocontainer = $('.isotope');
	$('.isotope').imagesLoaded( function(){
		// init Isotope
		$(".isotope-item").addClass('opacity-pro');
		$('.isotope').isotope({ filter: '.init' });
		var $container = $('.isotope').isotope({
			itemSelector: '.isotope-item',
            layoutMode: 'masonry',
			masonry: {
                gutter: $guttersize,
                columnWidth: '.isotope-item'
            },
			transitionDuration: '0.8s'
		});
	  // filter functions
	  var filterFns = {
	  };
	  // bind filter button click
	  $('#filters').on( 'click', 'button', function() {
		var filterValue = $( this ).attr('data-filter');
		// use filterFn if matches value
		filterValue = filterFns[ filterValue ] || filterValue;
		$container.isotope({ filter: filterValue });
	  });
	  // change is-checked class on buttons
	  $('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
		  $buttonGroup.find('.is-checked').removeClass('is-checked');
		  $( this ).addClass('is-checked');
		});
	  });


	//Timeout
	setTimeout(function() {
	$isocontainer.isotope('layout');
	}, 120);

	});


	//Isotope Reorder Layout on Window Resize
	var tilefix;
	$(window).on('resize', function() {
		tilefix = $('.isotope-item').width();
		$isocontainer.isotope('layout');
	});



/*
=============================================== 07. SCROLL TO TOP MENU JS  ===============================================
*/
  	// browser window scroll (in pixels) after which the "back to top" link is shown
  	var offset = 150,

	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
  	offset_opacity = 1200,

	//duration of the top scrolling animation (in ms)
  	scroll_top_duration = 700,

	//grab the "back to top" link
  	$back_to_top = $('#pro-scroll-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
  		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
  		if( $(this).scrollTop() > offset_opacity ) {
  			$back_to_top.addClass('cd-fade-out');
  		}
  	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		}, scroll_top_duration
	);
	});

/*
=============================================== 08. SELET BOX UI  ===============================================
*/
	$('#soundbyte-sidebar select, .woocommerce-ordering select, #single-product-container-pro  .variations_form select').selectric();


/*
=============================================== 09. prettyPhoto JS  ===============================================
*/

  	$(".single-event a[data-rel^='prettyPhoto'],.featured-blog-progression a[data-rel^='prettyPhoto'],.images a[data-rel^='prettyPhoto']").prettyPhoto({
  			hook: 'data-rel',
  				animation_speed: 'fast', /* fast/slow/normal */
  				slideshow: 5000, /* false OR interval time in ms */
  				show_title: false, /* true/false */
  				deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
  				overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
  				custom_markup: '',
  				social_tools: '' /* html or false to disable */
  	});



// END
});
