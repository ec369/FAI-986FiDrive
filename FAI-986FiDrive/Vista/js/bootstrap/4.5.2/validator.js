$('#form').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle',

    },

    fields: {

        titulo: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar un titulo'

                }

            }

        },

        actores: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar al menos un actor'

                }

            }

        },
        año: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar el año'

                },

                stringLength: {
                    max: 4,
                    message: 'Maximo 4 caracteres'
                }


            }
        },

        duracion: {


            validators: {

                notEmpty: {

                    message: 'Debe ingresar el año'

                },
                stringLength: {
                    max: 3,
                    message: 'Maximo 3 caracteres'
                }


            }
        },

        director: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar el director'

                }

            }

        },

        nacionalidad: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar la nacionalidad'

                }

            }

        },

        sinopsis: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar la nacionalidad'

                }

            }

        },

        produccion: {

            validators: {

                notEmpty: {

                    message: 'Debe ingresar la nacionalidad'

                }

            }

        },

        regexp: {


            message: 'Ingrese una cadena valida'
        }

    }

});
