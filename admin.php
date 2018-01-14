<?php
  $connection = mysqli_connect("localhost", "root", "", "blogartjoker");
  if(isset($_POST['password']) && isset($_POST['enter'])){
    if(trim($_POST['password']) != ""){
      $password = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['password']));
      $queryPass = mysqli_query($connection, "SELECT * FROM `admin` WHERE `pass` = '$password' ");
      if(mysqli_num_rows($queryPass) > 0){
        echo "Вы вошли";
        header("Location: editPost.php");
      }
    }else{
      echo "Введите пароль";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<div class="field">
  <div class="title">
    <div class="legend">Авторизация</div>
    <div class="close_form">
      <img src="img/multiplication-sign.svg" alt="Image n1">
      <img src="img/multiplication-sign.svg" alt="Image n1">
      <img src="img/multiplication-sign.svg" alt="Image n1">
      <img src="img/multiplication-sign.svg" alt="Image n1">
      <img src="img/multiplication-sign.svg" alt="Image n1">
    </div>
  </div>

  <form class="admin-form" method="post">
      <div class="password">
      <span>Пароль:</span>
        <div class="password__input">
          <input  type="password" name="password" value="" class="admin__password" id="input">
          <div class="empty" id="empty"></div>
          <div class="clearfix"></div>
        </div>
      </div>
    <div class="clearfix"></div>
    <button type="submit" name="enter" id="button">Войти</button>
  </form>
  <div class="clearfix"></div>
</div>
  <link rel="stylesheet" href="css/stylesadmin.css">
  <script src="js/jquery-3.2.0.min.js"></script>
  <script src="js/common1.js"></script>
</body>
</html>
