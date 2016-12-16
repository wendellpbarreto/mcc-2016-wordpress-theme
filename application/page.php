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
		<aside>
			<?php include 'includes/aside/search.php' ?>
			<?php include 'includes/aside/categories-and-pages.php' ?>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
				<polygon points="0 10, 0 0, 100 0" />
			</svg>
		</aside>
	</div>
</div>

<?php get_footer() ?>
