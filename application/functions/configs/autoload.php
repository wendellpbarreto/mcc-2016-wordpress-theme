<?php
	require 'config.php';

	/**
	 * Utilities
	 */
	require 'utilities/theme_config.php';

	require 'utilities/aq_resize.php';
	require 'utilities/pagination.php';

	require 'utilities/hide_update_message.php';
	require 'utilities/the_slug.php';
	require 'utilities/get_attachments_from_post.php';
	require 'utilities/limit_words.php';

	/**
	 * Custom Post Types
	 */
	require 'post_types/highlight.php';
	require 'post_types/post.php';

	require 'post_types/exposition.php';
	require 'post_types/sector.php';


	/**
	 * Custom Taxonomies
	 */
	require 'taxonomies/exposition_category.php';
