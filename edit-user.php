<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $usernameToUpdate = $_POST['username'];
        $newPassword = isset($_POST['password']) ? $_POST['password'] : ''; 
        $newRole = isset($_POST['role']) ? $_POST['role'] : ''; 

        if (isset($_SESSION['danhSachUser'])) {
            foreach ($_SESSION['danhSachUser'] as $khoa => $user) {
                if ($user['username'] == $usernameToUpdate) {
                    $user['password'] = $newPassword; 
                    $user['role'] = $newRole; 
                    $_SESSION['danhSachUser'][$khoa] = $user;
                    break; 
                }
            }
            unset($user); 
        }
        header("Location: quanly.php");
        exit();
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Người Dùng</title>
</head>
<body>
    <h2>Chỉnh Sửa Người Dùng</h2>
    <form action="edit-user.php" method="POST">
        <label for="username">Tên Người Dùng:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mật Khẩu Mới:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="role">Vai Trò:</label><br>
        <select id="role" name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        <input type="submit" value="Cập Nhật">
    </form>
</body>
</html>
