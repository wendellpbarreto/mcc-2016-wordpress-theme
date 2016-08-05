<?php $slug = the_slug(false); ?>


<section id="toptopbar" class="container show-for-medium-up">
	<div class="row">
		<div class="small-12 columns text-left">
		    <img class="topbar__logo-img" src="<?php echo get_image('mcc@logo.jpg') ?>" alt="" data-href="<?php echo get_site_url() ?>" width="260"/>
		</div>
	</div>
</section>

<section id="topbar" class="container show-for-medium-up">
	<div class="row">
		<div class="small-20 columns">
			<ul class="topbar__nav">
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'home' ) ) ?>" class="<?php echo is_front_page() ? 'active' : '' ?>">Início</a>
				</li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'historical' ) ) ?>" class="<?php echo $slug == 'historical' || $slug == 'organogram' || $slug == 'team' ? 'active' : '' ?>">Museu</a>
				</li>
				<li>
	                <a href="<?php echo get_permalink( get_page_by_path( 'research' ) ) ?>" class="<?php echo $slug == 'research' ? 'active' : '' ?>">Pesquisa</a>
                </li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'paleontology' ) ) ?>" class="<?php echo $slug == 'paleontology' || $slug == 'archeology' || $slug == 'ethnology' || $slug == 'herbary' ? 'active' : '' ?>">Acervo</a>
				</li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'long-duration-expositions' ) ) ?>" class="<?php echo $slug == 'long-duration-expositions' || $slug == 'temporary-expositions' ? 'active' : '' ?>">Exposições</a>
				</li>
				<li>
                	<a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>" class="<?php echo is_home() ? 'active' : '' ?>">Notícias</a>
                </li>
				<li>
					<a href="<?php echo get_permalink( get_page_by_path( 'localization' ) ) ?>" class="<?php echo $slug == 'localization' || $slug == 'schedule-your-visit' || $slug == 'science-park' || $slug == 'documentation-center-verissimo-de-melo' || $slug == 'contact' ? 'active' : '' ?>">Visite o Museu</a>
				</li>
			</ul>
		</div>
	</div>
</section>


