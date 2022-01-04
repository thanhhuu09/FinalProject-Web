<?php 
    session_start();
    // if (isset($_SESSION['user'])) {
    //     header('Location: index.php');
    //     exit();
    // }

    $error = '';

    $user = '';
    $pass = '';

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else {
            // success
            require_once('connection.php');
            $sql = 'SELECT * FROM account WHERE username = ?';
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(array($user));
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                // if (password_verify($pass,$row['password'])) {
                if ($pass == '123456') {
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['activated'] = $row['activated'];
                    if ($row['activated'] == 0) {
                        $_SESSION['role'] = $row['role'];
                        header('Location: repassword.php');
                        exit();
                    }
                    else {
                        $_SESSION['role'] = $row['role'];
                        header('Location: index.php');
                        exit();
                    }
                }
                else {
                    $error = 'Invalid Username or password';
                }
            } 
            else {
                $error = 'Invalid Username';
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="container-fluid align-items-center min-vh-100">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <img  class="img" src="images/login.svg" alt="login"/>
        </div>

        <div class="col-md-6 col-sm-12 mb-3">
            <h1 class="text-center mt-5 mb-2">Đăng nhập</h1>
            <p class="text-center text-secondary px-sm-2">Nhập email của bạn để đăng nhập tài khoản.</p>
            <form method="post" class="px-4 px-sm-2 px-m-3 px-lg-5 pt-3">
                <div class="form-group">
                    <input value="<?= $user ?>" id="username" name="user" type="text" class="form-input" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <input value="<?= $pass ?>" id="password" name="pass" type="password" class="form-input" placeholder="Mật khẩu">
                </div>
                <div class="input-group custom-control custom-checkbox text-left">
                    <input <?= isset($_POST['remember']) ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label text-secondary" for="remember">Remember login</label>
                    <div class="custom-button text-right">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger' style='text-align: center'>$error</div>";
                            }
                        ?>
                        <button name="login" class="btn btn-success">Đăng nhập</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
