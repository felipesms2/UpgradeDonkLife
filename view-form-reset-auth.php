
    <form id="resetAuth" method="post" action="./control-form-actions.php">
    <input type="hidden" name="action" value="resetConfirm" id="action">    
    Nova Senha
    <input class="form-control" type="password" name="password" id="password">
    Confirmar Senha
    <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm" >
    <button 
        id='btnResetAuth' 
        class="form-control btn-success mt-4" 
        onclick="resetAuth()"
        type="button"
    >Confirmar nova senha</button>
    </form>