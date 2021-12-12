function modifyModalData(metaData) 
    {
        $("#modalTitle").html(metaData['title']);
        console.clear();
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
        metadata["formLoad"] = 
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
    
    
                /*@ Registration start */
                $('#btnSubmit').click( function(e) {
                    e.preventDefault();
     
                    let formData = $('#registrationForm').serialize();
     
                    $.ajax({
                        method: 'POST',
                        url: 'processRegistration.php',
                        data: formData,
                        success: function (response) 
                        {
     
                            let res = JSON.parse(response);
     
                            $('#responseContainer').removeClass('alert-danger');
                            $('#responseContainer').addClass('alert-success');
                            $('#responseContainer').html(res.msg);
                            $('#responseContainer').show();
     
                        },
                        error: function (response) {
     
                            let res = JSON.parse(response.responseText);
     
                            $('#responseContainer').addClass('alert-danger');
                            $('#responseContainer').removeClass('alert-success');
                            $('#responseContainer').html(res.msg);
                            $('#responseContainer').show();
                        },
                    });
                });
     
            });