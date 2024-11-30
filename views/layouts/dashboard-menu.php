<?php
    $menu = array(
        array('label' => 'Painel', 'route' => 'minha-conta'),
        array('label' => 'Pedidos', 'route' => 'minha-conta/pedidos'),
        array('label' => 'Endereços', 'route' => 'minha-conta/enderecos'),
        array('label' => 'Perfil', 'route' => 'minha-conta/perfil'),
    );
?>

<ul class="dashboard__menu">
    <?php foreach ($menu as $item) : ?>
        <li class="dashboard__item">
            <a href="<?php echo getAbsoluteUrl($item['route']); ?>"><?php echo $item['label']; ?></a>
        </li>
    <?php endforeach; ?>
    <li class="dashboard__item">
        <a href="#">Sair</a>
    </li>
</ul>

<script>
    const currentUrl = window.location.href.slice(5);
    const links = document.querySelectorAll('.dashboard__item > a');    
    
    links.forEach(link => {
        if (link.getAttribute('href') === currentUrl) {
            link.classList.add('dashboard--activated');
        }
    });
</script>