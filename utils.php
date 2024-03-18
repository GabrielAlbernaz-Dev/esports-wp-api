<?php

define('DS',DIRECTORY_SEPARATOR);

function dd() {
    $args = func_get_args();
    if(count($args) === 0) return;

    foreach($args as $arg) {
        var_dump($arg);
    }

    die();
}

function requireFiles($array = [], $dir) {
    foreach($array as $item) {
        require_once $dir .DS. $item . '.php';
    }
}

function validateEmptyFields($payload,$requiredFields = []) {
    if(empty($payload)) return;
    $emptyField = '';
    $hasInvalidField = false;

    foreach($requiredFields as $field) {
        $fieldExists = isset($payload[$field]);
        if(!$fieldExists) return;

        $currentField = $payload[$field];
        if(empty(trim($currentField))) {
            $hasInvalidField = true;
            $emptyField = $field;
        }
    }

    return [
        'hasInvalidField' => $hasInvalidField,
        'emptyField' => $emptyField
    ];
}