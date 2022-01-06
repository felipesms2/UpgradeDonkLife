<div id="formLogin" style="display: <?=$this->setDisplayForm("formLogin")?>;">
<form 
    id="loginRules"
    method="POST"
    action="../forum/index.php"
>
    <label for="">Usuário</label>
    <input 
        type="text" 
        class="form-control" 
        id="userName"
        name="userName"
    >
    <input type="hidden" name='action' id='action' value="checkEnter">
    <label for="">Senha</label>
    <input 
        type="password" 
        class="form-control mb-2" 
        id="password"
        name="password"
    >
    <button
        id="btnCheckEnter" 
        class="btn btn-primary btn-block" 
        onclick="checkEnter()" 
        class=" btn btn-block border"
        type="button" 
    >
    Entrar</button>
    <input type="submit" value="test" class="form-control">
    <div class="text-center">
    <button 
        class="btn"
        type="button"
        onclick="forgotPassView()" 
        class=" btn btn-block border" 
        data-bs-toggle="modal" 
        data-bs-target="#genericModal">
        <small>
            Esqueci minha senha
        </small>
    </button>
    </div>

    </form>
        <script>
            enteranother("formLogin", "btnCheckEnter");
        </script>
</div>