function scrollHandler() {
  var scrollTop = $(window).scrollTop();

  var topbar = $('#topbar');
  console.log("asd");
  var topbarHeight = topbar.outerHeight();

	if (scrollTop > topbarHeight) {
		classie.add(topbar[0], 'fixed-topbar');
	} else {
		classie.remove(topbar[0], 'fixed-topbar');
	}
}

$(window).scroll(scrollHandler);
