<?php
$page = $_GET['page'] ?? 'home';
$pageFile = "../src/views/pages/{$page}.php";

if (file_exists($pageFile)) {
    include "../src/views/layouts/header.php";
    include $pageFile;
    include "../src/views/layouts/footer.php";
} else {
    include "../src/views/pages/404.php";
}
