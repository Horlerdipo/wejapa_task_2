<?php

//SHORT HAND METHOD TO CHECK FOR POST VALUES
$error = [];
!array_key_exists('color', $_POST)
    || empty($_POST['color']) ? $error[] = 'Color must not be empty' : '';

!array_key_exists('first_name', $_POST)
    || empty($_POST['first_name']) ? $error[] = 'First Name must not be empty' : '';

!array_key_exists('second_name', $_POST)
    || empty($_POST['second_name']) ? $error[] = 'Second Name must not be empty' : '';

!array_key_exists('email', $_POST)
    || empty($_POST['email']) ? $error[] = 'Email must not be empty' : '';

!array_key_exists('birthday', $_POST)
    || empty($_POST['birthday']) ? $error[] = 'Birthday must not be empty' : '';

!array_key_exists('gender', $_POST)
    || empty($_POST['birthday']) ? $error[] = 'Gender must not be empty' : '';

!array_key_exists('password', $_POST)
    || empty($_POST['password']) ? $error[] = 'Password must not be empty' : '';

!array_key_exists('department', $_POST)
    || empty($_POST['department']) ? $error[] = 'Department must not be empty' : '';


session_status() == 2 ? session_destroy() : '';

if (!empty($error)) {
    session_start();
    $_SESSION['errors'] = $error;
    header('Location:index.php');
    print_r($_SESSION['errors']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Wejapa Task 2</title>
    <style>
        body {
            background-color: <?php echo $_POST['color'] ?>;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 text-center">
                <h2>Your Details</h2>
                <div class="row">
                    <div class="col s12 m12 l12">
                        Name:<?php echo $_POST['first_name'] ?> <?php echo $_POST['second_name'] ?>
                    </div>
                    <div class="col s12 m12 l12">
                        Email Address:<?php echo $_POST['email'] ?>
                    </div>
                    <div class="col s12 m12 l12">
                        Birthday:<?php echo $_POST['birthday'] ?>
                    </div>
                    <div class="col s12 m12 l12">
                        Gender:<?php echo $_POST['gender'][0] ?>
                    </div>
                    <div class="col s12 m12 l12">
                        Department:<?php echo $_POST['department'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>