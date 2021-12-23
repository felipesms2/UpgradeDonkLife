
    Email
    <form id="formForgot" method="post" action="control-form-actions.php">
    <input type="hidden" name="action" id="action" value="askReset">
    <input 
        type="text" 
        class="form-control"
        placeholder="Digite seu email aqui" 
        name="emailForgot" id="emailForgot"
    >
    
    </form>

    <script>
        avoidEnter();
    </script>

    <div id="alertReset" class ="text-center mt-2">
    </div>