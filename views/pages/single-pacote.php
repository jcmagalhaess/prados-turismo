
<?php
    // single-event.php

    // Inclui o arquivo com os dados dos pacotes
    include 'pacotes.php';

    // Obtém o ID do pacote da URL (exemplo: single-event.php?id=1)
    $pacoteId = $_GET['id'] ?? null;
    $pacote = getPacoteData($pacoteId);

    if (!$pacote) {
        echo "Pacote não encontrado.";
        exit;
    }

   $enumCategories = [
        ['key' => 'adults', 'value' => 'Adultos', 'age' => '+12 anos', 'price' => 490],
        ['key' => 'children', 'value' => 'Crianças', 'age' => '6 a 12 anos', 'price' => 490],
        ['key' => 'babies', 'value' => 'Crianças de Colo', 'age' => '0 a 5 anos', 'price' => 0]
    ];
?>

<main>
    <div class="container">
        <div class="d-flex mb-3">
            <button type="button" class="btn btn-secondary me-3"><i class="fa-solid fa-arrow-left-long me-2"></i>Voltar</button>
            <div class="spacer"></div>
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-share me-2"></i>Compartilhar</button>
        </div>

        <div class="d-flex">
            <div class="event__main">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="display-6">Pacote RÉVEILLON na Serra da Ibiapaba (Tianguá, Viçosa e Ubajara)</h2>
                        <span class="event__price">R$ 490,00 / por pessoa</span>
                        <p>Vem aproveitar o clima friozinho da Serra conosco nesta excursão com nosso roteiro exclusivo e perfeito! Perfeito porque ficamos hospedados na cidade mais animada da Serra, oferecendo diversas opções para curtir a vida noturna, e o melhor, em um hotel com uma estrutura fantástica e próximo dos principais pontos da cidade! Além disso, é perfeito porque planejamos o roteiro para evitar lotações. Escolhemos visitar o Sítio do Bosco, Ubajara e Viçosa nos dias menos movimentados, proporcionando uma experiência mais tranquila. Assim, você terá a oportunidade de aproveitar esses locais com mais calma. É perfeito também porque você não precisa se preocupar com nada, todos os passeios estão inclusos, inclusive as entradas. E, por fim, é perfeito porque o ingresso do Bondinho para visitar a Gruta de Ubajara está gratuito. Vem conhecer as belezas desse lugar perfeito em um pacote que foi cuidadosamente planejado para ser perfeito!</p>
                        <table class="event__table table">
                            <tbody>
                                <tr>
                                    <th scope="row">Destino</th>
                                    <td>Serra da Ibiapaba</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partida</th>
                                    <td>Tolerancia de 10 minutos a partir do horario escolhido</td>
                                </tr>
                                <tr>
                                    <th scope="row">Incluso</th>
                                    <td>
                                        <ul class="d-flex flex-wrap">
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Transporte terrestre de ida e volta saindo de Fortaleza-CE</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Acomodação bem localizada com café da manhã</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Passeio pelo Sitio do Bosco (Tianguá) com entrada inclusa</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Passeio para o Parque Nacional de Ubajara</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Passeio para Casa dos Licores com degustação de licor, doces, geleias e biscoitos inclusa</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Passeio pela Igreja do Céu (Viçosa)</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Passeio para Prainha do Jet com entrada inclusa</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Suporte presencial completo de um representante da Prados Turismo durante toda a viagem</li>
                                            <li><i class="fa-solid fa-check text-success me-3"></i>Grupo exclusivo no WhatsApp para orientações e dicas durante a viagem</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Não incluso</th>
                                    <td>
                                        <ul class="d-flex flex-wrap">
                                            <li>
                                                <!-- <i class="fa-solid fa-xmark text-danger me-3"></i> -->
                                                ----
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h5 class="display-6">Nossa galeria</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimentum egestas, libero dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretium est.</p>
                    <ul class="event__gallery">
                        <li class="event__item">
                            <img src="<?php echo getAbsoluteUrl('/assets/images/banner.jpg'); ?>" alt="Avatar">
                        </li>
                        <li class="event__item">
                            <img src="<?php echo getAbsoluteUrl('/assets/images/banner.jpg'); ?>" alt="Avatar">
                        </li>
                        <li class="event__item">
                            <img src="<?php echo getAbsoluteUrl('/assets/images/banner.jpg'); ?>" alt="Avatar">
                        </li>
                        <li class="event__item">
                            <img src="<?php echo getAbsoluteUrl('/assets/images/banner.jpg'); ?>" alt="Avatar">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="event__sidebar">
                <form id="form-period-event">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="period"><i class="fa-regular fa-clock me-3 mb-3"></i>Selecione o período</label>
                            <select class="form-select" id="period-event" required name="period" aria-label="Default select example">
                                <option value="null"></option>
                                <option value="30/12/2024 a 01/01/2025">30/12/2024 a 01/01/2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="event__accordion accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <div class="d-flex flex-column">
                                                <div><i class="fa-regular fa-user me-3"></i> Quantidade de pessoas</div>
                                                <span id="selected-amount-label">Selecione</span>
                                            </div>
                                        </div>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?php foreach ($enumCategories as $category): ?>
                                                <div class="event__accordion-item">
                                                    <div class="event__accordion-type">
                                                        <span>
                                                            <?php echo $category['value']; ?>
                                                            <span class="event__accordion-type--feature">(<?php echo $category['age']; ?>)</span>
                                                        </span>
                                                        <span class="event__accordion-type--category">R$ <?php echo $category['price']; ?></span>
                                                    </div>
                                                    <div class="event__accordion-count">
                                                        <div class="input-group">
                                                            <button type="button" class="input-group-text" id="btn-plus-<?php echo $category['key']; ?>-count">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                            <input type="text" class="form-control text-center" id="input-<?php echo $category['key']; ?>-count" value="0">
                                                            <button type="button" class="input-group-text" id="btn-minus-<?php echo $category['key']; ?>-count">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary w-100" id="btn-reservation-now" disabled="true" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="updateTicketsAmount()">Reservar agora</button>
                        </div>
                    </div>
                </form>

                <div class="event__totalizers">
                    <div id="subtotal-label"></div>
                    <div id="payment-label"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informações dos ingressos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include "./views/pages/participantes.php"; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a type="button" href="<?php echo getAbsoluteUrl('checkout'); ?>" class="btn btn-primary" onclick="pegarDadosFormularios()">Pagar</a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let enumCategories = [
        { key: "adults", value: "Adultos", price: <?php echo 490; ?> },
        { key: "children", value: "Crianças", price: <?php echo 490; ?> },
        { key: "babies", value: "Crianças de Colo", price: <?php echo 0; ?> },
    ];
</script>
<script src="<?php echo getAbsoluteUrl('/dist/js/single-pacote.js'); ?>"></script>