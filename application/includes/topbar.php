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
				<li>
					<a data-drop="institutional" class="<?php echo $slug == 'historical' || $slug == 'organogram' || $slug == 'team' ? 'active' : '' ?>">Institucional</a>
				</li>
				<li>
	                <a href="<?php echo get_permalink( get_page_by_path( 'research' ) ) ?>" class="<?php echo $slug == 'research' ? 'active' : '' ?>">Pesquisa</a>
                </li>
				<li>
					<a data-drop="collection" class="<?php echo $slug == 'paleontology' || $slug == 'archeology' || $slug == 'ethnology' || $slug == 'herbary' ? 'active' : '' ?>">Acervo</a>
				</li>
				<li>
					<a data-drop="expositions" class="<?php echo $slug == 'long-duration-expositions' || $slug == 'temporary-expositions' ? 'active' : '' ?>">Exposições</a>
				</li>
				<li>
                	<a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>" class="<?php echo is_home() ? 'active' : '' ?>">Notícias</a>
                </li>
				<li>
					<a data-drop="visit-us" class="<?php echo $slug == 'localization' || $slug == 'schedule-your-visit' || $slug == 'science-park' || $slug == 'documentation-center-verissimo-de-melo' || $slug == 'contact' ? 'active' : '' ?>">Visite o Museu</a>
				</li>
			</ul>
		</div>
	</div>
</section>


