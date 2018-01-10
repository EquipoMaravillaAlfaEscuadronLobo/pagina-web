$.validator.setDefaults({
    submitHandler: function () {
        document.getElementById('banderaRegistro').value="ok";    
        document.FORMULARIO.submit();
    }
});
///////////////////////////////////////////////////////////este es para los formularios de ingresozz
$(document).ready(function () {
    $("#FORMULARIO").validate({
        rules: {
            
            nameActual:{
                required: true
                
            },
            
            nameNombre: {
                required: true,
                minlength: 3
            },
            nameUsuario: {
                required: true
                
            },
            namePass: {
                required: true
               
            },
            nameSugerencia: {
                required: true,
                minlength: 3
            },
            nameApellido: {
                required: true,
                minlength: 3
            },
            nameDireccion: {
                required: true,
                minlength: 10
            },
            namePass1: {
                required: true,
                minlength: 6
            },
            namePass2: {
                required: true,
                equalTo: "#idPass1"
            },
            nameFoto: {
                required: true
            },
            nameEmail: {
                required: true,
                email: true
            },
            nameSexo: {
                required: true
            },
            nameDui: {
                required: true,
                minlength: 10
            },
            nameUser: {
                required: true,
                minlength: 6,
                maxlength: 14
            },
            nameTelefono: {
                required: true,
                minlength: 8
            },
            nameNivel: {
                  required: true
            },
            nameNombreX: {
                  required: true
            }
        },
        messages: {
            nameActual: {
                required: "Por favor ingrese su contraseña acutal"
                
            },
            
            nameNombre: {
                required: "Por favor ingrese su Nombre",
                minlength: "El nombre debe de tener por lo menos 3 caracteres"
            },
            nameSugerencia: {
                required: "Por favor ingrese su sugerencia",
                minlength: "El nombre debe de tener por lo menos 3 caracteres"
            },
            nameUsuario: {
                required: "ingrese Usuario"
                
            },
            namePass: {
                required: "Ingrese Contraseña"
                
            },
            nameApellido: {
                required: "Por favor ingrese su Apellido",
                minlength: "El apellido debe de tener por lo menos 3 caracteres"
            },
            nameDireccion: {
                required: "Por favor ingrese la direccion",
                minlength: "ingrese una direccion real"
            },
            namePass1: {
                required: "Ingrese una contraseña",
                minlength: "La contraseña debe de tener por lo menos 6 caracteres"
            },
            namePass2: {
                required: "Repita la contraseña",
                minlength: "Por favor ingrese la misma contraseña",
                equalTo: "Por favor ingrese la misma contraseña"
            },
            nameFoto: {
                required: "por favor ingrese una foto"
            },
            nameSexo: {
                required: "Seleccione un campo"
            },
            nameEmail: {
                required: "Por favor ingrese un correo"
            },
            nameDui: {
                minlength: "ingrese un dui valido",
                required: "ingrese un dui valido"
            },
            nameUser : {
                required: "ingrese un nombre de usuario ",
                minlength: "debe de poseer por lo menos 6 caracteres "
            },
            nameTelefono:{
               required: "favor ingrese su teléfono",
                minlength: "ingrese un numero telefónico valido"
            },
            NameNivel :{
                required: "Seleccione un Nivel"
            },
            NameNombreX :{
                required: "Seleccione un Nivel"
            }
            
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            // Add `has-feedback` class to the parent div.form-group
            // in order to add icons to inputs
            element.parents(".col-sm-5").addClass("has-feedback");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }

            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!element.next("span")[ 0 ]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
            }
        },
        success: function (label, element) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!$(element).next("span")[ 0 ]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
        }
    });
    
    ////////////////////////////////////////////////////////este es para los formularios de edicion
    
     
    
    
    
});



