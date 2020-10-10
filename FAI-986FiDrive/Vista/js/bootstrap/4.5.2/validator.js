$('#form').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle',

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'Este campo no puede quedar vacio'

                }

            }

        },

        descripcion: {

            validators: {

                notEmpty: {

                    message: 'Este campo no puede quedar vacio'

                }

            }

        },
        carga: {

            validators: {

                notEmpty: {

                    message: 'Por favor, elija una opcion'

                },

               }
        },

        'seleccion[]': {


            validators: {

                notEmpty: {

                    message: 'Por favor, elija un formato'

                },

                choice: {
                  
                    max: 1,
                    message: 'Solo una opcion'
                },
                


            }
        },

        regexp: {


            message: 'Ingrese una cadena valida'
        }

    }

});
