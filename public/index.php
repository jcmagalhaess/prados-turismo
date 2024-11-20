<?php
$page = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == '/' ? 'home' : parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pageFile = "./views/pages/{$page}.php";

if (file_exists($pageFile)) {
    include "./views/layouts/header.php";
    include $pageFile;
    include "./views/layouts/footer.php";
} else {
    include "./views/layouts/header.php";
    include "./views/pages/404.php";
    include "./views/layouts/footer.php";
}
