<main class="my-account">
    <div class="container">
        <div class="d-flex">
            <?php include "./views/layouts/dashboard-menu.php"; ?>

            <div class="login__box w-75">
                <div class="my-account__panel">
                    <div class="login__box w-50">
                        <div class="my-account__avatar">
                            <figure class="my-account__image">
                                <img src="./assets/images/avatar.png" alt="Avatar">
                            </figure>
                            <h5>Bem vindo, Júlio Magalhães</h5>
                            <p>jcmagalhaes301@gmail.com</p>
                        </div>
                    </div>

                    <h5 class="my-account__title">Resumo do seu último pedido</h5>

                    <div class="my-account__resume">
                        <div class="my-account__order-infos">
                            <div class="my-account__item">
                                <span>Pedido realizado</span>
                                <span>07/11/2024 11:51:12</span>
                            </div>
                            <div class="my-account__item">
                                <span>Total</span>
                                <span>R$ 250,00</span>
                            </div>
                            <div class="spacer"></div>
                            <div class="my-account__item">
                                <span>Pedido #123456</span>
                            </div>
                        </div>
                        <div class="my-account__order-content">
                            <div class="my-account__thumb">
                                <img src="https://mediumpurple-turtle-783032.hostingersite.com/wp-content/uploads/2024/08/17.png" alt="Natal, Pipa e Perobas"> 
                            </div>
                            <div class="my-account__event">
                                <div class="my-account__name">
                                    <strong>Evento: </strong> Natal, Pipa e Perobas
                                </div>
                                <div class="my-account__amout">
                                    <strong>Quantidade de participantes: </strong> 2
                                </div>
                                <div class="my-account__date">
                                    <strong>Data do evento:</strong> 01/11/2024 00:00:00 à 31/03/2025 23:59:59
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="my-account__title">Atalhos</h5>

                    <div class="my-account__shortcuts">
                        <a href="http://">Meus Pedidos</a>
                        <a href="http://">Pacotes</a>
                        <a href="http://">Carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>