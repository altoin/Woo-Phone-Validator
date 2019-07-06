jQuery(document).ready(function() {
    var $ = jQuery;
    var country= $("#billing_country option:selected").val();
    var input = document.querySelector("#billing_phone");
    var errorMap = ["Invalid number", "Invalid country code", "Please provide a valid Number", "Please provide a valid Number", "Invalid number"];
    $("#billing_phone_field").append("<p id='phone_error' class='error'></p>");
   var iti= window.intlTelInput(input, {
        initialCountry: country,
        utilsScript: "/utils.js"
    });

    var reset = function() {
        $("#phone_error").text("");
    };

    input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
            } else {
                var errorCode = iti.getValidationError()
                input.focus();
                $("#phone_error").text(errorMap[errorCode]);

            }
        }
    });

// on keyup / change flag: reset
    //input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

});