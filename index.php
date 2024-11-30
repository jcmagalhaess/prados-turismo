<?php
// Captura a URI sem parâmetros de query
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

include "./routes.php";

// Verifica se a rota existe no mapeamento
if (array_key_exists($uri, $routes)) {
    $pageFile = "./views/pages/{$routes[$uri]}";

    // Inclui os arquivos padrão
    include "./views/layouts/header.php";
    include $pageFile;
    include "./views/layouts/footer.php";
} else {
    // Página 404
    include "./views/layouts/header.php";
    include "./views/pages/404.php";
    include "./views/layouts/footer.php";
}
