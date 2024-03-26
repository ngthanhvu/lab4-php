<?php
session_start(); // khởi tạo session
if (!isset($_SESSION['user'])) {
     header("Location: login.php");
}

$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

$danhSachUser = array(
          'username' => '',
          'password' => '',
          'role' => '',
);


?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Lab 4 Quản Lý User</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<style>
     * {
          font-family: sans-serif;
     }


     .btn-delete {
          display: inline-block;
          padding: 5px 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          text-decoration: none;
          color: #fff;
          font-weight: bold;
          cursor: pointer;
          background-color: red;
     }

     .btn-delete:hover {
          background-color: #fff;
          color: #000;
     }

     .btn-edit {
          display: inline-block;
          padding: 5px 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          text-decoration: none;
          color: #fff;
          font-weight: bold;
          cursor: pointer;
          background-color: #0D6EFD;
     }

     .btn-edit:hover {
          background-color: #fff;
          color: #000;
     }

</style>

<body>

     <div class="container mt-3">
          <h2>
               <?php
               if (isset($_SESSION['user'])) {
                    echo "Xin chào " . $_SESSION['user'] . "👑";
               }
               ?>
          </h2>
          <p>Bảng quản lý user</p>
          <table class="table table-bordered">
               <thead>
                    <tr>
                         <th>UserName</th>
                         <th>Password</th>
                         <th>Role</th>
                         <th>Delete</th>
                         <th>Edit</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    if (isset($_SESSION['danhSachUser'])) {
                         $danhSachUser = $_SESSION['danhSachUser'];
                         foreach ($danhSachUser as $user) {
                              echo "<tr>";
                              echo "<td>$user[username]</td>";
                              echo "<td>$user[password]</td>";
                              echo "<td>$user[role]</td>";
                              echo "<td><a class='btn-delete' href='delete.php?username=$user[username]'>Delete</a></td>";
                              echo "<td><a class='btn-edit' href='edit-user.php?username=$user[username]'>Edit</a></td>";
                              echo "</tr>";
                         }
                    }

                    ?>
               </tbody>
          </table>
     </div>






</body>

</html>