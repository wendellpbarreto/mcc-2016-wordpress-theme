<?php $post_query = new WP_Query (array('post_type' => 'post', 'posts_per_page' => 6 )); ?>
<div id="blog">
    <header class="blog__header header row animated fade-in">
        <h1 class="blog__header-title header-title">Blog</h1><!-- h1 class='blog__header-title header-title' -->
        <hr class="header-divider" />
        <h5 class="blog__header-subtitle header-subtitle">Novidades e Dicas da área médica</h5><!-- h5 class='blog__header-subtitle header-subtitle' -->
    </header><!-- header class='blog__header heade row' -->
    <div class="carousel row">
        <div class="carousel__item column">
            <ul class="post-block-list-white small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                <?php if ($post_query->have_posts()) : ?>
                    <?php
                        $index_direction = 0;
                        $direction = array('left', 'up', 'right');
                    ?>
                    <?php while ($post_query->have_posts()) : ?>
                    <?php
                        $post_query->the_post();
                        $current_post = get_post();
                        $current_post->permalink = get_permalink();
                        $current_post->categories = get_the_category();
                        $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail(get_the_ID(), '350x250'));
                    ?>
                    <li class="animated fade-in-<?php echo $direction[$index_direction%3]; ?>">
                        <?php include 'partials/blog_post.php'; ?>
                    </li>
                    <?php $index_direction++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul><!-- ul class='small-block-grid-1 medium-block-grid-2 large-block-grid-3' -->
        </div><!-- div class='carousel__item' -->
    </div><!-- div class='owl-carousel' -->
    <p class="blog__read-more column text-center"><a href="<?php echo site_url().'/blog' ?>">Leia mais!</a></p><!-- p class='book__info-buy' -->
</div><!-- div id='blog' -->