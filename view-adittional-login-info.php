<input type="hidden" id="additionaLogin" value="">
<div class="d-none" id='footerLogin'> 
<div class="mb-2">
        <small id='additionalText'>Não tem uma conta?</small>
            <button 
                class="btn btn-info" 
                onclick="spaDiv('login'); displayAdd('register')"
                id="additionalTextButton"
                >Criar Registro</button>
    </div>
</div>

<div id="footerRegister">
    <div class="mb-2">
        <small id='additionalText'>Já tem uma conta?</small>
            <button 
                class="btn btn-info" 
                onclick="spaDiv('login'); displayAdd('login')"
                id="additionalTextButton"
                >Entrar</button>
    </div>
</div>