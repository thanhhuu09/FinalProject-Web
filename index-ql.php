<?php
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['activated'] == 0) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="./style.css">
</head>
<body>
<?php
    require_once('./include/NavbarQL.php');
?>
<div class="container-fluid align-items-center">
    <div class="background background-ql col-md-8 col-sm-10"></div>
</div>

<div style="position: relative;">
    <div class="container-fluid" style="position: absolute; top: 10px ;display: flex; justify-content: center;">
        <div class="management col-lg-2 col-md-3 col-sm-4 col-5">
            <div class="management-item">
                <button class="button-add text-center">Thêm tác vụ</button>
                <button class="button-notice text-center">Thêm thông báo</button>
            </div>
            <div class="management-item">
                <a>Tiến độ công việc</a>
                <div class="task-box">
                    <span class="dot" style="background-color: var(--task-new)"></span><a class="task text-decoration-none">1 Task New</a><br>
                </div>
                <div class="task-box">
                    <span class="dot" style="background-color: var(--task-progress)"></span><a class="task text-decoration-none">1 Task in Progress</a><br>
                </div>
                <div class="task-box">
                    <span class="dot" style="background-color: var(--task-waiting)"></span><a class="task text-decoration-none">1 Task Waiting</a><br>
                </div>
                <div class="task-box">
                    <span class="dot" style="background-color: var(--task-rejected)"></span><a class="task text-decoration-none">1 Task Rejected</a><br>
                </div>
            </div>
            <div class="management-item">
                <a>Tổng số tác vụ</a>
                <div class="task-box">
                    <span class="dot" style="background-color: var(--task-complete)"></span><a class="task text-decoration-none">1 Task completed</a><br>
                </div>
                <div style="display: flex; align-items: center;">
                    <span class="dot" style="background-color: var(--task-canceled)"></span><a class="task text-decoration-none">1 Task canceled</a><br>
                </div>
            </div>

        </div>
        <div class="management col-lg-6 col-md-7 col-sm-8 col-7" style="padding-left: 20px">
            <div class="management-item">
                <div class="row">
                    <span class="dot-work" style="background-color: var(--task-complete)"></span>
                    <div>
                        <a class="text-600">Thêm giao diện</a>
                        <div class="task-box">
                            <a class="task text-decoration-none" style="color: var(--dark-green)">To: Nguyễn Hữu Huy</a><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="management-item">
                <div class="row">
                    <span class="dot-work" style="background-color:var(--task-waiting)"></span>
                    <div>
                        <a class="text-600">Thêm quản lý</a>
                        <div class="task-box">
                            <a class="task text-decoration-none" style="color: var(--dark-green)">To: Nguyễn Hữu Huy</a><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="management-item">
                <div class="row">
                    <span class="dot-work" style="background-color: var(--task-rejected)"></span>
                    <div>
                        <a class="text-600">Thêm dữ liệu (2)</a>
                        <div class="task-box">
                            <a class="task text-decoration-none" style="color: var(--dark-green)">To: Thạch Thanh Hữu</a><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="management-item">
                <div class="row">
                    <span class="dot-work" style="background-color: var(--task-complete)"></span>
                    <div>
                        <a class="text-600">Chức năng đăng nhập (1)</a>
                        <div class="task-box">
                            <a class="task text-decoration-none" style="color: var(--dark-green)">To: Thạch Thanh Hữu</a><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript" src="./main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
