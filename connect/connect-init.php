<?php

vc_map(
    array(
        'name' => __('Garbo Connect', 'js_composer'),
        'base' => 'garbo_connect',
        'category' => __('Garbo', 'js_composer'),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'js_composer'),
                'value' => '',
                'param_name' => 'garbo_connect_title',
                'save_always' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Facebook', 'js_composer'),
                'value' => '',
                'param_name' => 'garbo_connect_facebook',
                'save_always' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Instagram', 'js_composer'),
                'value' => '',
                'param_name' => 'garbo_connect_instagram',
                'save_always' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Pinterest', 'js_composer'),
                'value' => '',
                'param_name' => 'garbo_connect_pinterest',
                'save_always' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Email', 'js_composer'),
                'value' => '',
                'param_name' => 'garbo_connect_email',
                'save_always' => true
            ),



        ),
    )
);
