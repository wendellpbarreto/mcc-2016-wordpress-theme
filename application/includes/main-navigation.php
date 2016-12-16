<?php $slug = the_slug(false); ?>

<nav class="main-navigation">
	<li class="has-dropdown <?php echo in_array($slug, array('equipe', 'organograma', 'historico')) ? 'active' : '' ?>">
		<a href="javacript: void(0);">Institucional</a>
		<ul class="dropdown">
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('equipe')) ?>">
					<span><i class="fa fa-users"></i><br> Equipe</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('organograma')) ?>">
					<span><i class="fa fa-sitemap"></i><br> Organograma</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('historico')) ?>">
					<span><i class="fa fa-file-text-o"></i><br> Histórico</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="<?php echo $slug == 'pesquisa' ? 'active' : '' ?>">
		<a href="<?php echo get_permalink(get_page_by_path('pesquisa')) ?>">Pesquisa</a>
	</li>
	<li class="has-dropdown <?php echo in_array($slug, array('etnologia', 'arqueologia', 'paleontologia')) ? 'active' : '' ?>">
		<a href="javacript: void(0);">Acervo</a>
		<ul class="dropdown">
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('etnologia')) ?>">
					<span><i class="fa fa-gbp"></i><br> Etnologia</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('arqueologia')) ?>">
					<span><i class="fa fa-rupee fa-flip-vertical"></i><br> Arqueologia</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('paleontologia')) ?>">
					<span><i class="fa fa-rub"></i><br> Paleontologia</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="has-dropdown <?php echo in_array($slug, array('exposicoes-temporarias', 'exposicoes-de-longa-duracao')) ? 'active' : '' ?>">
		<a href="javacript: void(0);">Exposições</a>
		<ul class="dropdown">
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('exposicoes-temporarias')) ?>">
					<span><i class="fa fa-hourglass-half"></i><br> Exposições Temporárias</span>
				</a>
			</li>
			<li>
				<a href="<?php echo get_permalink(get_page_by_path('exposicoes-de-longa-duracao')) ?>">
					<span><i class="fa fa-history"></i><br> Exposições de Longa Duração</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="<?php echo is_home() || is_single() ? 'active' : '' ?>">
		<a href="<?php echo get_permalink(get_page_by_path('noticias')) ?>">Notícias</a>
	</li>
</nav>
