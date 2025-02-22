<h2 class="display-6 mb-3">Entrar</h2>

<div class="login__box">
    <div class="login__form">
        <div class="mb-3">
            <label for="user" class="form-label">Documento ou E-mail *</label>
            <input type="text" class="form-control" id="user">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha *</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="d-flex align-items-center mb-2">
            <button type="submit" class="btn btn-primary me-3" id="login-user">Submit</button>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </div>

        <a href="esqueci-senha">Perdeu sua senha?</a>
    </div>
</div>

<script type="module">
    import {
        login
    } from './dist/js/main.min.js';

    const button = document.getElementById('login-user');

    button.addEventListener('click', async (event) => {
        event.preventDefault();
        const user = document.getElementById('user').value
        const password = document.getElementById('password').value

        const data = await login(user, password)

        if (!data) {
            alert("E-mail já registrado")
            return
        }

        window.location.href = '/minha-conta';
    });
</script>