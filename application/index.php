<?php get_header() ?>

<?php $current_page = get_page_by_path('noticias') ?>

<?php $current_category = get_the_category() ? get_the_category() : get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')) ?>

<div class="page-wrapper">
	<?php include 'includes/masthead.php' ?>

	<div class="main-wrapper with-aside">
		<header id="page-header">
			<h1 class="page-title"><?php echo $current_page->post_title ?></h1>
			<?php if (is_category() && $current_category[0]): ?>
				<h2 class="page-subtitle"><?php echo $current_category[0]->name ?></h2>
			<?php endif ?>
			<?php if (is_search()): ?>
				<h2 class="page-subtitle">Resultados parar: "<?php echo get_search_query() ?>"</h2>
			<?php endif ?>
		</header>
		<main>
			<section id="posts">
				<?php
					if ( have_posts() ) : while ( have_posts() ) :
						the_post();
						$current_post = get_post();
						$current_post->categories = get_the_category();
						$current_post->category = reset($current_post->categories);
						$current_post->permalink = get_permalink();
						$current_post->date = get_the_date( 'd/m/Y' );
						$current_post->thumbnail = wp_get_attachment_url( get_post_thumbnail_id( $current_post->ID ) );
						$current_page->thumbnail_400 = aq_resize($current_page->thumbnail, 400, 400, true, true, true, false);
				?>
					<figure class="post tiny" data-href="<?php echo $current_post->permalink ?>">
						<figcaption>
							<p class="category"><?php echo $current_post->category->name ?></p>
							<h1 class="title"><?php echo $current_post->post_title ?></h1>
							<p class="date"><?php echo $current_post->date ?></p>
						</figcaption>
						<div class="thumbnail-wrapper">
							<?php if($current_post->thumbnail): ?>
								<div class="fake-image" style="background-image: url(<?php echo $current_post->thumbnail_400 ? $current_post->thumbnail_400 : $current_post->thumbnail ?>);"></div>
							<?php else: ?>
								<div class="fake-image"></div>
							<?php endif ?>
						</div>
					</figure>
				<?php endwhile; endif; ?>
			</section>
			<nav class="actions">
				<?php echo pagination() ?>
			</nav>
		</main>
		<aside>
			<?php include 'includes/aside/search.php' ?>
			<?php include 'includes/aside/post-categories.php' ?>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
				<polygon points="0 10, 0 0, 100 0" />
			</svg>
		</aside>
	</div>
</div>

<?php get_footer() ?>
