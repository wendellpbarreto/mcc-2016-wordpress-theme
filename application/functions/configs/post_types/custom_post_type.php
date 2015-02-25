<?php

/**
 * Register post type
 * @since  1.0
 */
add_action('init', 'custom_post_name_register');
function custom_post_name_register() {
    $labels = array(
        'name'                  => _x('Custom Post Name', 'post type general name'),
        'singular_name'         => _x('Custom Post Name', 'post type singular name'),
        'add_new'               => _x('Adicionar Novo', 'programacao'),
        'add_new_item'          => __('Adicionar Novo Item'),
        'edit_item'             => __('Editar Item'),
        'new_item'              => __('Novo Item'),
        'all_items'             => __('Todos os Itens'),
        'view_item'             => __('Ver Item'),
        'search_items'          => __('Procurar Item'),
        'not_found'             => __('Nenhum item encontrado'),
        'not_found_in_trash'    => __('Nenhum item encontrado na lixeira'),
        'parent_item_colon'     => ''
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => 'dashicons-calendar',
        'rewrite'               => true,
        'capability_type'       => 'post',
        'supports'              => array('title', 'thumbnail', 'editor', 'excerpt'),
        'has_archive'           => true
    );

    register_post_type('custom-post-name', $args);
}

/**
 * Create custom fields
 * @since  1.0
 */
$metabox['custom-post-name'] = array(
    'id' => 'custom-post-name-meta-details',
    'title' => 'Detalhes da Custom Post Name',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Categoria:',
            'desc' => 'Categoria da programação.',
            'id' => 'programacao_categoria',
            'type' => 'select',
            'default' => '',
            'options' => array(
                'mostra-competitiva' => "Mostra competitiva",
                'mostra-competitiva-infantil' => "Mostra competitiva infantil",
                'mostra-nao-competitiva' => "Mostra não competitiva",
                'longas-metragens' => "Longas metragens",
                'mostra-especial-phil-mulloy' => "Mostra especial phil mulloy",
                'mostra-de-terror-animest' => "Mostra de terror anim'est",
                'mostra-erotica' => "Mostra erótica",
                'encontros' => "Encontros",
                'exposicao-o-menino-e-o-mundo' => "Exposição o menino e o mundo"
            )
        ),
    )
);
