<article class="post row">
    <header class="post__header column">
        <h3 class="post__header-title"><?php echo $current_post->post_book_name; ?></h3><!-- h3 class='post__header-title' -->
        <p class="post__header-text small">
            <?php echo apply_filters('the_content', $current_post->post_excerpt); ?>
        </p><!-- p class='post__header-text' -->
        <div class="post__header-meta">
            <!-- <p class="post__header-meta-time">
                <i class="icon-clock"></i> <?php echo date('j My', strtotime($current_post->post_date)); ?>
            </p>
            <p class="post__header-meta-share">
                COMPARTILHE <i class="icon-facebook" data-href="#"></i> <i class="icon-twitter" data-href="#"></i>
            </p> -->
        </div><!-- div class='post__header-meta' -->
    </header><!-- header class='post__header column' -->
    <!-- <div class="post__crop column">
        <img src="<?php echo $current_post->thumbnail ?>" alt="" class="img-responsive"/>
    </div>--><!-- div class='post__crop column' --> 
    <div class="post__text column">
        <?php echo apply_filters('the_content', $current_post->post_content); ?>
    </div><!-- div class='post__text column' -->
    <div class="post__meta">
        <p class="post__meta-tags small large-10 columns">
            <i class="icon-tag"></i>
            <?php $index = 0; ?>
            <?php foreach ($current_post->tags as $tags => $tag) : ?>
                <?php if ($index!=0) echo ","; ?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
                <?php $index++; ?>
            <?php endforeach; ?>
        </p><!-- p class='post__meta-tags large-10 columns' -->
        <p class="post__meta-comments small large-10 columns">
            <!-- <i class="icon-bubble"></i> 2 comentários -->
        </p><!-- p class='post__meta-comments large-10 columns' -->
    </div><!-- div class='post__meta column' -->
    <hr class="post__divider column" />
</article><!-- article class='post row' -->