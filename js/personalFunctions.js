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
    
    


