<?php get_header() ?>

<?php $current_page = get_post() ?>

<div class="page-wrapper">
	<?php include 'includes/masthead.php' ?>

	<div class="main-wrapper with-aside">
		<header id="page-header">
			<h1 class="page-title"><?php echo $current_page->post_title ?></h1>
		</header>
		<main>
			<article class="post">
				<div class="content">
					<?php echo apply_filters('the_content', $current_page->post_content); ?>
				</div>
			</article>
		</main>
	</div>
</div>

<?php get_footer() ?>
