<?php

/**
 * Register post type
 */
add_action('init', 'banner_register');

function banner_register() {
	$labels = array(
		'name'                  => _x('Banners', 'post type general name'),
		'singular_name'         => _x('Banners', 'post type singular name'),
		'add_new'               => _x('Adicionar Novo', 'Item'),
		'add_new_item'          => __('Adicionar Novo Item'),
		'edit_item'             => __('Editar Item'),
		'new_item'              => __('Novo Item'),
		'all_items'             => __('Todos os Items'),
		'view_item'             => __('Ver Item'),
		'search_items'          => __('Procurar Item'),
		'not_found'             => __('Nenhum Item Encontrado'),
		'not_found_in_trash'    => __('Nenhum Item Encontrado na Lixeira'),
		'parent_item_colon'     => ''
	);

	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-images-alt',
		'rewrite'               => true,
		'capability_type'       => 'post',
		'supports'              => array('title', 'thumbnail',),
		'has_archive'           => true,
	);

	register_post_type('banner', $args);
}
