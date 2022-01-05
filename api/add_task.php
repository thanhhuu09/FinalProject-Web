<?php
    require_once('../task.php');
    function error_response($code, $message){
        $res = array();
        $res['code'] = $code;
        $res['message'] = $message;

        die(json_encode($res));
    }
    header('Content-Type: application/json');
    if( empty($_POST['name-task']) || empty($_POST['employee-task']) || empty($_POST['deadline-task'])
    || empty($_POST['deadline-time-task'])){
        error_response(1, 'Du lieu khong hop le');
    }

    $name = $_POST['name-task'];
    $employee = $_POST['employee-task'];
    $deadline = $_POST['deadline-task'];
    $deadtime = $_POST['deadline-time-task'];
    $describ= $_POST['describe-task'];
    $file = $_FILES['file-task'];
    $process = 0;

    if (isset($_FILES['file-task'])){
            $file = $_FILES['file-task'];
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_tmp = $file['tmp_name'];
            $file_type = $file['type'];

            if ($file_size > 10 * 1024 * 1024){
                error_response(2, 'File lon hon 10MB');
            }

            $ext = pathinfo($file_name,  PATHINFO_EXTENSION);
            if ($ext === 'exe'){
                error_response(3, 'Duoi file khong hop le');
            }

            $dest = '../task_data/' . $file_name;
            move_uploaded_file($file_tmp, $dest);
            $file = $dest;
        }
    $id = add_task($name, $employee, $deadline, $deadtime, $describ, $file, $process);
    if ($id==0){
        error_response(3, 'Them that bai');
    }
?>