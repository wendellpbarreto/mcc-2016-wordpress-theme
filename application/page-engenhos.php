<?php get_header() ?>

<?php $current_page = get_post() ?>

<div class="page-wrapper hotsite engenhos">
	<section id="hero">
		<div class="hero-inner">
			<h1 class="title">
				Como uma planta se espalhou pelo mundo, infuenciou a organização de sociedades, construiu cidades e se faz presente até hoje na nossa cultura de forma tão íntima como tomar um cafezinho adoçado com a sacarose da cana-de-açúcar? Encontre as respostas na exposição Engenhos: Tradição do Açúcar.
			</h1>
		</div>
	</section>

	<h1 class="strip">Engenhos: Tradição do Açúcar</h1>

	<section id="section-1" class="section">
		<div class="section-inner">
			<header class="section-header">
				<h1 class="section-title">Um mundo ávido por açúcar...</h1>
				<nav class="buttons">
					<a href="#" class="btn btn-outline" data-toggle="modal" data-target="#section-1-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-1-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_1_modal_page = get_page_by_path('engenhos-1') ?>
					<?php echo apply_filters('the_content', $section_1_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<section id="section-2" class="section section-right">
		<div class="section-inner">
			<header class="section-header">
				<h2 class="section-quote">
					"O canavial hoje tão nosso, tão da paisagem desta sub-região do nordeste, entrou aqui como um conquistador."
					<span class="author">Gilberto Freyre, 1937</span>
				</h2>
				<nav class="buttons">
					<a href="#" class="btn btn-outline btn-green" data-toggle="modal" data-target="#section-2-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-2-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_2_modal_page = get_page_by_path('engenhos-2') ?>
					<?php echo apply_filters('the_content', $section_2_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<section id="section-3" class="section section-center">
		<div class="section-inner">
			<header class="section-header">
				<h1 class="section-title">Embora o termo Engenho nomeie especificamente a moenda da cana-de-açúcar, por extensão, ele passou a designar a grande propriedade rural destinada à cultura canavieira.</h1>
				<nav class="buttons">
					<a href="#" class="btn btn-outline" data-toggle="modal" data-target="#section-3-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-3-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_3_modal_page = get_page_by_path('engenhos-3') ?>
					<?php echo apply_filters('the_content', $section_3_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<section id="section-4" class="section">
		<div class="section-inner">
			<header class="section-header">
				<h2 class="section-quote">
					"Rapadura, mel - ou melado -, doces, bolos, todos vêm, no Brasil, desempenhando a função de adoçar, literalmente, bocas; E em sentido figurado ou simbolicamente, corações ou humores."
					<span class="author">Gilberto Freyre, 1932</span>
				</h2>
			</header>
		</div>
	</section>

	<section id="section-5" class="section section-top-right">
		<div class="section-inner">
			<header class="section-header">
				<h1 class="section-title">Ceará-Mirim e os caminhos do açúcar: Patrimônio ameaçado</h1>
				<nav class="buttons">
					<a href="#" class="btn btn-wine btn-outline" data-toggle="modal" data-target="#section-4-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-4-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_4_modal_page = get_page_by_path('engenhos-4') ?>
					<?php echo apply_filters('the_content', $section_4_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="white-strip">
			<div class="footer-inner">
				<p class="title">Engenhos: Tradição do Açúcar</p>
				<div class="supporters">
					<p>APOIO: </p>
					<a href="http://ufrn.br/" target="_blank">
						<img src="<?php echo get_image('logo@ufrn.png') ?>" alt="UFRN" height="30">
					</a>
					<a href="http://proex.ufrn.br/" target="_blank">
						<img src="<?php echo get_image('logo@proex.png') ?>" alt="Proex UFRN" height="30">
					</a>
				</div>
			</div>
		</div>
		<div class="black-strip">
			<nav>
				<li>
					<a href="<?php echo get_site_url() ?>">Visite o Museu</a>
				</li>
				<li class="current">
					<p>Engenhos</p>
				</li>
				<li>
					<p>Museu</p>
					<p>/</p>
					<a href="https://www.facebook.com/mccufrn/" target="blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/mccufrn" target="blank"><i class="fa fa-twitter"></i></a>
					<a href="https://plus.google.com/u/0/109985472111154668317" target="blank"><i class="fa fa-google-plus"></i></a>
				</li>
			</nav>
		</div>
	</footer>
</div>


<?php get_footer() ?>
