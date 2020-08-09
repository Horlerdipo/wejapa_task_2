$('.check input:checkbox').click(function () {
    $('.check input:checkbox').not(this).prop('checked', false);
});

$(document).ready(() => {
    $('select').formSelect();
});

$(document).ready(() => {
    $("form").submit((e) => {
        validate(e);
    });
});

function validate(e) {


    if ($('input[name="first_name"]').val() == 0) {
        e.preventDefault();
        M.toast({
            html: 'First Name is required!',
            classes: 'dark-text red darken-4'
        });

    }

    if ($('input[name="second_name"]').val() == 0) {
        e.preventDefault();
        M.toast({
            html: 'Second Name is required!',
            classes: 'dark-text red darken-4'
        });

    }

    if ($('input[name="email"]').val() == 0) {
        e.preventDefault();
        M.toast({
            html: 'Email is required!',
            classes: 'dark-text red darken-4'
        });

    }

    if ($('input[name="birthday"]').val() == 0) {
        e.preventDefault();
        M.toast({
            html: 'Birthday is required!',
            classes: 'dark-text red darken-4'
        });

    }

    if ($('input[name="color"]').val() == 0) {
        e.preventDefault();
        M.toast({
            html: 'Favorite Color is required!',
            classes: 'dark-text red darken-4'
        });

    }

    //CHECK IF GENDER WAS SELECTED
    let gender_check = $('input[name="gender[]"]:checked').length == 0;
    if (gender_check) {
        e.preventDefault();
        M.toast({
            html: 'You have to select a gender!',
            classes: 'dark-text red darken-4'
        });
    }


    let password = $('input[name="password"]').val();

    //CHECK IF PASSWORD LENGTH IS UP TO 15
    if (password.length < 14) {
        e.preventDefault();
        console.log(password);
        M.toast({
            html: 'Your Password must have at least 15 characters!',
            classes: 'dark-text red darken-4'
        });

    }
    //CHECK IF PASSWORD CONTAINS UPPERCASE
    let upperCase = new RegExp('[A-Z]');
    if (!password.match(upperCase)) {
        e.preventDefault();
        M.toast({
            html: 'Your Password must contain uppercase letters!',
            classes: 'dark-text red darken-4'
        });
    }

    //CHECK IF PASSWORD CONTAINS LOWERCASE
    let lowerCase = new RegExp('[a-z]');
    if (!password.match(lowerCase)) {
        e.preventDefault();
        M.toast({
            html: 'Your Password must contain lower letters!',
            classes: 'dark-text red darken-4'
        });
    }

    //CHECK IF PASSWORD CONTAINS NUMBERS
    let number = new RegExp('[0-9]');
    if (!password.match(number)) {
        e.preventDefault();
        M.toast({
            html: 'Your Password must contain numbers!',
            classes: 'dark-text red darken-4'
        });
    }

    //CHECK IF PASSWORD CONTAINS SPECIAL CHARACTER
    let special = new RegExp('[^a-zA-Z0-9]');
    if (!password.match(special)) {
        e.preventDefault();
        M.toast({
            html: 'Your Password must contain special characters!',
            classes: 'dark-text red darken-4'
        });
    }
}