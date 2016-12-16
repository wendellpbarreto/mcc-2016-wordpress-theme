<?php

add_action('init', 'highlight_register');
function highlight_register() {
	$labels = array(
		'name'                  => _x('Destaques', 'post type general name'),
		'singular_name'         => _x('Destaque', 'post type singular name'),
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
		'menu_icon'             => 'dashicons-star-filled',
		'rewrite'               => array('slug' => 'destaques', 'with_front' => false),
		'capability_type'       => 'post',
		'supports'              => array('title', 'thumbnail'),
		'has_archive'           => true,
		);

	register_post_type('highlight', $args);
}

add_filter('rwmb_meta_boxes', 'highlight_register_meta_boxes');
function highlight_register_meta_boxes($meta_boxes) {
	$meta_boxes[] = array(
		'title'    => 'OPÇÕES',
		'id'       => 'highlight_metabox',
		'pages'    => array('highlight'),
		'context'  => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'Está ativo?',
				'id' => 'post_is_active',
				'type' => 'select',
				'std' => 1,
				'desc' => '',
				'options' => array (
					1 => 'Sim',
					0 => 'Não',
					)
				),
			array(
				'name' => 'Título',
				'desc' => '',
				'id' => 'post_title',
				'type' => 'text',
				'default' => '',
				'size' => 60
				),
			array(
				'name' => 'Subtítulo',
				'desc' => '',
				'id' => 'post_subtitle',
				'type' => 'text',
				'default' => '',
				'size' => 60
				),
			array(
				'type' => 'heading',
				'name' => 'BOTÃO',
				'id' => 'fake_id1',
				'desc' => '',
				),
			array(
				'name' => 'Texto do botão',
				'desc' => '',
				'id' => 'post_button_text',
				'type' => 'text',
				'default' => '',
				'size' => 60
				),
			array(
				'name' => 'URL',
				'desc' => '',
				'id' => 'post_button_link',
				'type' => 'text',
				'default' => '',
				'size' => 60
				),
			),
		);
	return $meta_boxes;
}
