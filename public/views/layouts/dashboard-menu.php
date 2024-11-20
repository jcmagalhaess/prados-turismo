<?php
    $menu = array(
        array('label' => 'Painel', 'route' => 'minha-conta'),
        array('label' => 'Pedidos', 'route' => 'pedidos'),
        array('label' => 'Endereços', 'route' => 'enderecos'),
        array('label' => 'Perfil', 'route' => 'perfil'),
    );
?>

<ul class="dashboard__menu">
    <?php foreach ($menu as $item) : ?>
        <li class="dashboard__item">
            <a href="<?php echo $item['route']; ?>"><?php echo $item['label']; ?></a>
        </li>
    <?php endforeach; ?>
    <li class="dashboard__item">
        <a href="#">Sair</a>
    </li>
</ul>