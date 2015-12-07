<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
            <?php
                the_post();
                $current_post = get_post();
                $current_post->permalink = get_permalink();
                if ($current_post->post_type == 'post') {
                    $current_post->categories = get_the_category();
                } else {
                    $current_post->categories = get_the_terms( $post->ID, 'academic-category');
                }
                $current_post->tags = wp_get_post_tags($current_post->ID);
                $current_post->thumbnail = wp_get_attachment_url( get_post_thumbnail_id($current_post->ID) );
            ?>
            <?php if( $current_post->post_type == 'post'): ?>
            <?php include 'partials/blog_post.php'; ?>
            <?php else: ?>
            <?php include 'partials/academic_post.php'; ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php kriesi_pagination('', 5); ?>
        <?php endif; ?>
    </div><!-- div id='posts' class='large-15-columns' -->
    <aside id="aside" class="large-5 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
            <header class="aside__categories-header">
                <h5 class="aside__categories-header-title">Categorias</h5>
                <span class="aside__categories-header-line"></span>
            </header><!-- header class='aside__categories-header' -->
            <?php if ($wp_query->query_vars['taxonomy'] == 'academic-category'): ?>
                <ul class="aside__categories-list no-bullet">
                    <?php $args = array( 'taxonomy' => 'academic-category', 'orderby' => 'name', 'order' => 'ASC' ); ?>
                    <?php $categories = get_categories($args); ?>
                    <?php foreach($categories as $category) : ?>
                            <li class="aside__categories-item"><h6 data-href="<?php echo get_term_link( $category, 'academic-category' ) ?>"><?php echo $category->name ?></h6></li><!-- li class='aside__categories-item' <-->
                    <?php endforeach; ?>
                </ul><!-- ul class='aside__categories-list no-bullet' -->    
            <?php else: ?>    
                <ul class="aside__categories-list no-bullet">
                    <?php $args = array( 'orderby' => 'name', 'order' => 'ASC' ); ?>
                    <?php $categories = get_categories($args); ?>
                    <?php foreach($categories as $category) : ?>
                            <li class="aside__categories-item"><h6 data-href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></h6></li><!-- li class='aside__categories-item' <-->
                    <?php endforeach; ?>
                </ul><!-- ul class='aside__categories-list no-bullet' -->
            <?php endif; ?>
        </section><!-- section class='aside__category' -->
    </aside><!-- aside id='aside' class='large-5 column' -->
</div><!-- div class='posts__wrapper aside__wrapper row' -->