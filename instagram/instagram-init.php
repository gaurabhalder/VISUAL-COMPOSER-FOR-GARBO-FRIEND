<?php
// Garbo Instagram Module
vc_map(
    array(
        'name' => __('Garbo Instagram', 'js_composer'),
        'base' => 'garbo_instagram',
        'category' => __('Garbo', 'js_composer'),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'js_composer'),
                'value' => '',
                'param_name' => 'garbo_instagram_title',
                'save_always' => true
            )
        )
    )
);
