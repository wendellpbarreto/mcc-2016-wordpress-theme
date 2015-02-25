<article class="post row">
    <header class="post__header column">
        <div class="post__header-tag-wrapper">
            <?php if ($current_post->categories) : ?>
                <h6 class="post__header-tag">
                    <?php foreach ($current_post->categories as $index => $category) : ?>
                        <?php print_r($category->name); ?>
                    <?php endforeach; ?>
                </h6><!-- h6 class='post__header-tag' -->
                <span class="post__header-line"></span>
            <?php endif; ?>
        </div><!-- div class='post__header-tag-wrapper' -->
        <h3 class="post__header-title"><?php echo $current_post->post_title; ?></h3><!-- h3 class='post__header-title' -->
    </header><!-- header class='post__header column' -->
    <div class="column">
        <div class="post__content">
            <?php echo apply_filters('the_content', $current_post->post_content); ?>
        </div><!-- div class='post__header-text' -->
    </div>
</article><!-- article class='post row' -->
