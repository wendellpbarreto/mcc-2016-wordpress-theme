<?php

/**
 * Register posts custom fields
 * @since  1.0
 */
function plib_add_box() {
	global $metabox;

	foreach($metabox as $post_type => $value) {
		add_meta_box($value['id'], $value['title'], 'plib_format_box', $post_type, $value['context'], $value['priority']);
	}
}
function plib_format_box() {
	global $metabox, $post;
	echo '<input type="hidden" name="plib_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	echo '<table class="form-table">';
	foreach ($metabox[$post->post_type]['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		echo '<tr>'.
		'<th style="width:20%"><label for="'. $field['id'] .'">'. $field['name']. '</label></th>'.
		'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="'. $field['id']. '" id="'. $field['id'] .'" value="'. ($meta ? $meta : $field['default']) . '" size="30" style="width:97%" />'. '<br />'. $field['desc'];
			break;
			case 'textarea':
				echo '<textarea name="'. $field['id']. '" id="'. $field['id']. '" cols="60" rows="4" style="width:97%">'. ($meta ? $meta : $field['default']) . '</textarea>'. '<br />'. $field['desc'];
			break;
			case 'select':
				echo '<select name="'. $field['id'] . '" id="'. $field['id'] . '">';
				foreach ($field['options'] as $key => $option) {
					echo '<option '. ( $meta == $option ? ' selected="selected"' : '' ) . '>'. $option . '</option>';
				}
				echo '</select>';
			break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="' . $field['id'] . '" value="' . $option['value'] . '"' . (
						$meta == $option['value'] ? ' checked="checked"' : ''
					) . ' />' . $option['name'];
				}
			break;
			case 'checkbox':
				echo '<input type="checkbox" value="true" name="' . $field['id'] . '" id="' . $field['id'] . '"' . ( $meta ? ' checked="checked"' : '' ) . ' />';
			break;
			case 'image':
				$files = $meta ? $meta : '';
				$files = trim($files, ',');

				if ( function_exists( 'wp_enqueue_media' ) ) {
					wp_enqueue_media();
				} else {
					wp_enqueue_style('thickbox');
					wp_enqueue_script('media-upload');
					wp_enqueue_script('thickbox');
				}

				echo '<div class="custom-page__images-box" data-box="custom-page__images-box-'.$field['id'].'" data-multiple="'.$field['multiple'].'">';
				echo '<div class="custom-page__images-box-crops">';
				if ( $field['multiple'] ) {
					$files_array = split(',', $files);
					foreach ($files_array as $file) {
						echo '<img src="'.$file.'" height="150"/>';
					}
				} else {
					$file = $files;
					echo '<img src="'.$file.'" height="150"/>';
				}
				echo '</div>';
				echo '<input id="'.$field['id'].'" type="hidden" name="'.$field['id'].'" value="'.$files.'">';
				echo '<a href="#" class="custom-page__upload-button button action">Upload</a>';
				echo '</div>';
			break;
		}
		echo     '<td>'.'</tr>';
	}
	echo '</table>';
}
function plib_save_data($post_id) {
	global $metabox,  $post;
	if (!wp_verify_nonce($_POST['plib_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	foreach ($metabox[$post->post_type]['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
add_action('admin_menu', 'plib_add_box');
add_action('save_post', 'plib_save_data');
