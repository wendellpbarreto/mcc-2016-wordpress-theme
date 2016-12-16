<?php $slug = the_slug(false); ?>

<section id="categories-and-pages">
	<header>
		<h1>Veja também</h1>
	</header>
	<ul>
		<?php if (in_array($slug, array('equipe', 'organograma', 'historico'))): ?>
			<li class="<?php echo $slug == 'equipe' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('equipe')) ?>">Equipe</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
			<li class="<?php echo $slug == 'organograma' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('organograma')) ?>">Organograma</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
			<li class="<?php echo $slug == 'historico' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('historico')) ?>">Histórico</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
		<?php elseif (in_array($slug, array('etnologia', 'arqueologia', 'paleontologia'))): ?>
			<li class="<?php echo $slug == 'etnologia' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('etnologia')) ?>">Etnologia</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
			<li class="<?php echo $slug == 'arqueologia' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('arqueologia')) ?>">Arqueologia</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
			<li class="<?php echo $slug == 'paleontologia' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('paleontologia')) ?>">Paleontologia</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
		<?php elseif (in_array($slug, array('exposicoes-temporarias', 'exposicoes-de-longa-duracao'))): ?>
			<li class="<?php echo $slug == 'exposicoes-temporarias' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('exposicoes-temporarias')) ?>">Exposições Temporárias</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
			<li class="<?php echo $slug == 'exposicoes-de-longa-duracao' ? 'active' : '' ?>">
				<a href="<?php echo get_permalink(get_page_by_path('exposicoes-de-longa-duracao')) ?>">Exposições de Longa Duração</a>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
					<polygon points="0 10, 0 0, 5 0" />
				</svg>
			</li>
		<?php else: ?>
			<?php $current_category = get_the_category() ? get_the_category() : get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); ?>
			<?php $categories = get_categories(array('orderby' => 'name', 'order' => 'ASC')) ?>
			<?php foreach($categories as $category) : ?>
				<li class="<?php echo ($current_category[0]->name == $category->name) ? 'active' : '' ?>">
					<a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
						<polygon points="0 10, 0 0, 5 0" />
					</svg>
				</li>
			<?php endforeach; ?>
		<?php endif ?>
	</ul>
</section>
