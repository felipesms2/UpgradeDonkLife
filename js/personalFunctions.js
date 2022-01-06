function modifyModalData(metaData) 
    {
        $("#modalTitle").html(metaData['title']);
        $("#additionalContent").html(metaData['fileBodyLoad']);
        $("#additionalContent").hide();
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
       // $("#form-content").load("view-form-" + module + ".php");
    }

    var urlParams = new URLSearchParams(window.location.search);
    //console.log(urlParams);
    let mode = urlParams.get("mode");
    

    function displayAdd(mode) 
    {
        $("#responseContainer").hide();
        $("#additionalRole").val(mode);
        mainReferenceDiv = "footerRegister";
        secondaryReferenceDiv = "footerLogin";
        formToshow = "registrationForm";
        formToHide = "formLogin";
        if (mode =="login") 
            {
                mainReferenceDiv = "footerLogin";
                secondaryReferenceDiv = "footerRegister";
                formToshow = "formLogin";                
                formToHide = "registrationForm";                
            }

        $("#" + formToshow).show();
        $("#" + formToHide).hide();
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
                    console.log(response);
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
            $(".error-validation").hide();
            $('#btnSubmit').prop('disabled', true);
            let formData = $('#registrationForm').serialize();
            //console.log(formData);

            $.ajax({
                method: 'POST',
                url: 'control-form-actions.php',
                data: formData,
                success: function (response) {

                    let res = JSON.parse(response);

                    //$('#responseContainer').removeClass('alert-danger');
                    //$('#responseContainer').html(res.msg);
                    //$('#responseContainer').show();
                    //console.log(formData);
                    $('#btnSubmit').prop('disabled', false);
                    modalMetaData = [];
                    emailSent = $("#email").val();
                    modalMetaData["msg"] = "Cadastro efetuado com sucesso, confira sua caixa de entrada ou spam no email  "+ emailSent +" ";
                    modalMetaData["title"] = "Seu cadastro foi realizado com sucesso, ";
                    modalMetaData["newClass"] = "alert-success";
                    modalChangeRegister(modalMetaData);
                    //document.getElementById("registrationForm").reset();
                    //$('#form-content').html("aaa");

                },
                error: function (response) {

                    let res = JSON.parse(response.responseText);

                    //$('#responseContainer').addClass('alert-danger');
                    //$('#responseContainer').removeClass('alert-success');
                    $('#responseContainer').html(res.msg);
                    //$('#responseContainer').show();
                    $('#btnSubmit').prop('disabled', false);
                    modalMetaData = []
                    modalMetaData["title"] = "Ops!!";
                    modalMetaData["newClass"] = "alert-danger";
                    modalMetaData["msg"] = "Uma ou mais informação foi fornecida incorretamente, por favor verifique as instruções";
                    modalChangeRegister(modalMetaData);
                    console.log(errorField);
                    console.log(errorMsg);
                    displayErrorValidation(errorField, errorMsg);
                    
                },
            });       
        }

    function modalChangeRegister(modalMetaData)
        {
            $('#modalTitle').html(modalMetaData.title);
            $('#modalTitle').html(modalMetaData.title);
            $('#genericModal').modal('toggle');
            $('#additionalContent').removeClass('alert-success');
            $('#additionalContent').removeClass('alert-danger');
            $('#additionalContent').addClass(modalMetaData.newClass);
            $('#additionalContent').html(modalMetaData.msg);
            $('#additionalContent').show();
        }
        
 
function avoidEnter() 
{
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
        
}

function enteranother(formId, buttonTrigger) 
{

    $('#' + formId).keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $('#' + buttonTrigger).click();
            return false;
            alert('You pressed a "enter" key in textbox');  
        }
    });
}





var itemClean = [];
function jsonArray(urlParam) {
    $.getJSON( urlParam, function( data ) {
        
        counter = 0;
        $.each( data, function( key, val ) {
        itemClean.push([key, val]);
        
        });

    console.log(itemClean);
 
         });

}


function fillSelect(objId, listItens, defaultOption=["", "Selecione"]) 
    {
        
        
        counter = 0;

        //alert(listItens.length);
        
        
        if (counter===0) 
            {
                $("#" + objId).append(new Option(defaultOption[1], defaultOption[0]));
            }

            for(var index in listItens)
            {
                idInsert =  index
                labelOption = listItens[index];
                console.log(labelOption);
                if (idInsert!=defaultOption[counter]) 
                {
                    $("#" + objId).append(new Option(labelOption + " - " + idInsert, idInsert));            
                }  
                counter++;
            }



        //console.log(listItens);

    }

    

    function displayErrorValidation(errorField, errorMsg) 
        {
            counter = 0;
            errorField.forEach(element => 
                {
                    $("#" + "error-" + element).show();
                    $("#" + "error-" + element).html(errorMsg[element]);
                });
        }

        
        function AutoComplete() 
            {

                var form = $('#registrationForm').serialize();
                $.ajax(
                {
                    type: 'POST',
                    url: 'do_search.php',
                    data: form,
                    dataType: 'json',
                    success: function(response)
                        {
                        if(response.error)
                            {
                            $('#searchPlaceResult').hide();
                            }
                        else
                            {
                            $('#searchPlaceResult').show().html(response.data);
                            }
                        }   
                });
                
            }
        
        $('#placeLive').keyup(function(e)
        {
			e.preventDefault();
			var form = $('#registrationForm').serialize();
			$.ajax(
            {
				type: 'POST',
				url: 'do_search.php',
				data: form,
				dataType: 'json',
				success: function(response)
                    {
					if(response.error)
                        {
						$('#searchPlaceResult').hide();
					    }
					else
                        {
						$('#searchPlaceResult').show().html(response.data);
					    }
				    }   
            });
		});


		//fill the input

		$(document).on('click', '.list-gpfrm-list', function(e){

			e.preventDefault();

			$('#searchPlaceResult').hide();

			var fullname = $(this).data('fullname');

			$('#placeLive').val(fullname);

		});


        function drawInputText(divId, dynamicName, idCounter) 
            {
                inputObj = "<input type='text' name='" + dynamicName +  "[]' id='dynamicName-"+ idCounter +"'> </input>";
                $("#" + divId).html(inputObj);
            }


        function checkEnter()
            {

                btnSubmit = "btnCheckEnter";
                formId = "loginRules";
                event.preventDefault();
                
                $('#' + btnSubmit).prop('disabled', true);
                let formData = $('#' + formId).serialize();
                //console.log(formData);
    
                $.ajax({
                    method: 'POST',
                    url: 'control-form-actions.php',
                    data: formData,
                    success: function (response) {
                        let res = JSON.parse(response);
                        $('#' + btnSubmit).prop('disabled', false);
                        //alert(res.msg);
                        $("#loginRules").submit();    
                    },
                    error: function (response) {
    
                        let res = JSON.parse(response.responseText);
                        $('#responseContainer').html(res.msg);
                        $('#' + btnSubmit).prop('disabled', false);
                        modalMetaData = []
                        modalMetaData["title"] = "Ops!!";
                        modalMetaData["newClass"] = "alert-danger";
                        modalMetaData["msg"] = "Usuário ou senha incorretos, tente novamente";
                        modalChangeRegister(modalMetaData);
                        //alert(res.msg);
                    },  
                    });
            
            }
            
    
