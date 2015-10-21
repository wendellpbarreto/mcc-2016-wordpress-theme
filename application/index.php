<?php
	get_header();

	$current_page = get_page_by_path( 'blog' );
    $current_page->image = wp_get_attachment_url( get_post_thumbnail_id($current_page->ID) );
    $current_page->image200x850 = aq_resize( $current_page->image, 2000, 700, true ); ?>

<?php include 'includes/topbar.php' ?>

<section id="hero" class="container" style="background-image: url(<?php echo $current_page->image200x850 ?>);">
	<header class="hero__header">
		<h1 class="hero__header-title white">Notícias</h1>
		<hr class="hero__header-divider">
	</header>

</section>

<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="small-20 medium-13 columns internal">
        <?php
        	if (have_posts()) :
        		while (have_posts()) :
	                the_post();
	                $current_post = get_post();
	                $current_post->permalink = get_permalink();
                    $current_post->categories = get_the_category();
	                $current_post->tags = wp_get_post_tags($current_post->ID);
	                $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail(get_the_ID(), '700x400'));
            ?>
            <article class="post row">
			    <header class="post__header column">
			        <div class="post__header-tag-wrapper">
			            <h6 class="post__header-tag"><?php echo $current_post->categories[0]->name; ?></h6>
			            <span class="post__header-line"></span>
			        </div>
			        <h3 class="post__header-title" data-href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title; ?></h3>
			        <p class="post__header-text small">
			            <?php echo $current_post->post_excerpt; ?>
			        </p>
			        <div class="post__header-meta">
			            <p class="post__header-meta-time">
			                <i class="icon-clock"></i> <?php echo date('j \d\e M/Y', strtotime($current_post->post_date)); ?>
			            </p>
			        </div>
			    </header>
			    <div class="post__crop column" data-href="<?php echo $current_post->permalink ?>">
			        <img src="<?php echo $current_post->thumbnail ?>" alt="" class="img-responsive"/>
			    </div>
			</article>
            <?php
            	endwhile;
            	// kriesi_pagination('', 5);
            endif;
           	?>
    </div>

    <aside id="aside" class="small-20 medium-6 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
        	<div class="small-20 column">
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
