<h2 class="display-6 mb-3">Cadastre-se</h2>

<div class="login__box">
    <div class="login__form">
        <div class="mb-3">
            <label for="user-register-email" class="form-label">E-mail *</label>
            <input type="text" class="form-control" id="user-register-email" name="user-register-email">
        </div>

        <p>Um link para definir uma nova senha será enviado para seu endereço de e-mail.</p>
        <p>
            Seus dados pessoais serão usados para aprimorar a sua experiência em todo este site,
            para gerenciar o acesso a sua conta e para outros propósitos, como descritos em nossa <a href="politica-de-privacidade">política de privacidade</a> .
        </p>

        <div class="d-flex align-items-center mb-2">
            <button type="submit" id="btn-register-client" class="btn btn-primary me-3">Cadastre-se</button>
        </div>
    </div>
</div>

<script type="module">
    import {
        registerClient
    } from './dist/js/main.min.js';

    const button = document.getElementById('btn-register-client');

    button.addEventListener('click', async (event) => {
        event.preventDefault();
        const user = document.getElementById('user-register-email');
        const data = await registerClient(user.value)

        if (!data) {
            alert("E-mail já registrado")
            return
        }

        alert('E-mail enviado com sucesso!')
    });
</script>