<main class="my-account">
    <div class="container">
        <div class="d-flex">
            <?php include "./views/layouts/dashboard-menu.php"; ?>

            <div class="login__box w-75">
                <div class="my-account__panel">
                    <?php
                        // Obter a URI atual
                        $currentRoute = basename($_SERVER['REQUEST_URI']);

                        // Controlar qual bloco exibir com base na rota
                        switch ($currentRoute) {
                            case 'minha-conta':
                            case 'painel':
                                include './views/pages/minha-conta/painel.php';
                                break;

                            case 'pedidos':
                                include './views/pages/minha-conta/pedidos.php';
                                break;

                            case 'enderecos':
                                include './views/pages/minha-conta/enderecos.php';
                                break;

                            case 'perfil':
                                include './views/pages/minha-conta/perfil.php';
                                break;

                            default:
                                include './views/pages/404.php';
                                break;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>