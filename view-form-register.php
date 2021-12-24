
            <form 
                name="registrationForm"
                id="registrationForm"
                method="POST"
                action="./control-form-actions.php";
                >
            <input type="hidden" name="action" value="registration"/>
        
            <label for="userFriendlyName">Nome</label>
            <input type="text" name="name" class="form-control">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
            <label for="">Usuário</label>
            <input type="text" name="userName" class="form-control">
            <label for="">DDD</label>
            <select class="form-control" id="codeArea">
                
            </select>
            <label for="">Número do telefone</label>
            <input type="text" class="form-control">
            <label for="">Senha</label>
            <input type="password" name="password" class="form-control">
            <label for="">Confirmar Senha</label>
            <input type="password" name="passwordConfirm" name="" class="form-control">

            <div class="d-grid gap-2 mt-2 mb-2">
                <button 
                    type="button"
                    class="btn btn-block btn-info"
                    id="btnSubmit"
                    style="background-color: #578733; border-color: #578733; color:white"
                    onclick="registerSubmit()"
                    >Registrar
                </button>
                
            </div>
            </form>
  
