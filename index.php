<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Wejapa Task 2</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title center">
                            <h3>SignUp Form</h3>

                        </span>
                        <div class="row">
                            <form class="col s12" action="submit.php" method="POST">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="first_name" type="text" required class="validate" name="first_name">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="last_name" type="text" required class="validate" name="second_name">
                                        <label for="last_name">Second Name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="email" type="email" required class="validate" name="email">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="date" type="text" required class="validate datepicker" name="birthday">
                                        <label for="date">Birthday</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="color" type="color" required class="validate color-picker" name="color">
                                        <label for="color">Favorite Color</label>
                                        <span class="helper-text">This will be the color of your page</span>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <p>
                                            <label class="check">
                                                <input type="checkbox" name="gender[]" value="Male" />
                                                <span>Male</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label class="check">
                                                <input type="checkbox" name="gender[]" value="Female" />
                                                <span>Female</span>
                                            </label>
                                        </p>
                                        <p>
                                            <label class="check">
                                                <input type="checkbox" name="gender[]" value="Others" />
                                                <span>Others</span>
                                            </label>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="password" type="password" name="password" required class="validate">
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="input-field col s12 m6">
                                        <select class="validate" required name="department">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="1">IT</option>
                                            <option value="2">HR</option>
                                            <option value="3">OTHERS</option>
                                        </select>
                                        <label>Department</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn ">Register</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(() => {
            $('.datepicker').datepicker({
                maxDate: new Date(),
                autoClose: true
            });

            <?php if (isset($_SESSION['errors'])) : ?>
                <?php foreach ($_SESSION['errors'] as $error) : ?>
                    M.toast({
                        html: '<?php echo $error; ?>',
                        classes: 'dark-text red darken-4'
                    });
                <?php endforeach ?>

            <?php endif ?>
            <?php session_destroy() ?>
        });


        $('.check input:checkbox').click(function() {
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
    </script>
</body>

</html>