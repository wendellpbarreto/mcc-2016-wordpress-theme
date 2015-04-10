<?php

add_action('admin_menu','wphidenag');

function wphidenag() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
