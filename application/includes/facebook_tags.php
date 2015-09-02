<?php
	if ( is_front_page() && is_home() ) {
		// Default homepage
	} elseif ( is_front_page() ) {
		// static homepage
	} elseif ( is_home() ) {
		// blog page
	} elseif ( is_single() ) {
		$the_post = get_post();

		$url = get_permalink();
		$title = $the_post->post_title;
		$description = $the_post->post_content;
		$image = wp_get_attachment_url( get_post_thumbnail_id( $the_post->ID ) );
	} else {
		//everyting else
		$url = get_site_url();
		$title = "Museu Câmara Cascudo";
		$description = " ";
		$image = get_image( 'logo.png' );
	} ?>

<meta property="og:url" content="<?php echo $url ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:description" ontent="<?php echo $description ?>">
<meta property="og:image" content="<?php echo $image ?>">
