<?php
$page = $_GET['page'] ?? 'home';
$pageFile = "./views/pages/{$page}.php";

if (file_exists($pageFile)) {
    include "./views/layouts/header.php";
    include $pageFile;
    include "./views/layouts/footer.php";
} else {
    include "./views/pages/404.php";
}
