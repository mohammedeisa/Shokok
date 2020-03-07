<?php
add_action('init', 'register_shokok_post_types');
function register_shokok_post_types()
{
    register_post_type(
        'clients',
        array(
            'labels' => array(
                'name' => __('Clients'),
                'singular_name' => __('Clients')
            ),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'clients'),
            'show_in_rest' => true
        ));

    register_post_type(
        'orders',
        array(
            'labels' => array(
                'name' => __('Orders'),
                'singular_name' => __('Order')
            ),
            'supports' => array('title', 'editor', 'custom-fields'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'orders'),
            'show_in_rest' => true
        ));

    register_post_type(
        'installments',
        array(
            'labels' => array(
                'name' => __('Installments'),
                'singular_name' => __('Installment')
            ),
            'supports' => array('title', 'editor', 'custom-fields'),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'installments'),
            'show_in_rest' => true
        ));

    register_post_type(
        'products',
        array(
            'labels' => array(
                'name' => __('Products'),
                'singular_name' => __('Product')
            ),
            'supports' => array('title', 'editor',),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'show_in_rest' => true
        )
    );

}