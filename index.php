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
    <link type="text/css" rel="stylesheet" href="./style.css?<?php echo time(); ?>">
</head>

<body>

<?php
require_once('include/Navbar.php')
?>

<div class="container-fluid align-items-center">
    <div class="background col-lg-8 col-md-10 col-sm-12"></div>
</div>

<div style="position: relative;">
    <div class="container-fluid" style="position: absolute; top: 10px ;display: flex; justify-content: center;">
        <div class="management col-lg-2 col-md-3 col-sm-4 col-5">
            <div class="management-item">
                <button class="button-add text-center" data-toggle="modal" data-target="#new-task">Thêm tác vụ</button>
                <button class="button-notice text-center">Lịch sử hoạt động</button>
            </div>
            <div class="management-item">
                <a>Tiến độ công việc</a>
                <div class="task-box">
                    <span class="dot task-new"></span><a class="task">1 Mới</a><br>
                </div>
                <div class="task-box">
                    <span class="dot task-progress"></span><a class="task">1 Đang thực hiện</a><br>
                </div>
                <div class="task-box">
                    <span class="dot task-waiting"></span><a class="task">1 Đang chờ</a><br>
                </div>
                <div class="task-box">
                    <span class="dot task-rejected"></span><a class="task">1 Từ chối</a><br>
                </div>
            </div>
            <div class="management-item">
                <a>Tổng số tác vụ</a>
                <div class="task-box">
                    <span class="dot task-complete"></span><a class="task">1 Đã hoàn thành</a><br>
                </div>
                <div style="display: flex; align-items: center;">
                    <span class="dot task-canceled"></span><a class="task">1 Đã hủy</a><br>
                </div>
            </div>
        </div>
        <div class="management col-lg-6 col-md-7 col-sm-8 col-7" style="padding-left: 20px">
            <div class="right">
                <div class="management-item">
                    <div class="row">
                        <span class="dot-work task-complete"></span>
                        <div >
                            <a class="task">Thêm giao diện</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">To: Nguyễn Hữu Huy</a><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="management-item">
                    <div class="row">
                        <span class="dot-work task-progress"></span>
                        <div>
                            <a class="task">Thêm quản lý</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">To: Nguyễn Hữu Huy</a><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="management-item">
                    <div class="row">
                        <span class="dot-work task-rejected"></span>
                        <div>
                            <a class="task">Thêm dữ liệu (2)</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">To: Thạch Thanh Hữu</a><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="management-item">
                    <div class="row">
                        <span class="dot-work task-waiting"></span>
                        <div>
                            <a class="task">Chức năng đăng nhập (1)</a>
                            <div class="task-box">
                                <a class="task text-decoration-none" style="color: var(--dark-green)">To: Thạch Thanh Hữu</a><br>
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
                <h1 class="mt-4 mb-2">Thêm nhân viên mới</h1>
            </div>

            <form method="post" class="px-4 px-sm-4 px-m-5 px-lg-4 pt-3" enctype="multipart/form-data" action="api/add_task.php">
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
                        <input id="deadline-task" name="deadline-task" type="date" class="form-input" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="task-label" for="deadline-time-task">Thời gian</label>
                        <input id="deadline-time-task" name="deadline-time-task" type="time" class="form-input" value="11:59">
                    </div>
                    <div class="form-group">
                        <label class="task-label" for="describe-task">Nội dung</label>
                        <textarea id="describe-task" name="describe-task" rows="2" class="form-input" placeholder="Miêu tả chi tiết" style="height: auto;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="task-label" for="file-task">Đính kèm tập tin</label>
                        <input id="file-task" class="form-input" name="file-task" type="file" style="display: inline-flex;text-indent: -130px; padding: 10px 14px;" multiple>
                    </div>
                </div>
                <div class="input-group custom-control custom-checkbox">
                    <div class="custom-button text-right">
                        <button name="add-task" class="btn btn-success">Tạo tác vụ</button>
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
