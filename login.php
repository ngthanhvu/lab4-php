<?php
#isset() được dùng để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ của máy tính hay chưa, nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
#empty() dùng để kiểm tra một biến nào đó có giá trị rỗng hoặc chưa được khởi tạo hay không. 
# validation
session_start(); // khởi tạo session


$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (isset($_POST['user'])) {
          if (empty($_POST['user'])) {
               $error['user'] = "Username is required";
          }
     }
     if (isset($_POST['password'])) {
          if (empty($_POST['password'])) {
               $error['password'] = "Password is required";
          } else {
               if (strlen($_POST['password']) < 6) {
                    $error['password'] = "Password must be at least 6 characters";
               }
          }
     }
     if (count($error) == 0) {
          if ($_POST['user'] == 'admin' && $_POST['password'] == '1234567') {
               $_SESSION['user'] = $_POST['user'];
               header("location: quanly.php");
          }
     }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Lab4 Login</title>
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
</style>

<body>

     <div class="container">
          <h1>Login Form</h1>
          <form action="./login.php" method="POST">
               <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Username:</label>
                    <input type="text" name="user" class="form-control" id="email" placeholder="Enter username">
                    <?php
                    if (isset($error['user'])) {
                         echo "<span style='color:red;'>Error: " . $error['user'] . "</span><br>";
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
               <button type="submit" name="submit" value="Login" class="btn btn-primary">Login</button>
          </form>
     </div>

     <?php
     echo "<pre>";
     var_dump($_POST);
     echo "</pre>";
     ?>

</body>

</html>