

<form           
    name="registrationForm"
    id="registrationForm"
    method="POST"
    action="./control-form-actions.php" 
    class="contactForm"
>
<input type="hidden" name="action" value="registration"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="label" for="name">Como quer ser chamado?</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-name"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group">
                <label class="label" for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-email"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="label" for="name">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-password"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group">
                <label class="label" for="email">Confirmação de Senha</label>
                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Senha novamente">
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-passwordConfirm"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="label" for="name">Onde mora?</label>	
                <input type="text" onkeyup="AutoComplete()" class="form-control" name="placeLive" id="placeLive" placeholder="Cidade - UF">
                <ul class="list-gpfrm" id="searchPlaceResult"></ul>
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-placeLive"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="label" for="name">DDD</label>
                <select class="form-control" id="codeArea" name="codeArea" placeholder="Escolha DDD">
                </select>
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-codeArea"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group">
                <label class="label" for="email">Número</label>
                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="número">
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-phoneNumber"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="label" for="name">Qual seu principal nick no poker?</label>
                <input type="text" class="form-control" name="userName" id="userName" placeholder="">
                <div 
                    class="alert alert-danger text-center  error-validation"
                    style="display: none;"
                    id="error-userName"
                >
                Mensagem
            </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button 
                    type="button"  
                    class="btn btn-primary"
                    id="btnSubmit"
                    onclick="registerSubmit()"
                >ALL IN!!! (Cadastrar)</button>
                <input type="submit">
                <div class="submitting"></div>
            </div>
        </div>
    </div>
</form>




<!-- old for code
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
            <select class="form-control" id="codeArea" name="codeArea" placeholder="Escolha DDD">
            </select>
            <label for="">Número do telefone</label>
            <input type="text" id="phoneNumber" name="phoneNumber" class="form-control">
            <label for="">Senha</label>
            <input type="password" name="password" class="form-control">
            <label for="">Confirmar Senha</label>
            <input type="password" name="passwordConfirm" name="" class="form-control">

            <div class="d-grid gap-2 mt-2 mb-2">
                <button 
                    type="button"
                    class="btn btn-block btn-info"
                    style="background-color: #578733; border-color: #578733; color:white"
                    id="btnSubmit"
                    onclick="registerSubmit()"
                    >Registrar
                </button>
                
            </div>
            </form>
   -->
