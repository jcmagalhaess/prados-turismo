
<script type="module">
    import { buscarPacotes } from './dist/js/excursoes.repository.min.js';

    let excursoes = [];
    
    await buscarPacotes(3);
</script>
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
                    $excursoesJson = file_get_contents('./views/api/excursoes.json');
                    $excursoes = json_decode($excursoesJson, true);

                    if (!empty($excursoes)) {
                        foreach ($excursoes as $key => $value) {
                            include "./views/layouts/pacote-card.php";  
                        };
                    } else {
                        echo "<p>Nenhum pacote encontrado.</p>";
                    }
                ?>
            </div>
        </div>
    </section>
</main>

<script type="module" src="<?php echo getAbsoluteUrl('dist/js/main.min.js'); ?>"></script>