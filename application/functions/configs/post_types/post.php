<?php

add_filter( 'post_type_link', 'modify_post_permalink', 1, 2 );
function modify_post_permalink( $post_link, $id = 0 ){
    $post = get_post($id);
    if ( is_object( $post ) && $post->post_type == 'post' ){
        $terms = wp_get_object_terms( $post->ID, 'category' );
        if( $terms ){
            return str_replace( '%category%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}

add_filter( 'rwmb_meta_boxes', 'post_register_meta_boxes' );
function post_register_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'    => 'DESTAQUE',
        'id'       => 'post_metabox',
        'pages'    => array( 'post' ),
        'context'  => 'normal',
        'priority' => 'low',
        'fields' => array(
            array(
                'type' => 'text',
                'name' => 'Fonte da Notícia',
                'id' => 'post_source',
                'desc' => '',
                'size' => '50'
            ),
            array(
                'type' => 'textarea',
                'name' => 'Legenda da Foto',
                'id' => 'post_legend',
                'desc' => '',
                'size' => '50'
            ),
            array(
                'type' => 'text',
                'name' => 'Créditos da Foto',
                'id' => 'post_credits',
                'desc' => '',
                'size' => '50'
            ),
        )
    );
  return $meta_boxes;
}
