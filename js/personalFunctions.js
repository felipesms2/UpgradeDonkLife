function modifyModalData(metaData) 
    {
        console.log(metaData);
        $("#modalTitle").html(metaData['title']);
    }


function forgotPassView() 
    {
        let metadata =[];
        metadata["title"] = "Resetar Senha";
        metadata["fileBodyLoad"] = "";
        modifyModalData(metadata);
    }

function spaDiv(module) 
    {
        $("#form-content").load("view-form-" + module + ".php");
    }

    var urlParams = new URLSearchParams(window.location.search);
    //console.log(urlParams);
    let mode = urlParams.get("mode");


    function footerAdditional(mode) 
    {
        //alert(mode);
            
    }
    
    footerAdditional(mode);