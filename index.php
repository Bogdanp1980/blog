<?php
  $connection = mysqli_connect("localhost","root","","blogartjoker");
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
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
             <p><strong>Напишите нам</strong></p>
           </div>
         </div>


           <div class="section-hide_all-block">
             <div class="form_client">
              <input type="text" class="form-control" name="name" placeholder="Введите ваше имя*">
              <input type="text" class="form-control" name="contact" placeholder="Введите ваш контакт*">
              <input type="text" class="form-control" name="mail" placeholder="Введите ваш e-mail*">
              <textarea name="message" class="form-control form-control_height" placeholder="Введите ваше сообщение*"></textarea>
               <button>отправить</button>
             </div>
          </div>



           <div class="section-hide_all-block">
             <span class="close_js" id="close_js">
               <img class="img"  src="img/cancel.svg">
             </span>
             <div class="manager">
               <div class="manager-img">
                 <img src="img/manager.png">
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
              <img src="img/logo-new.svg" alt="Close">
            </div>

            <div class="header__right">

             <div class="header__right-top">

                   <div class="header__right-top-right" id="open_close">
                       <div class="quistion" id="quistion">
                         <a href="#" class="quistion_yellow">задать вопрос</a>
                       </div>
                       <div class="arrow" id="arrow">
                         <img class="img" src="img/chevron-arrow-up.svg" alt="Close">
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
            <center><h1>БЛОГ ARTJOKER</h1></center>
            <center><div class="line"></div></center>
            <p>Ваше руководство по достижению
            успеха в интернет-бизнесе</p>
          </div>
        </div>
      </div>
  </section>
</header>


  <section class="section-categories">
      <div class="container">
        <div class="row">
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
          <div class="yellow-poisk">
            <img class="img" src="img/search.svg" alt="Close">

          </div>
        </div>
      </div>
  </section>


  <section class="content-section">
    <div class="container">
      <div class="row">
        <div class="post-section">
           <?php
               $blogposts = mysqli_query($connection, "SELECT * FROM `post`");
               while($blogpostsPhp = mysqli_fetch_assoc($blogposts)) {
                 ?>
           <div class="post_item">
             <img class="img" src="<?php echo $blogpostsPhp['image'];?>" alt="Blog">
             <div class="post_details">
               <div class="post_categorie">
                 <?php
                 $categorieId=$blogpostsPhp['categirie'];
                 $categorieNameQ = mysqli_query($connection, "SELECT * FROM `categories` WHERE `id`=$categorieId");
                 $categorieNameQPhp=mysqli_fetch_assoc($categorieNameQ);
                 echo $categorieNameQPhp["CategorieName"];
                  ?>
               </div>
               <div class="post-datas">29 ноября 2017</div>
            </div>
            <h2><?php echo $blogpostsPhp['title'];?></h2>
            <button type="button" name="button" class="post_button-more"><a href="pages/post.php?post-id=<?php echo $blogpostsPhp['id'];?>">Читать дальше</a></button>
            </div>
            <?php
              }
            ?>
        </div>
        <div class="sidebar-container">
          <div class="sidebar__top">

          </div>
          <div class="sidebar__bottom">
            <?php
                $blogposts = mysqli_query($connection, "SELECT * FROM `post` WHERE `recomended` = 1 ");
                while($blogpostsPhp = mysqli_fetch_assoc($blogposts)) {
                  ?>
            <div class="post_item">
              <img class="img" src="<?php echo $blogpostsPhp['image'];?>" alt="Blog">
              <h2><?php echo $blogpostsPhp['title'];?></h2>
           </div>
             <?php
               }
             ?>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>

  </section>

  <section class="content-result">
    <div class="container">
      <div class="row">
        <div class="content-result_info">
           <p>Получайте результат от своего бизнеса уже сегодня</p>
           <button>ЗАПОЛНИТЬ БРИФ</button>
        </div>
      </div>
    </div>
  </section>




  <div class="connect-button">
    КНОПКА СВЯЗИ
  </div>


  <link rel="stylesheet" href="css/styles.css">
  <script src="js/common.js"></script>
</body>
</html>
