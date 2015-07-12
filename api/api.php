<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
sleep(3);
//var_dump($request->country->name) ;
var_dump($request->interests) ;
