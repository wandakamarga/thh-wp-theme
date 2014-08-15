$(document).ready(function(){
	// FitVids Initialization
	$("#intro-video").fitVids();

	/* Lazyload initialization
	$("img.lazy").lazyload({
		effect : "fadeIn",
		threshold : 200
	}); */

	// Isotope Grid
	var $container = $('.isotope-container'),
	colWidth = function () {
		var w = $container.width(), 
		columnNum = 1,
		columnWidth = 0;
		if (w > 1200) {
			columnNum  = 5;
		} else if (w >= 900 && w < 1200) {
			columnNum  = 4;
		} else if (w >= 600 && w < 900) {
			columnNum  = 3;
		} else if (w >= 300 && w < 600) {
			columnNum  = 2;
			// Function to change the three grid box to two grid box
			if( $('.item').hasClass('item-w3') ) {
				$('.item').removeClass('item-w3').addClass('item-w2');
				$('.item').find('.one-third').removeClass('one-third');
				$('.item').find('.two-third').removeClass('two-third');
			};
		} else if (w < 300) {
			columnNum = 1;
			// Function to swap horizontal box to vertical box
			if( $('.item').hasClass('item-w2') ) {
				$('.item').removeClass('item-w2').addClass('item-w1').addClass('item-h2').addClass('vertical');
				$('.item').find('.box-arrow-left').removeClass('box-arrow-left').addClass('box-arrow-up');
				isotope();
			}
			else if( $('.item').hasClass('item-w3') ) {
				$('.item').removeClass('item-w3').addClass('item-w1').addClass('item-h2').addClass('vertical');
				$('.item').find('.one-third').removeClass('one-third');
				$('.item').find('.two-third').removeClass('two-third');
				$('.item').find('.box-arrow-left').removeClass('box-arrow-left').addClass('box-arrow-up');
				isotope();
			};
		}
		columnWidth = Math.floor(w/columnNum);
		$container.find('.item').each(function() {
			var $item = $(this),
			multiplier_w = $item.attr('class').match(/item-w(\d)/),
			multiplier_h = $item.attr('class').match(/item-h(\d)/),
			width = multiplier_w ? columnWidth*multiplier_w[1] : columnWidth,
			height = multiplier_h ? columnWidth*multiplier_h[1] : columnWidth;
			$item.css({
				width: width,
				height: height
			});
		});
		return columnWidth;
	},
	isotope = function () {
		$container.isotope({
			resizable: false,
			itemSelector: '.item',
			stamp: '.stamp',
			sortBy: 'random',
			layoutMode: 'packery',
			packery: {
				columnWidth: colWidth()
			}
		});
	};
	isotope();
	$(window).resize(isotope);

	// caches a jQuery object containing the header element
	var header = $(".toraja-navigation"),
	windowWidth = $(window).width();
	if( windowWidth >= 768 ) {
		$(window).scroll(function() {
			var scroll = $(window).scrollTop(),
			scrollTreshold = 50;
			if ( scroll >= scrollTreshold ) {
				$('.logo-container').hide();
				header.find('img').hide();
				header.find('br').hide();
				$('.navigation-logo').show();
			} else {
				$('.logo-container').show();
				header.find('img').show();
				header.find('br').show();
				$('.navigation-logo').hide();
			}
		});
	}
	else if( windowWidth < 768 ) {
		// Do Nothing
	}
	
	// Toraja Menu Navigation Bind
	$('.toraja-navigation').find('li').on('click', 'a', function() {
		var filterValue = $( this ).attr('data-filter');
		if( $(this).parent().hasClass('filter') ){
			get_filter(filterValue);
		}
		else if( $(this).hasClass('reservation') ){
			get_reservation();
		}
		else if( $(this).hasClass('contact') ){
			get_contact();
		}
		$('.toraja-navigation').find('a').removeClass('active');
		$(this).addClass('active');
	});

	// Bind datepicker
	$( ".datepicker" ).datepicker();
	// Body overflow while lightboxed
	$( "a.item").on('click', function() {
		$("body").addClass('noscroll');
	});
	$( ".lightboxOverlay, .lightbox , .lb-close").on('click', function() {
		$("body").removeClass('noscroll');
	});

	// URL Hash String Interceptor
	var current_url = window.location.href;
	var page = current_url.substr(current_url.lastIndexOf('/')+1);
	switch( page ) {
		case '#rooms':
			get_filter('.rooms, .rooms-img');
			$('.toraja-navigation').find('a').removeClass('active');
			$('.rooms-menu').addClass('active');
			break;
		case '#facilities':
			get_filter('.about, .facilities, .facilities-img');
			$('.toraja-navigation').find('a').removeClass('active');
			$('.facilities-menu').addClass('active');
			break;
		case '#destinations':
			get_filter('.point-of-interests, .poi-img');
			$('.toraja-navigation').find('a').removeClass('active');
			$('.destinations-menu').addClass('active');
			break;
		case '#reservation':
			get_reservation();
			$('.toraja-navigation').find('a').removeClass('active');
			$('.reservation').addClass('active');
			break;
		case '#contact':
			get_contact();
			$('.toraja-navigation').find('a').removeClass('active');
			$('.contact').addClass('active');
			break;
	};

	// Menu Click Function
	function get_filter(filterValue) {
		$('.isotope-container').fadeIn();
		$('#reservation-container').fadeOut();
		$('#contact-container').fadeOut();
		$('.isotope-container').isotope({ filter: filterValue });
	}
	function get_reservation() {
		$('.isotope-container').fadeOut();
		$('#contact-container').fadeOut();
		$('#reservation-container').fadeIn();
	};
	function get_contact() {
		$('.isotope-container').fadeOut();
		$('#reservation-container').fadeOut();
		$('#contact-container').fadeIn();
	};

	// Submit click overrides
	$('#gform_1').attr('action','/#contact');
	$('#gform_2').attr('action','/#reservation');
});