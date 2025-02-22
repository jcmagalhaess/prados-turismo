<?php
    $meses = array(
        array('key' => 'JAN', 'value' => 'Janeiro' ),
        array('key' => 'FEV', 'value' => 'Fevereiro' ),
        array('key' => 'MAR', 'value' => 'Março' ),
        array('key' => 'ABR', 'value' => 'Abril' ),
        array('key' => 'MAI', 'value' => 'Maio' ),
        array('key' => 'JUN', 'value' => 'Junho' ),
        array('key' => 'JUL', 'value' => 'Julho' ),
        array('key' => 'AGO', 'value' => 'Agosto' ),
        array('key' => 'SET', 'value' => 'Setembro' ),
        array('key' => 'OUT', 'value' => 'Outubro' ),
        array('key' => 'NOV', 'value' => 'Novembro' ),
        array('key' => 'DEZ', 'value' => 'Dezembro' ),
    );
?>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Quantidade de tickets</h5>
                        <p class="card-text">
                            <span id="tickets-count"></span>
                        </p>
                    </div>
                    <div id="prices"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="accordion" id="accordion">
            <div id="accordion-item-1" class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Participantes
                </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <form id="form-participante-1">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome completo *</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail *</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefone *</label>
                                        <input type="text" class="form-control" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cpf" class="form-label">CPF *</label>
                                        <input type="text" class="form-control" name="cpf" id="cpf">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="rg" class="form-label">RG *</label>
                                        <input type="text" class="form-control" name="rg" id="rg">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Órgão emissor *</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="name" class="form-label">Data de nascimento *</label>
                                <div class="col-md-4">
                                    <select class="form-select" name="dia" aria-label="Default select example">
                                        <option disabled selected>Dia</option>
                                        <?php for ($i=1; $i <= 31; $i++) : ?> 
                                            <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>">
                                                <?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="mes" aria-label="Default select example">
                                        <option disabled selected>Mês</option>
                                        <?php foreach ($meses as $key => $value) : ?> 
                                            <option value="<?php echo $value['key']; ?>">
                                                <?php echo $value['value']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="ano" aria-label="Default select example">
                                        <option disabled selected>Ano</option>
                                        <?php 
                                            $anoAtual = date("Y"); // Pega o ano atual
                                            for ($i = $anoAtual; $i >= $anoAtual - 100; $i--) : 
                                        ?> 
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Locais de embarque: *</label>
                                <div class="form-check">
                                    <input class="form-check-input" value="19:00 – North Shopping" type="radio" name="locale" id="locale-1" checked>
                                    <label class="form-check-label" for="locale-1">19:00 – North Shopping</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="19:30 – Shopping Parangaba" type="radio" name="locale" id="locale-2">
                                    <label class="form-check-label" for="locale-2">19:30 – Shopping Parangaba</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="20:00 – Posto Ipiranga ao lado do Terminal de Messejana" type="radio" name="locale" id="locale-3">
                                    <label class="form-check-label" for="locale-3">20:00 – Posto Ipiranga ao lado do Terminal de Messejana</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (sessionStorage.getItem('reservation')) {
        const reservation = JSON.parse(sessionStorage.getItem('reservation'));
        const { period, people, price } = reservation;

        console.log(people);
        
    }
</script>