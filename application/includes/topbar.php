<?php $slug = the_slug(false); ?>

<section id="topbar" class="container show-for-medium-up">
	<div class="row">
		<div class="small-12 medium-4 columns">
            <img class="topbar__logo-img" src="<?php echo get_image('mcc@logo.png') ?>" alt="" data-href="<?php echo get_site_url() ?>"/>
		</div>
		<div class="medium-16 columns">
			<ul class="topbar__nav">
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'home' ) ) ?>" class="<?php echo is_front_page() ? 'active' : '' ?>">Início</a>
				</li>

				<li class="has-dropdown">
					<a class="<?php echo $slug == 'historical' || $slug == 'organogram' || $slug == 'team' ? 'active' : '' ?>">Institucional</a>
					<span class="space"></span>
					<ul class="dropdown institutional">
						<li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'historical' ) ) ?>">Histórico</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'organogram' ) ) ?>">Setores</a>
			                <!-- <a href="<?php echo get_permalink( get_page_by_path( 'sectors' ) ) ?>">Setores</a> -->
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'team' ) ) ?>">Equipe</a>
						</li>
					</ul>
				</li>

				<li>
	                <a href="<?php echo get_permalink( get_page_by_path( 'research' ) ) ?>" class="<?php echo $slug == 'research' ? 'active' : '' ?>">Pesquisa</a>
                </li>

				<li>
		            <a href="<?php echo get_permalink( get_page_by_path( 'extension' ) ) ?>" class="<?php echo $slug == 'extension' ? 'active' : '' ?>">Extensão</a>
				</li>

				<li class="has-dropdown">
					<a class="<?php echo $slug == 'paleontology' || $slug == 'archeology' || $slug == 'ethnology' || $slug == 'herbary' ? 'active' : '' ?>">Acervo</a>
					<span class="space"></span>
					<ul class="dropdown collection">
						<li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'paleontology' ) ) ?>">Paleontologia</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'archeology' ) ) ?>">Arqueologia</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'ethnology' ) ) ?>">Etnologia</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'herbary' ) ) ?>">Herbário</a>
						</li>
					</ul>
				</li>

				<li class="has-dropdown">
					<a class="<?php echo $slug == 'long-duration-expositions' || $slug == 'temporary-expositions' ? 'active' : '' ?>">Exposições</a>
					<span class="space"></span>
					<ul class="dropdown expositions">
						<li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'long-duration-expositions' ) ) ?>">Longa Duração</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'temporary-expositions' ) ) ?>">Temporária</a>
						</li>
					</ul>
				</li>

				<li>
                	<a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>" class="<?php echo is_home() ? 'active' : '' ?>">Notícias</a>
                </li>

				<li class="has-dropdown">
					<a class="<?php echo $slug == 'localization' || $slug == 'schedule-your-visit' || $slug == 'science-park' || $slug == 'documentation-center-verissimo-de-melo' || $slug == 'contact' ? 'active' : '' ?>">Visite o Museu</a>
					<span class="space"></span>
					<ul class="dropdown visit-us">
						<li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">Localização e Contato</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'schedule-your-visit' ) ) ?>">Agende Sua Visita</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'science-park' ) ) ?>">Parque da Ciência</a>
			            </li>
			            <li>
			                <a href="<?php echo get_permalink( get_page_by_path( 'documentation-center-verissimo-de-melo' ) ) ?>">Centro de Documentação Veríssimo de Melo</a>
			            </li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</section>


