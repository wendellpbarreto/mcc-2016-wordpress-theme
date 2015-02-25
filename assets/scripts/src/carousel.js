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
    autoplay: true,
    loop: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    dots: true,
	});
}

$(document).ready(function(){
  engineCarousel();
});
