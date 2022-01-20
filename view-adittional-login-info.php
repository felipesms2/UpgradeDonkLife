<input type="hidden" id="additionaLogin" value="">
<div class="d-none" id='footerLogin'> 
<div class="mb-2 text-center">
        <small id='additionalText'>Não tem uma conta?<br></small>
            <button 
                class="btn" 
                style="background-color: yellow; font-weight: bold;"
                onclick="spaDiv('register'); displayAdd('register');"
                id="additionalTextButton"
                >Cadastrar</button>
    </div>
</div>

<div id="footerRegister">
    <div class="mb-2">
        <small id='additionalText'>Já tem uma conta?</small>
            <button 
                class="btn btn-block btn-primary" 
                onclick="spaDiv('login'); displayAdd('login');"
                id="additionalTextButton"
                >Entrar</button>
    </div>
</div>