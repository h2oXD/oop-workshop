<?php

use Fixbu\Assignment\Controllers\Admin\AuthorController;
use Fixbu\Assignment\Controllers\Admin\CategoryController;
use Fixbu\Assignment\Controllers\Admin\DashboardController;
use Fixbu\Assignment\Controllers\Admin\PostController;
use Fixbu\Assignment\Controllers\Admin\TagController;
use Fixbu\Assignment\Controllers\Admin\UserController;

$router->before('GET|POST', '/admin/*.*', function() {
    if (!isset($_SESSION['user'])) {
        back(url('login'));
    }   
    if($_SESSION['user']['role'] != 1){
        back(url(''));
    }
});
$router->before('GET|POST', '/login', function() {
    if (isset($_SESSION['user'])) {
        back(url(''));
    }   
});


$router->mount('/admin', function () use ($router) {
        $router->get('/',               DashboardController::class . '@index');
    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserController::class . '@index');  // Danh sách
        $router->get('/create',         UserController::class . '@create'); // Show form thêm mới
        $router->post('/store',         UserController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      UserController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      UserController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   UserController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    UserController::class . '@delete'); // Xóa
    });
    $router->mount('/posts', function () use ($router) {
        $router->get('/',               PostController::class . '@index');  // Danh sách
        $router->get('/create',         PostController::class . '@create'); // Show form thêm mới
        $router->post('/store',         PostController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      PostController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      PostController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   PostController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    PostController::class . '@delete'); // Xóa
    });
    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoryController::class . '@index');  // Danh sách
        $router->get('/create',         CategoryController::class . '@create'); // Show form thêm mới
        $router->post('/store',         CategoryController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      CategoryController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      CategoryController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   CategoryController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    CategoryController::class . '@delete'); // Xóa
    });
    $router->mount('/tags', function () use ($router) {
        $router->get('/',               TagController::class . '@index');  // Danh sách
        $router->get('/create',         TagController::class . '@create'); // Show form thêm mới
        $router->post('/store',         TagController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      TagController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      TagController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   TagController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    TagController::class . '@delete'); // Xóa
    });
    $router->mount('/authors', function () use ($router) {
        $router->get('/',               AuthorController::class . '@index');  // Danh sách
        $router->get('/create',         AuthorController::class . '@create'); // Show form thêm mới
        $router->post('/store',         AuthorController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      AuthorController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      AuthorController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   AuthorController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    AuthorController::class . '@delete'); // Xóa
    });
    
});