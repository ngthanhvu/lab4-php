<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
     if (isset($_POST['username'])) {
          if (!empty($_POST['username'])) {
               $usernameupdate = $_POST['username'];
               if (isset($_POST['password'])) {
                    $newpassword = $_POST['password'];
               } else {
                    $newpassword = "";
               }
               if (isset($_POST['role'])) {
                    $newrole = $_POST['role'];
               } else {
                    $newrole = $_POST['role'];
               }

               if ($_SESSION['danhSachUser']) {
                    foreach ($_SESSION['danhSachUser'] as $key => $user) {
                         if ($user['username'] == $usernameupdate) {
                              $user['password'] = $newpassword;
                              $user['role'] = $newrole;
                              $_SESSION['danhSachUser'][$key] = $user;
                              break;
                         }
                    }
                    unset($user);
               }
               header("Location: quanly.php");
               exit();
          }
     }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Người Dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2>Chỉnh Sửa Người Dùng</h2>
        <form action="edit-user.php" method="POST">
            <label class="form-label" for="username">Tên Người Dùng:</label><br>
            <input class="form-control" type="text" id="username" name="username" required><br>
    
            <label class="form-label" for="password">Mật Khẩu Mới:</label><br>
            <input placeholder="Enter new password" class="form-control" type="password" id="password" name="password" required><br>
    
            <label class="form-label" for="role">Vai Trò:</label><br>
            <select class="form-select" id="role" name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>
            <input class="btn btn-primary" type="submit" value="Cập Nhật">
        </form>
    </div>
</body>
</html>
