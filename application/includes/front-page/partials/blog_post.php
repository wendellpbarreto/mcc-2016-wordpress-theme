<div class="post-block__crop">
    <img src="<?php echo $current_post->thumbnail; ?>" alt="" class="img-responsive"/>
</div><!-- div class='crop' -->
<header class="post-block__header">
    <div class="post-block__header-tag-wrapper">
        <p class="post-block__header-tag"><?php echo $current_post->categories[0]->name; ?></p><!-- p class='tag' -->
        <span class="post-block__header-line"></span>
    </div><!-- div class='post-block__header-tag-wrapper' -->
    <h3 class="post-block__header-title"><a href="<?php echo $current_post->permalink ?>"><?php echo $current_post->post_title; ?></a></h3>
</header>
<div class="post-block__details">
    <p><?php echo $current_post->post_excerpt; ?></p>
</div><!-- div class='details' -->