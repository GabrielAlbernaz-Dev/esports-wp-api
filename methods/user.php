<?php
function userIndex() {
    $response = [
        'name' => 'Karine Albernaz',
        'password' => '$Swqeuiwhiod234iu234iuh23'
    ];
    
    return rest_ensure_response($response);
}

function userCreate($payload) {
    $email = sanitize_email($payload['email']);
    $password = sanitize_text_field($payload['password']);

    $validateFields = validateEmptyFields($payload, ['email','password']);

    if($validateFields['hasInvalidField']) {
        $emptyField = $validateFields['emptyField'];
        $errorResponse = new WP_Error('invalid_fields',"The field {$emptyField} cannot be empty",['status' => 403]);
        return rest_ensure_response($errorResponse);
    }

    $userExists = username_exists($email);
    $emailExists = email_exists($email);

    if($userExists || $emailExists) {
        $errorResponse = new WP_Error('register_exists','There is already a record registered with this username/email.',['status' => 403]);
        return rest_ensure_response($errorResponse);
    }

    wp_create_user($email,$password,$email);

    $response = [
        'email' => $email
    ];

    return rest_ensure_response($response);
}