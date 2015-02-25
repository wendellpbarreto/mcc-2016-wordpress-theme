<?php

/**
 * Register taxonomy
 */
add_action( 'init', 'pool_category_register' );

function pool_category_register() {
	register_taxonomy(
		'pool_category',
		'pool',
		array(
			'label' => __( 'Categorias' ),
			'rewrite' => true,
			'hierarchical' => true,
    		'query_var' => true,
		)
	);

	$parent_term = term_exists('pool_category', 'pool_category');
	$parent_term_id = $parent_term['term_id'];

	wp_insert_term('Ovais', 'pool_category',
        array(
            'slug' => 'ovals',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Elípticas', 'pool_category',
        array(
            'slug' => 'ellipticals',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Circulares', 'pool_category',
        array(
            'slug' => 'circulars',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Octagonais', 'pool_category',
        array(
            'slug' => 'octagonals',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Européias', 'pool_category',
        array(
            'slug' => 'europeans',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Especiais', 'pool_category',
        array(
            'slug' => 'specials',
            'parent'=> $parent_term_id
        )
    );
    wp_insert_term('Retangulares', 'pool_category',
        array(
            'slug' => 'rectangulars',
            'parent'=> $parent_term_id
        )
    );
}
