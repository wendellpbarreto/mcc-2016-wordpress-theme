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
	'pages_required'		=> array(
		array(
			'title' => 'Home',
			'slug' => 'home',
		),
		array(
			'title' => 'Blog',
			'slug' => 'blog',
		),
		array(
			'title' => 'Piscinas',
			'slug' => 'pools',
		),
		array(
			'title' => 'Acessórios',
			'slug' => 'accessories',
		),
		array(
			'title' => 'Monte seu orçamento',
			'slug' => 'mount-your-budget',
		)
	)
);
