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