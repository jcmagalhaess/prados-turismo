<?php
function getAbsoluteUrl($path = '') {
    // Detecta o protocolo (http ou https)
    $isHttps = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') || $_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
    $protocol = $isHttps ? 'https://' : 'http://';

    // Host (domínio ou IP)
    $host = $_SERVER['HTTP_HOST'];

    // Caminho base da aplicação
    $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

    // Monta a URL completa, garantindo que o caminho seja tratado corretamente
    return $protocol . $host . $basePath . '/' . ltrim($path, '/');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prados Turismo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.min.css" integrity="sha512-xtV3HfYNbQXS/1R1jP53KbFcU9WXiSA1RFKzl5hRlJgdOJm4OxHCWYpskm6lN0xp0XtKGpAfVShpbvlFH3MDAA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo getAbsoluteUrl('/dist/css/main.min.css'); ?>">
</head>

<body>
    <header class="header">
        <div class="header__topbar">
            <div class="container">
                <div class="header__flex">
                    <ul class="header__social-icons">
                        <li class="header__icon">
                            <i class="fa-brands fa-facebook"></i>
                        </li>
                        <li class="header__icon">
                            <i class="fa-brands fa-instagram"></i>
                        </li>
                    </ul>
                    <div class="spacer"></div>
                    <div class="header__account">
                        <i class="fa-regular fa-user"></i> <a href="login">Entre ou Cadastre-se</a>
                    </div>
                    <div class="header__cart">
                        <div class="header__value">R$ 0,00</div>
                        <div class="header__amount">
                            <i class="fa-solid fa-basket-shopping"></i>
                            <span class="header__badge">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__menu">
            <div class="container">
                <div class="header__flex">
                    <figure class="header__logo">
                        <img src="/assets/images/logo.webp" alt="Logo - Prados Turismo">
                    </figure>
                    <ul class="header__list">
                        <li class="header__item header__item--activated">
                            <a href="/">Home</a>
                        </li>
                        <li class="header__item">
                            <a href="/">Pacotes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="module">
        import {
            auth,
            getCookie
        } from './dist/js/main.min.js';

        let token = localStorage.getItem('token')

        if (!token) {
            await auth()
            token = localStorage.getItem('token')
        }

        localStorage.setItem('token', token)
    </script>