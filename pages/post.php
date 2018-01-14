<?php
$connection = mysqli_connect("localhost","root","","blogartjoker");
  if(isset($_GET['post-id']) && $_GET['post-id'] != ""){
    $id = $_GET['post-id'];
    if($id > 0){
      $selectPost = mysqli_query($connection, "SELECT * FROM `post` WHERE `id`='$id'");
      //mysqli_fetch_assoc SQL(variable) to PHP(variable); while($asdadPHP = mysqli_fetch_assoc($asdad)){ }
      if(mysqli_num_rows($selectPost) == 0){
        header("Location: index.php");
      }
      else{
        if(isset($_POST['review-send']) && isset($_POST['review-content']) && $_POST['review-content'] != ""){
          $insertData = mysqli_query($connection, "INSERT INTO `comments` (`id`,`post-id`,`review-content`) VALUES ('','$id','" . $_POST['review-content'] . "') ");
          header("Location: post.php?post-id=$id");
        }
        if(isset($_POST['client_name']) && isset($_POST['client_contact']) && isset($_POST['client_mail']) && isset($_POST['client_message']) && isset($_POST['client_contacts'])){
          if($_POST['client_name'] != "" && $_POST['client_contact'] != "" && $_POST['client_mail'] != "" &&  $_POST['client_message'] != ""){
            $client_name = mysqli_real_escape_string(htmlspecialchars($_POST['client_name']));
            $client_contact = mysqli_real_escape_string(htmlspecialchars($_POST['client_contact']));
            $client_mail = trim(mysqli_real_escape_string(htmlspecialchars($_POST['client_mail'])));
            $client_message = mysqli_real_escape_string(htmlspecialchars($_POST['client_message']));
            $columns = "(`id`,`post-id`, `client_name`, `client_contact`, `client_mail`, `client_message`)";
            $values = "('','$id', '$client_name', '$client_contact', '$client_mail', '$client_message')";
            $query = "INSERT INTO `clients` $columns  VALUES $values ";
            $insertData = mysqli_query($connection, $query);
            header("Location: post.php?post-id=$id");
          }
        }
      }
    }else{
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog ArtJoker</title>
  </head>
  <body>

  <section class="section-hide" id="section_hide">
    <div class="container">
      <div class="row">
        <div class="section-hide_all">

          <div class="section-hide_all-block">
            <div class="question_block">
              <p>У вас есть бизнес-задача?</p>
              <p>У нас есть решение.</p>
              <p>Получите консультацию уже сейчас!</p>
              <span class="black_line"></span>
              <p>
                <strong>Напишите нам</strong>
              </p>
            </div>
          </div>

          <div class="section-hide_all-block">
            <form class="form_client" method="post"> <!-- Отсутствует тег <form></form> -->
              <input type="text" class="form-control" placeholder="Введите ваше имя*" name="client_name">
              <input type="text" class="form-control" placeholder="Введите ваш контакт*" name="client_contact">
              <input type="text" class="form-control" placeholder="Введите ваш e-mail*" name="client_mail">
              <textarea class="form-control form-control_height" placeholder="Введите ваше сообщение*" name="client_message"></textarea>
              <button name="client_contacts">отправить</button>
            </form>
          </div>

          <div class="section-hide_all-block">
            <span class="close_js" id="close_js">
              <img class="img"  src="../img/cancel.svg">
            </span>
            <div class="manager">
              <div class="manager-img">
                <img src="../img/manager.png">
              </div>
              <div class="manager-name">
                <div class="name">Наталья Бринза</div>
                <div class="position">менеджер проектов</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="clearfix"></div>
  </section>


    <header>
      <nav>
        <div class="container">
          <div class="row">
            <div class="header_header">
              <div class="header__left">
                <img src="../img/logo-new.svg" alt="Close">
              </div>
              <div class="header__right">
               <div class="header__right-top">
                 <div class="header__right-top-right" id="open_close">
                   <div class="quistion" id="quistion">
                     <a href="#" class="quistion_yellow">задать вопрос</a>
                   </div>
                   <div class="arrow" id="arrow">
                     <img class="img" src="../img/chevron-arrow-up.svg" alt="Close">
                   </div>
                 </div>
                 <div class="header__right-top-left">
                   <div class="city top">
                     Kiev
                   </div>
                   <div class="mobile top">
                     Mobile
                   </div>
                   <div class="nomer">
                     +38 (044) 391 33 26
                   </div>
                 </div>
                 <div class="clearfix"></div>
                </div>
                  <div class="header__right-bottom">
                    <ul>
                      <li class="hidden-mobile">Works</li>
                      <li class="hidden-mobile">Services</li>
                      <li class="hidden-mobile">Results</li>
                      <li class="hidden-mobile">About us</li>
                      <li class="active hidden-mobile">Blog</li>
                      <li class="hidden-mobile">Contacts</li>
                    </ul>
                  </div>
                </div>
              <div class="clearfix"></div>
           </div>
          </div>
        </div>
      </nav>

     <section class="section-name">
        <div class="container">
          <div class="row">
            <div class="header_title">
              <h1>БЛОГ ARTJOKER</h1>
              <div class="line"></div>
              <p>Ваше руководство по достижению
              успеха в интернет-бизнесе</p>
            </div>
            <div class="section-categories">
              <ul>
                <?php
                    $getCategories = mysqli_query($connection, "SELECT * FROM `Categories`");
                    while($getCategoriesPhp = mysqli_fetch_assoc($getCategories)) {
                      ?>
                      <li><a href="#"><?php echo $getCategoriesPhp['CategorieName']; ?></a></li>
                  <?php
                    }
                  ?>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
    </section>

  </header>


  <section class="content-section">
    <div class="container">
      <div class="row">
          <div class="post-section">
          <?php $selectPostPHP = mysqli_fetch_assoc($selectPost);
              echo $selectPostPHP['description'];
           ?>
         </div>
         <div class="sidebar-container">
           <?php
               $blogposts = mysqli_query($connection, "SELECT * FROM `post` WHERE `recomended` = 1 ");
               while($blogpostsPhp = mysqli_fetch_assoc($blogposts)) {
                 ?>
           <div class="post_item">
             <img class="img" src="../<?php echo $blogpostsPhp['image'];?>" alt="Blog">
             <h2><?php echo $blogpostsPhp['title'];?></h2>
          </div>
            <?php
              }
            ?>
         </div>
     </div>
   </div>
   <div class="clearfix"></div>
  </section>


  <section class="comment-section">
    <div class="container">
      <div class="row">
        <form method="post">
          <input type="text" name="review-content" placeholder="Оставьте свое мнение">
          <button name="review-send">Отправить</button>
        </form>
      </div>
    </div>
  </section>


  <section>
    <div class="container">
      <div class="row">
        <div>
          <?php
          $selectCommentToPost = mysqli_query($connection,"SELECT * FROM `comments` WHERE `post-id` = $id");
          while($selectCommentToPostPhp = mysqli_fetch_assoc($selectCommentToPost)) {
            ?>
            <div class="comment">
              <?php echo htmlspecialchars($selectCommentToPostPhp['review-content']);?>
            </div>
            <?php
          }
        ?>
      </div>
      </div>
    </div>
  </section>

  <link rel="stylesheet" href="../css/stylespost.css">
  <script src="../js/common.js"></script>
  </body>
  </html>
