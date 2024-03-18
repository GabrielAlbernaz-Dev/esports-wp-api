<?php

class Route {
    public static function register($route, $method, $callback) {
        add_action('rest_api_init', function() use ($route, $method, $callback) {
            register_rest_route('api', $route, [
                'methods' => $method,
                'callback' => $callback
            ]);
        });
    }
}