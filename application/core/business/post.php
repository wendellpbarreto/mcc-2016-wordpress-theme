<?php
class Post {
	protected static $post_type = 'post';
	protected static $post_category = '';

	public static function get_posts($args = array()) {

		$defaults = array(
			'post_type' => static::$post_type,
			'posts_per_page'=>'-1',
			'tax_query' => null,
			'meta_value'=>null,
			'meta_compare'=>null,
			'post_title_filter' => null,
			'order'=>null,
			'orderby'=>null,
			'meta_key'=>null,
			'thumbnail_sizes'=>null,
			'meta_query' => null
			);
		$args = array_merge($defaults, array_intersect_key($args, $defaults));

		$new_query = new WP_Query($args);
		$objects = array();
		if ($new_query->have_posts()) {
			while ($new_query->have_posts()) {
				$new_query->the_post();
				$current_post = get_post();
				$current_post->permalink = get_permalink();
				if (static::$post_category == '') $current_post->categories = get_the_category();
				if (static::$post_category != '') $current_post->categories = get_the_terms($current_post->ID, static::$post_category);

				if ($current_post->categories) {
					$current_post->category = reset($current_post->categories)->name;
					$current_post->category_slug = reset($current_post->categories)->slug;
				}
				$current_post->date = get_the_date('d/m/y');
				$current_post->thumbnail = wp_get_attachment_url(get_post_thumbnail_id($current_post->ID));
				$current_post->thumbnail_sizes = array();
				$objects[] = $current_post;
			}

			if ($args['thumbnail_sizes']) return load_image_sizes($args['thumbnail_sizes'], $objects);

			return $objects;
		} else {
			return null;
		}
	}

	public static function get_categories($args = array()) {
		$defaults = array(
			'type' => static::$post_type,
			'child_of' => null,
			'parent' => null,
			'order' => null,
			'orderby' => null,
			'hide_empty' => 1,
			'hierarchical' => 1,
			'taxonomy' => static::$post_category
			);
		$args = array_merge($defaults, array_intersect_key($args, $defaults));

		return get_categories($args);
	}
}
