<?php

/**
 * Register taxonomy
 */
add_action( 'init', 'accessory_category_register' );

function accessory_category_register() {
	register_taxonomy(
		'accessory_category',
		'accessory',
		array(
			'label' => __( 'Categorias' ),
			'rewrite' => array( 'slug' => 'accessory_category' ),
			'hierarchical' => true,
    		'query_var' => true,
			)
		);
}

 ?>
