<?php
    header(header: 'Content-Type: application/json; charset=utf-8');
    require_once ('../connection.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(response_code:405);
        die(json_encode(array('code' => 4, 'message' => 'This API only supports POST')));
    }

    $input = json_decode(file_get_contents('php://input'));
    // echo json_encode(array('status' => true, 'data' => $input));
    if (is_null($input)) {
        die(json_encode(array('code' => 2, 'message' => 'This API only supports JSON')));
    }

    if (!property_exists($input,property:'username') ||
    !property_exists($input,property:'name') ||
    !property_exists($input,property:'position') ||
    !property_exists($input,property:'department')) 
    {
        http_response_code(response_code:400);
        die(json_encode(array('code' => 1, 'message' => 'Invalid Input')));
    }

    if (empty($input->username) || empty($input->name) || empty($input->position) || empty($input->department)) {
        die(json_encode(array('code' => 1, 'message' => 'Invalid Input')));
    }

    $username = $input->username;
    $name = $input->name;
    $position = $input->position;
    $department = $input->department;
    $pass = password_hash($username,PASSWORD_DEFAULT);

    $sql = 'SELECT * FROM account WHERE username = ?';
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($username));
    if($stmt->rowCount() == 0) {
        $sql = 'INSERT INTO account(username,password,activated,name,position,department,avatar) VALUES(?,?,?,?,?,?,?)';
        try{
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(array($username,$pass,'',$name,convert($position),convertDepartment($department),'avatar.jpg'));
            die(json_encode(array('code' => 0, 'message' => 'Add success')));
        }
        catch(PDOException $ex){
            die(json_encode(array('code' => 1, 'message' => 'Error')));
        }
    }
    else {
        die(json_encode(array('code' => 1, 'message' => 'This username already registered')));
    } 

    function convert($position) {
        $res = "Nhân viên";
        if ($position == "2") {
            $res = "Trưởng phòng";
        }
        return $res;
    }

    function convertDepartment($department) {
        $res = "Nhân sự";
        if ($department == "1") {
            $res = "Công nghệ thông tin";
        }
        else if ($department == "2") {
            $res = "Kế toán";
        }
        return $res;
    }
?>