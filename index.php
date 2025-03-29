<?php

declare(strict_types=1);

require 'App/Loader.php';

/**
 * Router
 * Get Incoming Request
 * http://localhost/microservice/api/v1/posts - RESTful API endpoint for all posts
 * http://localhost/microservice/api/v1/posts/{id} - RESTful API endpoint for single post
 * Author - Damsa Terkaa Cosmas
 * App version - v0.0.1
 */

$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = rtrim($request_uri, '/');

$request_uri = explode("/", $request_uri);

// microservice[0] /posts[1] /123 [2]

$current_method = $_SERVER['REQUEST_METHOD'];


new Core($request_uri, $current_method);
