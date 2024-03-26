<?php
# validation
#isset() được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ của máy tính hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
#empty() dùng để kiểm tra một biến nào đó có giá trị rỗng hoặc chưa được khởi tạo hay không. 

session_start();

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (isset($_POST['email'])) {
          if (empty($_POST['email'])) {
               $error['email'] = "email is required";
          } else {
               if (strlen($_POST['email']) < 6) {
                    $error['email'] = "Email must be at least 6 characters";
               }
          }
     }
     if (isset($_POST['password'])) {
          if (empty($_POST['password'])) {
               $error['password'] = "password is required";
          } else {
               if (strlen($_POST['password']) < 6) {
                    $error['password'] = "Password must be at least 6 characters";
               }
          }
     }
     if (isset($_POST['comfirmpassword'])) {
          if (empty($_POST['comfirmpassword'])) {
               $error['comfirmpassword'] = "Comfirm password is required";
          }
          if ($_POST['password'] != $_POST['comfirmpassword']) {
               $error['comfirmpassword'] = "Password not matches";
          }
     }
     if (isset($_POST['role'])) {
          if (empty($_POST['role'])) {
               $error['role'] = "Role not empty";
          }
     }

     if (count($error) == 0) {
          $user = array(
               'username' => $_POST['username'],
               'password' => $_POST['password'],
               'role' => $_POST['role'],
          );
          if (!isset($_SESSION['danhSachUser'])) {
               $_SESSION['danhSachUser'] = array(0 => $user);
          } else {
               $danhSachUser = $_SESSION['danhSachUser'];
               array_push($danhSachUser, $user);
               $_SESSION['danhSachUser'] = $danhSachUser;
          }
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Lab4 Register</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<style>
     * {
          font-family: sans-serif;
     }

     h1 {
          margin-top: 30px;
     }

     button {
          margin-top: 20px;
     }
</style>

<body>

     <div class="container">
          <h1>Register Form</h1>
          <form action="./register.php" method="POST">
               <div class="mb-3 mt-3">
                    <label for="email" class="form-label">UserName:</label>
                    <input type="text" name="username" class="form-control" id="email" placeholder="Enter user">
                    <?php
                    if (isset($error['email'])) {
                         echo "<span style='color:red;'>Error: " . $error['email'] . "</span><br>";
                    }
                    ?>
               </div>
               <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    <?php
                    if (isset($error['password'])) {
                         echo "<span style='color:red;'>Error: " . $error['password'] . "</span><br>";
                    }
                    ?>
               </div>
               <div class="mb-3">
                    <label for="pwd" class="form-label">Confirm Password:</label>
                    <input type="password" name="comfirmpassword" class="form-control" id="pwd" placeholder="Enter confirm password" name="pswd">
                    <?php
                    if (isset($error['comfirmpassword'])) {
                         echo "<span style='color:red;'>Error: " . $error['comfirmpassword'] . "</span><br>";
                    }
                    ?>
               </div>
               <div>
                    <label for="email" class="form-label">Chọn Role:</label>
                    <select class="form-select" name="role">
                         <option value="">Chọn role</option>
                         <option value="Admin">Admin</option>
                         <option value="User">User</option>
                    </select>
                    <?php
                    if (isset($error['role'])) {
                         echo "<span style='color:red;'>Error: " . $error['role'] . "</span><br>";
                    } 
                    ?>
               </div>

               <button type="submit" name="submit" value="register" class="btn btn-primary">Register</button>
          </form>
     </div>

     <?php
     echo "<pre>";
     var_dump($_POST);
     echo "</pre>";
     ?>






</body>

</html>