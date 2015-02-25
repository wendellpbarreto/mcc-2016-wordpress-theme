<div id="about">
    <?php $current_post = get_page_by_title('Sobre') ?>
    <header class="about__header header row animated fade-in-up">
        <h1 class="about__header-title header-title"><?php echo $current_post->post_title ?></h1><!-- h1 class='about__header-title header-title' -->
        <hr class="header-divider" />
        <h5 class="about__header-subtitle header-subtitle"><?php echo $current_post->post_subtitle ?></h5><!-- h5 class='about__header-subtitle header-subtitle' -->
    </header><!-- header class='about__header heade row' -->
    <article class="about__text row animated fade-in-up">
        <?php echo apply_filters('the_content', $current_post->post_content); ?>
    </article><!-- article class='about__text row' -->
    <?php $current_post = NULL; ?>
    <nav class="about__navigation row animated fade-in-up">
        <div class="about__navigation-wrapper large-19 large-centered column">
            <ul class="about__navigation-list small-block-grid-2 medium-block-grid-4">
                <?php #$current_post = get_page_by_title('DOENÇAS VASCULARES') ?>
                <?php $current_post = get_page_by_path('doencas-vasculares', OBJECT, 'service'); ?>
                <li class="about__navigation-item" data-href="<?php echo get_post_permalink($current_post->ID); ?>">
                    <div class="about__navigation-icon-wrapper">
                         <i class="about__navigation-icon"></i>
                     </div><!-- div class='about__navigation-icon-wrapper' -->
                    <h5 class="about__navigation-title"><?php echo $current_post->post_title ?></h5><!-- h5 class='about__navigation-title' -->
                    <p class="about__navigation-paragraph small"><?php echo $current_post->post_subtitle ?></p><!-- p class='about__navigation-paragraph small' -->
                </li><!-- li class='about__navigation-item' -->
                <?php $current_post = NULL; ?>
                <?php $current_post = get_page_by_path('varizes', OBJECT, 'service') ?>
                <li class="about__navigation-item" data-href="<?php echo get_post_permalink($current_post->ID); ?>">
                    <div class="about__navigation-icon-wrapper">
                         <i class="about__navigation-icon"></i>
                     </div><!-- div class='about__navigation-icon-wrapper' -->
                    <h5 class="about__navigation-title"><?php echo $current_post->post_title ?></h5><!-- h5 class='about__navigation-title' -->
                    <p class="about__navigation-paragraph small"><?php echo $current_post->post_subtitle ?></p><!-- p class='about__navigation-paragraph small' -->
                </li><!-- li class='about__navigation-item' -->
                <?php $current_post = NULL; ?>
                <?php $current_post = get_page_by_path('diagnosticos', OBJECT, 'service') ?>
                <li class="about__navigation-item" data-href="<?php echo get_post_permalink($current_post->ID); ?>">
                    <div class="about__navigation-icon-wrapper">
                         <i class="about__navigation-icon"></i>
                     </div><!-- div class='about__navigation-icon-wrapper' -->
                    <h5 class="about__navigation-title"><?php echo $current_post->post_title ?></h5><!-- h5 class='about__navigation-title' -->
                    <p class="about__navigation-paragraph small"><?php echo $current_post->post_subtitle ?></p><!-- p class='about__navigation-paragraph small' -->
                </li><!-- li class='about__navigation-item' -->
                <?php $current_post = NULL; ?>
                <?php $current_post = get_page_by_path('tratamentos', OBJECT, 'service') ?>
                <li class="about__navigation-item" data-href="<?php echo get_post_permalink($current_post->ID); ?>">
                    <div class="about__navigation-icon-wrapper">
                         <i class="about__navigation-icon"></i>
                     </div><!-- div class='about__navigation-icon-wrapper' -->
                    <h5 class="about__navigation-title"><?php echo $current_post->post_title ?></h5><!-- h5 class='about__navigation-title' -->
                    <p class="about__navigation-paragraph small"><?php echo $current_post->post_subtitle ?></p><!-- p class='about__navigation-paragraph small' -->
                </li><!-- li class='about__navigation-item' -->
                <?php $current_post = NULL; ?>
            </ul><!-- ul class='about__navigation-list small-block-grid-2 medium-block-grid-4' -->
        </div><!-- div class='about__navigation-wrapper large-19 large-centered column' -->
    </nav><!-- nav class='about__navigation' -->
</div><!-- div id='about' -->