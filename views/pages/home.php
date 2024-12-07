<main class="home">
    <section class="home__banner"></section>
    <section class="home__features">
        <div class="container">
            <div class="home__list">
                <div class="home__item">
                    <i class="fa-solid fa-credit-card"></i>
                    <span>Parcele em até 12x</span>
                </div>
                <div class="home__item">
                    <i class="fa-solid fa-headset"></i>
                    <span>Suporte 24 horas</span>
                </div>
                <div class="home__item">
                    <i class="fa-solid fa-fingerprint"></i>
                    <span>Conexão Segura</span>
                </div>
                <div class="home__item">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <span>Programa de Pontos e Fidelidade</span>
                </div>
            </div>
        </div>
    </section>

    <section class="home__pacotes mb-5">
        <div class="container">
            <h3 class="home__title">Nossos Pacotes</h3>
            <div class="row">
                <?php
                    $pacotes = [
                        1 => [
                            'id' => 1,
                            'nome' => 'Pacote para Fortaleza',
                            'descricao' => 'Uma viagem incrível para Fortaleza.',
                            'preco' => 'R$ 1500,00',
                            'duracao' => '7 dias e 6 noites',
                            'imagem' => '/assets/images/rj.png',
                            'category' => 'Fortaleza'
                        ],
                        2 => [
                            'id' => 2,
                            'nome' => 'Pacote para Salvador',
                            'descricao' => 'Explore as maravilhas de Salvador.',
                            'preco' => 'R$ 1800,00',
                            'duracao' => '5 dias e 4 noites',
                            'imagem' => '/assets/images/rj.png',
                            'category' => 'Fortaleza'

                        ],
                        3 => [
                            'id' => 3,
                            'nome' => 'Pacote para Salvador',
                            'descricao' => 'Explore as maravilhas de Salvador.',
                            'preco' => 'R$ 1800,00',
                            'duracao' => '5 dias e 4 noites',
                            'imagem' => '/assets/images/rj.png',
                            'category' => 'Fortaleza'
                        ]
                        // Adicione mais pacotes conforme necessário
                    ];
                    
                    foreach ($pacotes as $key => $value) {
                      include "./views/layouts/pacote-card.php";  
                    };
                ?>
            </div>
        </div>
    </section>
</main>

<script type="module" src="<?php echo getAbsoluteUrl('dist/js/main.min.js'); ?>"></script>