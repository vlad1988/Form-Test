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



if (!property_exists($request, 'receive')) {
    $request->receive = 0;
}

if (!property_exists($request, 'interests')) {
    $request->interests = 'NULL';
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

$user = User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'country' => $request->country->name,
            'receive' => (int)$request->receive,
            'interest' => implode(",", $request->interests),
            'sharedDate' => $request->sharedDate,
            'message' => $request->message,
            'filename' => $request->filename,
            'created_at' => date("Y-m-d H:i:s"),
        ));





