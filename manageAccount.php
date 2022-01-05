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
<!-- <div class="container-fluid align-items-center">
    <div class="col-md-8 col-sm-10 title my-4">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="table-body">
                <tr>
                    <td>1</td>
                    <td>Lam Truong</td>
                    <td>john@example.com</td>
                    <td>01234567789</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#">Edit</a>  <a class="btn btn-sm btn-danger" href="#" onclick="confirmRemoval()">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Cam Ly</td>
                    <td>john@example.com</td>
                    <td>01234567789</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#">Edit</a>  <a class="btn btn-sm btn-danger" href="#" onclick="confirmRemoval()">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>My Tam</td>
                    <td>john@example.com</td>
                    <td>01234567789</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#" onclick="showFailedDialog()">Edit</a>  <a class="btn btn-sm btn-danger" href="#" onclick="confirmRemoval()">Delete</a>
                    </td>
                </tr>
        </tbody>
    </table>
    </div>
</div> -->

<div class="container-fluid align-items-center">
    <div class="background col-lg-8 col-md-10 col-sm-12"></div>
</div>

<div style="position: relative;">
    <div class="container-fluid" style="position: absolute; top: 10px ;display: flex; justify-content: center;">
        <div class="management col-lg-2 col-md-3 col-sm-4 col-5">
            <div class="management-item">
                <button class="button-add text-center" data-toggle="modal" data-target="#new-task">Thêm nhân viên</button>
                <select class="form-select button-notice text-center">
                    <option>Toàn bộ nhân viên</option>
                    <option>Theo phòng ban</option>
                </select>
            </div>
        </div>
        <div class="management col-lg-6 col-md-7 col-sm-8 col-7" style="padding-left: 20px">
            <div class="right">
                <div class="management-item">
                    <div class="row">
                        <img class="avatar dot-work" src="images/male.svg">
                        <div>
                            <a class="task">Nguyễn Hữu Huy</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">Phòng ban: Quản trị kinh doanh</a><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="management-item">
                    <div class="row">
                        <img class="avatar dot-work" src="images/avatar2.jpg">
                        <div>
                            <a class="task">Nguyễn Hữu Huy</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">Phòng ban: Quản trị kinh doanh</a><br>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
    </div>
</div>


<div class="modal fade" id="new-task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h1 class="mt-4 mb-2">Tạo tác vụ mới</h1>
            </div>
            <form method="post" class="px-4 px-sm-4 px-m-5 px-lg-4 pt-3">
                <div class="renew">
                    <div class="form-group">
                        <label class="task-label" for="name-task">Tên tác vụ</label>
                        <input id="name-task" name="name-task" type="text" class="form-input" placeholder="Nhập tên tác vụ">
                    </div>
                    <div class="form-group">
                        <label class="task-label" for="employee-task">Người thực hiện</label>
                        <select id="employee-task" name="employee-task" class="form-input" style="padding: 2px 14px">
                            <optgroup label="Phòng ban Kiểm thử">
                                <option value="1">Nguyễn Sang Sinh</option>
                                <option value="2">Nguyễn Hữu Huy</option>
                                <option value="3">Thạch Thanh Hữu</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="task-label" for="deadline-task">Hạn nộp</label>
                        <input id="deadline-task" name="deadline-task" type="date" class="form-input" value="2021-12-23">
                    </div>
                    <div class="form-group">
                        <label class="task-label" for="describe-task">Nội dung</label>
                        <textarea id="describe-task" name="describe-task" rows="2" class="form-input" placeholder="Miêu tả chi tiết" style="height: auto;"></textarea>
                    </div>
                    <div class="form-group">
                        <input id="file-task" name="file-task" type="file" style="margin-left: 5%"/>
                    </div>
                </div>
                <div class="input-group custom-control custom-checkbox">
                    <div class="custom-button text-right">
                        <button name="change-password" class="btn btn-success">Tạo tác vụ</button>
                    </div>
                </div>
            </form>
            <div class="modal-body">

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
