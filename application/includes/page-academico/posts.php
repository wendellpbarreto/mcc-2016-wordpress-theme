<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php $academic_query = new WP_Query (array('post_type' => 'academic', 'posts_per_page' => 6, 'paged' => $paged )); ?>
<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns">
        
        <?php if ($academic_query->have_posts()) : ?>
            <?php while ($academic_query->have_posts()) : ?>
            <?php
                $academic_query->the_post();
                $current_post = get_post();
                $current_post->categories = get_the_terms( $post->ID, 'academic-category');
                $current_post->permalink = get_permalink();
                $current_post->tags = wp_get_post_tags($current_post->ID);
            ?>
            <?php include 'partials/academic_post.php'; ?>
            <?php endwhile; ?>
            <?php kriesi_pagination($academic_query->max_num_pages, 5); ?>
        <?php endif; ?>
    </div><!-- div id='posts' class='large-15-columns' -->

    <aside id="aside" class="large-5 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
            <header class="aside__categories-header">
                <h5 class="aside__categories-header-title">Categorias</h5>
                <span class="aside__categories-header-line"></span>
            </header><!-- header class='aside__categories-header' -->
            <ul class="aside__categories-list no-bullet">
                <?php $args = array( 'taxonomy' => 'academic-category', 'orderby' => 'name', 'order' => 'ASC' ); ?>
                <?php $categories = get_categories($args); ?>
                <?php foreach($categories as $category) : ?>
                        <li class="aside__categories-item"><h6 data-href="<?php echo get_term_link( $category, 'academic-category' ) ?>"><?php echo $category->name ?></h6></li><!-- li class='aside__categories-item' <-->
                <?php endforeach; ?>
            </ul><!-- ul class='aside__categories-list no-bullet' -->
        </section><!-- section class='aside__category' -->
    </aside><!-- aside id='aside' class='large-5 column' -->
</div><!-- div class='posts__wrapper aside__wrapper row' -->