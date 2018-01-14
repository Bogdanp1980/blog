<?php
$connection = mysqli_connect("localhost","root","","blogartjoker");

  if(isset($_GET['post-id']) && $_GET['post-id'] != "" && isset($_SESSION['enterStatus']) && $_SESSION['enterStatus'] == "entered"){
    $id = $_GET['post-id'];
    if($id > 0){
      $selectPost = mysqli_query($connection, "SELECT * FROM `post` WHERE `id`='$id'");

      if(mysqli_num_rows($selectPost) == 0){
        header("Location: editPost.php");
        exit();
      }
      else{
        $selectPostPhp = mysqli_fetch_assoc($selectPost);
        ?>
          <form>
            <input type="text" name="image" value="<?php echo $selectPostPhp['image']?>">
            <input type="text" name="title" value="<?php echo $selectPostPhp['title']?>">
            <input type="text" name="categirie" value="<?php echo $selectPostPhp['categirie']?>">
            <textarea name="name"><?php echo $selectPostPhp['description']?></textarea>
            <button type="button" name="button">Изменить</button>
          </form>
        <?php
      }
    }else{
      header("Location: admin.php");
      exit();
    }
  }else{
    header("Location: admin.php");
    exit();
  }/*
  if(isset($_POST['button'])){
    if($_POST['image'] != "" && $_POST['title'] != "" && $_POST['categirie'] != "" && $_POST['name'] != ""){
      $client_image = mysqli_real_escape_string(htmlspecialchars($_POST['image']));
      $client_title = mysqli_real_escape_string(htmlspecialchars($_POST['title']));
      $client_categirie = mysqli_real_escape_string(htmlspecialchars($_POST['categirie']));
      $client_name = mysqli_real_escape_string(htmlspecialchars($_POST['name']));

      $columns = "(`id`,`image`, `title`, `categirie`, `name`)";
      $values = "('$id', '$client_image', '$client_title', '$client_categirie', '$client_name')";
      $query = "UPDATE `post` SET `id`='$id',`image`='$client_image',`title`='$client_title',`categirie`='$client_categirie',`name`='$client_name';
      $insertData = mysqli_query($connection, $query);

    }
  }*/

?>
