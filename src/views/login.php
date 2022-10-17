<?php

require_once "bootstrap.php";
session_start();

$base_url = 'http://localhost:8080/cms';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['submit']) and !empty($_POST['username'] and !empty($_POST['password']))) {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        if ($username == 'Admin' and $password == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['logged'] = true;
            header('Location:' . $base_url . '/admin');

            $_SESSION['message'] = "New project name has been saved!";
            $_SESSION['msg_type'] = "success";

        } else {
            $_SESSION['message'] = 'Incorrect username or password!';
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['message'] = 'Username or password values are empty!';
        $_SESSION['msg_type'] = "danger";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Maven Pro', sans-serif;
        }

        .width {
            width: 350px;
        }
    </style>
</head>




<body>
    <!-- Empty input field message -->
    <?php if (isset($_POST['submit']) and empty($_POST['name']) and empty($_POST['email'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>">
            <?php echo $_SESSION['message'];
            unset($_SESSION['message']) ?>
        </div>
    <?php endif ?>


    <!-- login form -->
    <div class="d-flex flex-column align-items-center">
        <div class="text-center mt-5 mb-3">
            <h1>Admin login</h1>
        </div>
        <div class="width form-control shadow p-3 mb-5 bg-body rounded">
            <form action="" method="POST">
                <div class="d-flex flex-column">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username: </label>
                        <input type="text" name="username" placeholder="username = Admin" class="form-control">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password: </label>
                        <input type="password" name="password" placeholder="password = admin" class="form-control">
                    </div>
                    <div class="mt-2 align-self-end">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
            </form>
        </div>
    </div>

</body>

</html>