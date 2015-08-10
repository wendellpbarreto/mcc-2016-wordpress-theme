<?php

function get_attachments_from_post($post) {
	$pattern = get_shortcode_regex();
	$images = array();

	if( preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches )
	    && array_key_exists( 2, $matches )
	    && in_array( 'gallery', $matches[2] ) ) {

        $keys = array_keys( $matches[2], 'gallery' );

        foreach( $keys as $key ){
            $atts = shortcode_parse_atts( $matches[3][$key] );
            if( array_key_exists( 'ids', $atts ) ) {


            	$result = new WP_Query(
                    array(
                        'post_type' => 'attachment',
                        'post_status' => 'inherit',
                        'post__in' => explode( ',', $atts['ids'] ),
                        'orderby' => 'post__in'
                    )
                );

                $images = array_merge($images, $result->posts);
            }
        }
    }
	return $images;
}
