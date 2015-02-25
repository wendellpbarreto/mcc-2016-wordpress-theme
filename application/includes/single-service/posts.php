<div class="posts__wrapper aside__wrapper row">
    <div id="posts" class="large-15 columns">

        <?php
            the_post();
            $current_post = get_post();
            $current_post->categories = get_the_terms( $current_post->ID, 'service-category');
            $current_post->permalink = get_permalink();
            $current_post->tags = wp_get_post_tags($current_post->ID);
        ?>
        <?php include 'partials/service_post.php'; ?>

    </div>

    <aside id="aside" class="large-5 columns">
        <?php include TEMPLATEPATH.'/search.php'; ?>
        <section class="aside__categories row">
            <header class="aside__categories-header">
                <h5 class="aside__categories-header-title">Leia mais</h5>
                <span class="aside__categories-header-line"></span>
            </header><!-- header class='aside__categories-header' -->
            <ul class="aside__categories-list no-bullet">
                <?php $current_page = get_page_by_path('doencas-vasculares', OBJECT, 'service'); ?>
                    <li class="aside__categories-item <?php echo ( $current_page->post_title == $current_post->post_title ? 'hidden-for-small-up' : '' ); ?>">
                        <h6 data-href="<?php echo get_post_permalink($current_page->ID); ?>"><?php echo $current_page->post_title; ?></h6>
                    </li><!-- li class='aside__categories-item' <-->
                <?php $current_page = NULL; ?>
                <?php $current_page = get_page_by_path('varizes', OBJECT, 'service') ?>
                    <li class="aside__categories-item <?php echo ( $current_page->post_title == $current_post->post_title ? 'hidden-for-small-up' : '' ); ?>">
                        <h6 data-href="<?php echo get_post_permalink($current_page->ID); ?>"><?php echo $current_page->post_title; ?></h6>
                    </li><!-- li class='aside__categories-item' <-->
                <?php $current_page = NULL; ?>
                <?php $current_page = get_page_by_path('diagnosticos', OBJECT, 'service') ?>
                    <li class="aside__categories-item <?php echo ( $current_page->post_title == $current_post->post_title ? 'hidden-for-small-up' : '' ); ?>">
                        <h6 data-href="<?php echo get_post_permalink($current_page->ID); ?>"><?php echo $current_page->post_title; ?></h6>
                    </li><!-- li class='aside__categories-item' <-->
                <?php $current_page = NULL; ?>
                <?php $current_page = get_page_by_path('tratamentos', OBJECT, 'service') ?>
                    <li class="aside__categories-item <?php echo ( $current_page->post_title == $current_post->post_title ? 'hidden-for-small-up' : '' ); ?>">
                        <h6 data-href="<?php echo get_post_permalink($current_page->ID); ?>"><?php echo $current_page->post_title; ?></h6>
                    </li><!-- li class='aside__categories-item' <-->
                <?php $current_page = NULL; ?>
            </ul><!-- ul class='aside__categories-list no-bullet' -->
        </section><!-- section class='aside__category' -->
    </aside><!-- aside id='aside' class='large-5 column' -->
</div><!-- div class='posts__wrapper aside__wrapper row' -->