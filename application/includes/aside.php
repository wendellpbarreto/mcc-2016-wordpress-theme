<?php $slug = the_slug(false); ?>

<aside id="aside" class="small-20 medium-6 columns">
	<?php include TEMPLATEPATH.'/search.php'; ?>
	<section class="aside__categories row">
		<div class="small-20 column">
			<header class="aside__categories-header">
				<h5 class="aside__categories-header-title">Veja também</h5>
			</header>
			<ul class="aside__categories-list no-bullet">
				<?php if($slug == 'historical'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'organogram' ) ) ?>">Setores</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'team' ) ) ?>">Equipe</h6></li>
				<?php elseif($slug == 'organogram'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'historical' ) ) ?>">Histórico</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'team' ) ) ?>">Equipe</h6></li>
				<?php elseif($slug == 'team'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'historical' ) ) ?>">Histórico</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'organogram' ) ) ?>">Setores</h6></li>
				<?php elseif($slug == 'paleontology'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'archeology' ) ) ?>">Arqueologia</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'ethnology' ) ) ?>">Etnologia</h6></li>
				<?php elseif($slug == 'archeology'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'paleontology' ) ) ?>">Paleontologia</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'ethnology' ) ) ?>">Etnologia</h6></li>
				<?php elseif($slug == 'ethnology'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'paleontology' ) ) ?>">Paleontologia</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'archeology' ) ) ?>">Arqueologia</h6></li>
				<?php elseif($slug == 'contact'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'schedule-your-visit' ) ) ?>">Agende Sua Visita</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'science-park' ) ) ?>">Parque da Ciência</h6></li>
				<?php elseif($slug == 'schedule-your-visit'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">Localização e Contato</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'science-park' ) ) ?>">Parque da Ciência</h6></li>
				<?php elseif($slug == 'science-park'): ?>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'contact' ) ) ?>">Localização e Contato</h6></li>
				<li class="aside__categories-item"><h6 data-href="<?php echo get_permalink( get_page_by_path( 'schedule-your-visit' ) ) ?>">Agende Sua Visita</h6></li>
				<?php else: ?>
					<?php $args = array( 'orderby' => 'name', 'order' => 'ASC' ); ?>
	                <?php $categories = get_categories($args); ?>
	                <?php foreach($categories as $category) : ?>
	                    <li class="aside__categories-item"><h6 data-href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></h6></li>
	                <?php endforeach; ?>
				<?php endif ?>
			</ul>
		</div>
	</section>
</aside>
