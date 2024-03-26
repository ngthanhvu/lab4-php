<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
     if (isset($_GET['username']) && !empty($_GET['username'])) {
          $userdelete = $_GET['username'];
          if (isset($_SESSION['danhSachUser'])) {
               foreach ($_SESSION['danhSachUser'] as $khoa => $user) {
                    if ($user['username'] == $userdelete) {
                         unset($_SESSION['danhSachUser'][$khoa]);
                         $_SESSION['danhSachUser'] = array_values($_SESSION['danhSachUser']);
                         break;
                    }
               }
          }
          header("Location: quanly.php");
          exit();
     }
}
?>


