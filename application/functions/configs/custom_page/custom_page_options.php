<?php

$mcc_custom_page_options = array(
	'page_title'		=> 'Museu Câmara Cascudo', // Must be unique
	'page_name'			=> 'mcc_custom_page', // Must be unique
	'plugin_page'		=> 'menu', // menu, submenu, dashboard, posts, media, links, pages, comments, theme, plugins, users, management or options
	'plugin_page_args'	=> array(
		'page_title'	=> 'Museu Câmara Cascudo',
		'menu_title'	=> 'Museu Câmara Cascudo',
		'capability'	=> 'manage_options',
		'menu_slug'		=> 'mcc_custom_page',
		'function'		=> 'create_page',
		'icon_url'		=> 'dashicons-admin-generic',
		'position'		=> '30',
		),
	'settings_sections' => array(
		array(
			'section_id' => 'mcc_custom_page_first_section',
			'section_title' => 'Banners & Backgrounds',
			'settings_fields' => array(
				array(
					'id' => 'banner_front_page1',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Topo I Página Inicial [Banner]',
				),
				array(
					'id' => 'banner_front_page2',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Topo II Página Inicial [Banner]',
				),
				array(
					'id' => 'background_pools',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Sessão "Nossas Piscinas" [Background]',
				),
				array(
					'id' => 'background_treatment',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Sessão "Tratamento" [Background]',
				),
				array(
					'id' => 'banner_page_pools',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Topo Página Piscinas [Banner]',
				),
				array(
					'id' => 'banner_page_accessories',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Topo Página Acessórios [Banner]',
				),
				array(
					'id' => 'banner_page_mount',
					'multiple' => false,
					'type' => 'file',
					'title' => 'Topo Página Monte Seu Orçamento [Banner]',
				),
			)
		),
		array(
			'section_id' => 'mcc_custom_page_second_section',
			'section_title' => 'Telefones & Cobertura',
			'settings_fields' => array(
				array(
					'id' => 'phone_number_1',
					'type' => 'text',
					'title' => 'Telefone 1',
					'default' => '84',
				),
				array(
					'id' => 'phone_number_2',
					'type' => 'text',
					'title' => 'Telefone 2',
					'default' => '',
				),
				array(
					'id' => 'coverage',
					'type' => 'textarea',
					'title' => 'Cobertura',
					'default' => 'Natal, Parnamirim e Macaíba. Compras acima de R$ 50,00.',
				),
			)
		),
		array(
			'section_id' => 'mcc_custom_page_third_section',
			'section_title' => 'Endereços',
			'settings_fields' => array(
				array(
					'id' => 'address_1_line_1',
					'type' => 'text',
					'title' => 'Endereço 1 - Linha 1',
					'default' => '',
				),
				array(
					'id' => 'address_1_line_2',
					'type' => 'text',
					'title' => 'Endereço 1 - Linha 2',
					'default' => '',
				),
				array(
					'id' => 'address_1_ddd',
					'type' => 'text',
					'title' => 'Endereço 1 - DDD',
					'default' => '',
				),
				array(
					'id' => 'address_1_phone',
					'type' => 'text',
					'title' => 'Endereço 1 - Telefone',
					'default' => '',
				),
				array(
					'id' => 'address_2_line_1',
					'type' => 'text',
					'title' => 'Endereço 2 - Linha 1',
					'default' => '',
				),
				array(
					'id' => 'address_2_line_2',
					'type' => 'text',
					'title' => 'Endereço 2 - Linha 2',
					'default' => '',
				),
				array(
					'id' => 'address_2_ddd',
					'type' => 'text',
					'title' => 'Endereço 2 - DDD',
					'default' => '',
				),
				array(
					'id' => 'address_2_phone',
					'type' => 'text',
					'title' => 'Endereço 2 - Telefone',
					'default' => '',
				),
				array(
					'id' => 'address_3_line_1',
					'type' => 'text',
					'title' => 'Endereço 3 - Linha 1',
					'default' => '',
				),
				array(
					'id' => 'address_3_line_2',
					'type' => 'text',
					'title' => 'Endereço 3 - Linha 2',
					'default' => '',
				),
				array(
					'id' => 'address_3_ddd',
					'type' => 'text',
					'title' => 'Endereço 3 - DDD',
					'default' => '',
				),
				array(
					'id' => 'address_3_phone',
					'type' => 'text',
					'title' => 'Endereço 3 - Telefone',
					'default' => '',
				),
			)
		),
		array(
			'section_id' => 'mcc_custom_page_fourth_section',
			'section_title' => 'Social',
			'settings_fields' => array(
				array(
					'id' => 'facebook_url',
					'type' => 'text',
					'title' => 'Facebook',
					),
				array(
					'id' => 'instagram_url',
					'type' => 'text',
					'title' => 'Instagram',
					),
				array(
					'id' => 'twitter_url',
					'type' => 'text',
					'title' => 'Twitter',
					)
				)
			),
		)
	);

$mcc_custom_page = new CustomPage( $mcc_custom_page_options );
global $options;
$options = get_option( 'mcc_custom_page_option' );
