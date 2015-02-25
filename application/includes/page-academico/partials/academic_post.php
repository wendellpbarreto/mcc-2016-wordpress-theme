<article class="post row">
    <header class="post__header column">
        <div class="post__header-tag-wrapper">
            <h6 class="post__header-tag">
            <?php if ($current_post->categories): ?>
                <?php foreach ($current_post->categories as $index => $category) : ?>
                    <?php print_r($category->name); ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </h6><!-- h6 class='post__header-tag' -->
            <span class="post__header-line"></span>
        </div><!-- div class='post__header-tag-wrapper' -->
        <h3 class="post__header-title"><?php echo $current_post->post_title; ?></h3><!-- h3 class='post__header-title' -->
        <p class="post__header-text small">
            <?php echo $current_post->post_excerpt; ?>
        </p><!-- p class='post__header-text' -->
        <div class="post__header-meta">
            <p class="post__header-meta-time">
                <i class="icon-clock"></i><?php echo date('j My', strtotime($current_post->post_date)); ?>
            </p><!-- p class='post__header-meta-time' -->
        </div><!-- div class='post__header-meta' -->
    </header><!-- header class='post__header column' -->
    
    <?php echo apply_filters('the_content', $current_post->post_content); ?>

    <div class="post__meta column">
        <p class="post__meta-tags small">
            <i class="icon-tag"></i>
            <?php $index = 0; ?>
            <?php if ($current_post->tags): ?>
                <?php foreach ($current_post->tags as $tags => $tag) : ?>
                    <?php if ($index!=0) echo ","; ?>
                    <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
                    <?php $index++; ?>
                <?php endforeach; ?>
            <?php endif ?>
        </p><!-- p class='post__meta-tags large-10 columns' -->
        </p><!-- p class='post__meta-comments large-10 columns' -->
    </div><!-- div class='post__meta column' -->
    <?php if (function_exists('wpba_attachments_exist')) : ?>
        <?php if (wpba_attachments_exist(array( 'post_id' => $current_post->ID, 'show_post_thumbnail' => true ))) : ?>
            <?php $current_post->attachment = wpba_get_attachments(array( 'post_id' => $current_post->ID, 'show_post_thumbnail' => true )) ?>
            <div class="post__download column">
                <p class="post__download-link" data-href="<?php echo $current_post->attachment[0]->guid ?>">Baixar arquivo <i class="icon-cloud-download"></i></p><!-- p class='post__download-link' -->
            </div><!-- div class='post__read-more column' -->
        <?php endif; ?>
    <?php endif; ?>
    <hr class="post__divider column" />
</article><!-- article class='post row' -->
