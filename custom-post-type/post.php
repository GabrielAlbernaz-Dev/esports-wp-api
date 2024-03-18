<?php 

function registerCtpPost() {
    register_post_type( 'post', [
        'label' => 'Post',
        'description' => 'Post',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'rewrite' => ['slug' => 'post', 'with_front' => true],
        'query_var' => true,
        'supports' => ['custom_fields','author','title'],
        'publicly_queryable' => true
    ]);
}

add_action('init','registerCtpPost');