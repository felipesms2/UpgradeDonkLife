<?php
  $bodyMSG = "
  <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
</head>
<body>
    
    <div class='container border w-50 mt-1'>
        <div class='row mt-1 p-1'>
            <div class='col-6 text-center border'>
                <img src='https://donklife.com.br/cdn/logo.jpg' alt='Donlife - Logo' srcset=''>
            </div>
            <div class='col-6 border text-center'>
                <div>
                    <BR>
                        <span style='font-weight: bold;'>". $this->userLogin ."</span>, bem vindo(a) de volta!
                </div>
            </div>
        </div>
        <div class='row mt-1 text-center p1 '>
            <div class='col-2'></div>
            <div class='col text-center border mb-2'>
                <p>
                    Estamos felizes em atender você novamente!    
                    Recebemos uma solicitação para resetar a senha do usuário ". $this->email ."
                    <a href='". $this->siteBase ."'>clique aqui</a>
                <br>
                Caso não esteja visualizando a mensagem copie este link e cole 
                no seu navegador
                 ". $this->siteBase ."
                </p>
            </div>
            <div class='col-2'></div>
        </div>

        <div class='row border'>
            <div class='col' style='font-style: italic;'>
                <span style='font-weight: bold;'>Felipe Lana</span> <br>
                Sócio- Fundador da DonkLife.com.br
            </div>
        </div>

</body>
</html>

  "

  
?>