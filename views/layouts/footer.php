        <footer class="footer">
            <div class="footer__informations">
                <figure class="footer__logo">
                    <img src="<?php echo getAbsoluteUrl('/assets/images/logo.webp'); ?>" alt="Logo - Prados Turismo">
                </figure>
                <div class="footer__sac">
                    <h1 class="footer__title">Atendimento</h1>
                    <div class="footer__content">
                        <h2>Horario de Atendimento</h2>
                        <p>Segunda a sexta 8:00 ás 23:00h</p>
                        <p>+55 (85) 9 9746-0786</p>
                        <p>Fortaleza, Ceará</p>
                        <p><a href="mailto:contato@pradosturismo.com.br">contato@pradosturismo.com.br</a></p>
                    </div>
                </div>
                <div class="footer__sitemap">
                    <h1 class="footer__title">Ajuda</h1>
                    <ul class="footer__list">
                        <li><strong>31.853.548 - Emannuel Wallysson Aguiar do Prado.</strong></li>
                        <li>
                            <a href="">Sobre nós</a>
                        </li>
                        <li>
                            <a href="">Politica de privacidade</a>
                        </li>
                        <li>
                            <a href="">Termos de uso</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__others">
                    <div class="footer__payments-method">
                        <h1 class="footer__title">Formas de Pagamento</h1>
                    </div>
                    <div class="footer__social-media">
                        <h1 class="footer__title">Redes sociais</h1>
                        <ul class="footer__social-icons">
                            <li class="footer__icon">
                                <i class="fa-brands fa-facebook"></i>
                            </li>
                            <li class="footer__icon">
                                <i class="fa-brands fa-instagram"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="container">
                    <div class="d-flex flex-column align-items-center">
                        <strong>Prados © <?php echo date("Y"); ?> Todos os direitos reservados.</strong>
                        <span>CNPJ: 31.853.548/0001-08</span>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-cycle-2@1.0.3/src/jquery.cycle.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js" integrity="sha512-KbRFbjA5bwNan6DvPl1ODUolvTTZ/vckssnFhka5cG80JVa5zSlRPCr055xSgU/q6oMIGhZWLhcbgIC0fyw3RQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.banner').cycle({
                    fx: 'fade', // Tipo de animação (fade, scrollHorz, etc.)
                    speed: 1000, // Velocidade da transição
                    timeout: 3000, // Tempo de exibição de cada slide
                    slides: '> .banner__image'
                });
            });
        </script>
    </body>
</html>