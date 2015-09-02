<?php
	get_header();

	the_post();
	$current_page = get_post();
	$current_page->permalink = get_permalink();
	$current_page->categories = get_the_category();
	$current_page->tags = wp_get_post_tags($current_page->ID);
	$current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
	$current_page->image200x850 = aq_resize( $current_page->image, 2000, 850, true );

	$expositions_query_args = array(
		'post_type'       => 'exposition',
		'posts_per_page'    => 999,
		'tax_query' => array(
			array(
				'taxonomy' => 'exposition_category',
				'field'    => 'slug',
				'terms'    => 'temporary',
			),
		),
	);
	$expositions_query = new WP_Query( $expositions_query_args ); ?>

<?php include 'includes/topbar.php' ?>

<?php include 'includes/hero.php' ?>

<div class="posts__wrapper aside__wrapper row">
	<div id="posts" class="large-20 columns internal">
		<article class="post row">
			<div class="post__text column">
				<?php echo apply_filters('the_content', $current_page->post_content); ?>
			</div>
		</article>
	</div>
</div>

<section id="expositions" class="container">
	<?php
		if ($expositions_query->have_posts()) :
			while ($expositions_query->have_posts()) :
				$expositions_query->the_post();
				$current_post = get_post();
				$current_post->permalink = get_permalink();
				$current_post->tags = wp_get_post_tags($current_post->ID);
				$current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
				$current_post->image500x400 = aq_resize( $current_page->image, 500, 400, true );
				$current_post->attachments = get_attachments_from_post($current_post);
				$current_post->post_content = strip_shortcodes($current_post->post_content); ?>
	<div class="exposition row" data-href="<?php echo $current_post->permalink ?>">
		<div class="small-20 medium-7 columns">
			<img src="<?php echo $current_post->image500x400 ?>" alt="<?php echo $current_post->post_title ?>">
		</div>
		<div class="small-20 medium-13 columns">
			<h4 class="exposition__title"><?php echo $current_post->post_title ?></h4>
			<p class="exposition__short-description"><?php echo $current_post->post_short_description ?></p>
			<!-- <div class="exposition__carousel">
				<?php foreach($current_post->attachments as $attachment) : ?>
					<div class="exposition__image-crop">
						<img src="<?php echo $attachment->guid ?>" alt="<?php echo $attachment->post_title ?>">
						<p class="exposition__image-title"><?php echo $attachment->post_title ?></p>
						<p class="exposition__image-legend"><?php echo $attachment->post_excerpt ?></p>
					</div>
				<?php endforeach ?>
			</div>
 -->    </div>
	</div>
	<?php   endwhile;
		endif; ?>
</section>

<div class="page-gap"></div>

<?php include 'includes/footer.php' ?>

<?php get_footer() ?>

<!-- scripts::animate -->
<script>
	new cbpScroller(document.getElementById('footer'));
</script>
