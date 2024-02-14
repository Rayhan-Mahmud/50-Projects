<?php
session_start()
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
          crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<?php if(isset($_SESSION['id'])) {?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a href="" class="navbar-brand">LOGO</a>
    <ul class="navbar-nav">
      <li><a href="home.php" class="nav-link">Add Product</a></li>
      <li><a href="action.php?status=manage" class="nav-link">Manage</a></li>
      <li><a href="action.php?status=logout" class="nav-link">Logout</a></li>
    </ul>
  </div>
</nav>
<?php } else { ?>
<nav class="navbar navbar-expand-md navbar-dark bg-info">
  <div class="container">
    <a href="" class="navbar-brand">LOGO</a>
    <ul class="navbar-nav">
      <li><a href="action.php?status=index" class="nav-link">Home</a></li>
      <li><a href="" class="nav-link">About</a></li>
      <li><a href="login.php" class="nav-link">Login</a></li>
    </ul>
  </div>
</nav>
<?php } ?>