<?php

/**
 * Register taxonomy
 */
add_action( 'init', 'exposition_category_register' );

function exposition_category_register() {
	register_taxonomy(
		'exposition_category',
		'exposition',
		array(
			'label' => __( 'Categorias' ),
			'rewrite' => array( 'slug' => 'exposition_category' ),
			'hierarchical' => true,
			'query_var' => true,
		)
	);

	$parent_term = term_exists('exposition_category', 'exposition_category');
	$parent_term_id = $parent_term['term_id'];

	wp_insert_term('Longa Duração', 'exposition_category',
        array(
            'slug' => 'long-duration',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Temporária', 'exposition_category',
        array(
            'slug' => 'temporary',
            'parent'=> $parent_term_id
        )
    );
}

add_action( 'pre_insert_term', function ( $term, $taxonomy ) {
    return ( 'exposition_category' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );

 ?>
