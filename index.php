<?php
require_once "bootstrap.php";
ini_set('display_errors', 1);

$url = $_SERVER['REQUEST_URI'];
$prefix = "/cms";

switch ($url) {
    case $prefix . '/' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/home.php';
        break;
    case $prefix . '' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/home.php';
        break;
    case $prefix . '/admin' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/admin.php';
        break;
    case $prefix . '/add' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/addPage.php';
        break;
    case $prefix . '/delete' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/deletePage.php';
        break;
    case $prefix . '/update' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/updatePage.php';
        break;
    case $prefix . '/login' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/login.php';
        break;
     case $prefix . '/footer' . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING']):
        require __DIR__ . '/src/views/footer.php';
        break;
        // New page path
    case $prefix . (isset($_SERVER['PATH_INFO'])):
        require __DIR__ . '/src/views' . $_SERVER['PATH_INFO'] . '.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}