<?php get_header() ?>

<section id="topbar" class="container">
	<div class="row">
		<div class="medium-4 columns">
            <img class="topbar__logo-img" src="http://placehold.it/200x80" alt="" data-href="<?php echo site_url() ?>"/>
            <!-- <img class="topbar__logo-img" src="<?php echo get_assets_root_uri(); ?>/images/logo.png" alt="" data-href="<?php echo site_url() ?>"/> -->
		</div>
		<div class="medium-16 columns">
			<nav class="topbar__nav">
				<a href="<?php echo get_site_url() ?>">Início</a>
                <a data-scroll-to="#blog">Institucional</a>
                <a data-scroll-to="#blog">Acervo</a>
                <a href="<?php echo get_site_url().'/blog/' ?>" class="active">Notícias</a>
                <a href="<?php echo get_permalink( get_page_by_title( '' ) ) ?>">Visite o Museu</a>
                <a data-scroll-to="#footer">Contato</a>
			</nav>
		</div>
	</div>
</section>

<section id="hero" class="container">
	<img src="<?php echo get_image( 'bg@post.jpg' ) ?>" alt="Hero">
	<header class="hero__header">
		<h1 class="hero__header-title">Notícias</h1>
		<hr class="hero__header-divider">
	</header>
</section>

<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns">
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
			            <h6 class="post__header-tag"><?php echo $current_post->categories[0]->name; ?></h6><!-- h6 class='post__header-tag' -->
			            <span class="post__header-line"></span>
			        </div><!-- div class='post__header-tag-wrapper' -->
			        <h3 class="post__header-title" data-href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title; ?></h3><!-- h3 class='post__header-title' -->
			        <p class="post__header-text small">
			            <?php echo $current_post->post_excerpt; ?>
			        </p><!-- p class='post__header-text' -->
			        <div class="post__header-meta">
			            <p class="post__header-meta-time">
			                <i class="icon-clock"></i> <?php echo date('j \d\e M/Y', strtotime($current_post->post_date)); ?>
			            </p><!-- p class='post__header-meta-time' -->
			        </div><!-- div class='post__header-meta' -->
			    </header><!-- header class='post__header column' -->
			    <div class="post__crop column" data-href="<?php echo $current_post->permalink ?>">
			        <img src="<?php echo $current_post->thumbnail ?>" alt="" class="img-responsive"/>
			    </div><!-- div class='post__crop column' -->
			</article><!-- article class='post row' -->
            <?php
            	endwhile;
            	// kriesi_pagination('', 5);
            endif;
           	?>
    </div><!-- div id='posts' class='large-15-columns' -->

    <aside id="aside" class="large-5 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
            <header class="aside__categories-header">
                <h5 class="aside__categories-header-title">Categorias</h5>
                <span class="aside__categories-header-line"></span>
            </header><!-- header class='aside__categories-header' -->
            <ul class="aside__categories-list no-bullet">
                <?php $args = array( 'orderby' => 'name', 'order' => 'ASC' ); ?>
                <?php $categories = get_categories($args); ?>
                <?php foreach($categories as $category) : ?>
                    <li class="aside__categories-item"><h6 data-href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></h6></li><!-- li class='aside__categories-item' <-->
                <?php endforeach; ?>
            </ul><!-- ul class='aside__categories-list no-bullet' -->
        </section><!-- section class='aside__category' -->
    </aside><!-- aside id='aside' class='large-5 column' -->
</div><!-- div class='posts__wrapper aside__wrapper row' -->

<?php include 'includes/footer.php' ?>
<?php get_footer() ?>

<!-- scripts::animate -->
<script>
    new cbpScroller(document.getElementById('footer'));
</script>
