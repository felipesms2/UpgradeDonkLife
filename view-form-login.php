<div id="formLogin" style="display: <?=$this->setDisplayForm("formLogin")?>;">
<form id="loginRules">
    <label for="">Usuário</label>
    <input type="text" class="form-control" id="username">
    <input type="hidden" name='action' id='action' value="checkEnter">
    <label for="">Senha</label>
    <input type="password" name="passwd" class="form-control mb-2" id="">
    <button
        id="validatePasswordBtn" 
        class="btn btn-primary btn-block" 
        onclick="alert('regra de login')" 
        class=" btn btn-block border"
        type="button" 
    >
    Entrar</button>
    <div class="text-center">
    <button class="btn" onclick="forgotPassView()" class=" btn btn-block border" data-bs-toggle="modal" data-bs-target="#genericModal">
        <small>
            Esqueci minha senha
        </small>
    </button>
    </div>

    </form>
        <script>
            enteranother("formLogin", "validatePasswordBtn");
        </script>
</div>