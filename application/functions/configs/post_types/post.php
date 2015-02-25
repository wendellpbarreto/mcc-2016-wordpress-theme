<?php

/**
 * Create custom fields
 */
$metabox['post'] = array(
	'id' => 'post-meta-details',
	'title' => ' ',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Destaque',
			'id' => 'post_featured',
			'type' => 'checkbox',
		),
	)
);
