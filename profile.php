<?php
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['activated'] == 0) {
        header('Location: login.php');
        exit();
    }
    $error = '';
    $username = '';
    $name = '';
    $position = '';
    $department = '';
    $avatar = '';
    require_once ('./connection.php');
    $sql = 'SELECT username,name,position,department,avatar FROM account where username = ?';

    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(array($_SESSION['user']));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $data['username'];
        $name = $data['name'];
        $position = $data['position'];
        $department = $data['department'];
        $avatar = $data['avatar'];
    }
    catch(PDOException $ex){
        $error = $ex->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="./style.css">
    <title>Hồ sơ của tôi</title>
</head>
<body class="body-profile">

<?php
    require_once ('./Include/NavbarQL.php');
?>

<div style="padding-top: 1.25rem;">
    <div class="container-fluid title col-lg-8 col-md-10 col-sm-12">
        <div class="header">
            <h3>Hồ Sơ Của Tôi</h3>
            <p>Quản lý thông tin hồ sơ của bạn</p>
        </div>
    
        <div class="profile-content">
            <div class="profile-info">
                <div class="info-list">
                    <div class="info-item-wrap">
                        <div class="info-item">
                            <label>Tên tài khoản</label>
                            <p class="context"><?= $username ?></p>
                        </div>
                    </div>
                    <div class="info-item-wrap">
                        <div class="info-item">
                            <label>Mật khẩu</label>
                            <p class="context">********* <a href="repassword.php">Thay đổi</a></p>
                        </div>
                    </div>
                    <div class="info-item-wrap">
                        <div class="info-item">
                            <label>Tên</label>
                            <p class="context"><?= $name ?></p>
                        </div>
                    </div>
                    <div class="info-item-wrap">
                        <div class="info-item">
                            <label>Chức vụ</label>
                            <p class="context"><?= $position ?></p>
                        </div>
                    </div>
                    <div class="info-item-wrap">
                        <div class="info-item">
                            <label>Phòng ban</label>
                            <p class="context"><?= $department ?></p>
                        </div>
                    </div>
    
                    <div class="save-btn">
                        <button type="button" class="btn btn-profile" aria-disabled="false">Lưu</button>
                    </div>
    
                </div>
            </div>
            <div class="profile-img">
                <div class="info-image">
                    <div class="info-img">
                        <div class="img-wrap">
                            <img src="./avatar/<?= $avatar ?>" alt="">
                        </div>
                        <input id="file-upload" type="file" accept="image/jpeg, image/png" value="Chọn Ảnh">
                        <label for="file-upload" class="custom-file-upload">Chọn Ảnh</label>
                        <div class="descrip">
                            <div>Dụng lượng file tối đa 1 MB</div>
                            <div>Định dạng:.JPEG, .PNG</div>
                        </div>
                    </div>
                    <!-- <img src=".\images\profile\photo-1453728013993-6d66e9c9123a.jpg" alt=""> -->
                    <!-- <input type="file" value="Chọn ảnh"> -->
                </div>
            </div>
        </div>
        
        
    </div>
</div>

<script src="main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
    //Đoạn lấy js lấy hình khi tải lên,

    // const file_upload = document.querySelector("#file-upload");
    // var uploaded_image = "";
    //
    // file_upload.addEventListener("change",function () {
    //     const reader =  new FileReader();
    //     reader.addEventListener("load", () =>{
    //         uploaded_image = reader.result;
    //         document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image}`;
    //     });
    //     reader.readAsDataURL(this.files[0]);
    // })
</script>
</body>

</html>