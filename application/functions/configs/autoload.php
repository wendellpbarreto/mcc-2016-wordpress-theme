<?php
	require 'config.php';

	require 'utilities/plib_box.php';
	require 'utilities/aq_resize.php';
	require 'utilities/theme_config.php';
	require 'utilities/pagination.php';

	/**
	 * Custom Post Types
	 */
	require 'post_types/post.php';
	require 'post_types/banner.php';
	// require 'post_types/accessory.php';
	// require 'post_types/product.php';

	/**
	 * Custom Taxonomies
	 */
	require 'taxonomies/accessory_category.php';
	require 'taxonomies/pool_category.php';

	/**
	 * Custom Pages
	 */
	require 'custom_page/__init__.php';

	/**
	 * Custom Taxonomy Meta
	 */
	// require 'custom_tax_meta/__init__.php';
