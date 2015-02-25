<?php

	require 'custom_page.php';
	require 'custom_page_options.php';

	function load_custom_page_styles(){
		echo '<style type="text/css">';
			include 'custom_page.css';
		echo '</style>';
	}

	function load_custom_page_scripts() {
		echo '<script src="https://cdn.rawgit.com/odvarko/jscolor/master/jscolor.js"></script>';
		echo '<script type="text/javascript">';
			include 'custom_page.js';
		echo '</script>';
	}

	add_action( 'admin_head', 'load_custom_page_styles' );
	add_action( 'admin_footer', 'load_custom_page_scripts' );
