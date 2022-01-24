<form           
    name="registrationForm"
    id="registrationForm"
    method="POST"
    action="./control-form-actions.php" 
    class="contactForm"
    style="display: <?=$this->setDisplayForm("registrationForm")?>;"
>
<h3 class="mb-4">Bora dar call??</h3>
<input type="hidden" name="action" value="registration"/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="label" for="name">Como quer ser chamado?</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                <div 
                    class="text-danger text-center  error-validation small"
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
                    class="text-danger text-center  error-validation small"
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
                    class="text-danger text-center  error-validation small"
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
                    class="text-danger text-center  error-validation small"
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
                    class="text-danger text-center  error-validation small"
                    style="display: none;"
                    id="error-placeLive"
                >
                Mensagem
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="label" for="name">Data de Nascimento?</label>	
                <input type="date"  class="form-control" name="birthDay" id="birthDay">
                <ul class="list-gpfrm" id="searchPlaceResult"></ul>
                <div 
                    class="text-danger text-center  error-validation small"
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
                    class="text-danger text-center  error-validation small"
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
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="número" maxlength="9">
                <div 
                    class="text-danger text-center  error-validation small"
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
                    class="text-danger text-center  error-validation small"
                    style="display: none;"
                    id="error-userName"
                >
                Mensagem
            </div>
            </div>
        </div>

        <div class="col-md-12" style="display: none;">
            <div class="form-group">
                <label class="label" for="name">Joga em algum site?</label>
                <ul>
                    <li>
                        <input type="checkbox" class="form-check-label" name="websites[]" id="website-1" value="bovada"  placeholder="">
                            <img src="./img/bovada-logo-small.jpg" alt="">
                    </li>
                    <li>
                        <input type="checkbox" class="form-check-label" name="websites[]" id="website-2" value="partyPoker"  placeholder="">
                            <img src="./img/party-poker-logo-small.jpg" alt="">
                    </li>
                    <li>
                        <input type="checkbox" class="form-check-label" name="websites[]" id="website-3" value="betOnline"  placeholder="">
                            <img src="./img/betonline-logo-small.jpg" alt="">
                    </li>
                    <li>
                        <input type="checkbox" class="form-check-label" name="websites[]" id="website-4" value="888"  placeholder="">
                            <img src="./img/888-logo-small.jpg" alt="">
                    </li>
                    <li>
                        <input type="checkbox" class="form-check-label" name="websites[]" id="website-5" value="pokerStars"  placeholder="">
                            <img src="./img/pokerstars-logo-small.jpg" alt="">
                    </li>
                </ul>
                <div 
                    class="text-danger text-center  error-validation small"
                    style="display: none;"
                    id="error-userName"
                >
                Mensagem
            </div>
            </div>
        </div>
<!-- <input type="submit"> -->
        <div class="col-md-12">
            <div class="form-group">
                <button 
                    type="button"  
                    class="btn btn-primary btn-block"
                    id="btnSubmit"
                    onclick="registerSubmit()"
                >ALL IN!!! (Cadastrar)</button>
                <div class="submitting"></div>
            </div>
        </div>
    </div>
</form>

<script>
    enteranother("registrationForm", "btnSubmit");
</script>




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
