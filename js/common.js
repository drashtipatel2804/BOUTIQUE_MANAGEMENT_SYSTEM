// common.js
$(document).ready(function() {
    $("#name").keyup(function () {
        var nameErr = $("#nameErr");
        nameErr.text(""); // Clear the error message when the user starts typing
    });
    $("#Phone").on('input', function() {
        var input = $(this).val();
        if (input.length > 10) {
            $(this).val(input.substring(0, 10));
        }
    });
    $("#firstName").on('input', function() { // Use 'input' event
        var firstName = $(this).val();
        var nameErr = $("#firstNameError");

        if (/[\d]/.test(firstName)) {
            nameErr.text("First name cannot contain digits.");
        } else {
            nameErr.text(""); // Clear the error message when there are no digits
        }
    });
    $("#lastName").on('input', function() { // Use 'input' event
        var lastName = $(this).val();
        var nameErr = $("#lastNameError");

        if (/[\d]/.test(lastName)) {
            nameErr.text("Last name cannot contain digits.");
        } else {
            nameErr.text(""); // Clear the error message when there are no digits
        }
    });
    $('#currentPassword').keyup(function(){
        var nameErr=$('#currentPasswordError');
        nameErr.text("");
    });
    $('#newPassword').keyup(function(){
        var nameErr=$('#newPasswordError');
        nameErr.text("");
    });
    $('#confirmPassword').keyup(function(){
        var nameErr=$('#confirmPasswordError');
        nameErr.text("");
    });
    $('#password').keyup(function(){
        var nameErr=$('#passwordError');
        nameErr.text("");
    });
    $('#email').keyup(function(){
        var nameErr=$('#emailError');
        nameErr.text("");
    });
    $('#checkbox').click(function(){
        var nameErr=$('#checkboxError');
        nameErr.text("");
    });
});

