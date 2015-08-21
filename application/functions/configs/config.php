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
			'title' => 'Blog',
			'slug' => 'blog',
		),
		array(
			'title' => 'Histórico',
			'slug' => 'historical',
		),
		array(
			'title' => 'Histórico',
			'slug' => 'historical',
		),
		array(
			'title' => 'Setores',
			'slug' => 'sectors',
		),
		array(
			'title' => 'Equipe',
			'slug' => 'team',
		),
		array(
			'title' => 'Pesquisa',
			'slug' => 'research',
		),
		array(
			'title' => 'Extensão',
			'slug' => 'extension',
		),
		array(
			'title' => 'Paleontologia',
			'slug' => 'paleontology',
		),
		array(
			'title' => 'Arqueologia',
			'slug' => 'archeology',
		),
		array(
			'title' => 'Etnologia',
			'slug' => 'Ethnology',
		),
		array(
			'title' => 'Herbário',
			'slug' => 'herbary',
		),
		array(
			'title' => 'Exposições de Longa Duração',
			'slug' => 'long-duration-expositions',
		),
		array(
			'title' => 'Exposições Temporárias',
			'slug' => 'temporary-expositions',
		),
		array(
			'title' => 'Localização e Contato',
			'slug' => 'contact',
		),
		array(
			'title' => 'Agende Sua Visita',
			'slug' => 'schedule-your-visit',
		),
		array(
			'title' => 'Parque da Ciência',
			'slug' => 'science-park',
		),
		array(
			'title' => 'Documentação e Memória',
			'slug' => 'documentation-and-memory',
		),
	)
);
