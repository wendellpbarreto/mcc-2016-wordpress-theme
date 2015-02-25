<?php

class CustomPage {
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $args;
	private $options;
	private $option_group;
	private $option_name;
	private $page_name;
	private $page_title;

	/**
	 * Start up
	 */
	public function __construct( $args ) {
		$this->args = $args;
		$this->args['plugin_page_args']['function'] = array($this, 'create_page');
		$this->option_group = $this->args['page_name'].'_option_group';
		$this->option_name = $this->args['page_name'].'_option';
		$this->page_name = $this->args['page_name'];
		$this->page_title = $this->args['page_title'];

		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Add specified page
	 */
	public function add_plugin_page() {
		$plugin_page = $this->args['plugin_page'];
		$plugin_page_function_name = 'add_' . $plugin_page . '_page';

		call_user_func_array($plugin_page_function_name, $this->args['plugin_page_args']);
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		register_setting(
			$this->option_group, // Option group
			$this->option_name, // Option name
			array( $this, 'sanitize' ) // Sanitize
		);

		foreach ( $this->args['settings_sections'] as $settings_section ):

			add_settings_section(
				$settings_section['section_id'], // ID
				$settings_section['section_title'], // Title
				array( $this, 'print_section_info' ), // Callback
				$this->page_name // Page
				);

			foreach ( $settings_section['settings_fields'] as $settings_field ):

				add_settings_field(
					$settings_field['id'], // ID
					$settings_field['title'].': ', // Title
					array( $this, 'print_field' ), // Callback
					$this->page_name , // Page
					$settings_section['section_id'], // Section
					$settings_field
				);

			endforeach;
		endforeach;
	}

	public function create_page() {
		$this->options = get_option( $this->option_name );
		?>

		<div class="wrap">
			<?php screen_icon(); ?>
			<h2> <?php echo ucfirst( $this->page_title ); ?> </h2>
			<form method="post" action="options.php">
				<?php
					// This prints out all hidden setting fields
					settings_fields( $this->option_group );
					do_settings_sections( $this->page_name );
					submit_button();
				?>
			</form>
		</div>

		<?php
	}


	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input ) {
		// $new_input = array();
		// if( isset( $input['id_number'] ) )
		//     $new_input['id_number'] = absint( $input['id_number'] );

		// if( isset( $input['title'] ) )
		//     $new_input['title'] = sanitize_text_field( $input['title'] );

		return $input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		print '';
	}

	function create_opening_tag($value) {
		$group_class = "";
		if (isset($value['grouping'])) {
			$group_class = "suf-grouping-rhs";
		}
		echo '<div class="suf-section fix">';
		if ($group_class != "") {
			echo "<div class='$group_class fix'>";
		}
		if (isset($value['name'])) {
			echo "<h3>" . $value['name'] . "</h3>";
		}
		if (isset($value['desc']) && !(isset($value['type']) && $value['type'] == 'checkbox')) {
			echo $value['desc']."<br />";
		}
		if (isset($value['note'])) {
			echo "<span class=\"note\">".$value['note']."</span><br />";
		}
	}

	/**
	 * Check if option exists by id returning that value or default
	 *
	 * @param $id
	 * @return value
	 */
	function check_option_by_option_id( $id ) {

		return isset( $this->options[$id] ) ? esc_attr( $this->options[$id] ) : '';
	}

	/**
	 * Check if option exists by field settings returning that value or default
	 *
	 * @param $field_settings
	 * @return value
	 */
	function check_option_by_settings( $field_settings ) {
		$id = $field_settings['id'];

		return isset( $this->options[$id] ) ? esc_attr( $this->options[$id] ) : $field_settings['default'];
	}

	function create_text_input( $field_settings ) {
		$text = $this->check_option_by_settings($field_settings);

		echo '<input
				type="text" id="'.$field_settings['id'].'"
				placeholder="'.$field_settings['placeholder'].'"
				name="'.$this->option_name.'['.$field_settings['id'].']'.'" value="'.$text.'" />';
	}

	function create_file_input( $field_settings ) {
		$files = $this->check_option_by_option_id($field_settings['id']);
		$files = trim($files, ',');
		$id = $field_settings['id'];
		$multiple = $field_settings['multiple'];

		if ( function_exists( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		} else {
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}

		echo '<div class="custom-page__images-box" data-box="custom-page__images-box-'.$id.'" data-multiple="'.$multiple.'">';
		echo '<div class="custom-page__images-box-crops">';
		if ( $multiple ) {
			$files_array = split(',', $files);
			foreach ($files_array as $file) {
				echo '<img src="'.$file.'" height="150"/>';
			}
		} else {
			$file = $files;
			echo '<img src="'.$file.'" height="150"/>';
		}
		echo '</div>';
		echo '<input id="'.$id.'" type="hidden" name="'.$this->option_name.'['.$id.']'.'" value="'.$files.'">';
		echo '<a href="#" class="custom-page__upload-button button action">Upload</a>';
		echo '</div>';

	}

	function create_textarea($field_settings) {
		$text = $this->check_option_by_settings($field_settings);

		echo '<textarea name="'.$this->option_name.'['.$field_settings['id'].']'.'" type="textarea" placeholder="'.$field_settings['placeholder'].'" cols="" rows="">';
		echo $text;
		echo '</textarea>';
	}

	function create_color_picker($field_settings) {
		$color_value = $this->check_option_by_settings($field_settings);

		echo '<div class="color-picker">';
		echo '<input type="text" id="'.$field_settings['id'].'" name="'.$this->option_name.'['.$field_settings['id'].']'.'" value="'.$color_value.'" class="color" />';
		echo ' « Click to select color<br/>';
		// echo "<strong>Default: <font color='".$color_value."'> ".$color_value."</font></strong>";
		// echo " (You can copy and paste this into the box above)";
		echo "</div>";
	}

	function create_radiobutton($field_settings) {
		$selected_option = $this->check_option_by_settings($field_settings);

		foreach ($field_settings['options'] as $option_value => $option_text) {
			$checked = $option_value == $selected_option ? ' checked="checked" ' : '';

			echo '<div class="radiobutton"><input type="radio" name="'.$this->option_name.'['.$field_settings['id'].']'.'" value="'.$option_value.'" '.$checked."/>".$option_text."</div>";
		}
	}

	function create_checkbox($field_settings) {
		echo '<ul class="mnt-checklist" id="'.$field_settings['id'].'" >';

		foreach ($field_settings['options'] as $option_value => $option_text) {
			$id = $field_settings['id'].'_'.$option_value;

			$option = $this->check_option_by_option_id($id);
			$checked = $option == true ? ' checked="checked" ' : '';

			echo "<li>";
			echo '<div class="checkbox"><input type="checkbox" name="'.$this->option_name.'['.$field_settings['id'].'_'.$option_value.']'.'" value="true" '.$checked."/>".$option_text."</div>";
			echo "</li>";
		}
		echo "</ul>";
	}

	// function create_section_for_category_select($page_section,$field_settings) {
	// 	create_opening_tag($field_settings);
	// 	$all_categoris='';
	// 	echo '<div class="wrap" id="'.$field_settings['id'].'" >';
	// 	echo '<h2>Theme Options</h2> '."\n" .'
	// 	<p><strong>'.$page_section.':</strong></p>';
	// 	echo "<select id='".$field_settings['id']."' class='post_form' name='".$field_settings['id']."' value='true'>";
	// 	echo "<option id='all' value=''>All</option>";
	// 	foreach ($field_settings['options'] as $option_value => $option_list) {
	// 		$checked = ' ';
	// 		echo 'value_id=' . $field_settings['id'] .' value_id=' . get_option($field_settings['id']) . ' options_value=' . $option_value;
	// 		if (get_option($field_settings['id']) == $option_value) {
	// 			$checked = ' checked="checked" ';
	// 		}
	// 		else if (get_option($field_settings['id']) === FALSE && $field_settings['std'] == $option_value){
	// 			$checked = ' checked="checked" ';
	// 		}
	// 		else {
	// 			$checked = '';
	// 		}
	// 		echo '<option value="'.$option_list['name'].'" class="level-0" '.$checked.' number="'.($option_list['number']).'" />'.$option_list['name']."</option>";
	//             //$all_categoris .= $option_list['name'] . ',';
	// 	}
	// 	echo "</select>\n </div>";
	//         //echo '<script>jQuery("#all").val("'.$all_categoris.'")</\script>';
	// 	create_closing_tag($field_settings);
	// }

	/**
	 * Get the settings option array and print one of its values
	 */
	public function print_field(array $field_settings) {
		switch ( $field_settings['type'] ) {
			case "text";
				$this->create_text_input($field_settings);
			break;

			case "file";
				$this->create_file_input($field_settings);
			break;

			case "textarea":
				$this->create_textarea($field_settings);
			break;

			case "checkbox":
				$this->create_checkbox($field_settings);
			break;

			case "radio":
				$this->create_radiobutton($field_settings);
			break;

			case "color-picker":
				$this->create_color_picker($field_settings);
			break;

		}
	}
}
