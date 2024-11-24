<form>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nome *</label>
                <input type="text" class="form-control" id="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="lastname" class="form-label">Sobrenome *</label>
                <input type="text" class="form-control" id="lastname">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="username" class="form-label">Nome de exibição *</label>
                <input type="text" class="form-control" id="username">
                <em id="emailHelp" class="form-text">Será assim que seu nome será exibido na seção da conta e nos comentários.</em>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="email" class="form-label">Endereço de e-mail *</label>
                <input type="text" class="form-control" id="email">
            </div>
        </div>
        <div class="col-md-12">
            <h5 class="display-6 mb-3">Alteração de senha</h5>
            <div class="mb-3">
                <label for="currentPassword" class="form-label">Senha atual (deixe em branco para não alterar)</label>
                <input type="text" class="form-control" id="currentPassword">
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Nova senha (deixe em branco para não alterar)</label>
                <input type="text" class="form-control" id="newPassword">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirmar nova senha</label>
                <input type="text" class="form-control" id="confirmPassword">
            </div>
        </div>
        <div class="col-md-12">
            <button type="button" class="btn btn-primary me-3">Salvar alterações</button>
        </div>   
    </div>
</form>