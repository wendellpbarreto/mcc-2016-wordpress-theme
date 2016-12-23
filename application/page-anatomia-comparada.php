<?php get_header() ?>

<?php $current_page = get_post() ?>

<div class="page-wrapper hotsite anatomia-comparada">
	<section id="hero">
		<div class="hero-inner">
			<div class="logo">
				<img src="<?php echo get_image('anatomia-comparada/logo.png') ?>" alt="Anatomia Comparada">
			</div>
			<h1 class="title">
				Comparando a anatomia dos seres vivos, é possível, através de suas semelhanças e diferenças, entender suas relações de parentesco evolutivo e adaptações. visite a exposição, compare você mesmo e surpreenda-se com os segredos que ose queletos nos contam sobre a evolução dos vertebrados!
			</h1>
		</div>
	</section>

	<h1 class="strip">Anatomia Comparada</h1>

	<section id="section-1" class="section section-top-left">
		<div class="section-inner">
			<header class="section-header">
				<h1 class="section-bigtitle">Esqueletos</h1>
				<h2 class="section-title">o que eles contam sobre a evolução?</h2>
				<nav class="buttons">
					<a href="#" class="btn btn-outline btn-white" data-toggle="modal" data-target="#section-1-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-1-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_1_modal_page = get_page_by_path('anatomia-comparada-1') ?>
					<?php echo apply_filters('the_content', $section_1_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<section id="section-2" class="section section-right">
		<div class="section-inner">
			<header class="section-header">
				<h2 class="section-title">O maior animal terrestre da atualidade:</h2>
				<h1 class="section-bigtitle">O Elefante</h1>
				<nav class="buttons">
					<a href="#" class="btn btn-dark-blue" data-toggle="modal" data-target="#section-2-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-2-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_2_modal_page = get_page_by_path('anatomia-comparada-2') ?>
					<?php echo apply_filters('the_content', $section_2_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<section id="section-3" class="section section-center">
		<div class="section-inner">
			<div class="section-columns">
				<div class="section-column">
					<h3 class="column-title">Você conhece um carnívoro?</h3>
					<img src="<?php echo get_image('anatomia-comparada/panda.png') ?>" alt="Panda">
					<p class="column-desc">Quando se fala em carnívoro, naturalmente pensamos em qualquer animal que se alimente de carne. No entanto, os carnívoros (Ordem Carnívora) inclui apenas mamíferos como gatos, cães, hienas, mangustos.</p>
					<nav class="buttons">
						<a href="#" class="btn btn-outline btn-white" data-toggle="modal" data-target="#section-3-1-modal">+ Saiba mais</a>
					</nav>
				</div>
				<div class="section-column">
					<h3 class="column-title">Nós: Primatas</h3>
					<img src="<?php echo get_image('anatomia-comparada/chipanze.png') ?>" alt="Chipanzé">
					<p class="column-desc">Primatas são mamíferos representados por animais como lêmures, macacos e o homem, compondo centenas de espécies viventes.</p>
					<nav class="buttons">
						<a href="#" class="btn btn-outline btn-white" data-toggle="modal" data-target="#section-3-2-modal">+ Saiba mais</a>
					</nav>
				</div>
				<div class="section-column">
					<h3 class="column-title">Animais de Casco</h3>
					<img src="<?php echo get_image('anatomia-comparada/hipopotamo.png') ?>" alt="Hipopótamo">
					<p class="column-desc">O boi, o búfalo e o porco apresentam dedos em número par e cascos fendidos. Já os rinocerontes, cavalos e antas apresentam um único dedo envolto pelo casco.</p>
					<nav class="buttons">
						<a href="#" class="btn btn-outline btn-white" data-toggle="modal" data-target="#section-3-3-modal">+ Saiba mais</a>
					</nav>
				</div>
			</div>
		</div>
		<div id="section-3-1-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_3_1_modal_page = get_page_by_path('anatomia-comparada-3-1') ?>
					<?php echo apply_filters('the_content', $section_3_1_modal_page->post_content) ?>
				</div>
			</div>
		</div>
		<div id="section-3-2-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_3_2_modal_page = get_page_by_path('anatomia-comparada-3-2') ?>
					<?php echo apply_filters('the_content', $section_3_2_modal_page->post_content) ?>
				</div>
			</div>
		</div>
		<div id="section-3-3-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_3_3_modal_page = get_page_by_path('anatomia-comparada-3-3') ?>
					<?php echo apply_filters('the_content', $section_3_3_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<section id="section-4" class="section section-top-left">
		<div class="section-inner">
			<header class="section-header">
				<h1 class="section-bigtitle">Baleias</h1>
				<h2 class="section-title">E seus parentes</h2>
				<nav class="buttons">
				<a href="#" class="btn btn-outline btn-black" data-toggle="modal" data-target="#section-4-modal">+ Saiba mais</a>
				</nav>
			</header>
		</div>
		<div id="section-4-modal" class="modal animated fadeInDown">
			<div class="modal-inner">
				<a href="#" class="close-modal">Fechar <i class="fa fa-chevron-down"></i></a>
				<div class="modal-body">
					<?php $section_4_modal_page = get_page_by_path('anatomia-comparada-4') ?>
					<?php echo apply_filters('the_content', $section_4_modal_page->post_content) ?>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="white-strip">
			<div class="footer-inner">
				<p class="title">Anatomia Comparada: Ficha Técnica</p>
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
					<p>Anatomia</p>
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
