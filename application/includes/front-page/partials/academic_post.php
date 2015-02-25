<header class="post-block__header">
    <h3 class="post-block__header-title"><?php echo $current_post->post_title; ?></h3>
</header>
<div class="post-block__details">
    <p><?php echo $current_post->post_excerpt; ?></p>
    <p class="post-block__tags small">
        <i class="icon-tag"></i>
    	<?php $index = 0; ?>
    	<?php foreach ($current_post->tags as $tags => $tag) : ?>
    	    <?php if ($index!=0) echo ","; ?>
    	    <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
    	    <?php $index++; ?>
            <?php if ($index>9) break; ?>
    	<?php endforeach; ?>
    </p>
    <?php if (function_exists('wpba_attachments_exist')) : ?>
        <?php if (wpba_attachments_exist(array( 'post_id' => $current_post->ID, 'show_post_thumbnail' => true ))) : ?>
            <?php $current_post->attachment = wpba_get_attachments(array( 'post_id' => $current_post->ID, 'show_post_thumbnail' => true )) ?>
            <p class="post-block__attachment small"><i class="icon-cloud-download"></i> <a href="<?php echo $current_post->attachment[0]->guid ?>" download>Clique para baixar</a></p>
        <?php endif; ?>
    <?php endif; ?>
</div><!-- div class='details' -->