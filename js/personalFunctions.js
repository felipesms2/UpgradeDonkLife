function modifyModalData(metaData) 
    {
        $("#modalTitle").html(metaData['title']);
        //console.clear();
        previousUsername =  document.getElementById("username").value;
        $("#form-modal-body").load("view-form-forgot.php", function () {      
            $("#usernameForgot").val(previousUsername);
        });
    }


function forgotPassView() 
    {
        let metadata =[];
        metadata["title"] = "Enviar Instruções";
        metadata["fileBodyLoad"] = "";
        metadata["formLoad"] = "";
        modifyModalData(metadata);
    }

function spaDiv(module) 
    {
        $("#form-content").load("view-form-" + module + ".php");
    }

    var urlParams = new URLSearchParams(window.location.search);
    //console.log(urlParams);
    let mode = urlParams.get("mode");


    function displayAdd(mode) 
    {
        $("#additionalRole").val(mode);
        mainReferenceDiv = "footerRegister";
        secondaryReferenceDiv = "footerLogin";
        if (mode =="login") 
            {
                mainReferenceDiv = "footerLogin";
                secondaryReferenceDiv = "footerRegister";
            }

        $("#" + secondaryReferenceDiv).addClass("d-none");
        $("#" + mainReferenceDiv).removeClass("d-none");
        //console.log(mode);     
    }




    function callReset() 
        {
            $('#alertReset').html("Aguarde...");
            $('#modalBtnSave').prop('disabled', true);
            let formData = $('#formForgot').serialize();
            console.log(formData);

            $.ajax({
                method: 'POST',
                url: 'control-form-actions.php',
                data: formData,
                success: function (response) {

                    let res = JSON.parse(response);

                    //$('#responseContainer').removeClass('alert-danger');
                    //$('#responseContainer').addClass('alert-success');
                    $('#alertReset').html(res.msg);
                    //$('#responseContainer').show();
                    //console.log(formData);
                    $('#modalBtnSave').prop('disabled', false);

                    //document.getElementById("registrationForm").reset();
                    //$('#form-content').html("aaa");

                },
                error: function (response) {

                    let res = JSON.parse(response.responseText);

                    // $('#responseContainer').addClass('alert-danger');
                    // $('#responseContainer').removeClass('alert-success');
                    $('#alertReset').html(res.msg);
                    $('#alertReset').show();
                    $('#modalBtnSave').prop('disabled', false);
                    console.log(res);
                },
            });
            
        }

        function resetAuth() 
        {
            $('#responseContainer').html("Aguarde...");
            $('#action').val("resetConfirmValidation");
            $('#btnResetAuth').prop('disabled', true);
            let formData = $('#resetAuth').serialize();
            console.log(formData);

            $.ajax({
                method: 'POST',
                url: 'control-form-actions.php',
                data: formData,
                success: function (response) {

                    let res = JSON.parse(response);

                    //$('#responseContainer').removeClass('alert-danger');
                    //$('#responseContainer').addClass('alert-success');
                    $('#responseContainer').html(res.msg);
                    //$('#responseContainer').show();
                    //console.log(formData);
                    $('#btnResetAuth').prop('disabled', false);
                    $('#action').val("resetConfirm");
                    $('#resetAuth').submit();

                    //document.getElementById("registrationForm").reset();
                    //$('#form-content').html("aaa");

                },
                error: function (response) {

                    let res = JSON.parse(response.responseText);

                    // $('#responseContainer').addClass('alert-danger');
                    // $('#responseContainer').removeClass('alert-success');
                    $('#responseContainer').html(res.msg);
                    $('#responseContainer').show();
                    $('#btnResetAuth').prop('disabled', false);
                    console.log(res);
                },
            });
            
        }
    

        function registerSubmit() 
        {
            $('#btnSubmit').prop('disabled', true);
            let formData = $('#registrationForm').serialize();
            //console.log(formData);

            $.ajax({
                method: 'POST',
                url: 'control-form-actions.php',
                data: formData,
                success: function (response) {

                    let res = JSON.parse(response);

                    $('#responseContainer').removeClass('alert-danger');
                    $('#responseContainer').addClass('alert-success');
                    $('#responseContainer').html(res.msg);
                    $('#responseContainer').show();
                    //console.log(formData);
                    $('#btnSubmit').prop('disabled', false);

                    //document.getElementById("registrationForm").reset();
                    //$('#form-content').html("aaa");

                },
                error: function (response) {

                    let res = JSON.parse(response.responseText);

                    $('#responseContainer').addClass('alert-danger');
                    $('#responseContainer').removeClass('alert-success');
                    $('#responseContainer').html(res.msg);
                    $('#responseContainer').show();
                    $('#btnSubmit').prop('disabled', false);
                    console.log(res);
                },
            });
            
        }

 

