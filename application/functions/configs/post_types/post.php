<?php

/**
 * Create custom fields
 */
$metabox['post'] = array(
  'id' => 'post-meta-details',
  'title' => 'Opcões Adicionais',
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
		array(
			'name' => 'Destaque Primário',
			'id' => 'post_primary_featured',
			'type' => 'checkbox',
		),
		array(
			'name' => 'Destaque Segundário',
			'id' => 'post_secundary_featured',
			'type' => 'checkbox',
		),
	)
);
