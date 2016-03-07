<?php
	get_header();

	the_post();
	$current_page = get_post();
	$current_page->permalink = get_permalink();
	$current_page->categories = get_the_category();
	$current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
	$current_page->image = aq_resize( $current_page->image, 2000, 800, true, true, true, false );
?>

<?php include 'includes/topbar.php' ?>

<?php include 'includes/hero.php' ?>

<div class="posts__wrapper aside__wrapper row">
	<div id="posts" class="container small-20 medium-14 columns">
		<article class="post row">
			<div class="post__text column">
				<?php echo apply_filters('the_content', $current_page->post_content); ?>
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
