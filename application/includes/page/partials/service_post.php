<article class="post row">
    <header class="post__header column">
        <h3 class="post__header-title"><?php echo $current_post->post_title; ?></h3><!-- h3 class='post__header-title' -->
        <p class="post__header-text small">
            <?php echo apply_filters('the_content', $current_post->post_content); ?>
        </p><!-- p class='post__header-text' -->
    </header><!-- header class='post__header column' -->
</article><!-- article class='post row' -->
