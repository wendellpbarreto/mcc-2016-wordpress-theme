<?php
	get_header();

	the_post();
	$current_page = get_post();
	$current_page->permalink = get_permalink();
	$current_page->categories = get_the_category();
	$current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
	$current_page->image = aq_resize( $current_page->image, 2000, 800, true, true, true, false );

	$temporary_expositions_category = get_category_by_slug('temporary-expositions');
  	$temporary_expositions_category_id = $temporary_expositions_category->term_id;

	$expositions_query_args = array(
		'post_type'       => 'post',
		'posts_per_page'    => 999,
		'category_name'         => 'temporary-expositions',
	);
	$expositions_query = new WP_Query( $expositions_query_args ); ?>

<?php include 'includes/topbar.php' ?>

<?php include 'includes/hero.php' ?>

<div class="posts__wrapper aside__wrapper row">
	<div id="posts" class="container small-20 medium-14 columns">
		<article class="post row">
			<div class="post__text column">
				<?php echo apply_filters('the_content', $current_page->post_content); ?>
			</div>
		</article>
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
	</div>
	<aside id="aside" class="small-20 medium-6 columns">
		<?php include TEMPLATEPATH.'/search.php'; ?>
		<section class="aside__categories row">
			<div class="small-20 column">
				<header class="aside__categories-header">
					<h5 class="aside__categories-header-title">Veja também</h5>
				</header>
				<ul class="aside__categories-list no-bullet">
					<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'long-duration-expositions' ) ) ?>">Exposiçõe de Longa Duração</h6></li>
				</ul>
			</div>
		</section>
	</aside>
</div>



<div class="page-gap"></div>

<?php include 'includes/footer.php' ?>

<?php get_footer() ?>

<!-- scripts::animate -->
<script>
	new cbpScroller(document.getElementById('footer'));
</script>
