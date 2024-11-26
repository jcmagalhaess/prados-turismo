
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
                            <img src="./assets/images/banner.jpg" alt="Avatar">
                        </li>
                        <li class="event__item">
                            <img src="./assets/images/banner.jpg" alt="Avatar">
                        </li>
                        <li class="event__item">
                            <img src="./assets/images/banner.jpg" alt="Avatar">
                        </li>
                        <li class="event__item">
                            <img src="./assets/images/banner.jpg" alt="Avatar">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="event__sidebar">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="period"><i class="fa-regular fa-clock me-3 mb-3"></i>Selecione o período</label>
                            <select class="form-select" name="period" aria-label="Default select example">
                                <option></option>
                                <option value="1">30/12/2024 a 01/01/2025</option>
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
                                            <div class="event__accordion-item">
                                                <div class="event__accordion-type">
                                                    <span>
                                                        Adultos
                                                        <span class="event__accordion-type--feature">(+12 anos)</span>
                                                    </span>
                                                    <span class="event__accordion-type--category">R$ 490,00</span>
                                                </div>
                                                <div class="event__accordion-count">
                                                    <div class="input-group">
                                                        <button type="button" class="input-group-text" id="btn-plus-adults-count">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center" id="input-adults-count" value="0">
                                                        <button type="button" class="input-group-text" id="btn-minus-adults-count">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event__accordion-item">
                                                <div class="event__accordion-type">
                                                    <span>
                                                        Crianças
                                                        <span class="event__accordion-type--feature">(6 a 12 anos)</span>
                                                    </span>
                                                    <span class="event__accordion-type--category">R$ 490,00</span>
                                                </div>
                                                <div class="event__accordion-count">
                                                    <div class="input-group">
                                                        <button type="button" class="input-group-text" id="btn-plus-children-count">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center" id="input-children-count" value="0">
                                                        <button type="button" class="input-group-text" id="btn-minus-children-count">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event__accordion-item">
                                                <div class="event__accordion-type">
                                                    <span>
                                                        Crianças de colo
                                                        <span class="event__accordion-type--feature">(0 a 5 anos)</span>
                                                    </span>
                                                    <span class="event__accordion-type--category">Gratuito</span>
                                                </div>
                                                <div class="event__accordion-count">
                                                    <div class="input-group">
                                                        <button type="button" class="input-group-text" id="btn-plus-babies-count">
                                                            <i class="fa-solid fa-plus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center" id="input-babies-count" value="0">
                                                        <button type="button" class="input-group-text" id="btn-minus-babies-count">
                                                            <i class="fa-solid fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary w-100">Reservar agora</button>
                        </div>
                    </div>
                </form>

                <div class="event__totalizers">
                    <span>
                        <strong>Subtotal: </strong> R$ 490,00
                    </span>
                    <span class="text-success">Pagando à vista: R$ 460,00</span>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let enumCategories = [
        { key: "adults", value: "Adultos" },
        { key: "children", value: "Crianças" },
        { key: "babies", value: "Crianças de Colo" },
    ]
    let labels = [];
    
    // Event listeners para aumentar e diminuir quantidade de pessoas
    let categories = ['adults', 'children', 'babies'];
    
    categories.forEach(category => {
        document.getElementById(`btn-plus-${category}-count`).addEventListener('click', () => {
            let count = parseInt(document.getElementById(`input-${category}-count`).value);
            count++;
            document.getElementById(`input-${category}-count`).value = count;
            updateCountLabel(category);
        });
        
        document.getElementById(`btn-minus-${category}-count`).addEventListener('click', () => {
            let count = parseInt(document.getElementById(`input-${category}-count`).value);
            if (count > 0) {
                count--;
                document.getElementById(`input-${category}-count`).value = count;
                updateCountLabel(category);
            }
        });
    });

    
    function updateCountLabel(control) {
        let amount = parseInt(document.getElementById(`input-${control}-count`).value);
        
        enumCategories.forEach(category => {
            let exist = labels.some(item => item.replace(/^\d+\s*/, '') === category.value);
            
            if (category.key === control) {
                if (!exist) {
                    labels.push(`${amount} ${category.value}`);
                } else {
                    labels = labels.filter(item => item.replace(/^\d+\s*/, '')!== category.value);
                    labels.push(`${amount} ${category.value}`);
                }
            }
        });
        
        labels = labels.filter(item => !item.includes('0'));

        labels = labels.sort((a, b) => {
            // Remover números iniciais e espaços
            const textoA = a.replace(/^\d+\s*/, '');
            const textoB = b.replace(/^\d+\s*/, '');
            return textoA.localeCompare(textoB); // Ordenação alfabética
        })

        if (labels.length === 0) document.getElementById('selected-amount-label').textContent = 'Selecione';
        else document.getElementById('selected-amount-label').textContent = labels.join(', ');
    }
</script>

<!-- <h1><?php echo htmlspecialchars($pacote['nome']); ?></h1>
    <img src="imagens/<?php echo htmlspecialchars($pacote['imagem']); ?>" alt="<?php echo htmlspecialchars($pacote['nome']); ?>">
    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($pacote['descricao']); ?></p>
    <p><strong>Preço:</strong> <?php echo htmlspecialchars($pacote['preco']); ?></p>
    <p><strong>Duração:</strong> <?php echo htmlspecialchars($pacote['duracao']); ?></p>
    
    <a href="pacotes.php">Voltar para lista de pacotes</a> -->