<?php
	get_header();

	the_post();
	$current_post = get_post();
	$current_post->permalink = get_permalink();
	$current_post->categories = get_the_category();
	$current_post->tags = wp_get_post_tags($current_post->ID);
	$current_post->image = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
	$current_post->image200x850 = aq_resize( $current_post->image, 2000, 850, true );
	$current_post->attachments = get_attachments_from_post($current_post);
    $current_post->post_content = strip_shortcodes($current_post->post_content);

	$current_page = get_page_by_path( 'blog' );
    $current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
    $current_page->image200x850 = aq_resize( $current_page->image, 2000, 850, true ); ?>

<?php include 'includes/topbar.php' ?>

<section id="hero" class="container" style="background-image: url(<?php echo $current_post->image200x850 ? $current_post->image200x850 : $current_page->image200x850 ?>);">
	<header class="hero__header">
		<h1 class="hero__header-title white">Notícia</h1>
		<hr class="hero__header-divider">
	</header>
</section>

<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns internal p-r-xl">
        <article class="post row">
		    <header class="post__header column">
		        <div class="post__header-tag-wrapper">
		            <h6 class="post__header-tag"><?php echo $current_post->categories[0]->name; ?></h6>
		            <span class="post__header-line"></span>
		        </div>
		        <h3 class="post__header-title"><?php echo $current_post->post_title; ?></h3>
		        <p class="post__header-text small">
		            <?php echo $current_post->post_excerpt; ?>
		        </p>
		        <div class="post__header-meta">
		            <p class="post__header-meta-time">
		                <i class="icon-clock"></i> <?php echo date('j \d\e M/Y', strtotime($current_post->post_date)); ?>
		            </p>
		            <p class="post__header-meta-share">
		                COMPARTILHE
		                <div class="fb-share-button" data-href="<?php echo $current_post->permalink ?>" data-layout="button_count">

		                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $current_post->permalink ?>">Tweet</a>
		            </p>
		        </div>
		    </header>
		    <div class="post__crop column">
		        <img src="<?php echo $current_post->thumbnail ?>" alt="" class="img-responsive"/>
		    </div>
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

    <aside id="aside" class="large-5 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
            <header class="aside__categories-header">
                <h5 class="aside__categories-header-title">Categorias</h5>
                <span class="aside__categories-header-line"></span>
            </header>
            <ul class="aside__categories-list no-bullet">
                <?php $args = array( 'orderby' => 'name', 'order' => 'ASC' ); ?>
                <?php $categories = get_categories($args); ?>
                <?php foreach($categories as $category) : ?>
                    <li class="aside__categories-item"><h6 data-href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></h6></li>
                <?php endforeach; ?>
            </ul>
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
