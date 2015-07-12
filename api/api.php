<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
sleep(2);
//var_dump($request->country->name) ;
//var_dump($request->interests) ;

if (!property_exists($request, 'post')) {
    $request->post = 'FALSE';
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


print_r($request);
