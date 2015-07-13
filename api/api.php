<?php

require_once '../vendor/autoload.php';
ActiveRecord\Config::initialize(function($config) {
    $config->set_model_directory('models');
    $config->set_connections([
        'development' => 'mysql://root:@127.0.0.1/exam'
    ]);
});

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$response = new stdClass();
$response->response_status = "Ok";
/*
 * Vars validation
 */
if (!preg_match("/^[a-zA-Z ]*$/", $request->name)) {
    $nameErr = "Only letters allowed";
    $response->response_status = "Error";
    $response->error_type = "Validation error";
}

if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    $response->response_status = "Error";
    $response->error_type = "Validation error";
}

/*
 * Check properties
 */
if (!property_exists($request, 'receive')) {
    $request->receive = 0;
}

if (!property_exists($request, 'interests')) {
    $request->interests = array();
}

if (!property_exists($request, 'filename')) {
    $request->filename = 'default.png';
}

if (!property_exists($request, 'sharedDate')) {
    $request->sharedDate = date("Y-m-d H:i:s");
}

if (!property_exists($request, 'message')) {
    $request->message = 'NULL';
}

/*
 * Create user
 */
$user = User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'country' => $request->country->name,
            'receive' => $request->receive,
            'interest' => implode(",", $request->interests),
            'sharedDate' => $request->sharedDate,
            'message' => $request->message,
            'filename' => $request->filename,
            'created_at' => date("Y-m-d H:i:s"),
        ));

/*
 * Send email
 */

$to = $request->email;
$subject = 'Create account';
$message = 'We greet you! You have created an account on our site.';
$headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n";

mail($to, $subject, $message, $headers);

/*
 * Send Response
 */
header('Content-Type: application/json;charset=UTF-8');
echo json_encode($response);
