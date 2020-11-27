$(document).ready(function () {
    $('#content').keyup(function () {
        $('#strengthMessage').html(checkStrength($('#content').val()))
    })
    function checkStrength(password) {
        pass=document.querySelector("#content2")
        pass2=document.querySelector("#content")
        var strength = 0
        if (password.length < 6) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Short')
            return 'Muy Debil'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
      
        if (strength < 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Weak')
            return 'Debil'
        } else if (strength == 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Good')
            return 'Normal'
        } else {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Strong')
            return 'Fuerte'
        }


       
    }
    
});

$(document).ready(function () {
    $('#content2').keyup(function () {
        $('#strengthMessage').html(checkStrength($('#content2').val()))
    })
    
    function checkStrength(password) {
     
        pass2=document.querySelector("#content").value
        var strength = 0
        if (password.match (pass2)) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Good')
            return 'Correcto'
        }
         else {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Short')
            return 'Las contraseñas deben ser igual'
        }


       
    }
    
});

// if (pass2 != pass ) {
//     $('#strengthMessage').removeClass()
//     $('#strengthMessage').addClass('Short')
//     return 'Debe ser igual'
// } else {
//     $('#strengthMessage').removeClass()
//     $('#strengthMessage').addClass('Good')
//     return 'Correcto'
// }