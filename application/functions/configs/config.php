<?php

/**
 * Theme config
 */
$theme_config = array(
	'show-admin-bar' 		=> false, //default: true
	'max-posts-per-page'	=> 6,
	'theme-support' 		=> array(
		'support-thumbnail' => array(
			'feature' => 'post-thumbnails',
			'arguments' => array()
		)
	),
	'post-thumbnail-size' 	=> array(
		'width' => 585,
		'height' => 400
	),
	'images-sizes'			=> array(
		'detail' => array(
			'width' => 585,
			'height' => 400,
			'crop' => true
		)
	),
	'pages_required' => array(
		array(
			'title' => 'Home',
			'slug' => 'home',
		),
		array(
			'title' => 'Equipe',
			'slug' => 'equipe',
		),
		array(
			'title' => 'Organograma',
			'slug' => 'organograma',
		),
		array(
			'title' => 'Histórico',
			'slug' => 'historico',
		),
		array(
			'title' => 'Pesquisa',
			'slug' => 'pesquisa',
		),
		array(
			'title' => 'Etnologia',
			'slug' => 'etnologia',
		),
		array(
			'title' => 'Arqueologia',
			'slug' => 'arqueologia',
		),
		array(
			'title' => 'Paleontologia',
			'slug' => 'paleontologia',
		),
		array(
			'title' => 'Exposições Temporárias',
			'slug' => 'exposicoes-temporarias',
		),
		array(
			'title' => 'Exposições de Longa Duração',
			'slug' => 'exposicoes-de-longa-duracao',
		),
		array(
			'title' => 'Notícias',
			'slug' => 'noticias',
		),
		array(
			'title' => 'Contato',
			'slug' => 'contato',
		),
	)
);
