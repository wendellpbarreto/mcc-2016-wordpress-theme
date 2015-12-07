<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns">
        <?php
            the_post();
            $current_post = get_post();
            $current_post->permalink = get_permalink();
            $current_post->categories = get_the_category();
            $current_post->tags = wp_get_post_tags($current_post->ID);
            $current_post->thumbnail = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
        ?>
        <?php include 'partials/livro_post.php'; ?>
    </div><!-- div id='posts' class='large-15-columns' -->

    <aside id="aside" class="large-5 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
            <header class="aside__categories-header">
                <h5 class="aside__categories-header-title">Comprar</h5>
                <span class="aside__categories-header-line"></span>
            </header><!-- header class='aside__categories-header' -->
            <?php echo $current_post->post_aside; ?>
        </section><!-- section class='aside__category' -->
    </aside><!-- aside id='aside' class='large-5 column' -->
</div><!-- div class='posts__wrapper aside__wrapper row' -->
