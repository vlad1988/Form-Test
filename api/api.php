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


$user = User::create(array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'country' => $request->country->name,
        ));


//$postdata = file_get_contents("php://input");
//$request = json_decode($postdata);
//sleep(2);
////var_dump($request->country->name) ;
////var_dump($request->interests) ;
//
//if (!property_exists($request, 'receive')) {
//    $request->post = 'FALSE';
//}
//
//if (!property_exists($request, 'interests')) {
//    $request->interests = 'NULL';
//}
//
//if (!property_exists($request, 'filename')) {
//    $request->filename = 'default.png';
//}
//
//if (!property_exists($request, 'sharedDate')) {
//    $request->sharedDate = date("Y-m-d H:i:s");
//}
//
//
//print_r($request);
