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
    
    
    $(document).ready( function() {
 
        /*@ Registration start */
        $('#btnSubmit').click( function(e) {
            e.preventDefault();
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
        });
        

    });