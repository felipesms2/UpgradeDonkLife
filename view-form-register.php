
            <form name="registrationForm" id="registrationForm" method="POST">
            <input type="hidden" name="action" value="registration"/>
        
            <label for="userFriendlyName">Nome</label>
            <input type="text" name="name" class="form-control">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control">
            <label for="">Usuário</label>
            <input type="text" name="userName" class="form-control">
            <label for="">Senha</label>
            <input type="password" name="password" class="form-control">
            <label for="">Confirmar Senha</label>
            <input type="passwordConfirm" name="" class="form-control">

            <div class="d-grid gap-2 mt-2 mb-2">
                <button 
                    class="btn btn-primary btn-block"
                    type="submit"
                    id="btnSubmit"
                    >Registrar
                </button>
            </div>
            <input type="checkbox" name="" id=""> 
                <small>Aceito os termos de uso da plataforma</small> 
            </form>  
