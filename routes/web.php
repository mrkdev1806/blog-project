<?php

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AuthController;

$router->get('/', [HomeController::class, 'index']);

// Auth
$router->get('/signup', [AuthController::class, 'showSignupForm']);
$router->post('/signup', [AuthController::class, 'signup']);

$router->get('/login', [AuthController::class, 'showLoginForm']);
$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);


// Posts
$router->get('/posts/create', [PostController::class, 'createForm']);
$router->post('/posts/create', [PostController::class, 'store']);

$router->get('/posts/edit/{id}', [PostController::class, 'editForm']);
$router->post('/posts/edit/{id}', [PostController::class, 'update']);

$router->post('/posts/delete/{id}', [PostController::class, 'delete']);

$router->get('/posts/{id}', [PostController::class, 'show']);
