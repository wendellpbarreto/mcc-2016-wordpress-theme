<?php $current_post = get_page_by_title('Livro'); ?>
<?php $current_post->thumbnail = preg_replace('/(.*)src="(.*)" class(.*)/', "$2", get_the_post_thumbnail($current_post->ID, 'full')); ?>
<?php $current_post->image = aq_resize( $current_post->thumbnail, 360, 360, true ) ?>
<div id="book">
    <header class="book__header header row animated fade-in">
        <h1 class="book__header-title header-title">Livro</h1><!-- h1 class='book__header-title header-title' -->
        <hr class="header-divider" />
    </header><!-- header class='book__header heade row' -->
    <div class="book__info-wrapper row">
        <div class="book__info small-20 medium-12 large-12 columns animated fade-in-left">
            <header class="book__info-header">
                <h2 class="book__info-header-title">Angiologia para Clínicos</h2><!-- h2 class='book__info-header-title' -->
                <p class="book__info-header-subtitle"><?php echo $current_post->post_subtitle ?></p><!-- p class='book__info-header-subtitle' -->
            </header><!-- header class='book__info-header row' -->
            <div class="book__info-desc">
                <?php echo apply_filters('the_content', $current_post->post_call); ?>
            </div><!-- div class='book__info-desc' -->
        </div><!-- div class='book__info large-12 columns' -->
        <div class="book__info small-20 medium-8 large-8 columns animated fade-in-right">
            <div class="book__info-crop">
                <img src="<?php echo $current_post->image ?>" alt="" class="img-responsive"/>
            </div><!-- div class='book__info-crop row' -->
            <div class="book__info-meta row">
                <p class="book__info-disponibility small">* Disponível para compra nas principais livraria do país e na internet</p><!-- p class='book__info-disponibility' -->
                <p class="book__info-read column text-center"><a href="<?php echo get_permalink( get_page_by_title( 'Livro' ) ) ?>">Saiba mais</a></p><!-- p class='book__info-buy' -->
            </div><!-- div class='book__info-meta row' -->
        </div><!-- div class='book__info large-8 columns' -->
    </div><!-- div class='book__info-wrapper row' -->
    <div class="book__buy-wrapper">
        <div class="book__buy row">
            <span class="book__buy-arrow"></span>
            <h5 class="book__buy-info small-19 large-17 large-centered column animated fade-in-down">"<span>Angiologia para Clínicos</span> vem enriquecer a literatura médica brasileira e contribuir enormemente para a formação e educação permanente dos profissionais da área de saúde, condição fundamental para o processo contínuo e permanente de construção de uma saúde pública universal e de qualidade."</h5><!-- h6 class='book__buy-subtitle' -->
            <h2 class="book__buy-title column text-center animated fade-in-down">Dr. George Dantas de Azevedo</h2><!-- h2 class='book__buy-title' -->
            <p class="book__buy-subtitle column text-center animated fade-in-down">Coordenador do curso de Medicina da UFRN (2008-2012).</p><!-- h2 class='book__buy-title' -->
            <h6 class="book__buy-link column text-center animated fade-in-down"><a href="#">Comprar</a></h6><!-- h6 class='book__buy-link' -->
        </div><!-- div class='book__buy large-16 large-centered columns' -->
    </div><!-- div class='book__buy-wrapper row' -->
</div><!-- div id='book' -->
<?php $current_post = NULL; ?>