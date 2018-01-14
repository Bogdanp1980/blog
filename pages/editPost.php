<?php
    session_start();
    if(isset($_SESSION['enterStatus']) && $_SESSION['enterStatus'] == "entered"){
      ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Редактировать пост</title>
        </head>
          <body>
          <?php
            $connection = mysqli_connect("localhost", "root", "", "blogartjoker");
            $connectTable = mysqli_query($connection, "SELECT * FROM `Post`");
            while ($connectTablePhp = mysqli_fetch_assoc($connectTable)) {
              echo "<a href='postedit.php?post-id=$connectTablePhp[id]'>" . $connectTablePhp['title'] . "</a> <br/>";
            }
    }else{
      header("Location: admin.php");
      exit();
    }
  ?>
