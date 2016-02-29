<?php

    add_filter( 'rwmb_meta_boxes', 'post_register_meta_boxes' );

    function post_register_meta_boxes( $meta_boxes )
    {
        $meta_boxes[] = array(
            'id'         => 'post_metabox',
            'title'      => '&#x25B4',
            'post_types' => 'post' ,
            'context'    => 'normal',
            'priority'   => 'high',
            'fields' => array(
                array( 
                    'name' => 'Imagem principal (2000x800)',
                    'id' => 'main_image',
                    'type' => 'plupload_image',
                    'desc' => 'Esta é a capa da página interna da notícia.',
                    'max_file_uploads' => 1,
                ),
                array( 
                    'name' => 'Miniatura (320x180)',
                    'id' => 'thumbnail_image',
                    'type' => 'plupload_image',
                    'desc' => 'Miniatura apresentada na listagem de notícias.',
                    'max_file_uploads' => 1,
                ),
                array(
                    'type' => 'heading',
                    'name' => 'CONFIGURAÇÕES DE DESTAQUE',
                    'id'   => 'fake_id1', 
                    'desc' => '',
                ),
                array( 
                    'name' => 'É destaque?',
                    'id' => 'type',
                    'type' => 'select',
                    'std' => 'true',
                    'desc' => 'Defina se a imagem deve aparecer como destaque na página inicial.',
                    'options' => array(
                        "true" => "Sim",
                        "false" => "Não",
                    ),
                ),
                array(
                    'name' => 'Imagem do destaque (2000x800)',
                    'id' => 'gallery_images',
                    'type' => 'plupload_image',
                    'desc' => 'Esta imagem será apresentada no slide da página inicial (caso a notícia seja destaque e a imagem do destaque não esteja definida, a imagem principal será usada).',
                    'max_file_uploads' => 1,
                ),
            )
        );
        return $meta_boxes;
    }
    