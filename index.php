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
                                        <input id="first_name" type="text" class="validate" name="first_name">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="last_name" type="text" class="validate" name="second_name">
                                        <label for="last_name">Second Name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="email" type="email" class="validate" name="email">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <input id="date" type="text" class="validate datepicker" name="birthday">
                                        <label for="date">Birthday</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <input id="color" type="color" class="validate color-picker" name="color">
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
                                        <input id="password" type="password" name="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="input-field col s12 m6">
                                        <select class="validate" name="department">
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="1">IT</option>
                                            <option value="2">HR</option>
                                            <option value="3">OTHERS</option>
                                        </select>
                                        <label>Department</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn">Register</button>
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
    <script src="index.js"></script>
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
    </script>
</body>

</html>