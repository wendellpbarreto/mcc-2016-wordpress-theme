var engineCarousel = function(){
	var carousel = $('#carousel');

	carousel.owlCarousel({
		items: 1,
		lazyLoad: true,
		autoplay: true,
		loop: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		dots: true,
	});

	var featuredPostsCarousel = $('#posts .posts__featured-carousel');

	featuredPostsCarousel.owlCarousel({
		items: 1,
		lazyLoad: true,
		autoplay: false,
		loop: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		dots: true,
	});

	var $sync1 = $(".post__carousel"),
	$sync2 = $(".post__carousel-thumbs"),
	flag = false,
	duration = 300;

	$sync1
	.owlCarousel({
		items: 1,
		lazyLoad: true,
		margin: 10,
	})
	.on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;
			$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});

	$sync2
	.owlCarousel({
		margin: 1,
		// loop: true,
		items: 6,
		center: true,
  })
	.on('click', '.owl-item', function () {
		$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

	})
	.on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;
			$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});

}

$(document).ready(function(){
	engineCarousel();
});
