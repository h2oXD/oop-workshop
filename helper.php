<?php 
const PATH_ROOT = __DIR__;
if (!function_exists('asset')) {
    function asset($path) {
        return $_ENV['BASE_URL'] . $path;
    }
}
if (!function_exists('assetClient')) {
    function assetClient($path) {
        return $_ENV['BASE_URL'] . 'assets/client/' . $path;
    }
}
if (!function_exists('assetAdmin')) {
    function assetAdmin($path) {
        return $_ENV['BASE_URL'] . 'assets/admin' . $path;
    }
}
if (!function_exists('url')) {
    function url($uri) {
        return $_ENV['BASE_URL'] . $uri;
    }
}
if (!function_exists('back')) {
    function back($url) {
        header("Location: $url");
        exit;
    }
}
if (!function_exists('dd')) {
    function dd($data) {
        print '<pre>';
        print_r($data);
        die;
    }
}
