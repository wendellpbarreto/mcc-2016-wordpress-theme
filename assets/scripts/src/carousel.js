$(function () {

	var $highlightsCarousel = $('section#highlights');
	$highlightsCarousel.owlCarousel({
		items: 1,
		lazyLoad: true,
		autoplay: true,
		loop: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		dots: true,
		nav: false,
		navClass: ['owl-prev', 'owl-next'],
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	});

	var galleriesFromPosts = $('.post .gallery');
	galleriesFromPosts.each(function () {
		var $gallery = $(this);
		// var items = $gallery.is('[class*="gallery-columns-"') ? $gallery.attr('class').match(/gallery-columns-(\d+)/)[1] : 1;
		$gallery.addClass('owl-carousel');
		$gallery.children(':not(.gallery-item)').remove();
		$gallery.find('.gallery-item .gallery-icon').each(function () {
			var imageURL = $(this).find('img').attr('src');
			$(this).append('<div class="blured-mask"></div>');
			$(this).append('<div class="fake-img"></div>');
			// $(this).css('background-image', 'url(' + imageURL + ')');
			$(this).find('.blured-mask').css('background-image', 'url(' + imageURL + ')');
			$(this).find('.fake-img').css('background-image', 'url(' + imageURL + ')');
		});
		$gallery.owlCarousel({
			// items: parseInt(items),
			items: 1,
			lazyLoad: true,
			loop: false,
			autoplay: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			nav: true,
			dots: false,
			margin: 5,
			navClass: ['owl-prev', 'owl-next'],
			// navText: ['', ''],
			navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			responsive: {
				0: {
					items: 1,
				},
				768: {
					// items: parseInt(items),
					items: 1,
				}
			}
		});
	});
})
