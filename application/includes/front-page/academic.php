<?php
    $articles_query = new WP_Query (array('post_type' => 'academic', 'posts_per_page' => 3, 'tax_query' => array( array( 'taxonomy' => 'academic-category', 'field' => 'slug', 'terms' => 'artigos' ))));
    $lectures_query = new WP_Query (array('post_type' => 'academic', 'posts_per_page' => 3, 'tax_query' => array( array( 'taxonomy' => 'academic-category', 'field' => 'slug', 'terms' => 'palestras' ))));
    $lessons_query  = new WP_Query (array('post_type' => 'academic', 'posts_per_page' => 3, 'tax_query' => array( array( 'taxonomy' => 'academic-category', 'field' => 'slug', 'terms' => 'aulas' ))));
?>
<div id="academic">
    <header class="academic__header header row animated fade-in">
        <h1 class="academic__header-title header-title">Acadêmico</h1><!-- h1 class='academic__header-title header-title' -->
        <hr class="header-divider" />
        <h5 class="academic__header-title header-subtitle">Confira os artigos, aulas e palestras do Prof. Abdo Farret</h5><!-- h5 class='academic__header-title header-subtitle' -->
    </header><!-- header class='academic__header heade row' -->
    <section class="academic__tabs-wrapper row">
        <div class="academic__tabs">
            <ul class="academic__tabs-list tabs" data-tab>
                <li class="academic__tab-title tab-title active animated fade-in-left">
                    <a href="#articles"><h6>Artigos</h6></a>
                </li>
                <li class="academic__tab-title tab-title animated fade-in-up">
                    <a href="#lectures"><h6>Palestras</h6></a>
                </li>
                <li class="academic__tab-title tab-title animated fade-in-right">
                    <a href="#lessons"><h6>Aulas</h6></a>
                </li>
            </ul><!-- ul class='tabs' -->
        </div>
        <div class="academic__tabs-contents tabs-content column">
            <div class="content active" id="articles">
                <ul class="post-block-list small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                    <?php if ($articles_query->have_posts()) : ?>
                        <?php
                            $index_direction = 0;
                            $direction = array('left', 'up', 'right');
                        ?>
                        <?php while ($articles_query->have_posts()) : ?>
                        <?php
                            $articles_query->the_post();
                            $current_post = get_post();
                            $current_post->permalink = get_permalink();
                            $current_post->tags = wp_get_post_tags($current_post->ID);
                        ?>
                        <li class="animated fade-in-<?php echo $direction[$index_direction%3]; ?>">
                            <?php include 'partials/academic_post.php'; ?>
                        </li>
                        <?php $index_direction++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul><!-- ul class='small-block-grid-1 medium-block-grid-2 large-block-grid-3' -->
            </div><!-- div id='articles' class='content active' -->
            <div class="content" id="lectures">
                <ul class="post-block-list small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                    <?php if ($lectures_query->have_posts()) : ?>
                        <?php while ($lectures_query->have_posts()) : ?>
                        <?php
                            $lectures_query->the_post();
                            $current_post = get_post();
                            $current_post->permalink = get_permalink();
                            $current_post->tags = wp_get_post_tags($current_post->ID);
                        ?>
                        <li>
                            <?php include 'partials/academic_post.php'; ?>
                        </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul><!-- ul class='small-block-grid-1 medium-block-grid-2 large-block-grid-3' -->
            </div><!-- div id='lectures' class='content active' -->
            <div class="content" id="lessons">
                <ul class="post-block-list small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                    <?php if ($lessons_query->have_posts()) : ?>
                        <?php while ($lessons_query->have_posts()) : ?>
                        <?php
                            $lessons_query->the_post();
                            $current_post = get_post();
                            $current_post->permalink = get_permalink();
                            $current_post->tags = wp_get_post_tags($current_post->ID);
                        ?>
                        <li>
                            <?php include 'partials/academic_post.php'; ?>
                        </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul><!-- ul class='small-block-grid-1 medium-block-grid-2 large-block-grid-3' -->
            </div><!-- div id='lessons' class='content active' -->
        </div><!-- div class='tabs-content' -->
    </section><!-- section class='academic__tabs' -->
    <p class="academic__read-more column text-center"><a href="<?php echo site_url().'/academico' ?>">Leia mais!</a></p><!-- p class='book__info-buy' -->
</div><!-- div id='academic' -->