<input type="hidden" id="additionaLogin" value="">
<div class="d-none" id='footerLogin'> 
<div class="mb-2">
        <small id='additionalText'>Não tem uma conta?</small>
            <button 
                class="btn btn-info" 
                onclick="spaDiv('register'); displayAdd('register');"
                id="additionalTextButton"
                >Cadastrar</button>
    </div>
</div>

<div id="footerRegister">
    <div class="mb-2">
        <small id='additionalText'>Já tem uma conta?</small>
            <button 
                class="btn btn-info" 
                onclick="spaDiv('login'); displayAdd('login');"
                id="additionalTextButton"
                >Entrar</button>
    </div>
</div>