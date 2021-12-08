function modifyModalData(metaData) 
    {
        $("#modalTitle").html(metaData['title']);
    }


function forgotPassView() 
    {
        let metadata =[];
        metadata["title"] = "Resetar Senha";
        metadata["fileBodyLoad"] = "";
        metadata["formLoad"] = ;
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
    
    


