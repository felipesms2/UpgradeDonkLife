<div id="formLogin" style="display: <?=$this->setDisplayForm("formLogin")?>;">
<form id="loginRules">
    <label for="">Usuário</label>
    <input type="text" class="form-control" id="username">
    <label for="">Senha</label>
    <input type="password" name="passwd" class="form-control mb-2" id="">
    <button class="btn btn-primary btn-block" onclick="forgotPassView()" class=" btn btn-block border" data-bs-toggle="modal" data-bs-target="#genericModal">
        
            Entrar
        
    </button>

    <div class="text-center">
    <button class="btn" onclick="forgotPassView()" class=" btn btn-block border" data-bs-toggle="modal" data-bs-target="#genericModal">
        <small>
            Esqueci minha senha
        </small>
    </button>
    </div>

    </form>
</div>