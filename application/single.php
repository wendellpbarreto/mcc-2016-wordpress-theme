<?php get_header() ?>

<?php
$current_post = get_post();
$current_post->categories = get_the_category();
$current_post->category = reset($current_post->categories);
$current_post->permalink = get_permalink();
$current_post->date = get_the_date('d/m/Y');
$current_post->thumbnail = wp_get_attachment_url(get_post_thumbnail_id($current_post->ID));
$current_post->thumbnail_1600 = aq_resize($current_post->thumbnail, 1600, 1000, false, true, true, false);
?>

<div class="page-wrapper">
	<?php include 'includes/masthead.php' ?>

	<div class="main-wrapper with-aside">
		<header id="page-header">
			<h1 class="page-title">Notícias</h1>
		</header>

		<main>
			<article class="post">
				<header>
					<p class="category"><?php echo $current_post->category->name; ?></p>
					<h1 class="title"><?php echo $current_post->post_title; ?></h1>
					<p class="date"><i class="fa fa-clock-o"></i> <?php echo $current_post->date; ?></p>
				</header>
				<?php if ($current_post->thumbnail) : ?>
					<div class="thumbnail-wrapper">
						<img class="thumbnail" src="<?php echo $current_post->thumbnail_1600 ? $current_post->thumbnail_1600 : $current_post->thumbnail ?>">
						<p class="credits">
							<?php if ($current_post->post_legend): ?>
								<i class="fa fa-camera"></i>
								<?php echo $current_post->post_legend ?> (Foto: <?php echo $current_post->post_credits ?>)
							<?php elseif ($current_post->post_credits): ?>
								<i class="fa fa-camera"></i>
								Foto: <?php echo $current_post->post_credits ?>
							<?php endif ?>
						</p>
					</div>
				<?php endif ?>
				<div class="content">
					<?php echo apply_filters( 'the_content', $current_post->post_content ) ?>
				</div>
				<?php if($current_post->post_source): ?>
					<p class="source">Fonte: <?php echo $current_post->post_source ?></p>
				<?php endif ?>
				<?php comments_template(); ?>
			</article>
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
