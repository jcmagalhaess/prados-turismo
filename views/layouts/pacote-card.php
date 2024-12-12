
<div class="col-md-4">
    <div class="card-event">
        <div class="card-event__content">
            <figure class="card-event__thumbnail">
                <img src="<?php echo $value['Pacotes']['Imagem']['url']; ?>" alt="<?php echo $value['nome']; ?>">
                <span class="card-event__date">
                    <?php echo $value['duracao']; ?>
                </span>
            </figure>
            <span class="card-event__category"><?php echo $value['Pacotes']['category']; ?></span>
            <h2 class="card-event__title" title="<?php echo $value['nome']; ?>"><?php echo $value['nome']; ?></h2>
            <p class="card-event__resume"><?php echo $value['observacoes']; ?></p>
        </div>
        <div class="card-event__actions">
            <span class="card-event__price"><?php echo $value['valorFormatado']; ?></span>
            <a href="pacote?id=<?php echo $value['id']; ?>" class="card-event__cart">
                <i class="fa-solid fa-basket-shopping"></i>
            </a>
        </div>
    </div>
</div>