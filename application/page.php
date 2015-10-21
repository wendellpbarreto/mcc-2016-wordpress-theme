<?php
	get_header();

	the_post();
	$current_page = get_post();
	$current_page->permalink = get_permalink();
	$current_page->categories = get_the_category();
	$current_page->tags = wp_get_post_tags($current_page->ID);
	$current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
	$current_page->image200x850 = aq_resize( $current_page->image, 2000, 700, true );
	$current_page->attachments = get_attachments_from_post($current_page);
	$current_page->post_content = strip_shortcodes($current_page->post_content); ?>

<?php include 'includes/topbar.php' ?>

<?php include 'includes/hero.php' ?>

<div class="posts__wrapper aside__wrapper row">
	<div id="posts" class="container small-20 medium-14 columns">
		<article class="post row">
			<div class="post__text column">
				<?php echo apply_filters('the_content', $current_page->post_content); ?>
			</div>
			<div class="post__carousel column">
				<?php foreach($current_page->attachments as $attachment) : ?>
					<div class="post__carousel-item">
						<img class="post__carousel-item-image owl-lazy img-responsive" data-src="<?php echo aq_resize( $attachment->guid, 1040, 500, true ); ?>" alt="<?php echo $attachment->post_title ?>">
						<p class="post__carousel-item-title"><?php echo $attachment->post_title ?></p>
						<p class="post__carousel-item-legend"><?php echo $attachment->post_excerpt ?></p>
					</div>
				<?php endforeach ?>
			</div>
			<div class="post__carousel-thumbs column">
				<?php foreach($current_page->attachments as $attachment) : ?>
					<div class="post__carousel-item">
						<img class="post__carousel-item-image" src="<?php echo aq_resize( $attachment->guid, 200, 100, true ); ?>" alt="<?php echo $attachment->post_title ?>">
						<div class="post__carousel-item-hover">
							<p class="post__carousel-item-hover-title"><?php echo $attachment->post_title ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</article>
	</div>
	<?php include 'includes/aside.php' ?>
</div>

<div class="page-gap"></div>

<?php include 'includes/footer.php' ?>

<?php get_footer() ?>

<!-- scripts::animate -->
<script>
	new cbpScroller(document.getElementById('footer'));
</script>
