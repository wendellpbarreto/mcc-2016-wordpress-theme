<?php get_header() ?>
<?php
    the_post();
    $current_post = get_post();
    $current_post->permalink = get_permalink();
    $current_post->categories = get_the_category();
    $current_post->tags = wp_get_post_tags($current_post->ID);
    $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail(get_the_ID(), 'galeria'));
    $current_post->image = aq_resize( $current_post->thumbnail, 1440, 350, true );
?>
<?php include 'includes/topbar.php' ?>

<section id="hero" class="container" style="background-image: url(<?php echo $current_post->image ?>);">
	<!-- <img src="<?php echo $current_post->image ?>" alt="Hero"> -->
	<header class="hero__header">
		<h1 class="hero__header-title"><?php echo $current_post->post_title; ?></h1>
		<hr class="hero__header-divider">
	</header>
</section>

<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-20 columns internal">
        <article class="post row">
		    <header class="post__header column">
		        <!-- <div class="post__header-tag-wrapper">
		            <h6 class="post__header-tag"><?php echo $current_post->categories[0]->name; ?></h6>
		            <span class="post__header-line"></span>
		        </div>
		        <p class="post__header-text small">
		            <?php echo $current_post->post_excerpt; ?>
		        </p> -->
		        <!-- <div class="post__header-meta">
		            <p class="post__header-meta-time">
		                <i class="icon-clock"></i> <?php echo date('j \d\e M/Y', strtotime($current_post->post_date)); ?>
		            </p>
		            <p class="post__header-meta-share">
		                COMPARTILHE <i class="icon-facebook" data-href="#"></i> <i class="icon-twitter" data-href="#"></i>
		            </p>
		        </div> -->
		    </header>
		    <div class="post__text column">
		        <?php echo apply_filters('the_content', $current_post->post_content); ?>
		    </div>
		</article>
    </div>
</div>

<?php include 'includes/footer.php' ?>
<?php get_footer() ?>

<!-- scripts::animate -->
<script>
    new cbpScroller(document.getElementById('footer'));
</script>
