<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns">
        <?php
            the_post();
            $current_post = get_post();
            $current_post->permalink = get_permalink();
            $current_post->categories = get_the_category();
            $current_post->tags = wp_get_post_tags($current_post->ID);
            $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail(get_the_ID(), '700x400'));
        ?>
        <?php include 'partials/blog_post.php'; ?>
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