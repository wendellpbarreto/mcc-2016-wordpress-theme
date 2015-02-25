<section id="topbar" class="container">
	<div class="row">
		<div class="medium-4 columns">
            <img class="topbar__logo-img" src="http://placehold.it/200x80" alt="" data-href="<?php echo site_url() ?>"/>
            <!-- <img class="topbar__logo-img" src="<?php echo get_assets_root_uri(); ?>/images/logo.png" alt="" data-href="<?php echo site_url() ?>"/> -->
		</div>
		<div class="medium-16 columns">
			<nav class="topbar__nav">
				<a href="<?php echo get_site_url() ?>" class="active">Início</a>
                <a data-scroll-to="#blog">Institucional</a>
                <a data-scroll-to="#blog">Acervo</a>
                <a href="<?php echo get_site_url().'/blog/' ?>">Notícias</a>
                <a href="<?php echo get_permalink( get_page_by_title( '' ) ) ?>">Visite o Museu</a>
                <a data-scroll-to="#footer">Contato</a>
			</nav>
		</div>
	</div>
</section>
