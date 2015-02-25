<?php

/**
 * Register 'main' widget
 * @since 1.0
 */
register_sidebar(array(
    'name'          => __('Dynamic Sidebar'),
    'id'            => 'main-widgets',
    'description'   => __('Sessão para os botões de share.'),
    'before_widget' => '',
    'before_title'  => '',
    'after_title'   => '',
    'after_widget'  => ''
));
