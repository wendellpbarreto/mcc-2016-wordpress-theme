<?php
	get_header();

	the_post();
	$current_post = get_post();
	$current_post->permalink = get_permalink();
	$current_post->categories = get_the_terms($current_post->ID, 'exposition_category');
	$current_post->tags = wp_get_post_tags($current_post->ID);
	$current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
	$current_post->image200x850 = aq_resize( $current_post->image, 2000, 850, true );
	$current_post->attachments = get_attachments_from_post($current_post);
    $current_post->post_content = strip_shortcodes($current_post->post_content); ?>

<?php include 'includes/topbar.php' ?>

<section id="hero" class="container" style="background-image: url(<?php echo $current_post->image200x850 ?>);">
	<header class="hero__header">
		<h1 class="hero__header-title white"><?php echo $current_post->post_title; ?></h1>
		<hr class="hero__header-divider">
		<h5 class="hero__header-subtitle">
			<?php if(reset($current_post->categories)->name == "Longa Duração"):  ?>
				Exposição de Longa Duração
			<?php else: ?>
				Exposição Temporária
			<?php endif ?>
		</h5>
	</header>
</section>

<div class="posts__wrapper aside__wrapper row">
	<div id="posts" class="large-20 columns internal">
		<article class="post row">
			<div class="post__text column">
				<?php echo apply_filters('the_content', $current_post->post_content); ?>
			</div>
			<div class="post__carousel column">
				<?php foreach($current_post->attachments as $attachment) : ?>
					<div class="post__carousel-item">
						<img class="post__carousel-item-image owl-lazy img-responsive" data-src="<?php echo aq_resize( $attachment->guid, 1040, 500, true ); ?>" alt="<?php echo $attachment->post_title ?>">
						<p class="post__carousel-item-title"><?php echo $attachment->post_title ?></p>
						<p class="post__carousel-item-legend"><?php echo $attachment->post_excerpt ?></p>
					</div>
				<?php endforeach ?>
			</div>
			<div class="post__carousel-thumbs column">
				<?php foreach($current_post->attachments as $attachment) : ?>
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
</div>

<section id="expositions" class="container">

</section>

<div class="page-gap"></div>

<?php include 'includes/footer.php' ?>

<?php get_footer() ?>

<!-- scripts::animate -->
<script>
	new cbpScroller(document.getElementById('footer'));
</script>
