<?php  
require_once('conn.php');
  $id = $_GET['id_article'];
  $sql = "  SELECT 
              article.*, 
              user.nama_user 
            FROM 
              article,
              user 
            WHERE 
            article.id_username = user.id_user
            AND
            article.id_article = '$id'
      ";
  $sql_user = "SELECT * FROM user ";
  $data_user = mysqli_query($conn, $sql_user);
  $data = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>List Article</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/admin.css">
</head>

<body>

<div class="wrapper">
     <div class="navbar">
                <ul class="left">
                    <li><a href="../../index.php"><img src="../asset/img/logo.png" alt="logo"></a></li>
                </ul>
                <ul class="right">
                    <li><a href="../../../index.php">Keluar</a></li>
                </ul>
            
        </div>
    <div class="menusidebar">
        <ul>
            <li><a href="list-post.php">Post</a></li>
            <li><a href="##">Media</a></li>
            <li><a href="##">Setting</a></li>
            <li><a href="##">Privacy</a></li>
            <li><a href="##">About</a></li>
        </ul>
    </div>

    <div class="content">
  <form action="p_edit.php" method="GET">
    <table>
  <?php while ($row = mysqli_fetch_array($data)) {?>
      <tr>
        <td>Title</td>
         <input type="hidden" name="id_article" value="<?php echo $row['id_article']?>">
        <td><input type="text" name="judul" value="<?php echo $row['judul']?>"></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea name="desc" style= "height: 400px;width: 400px"><?php echo $row['descripsi']?></textarea></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>
          <select name="user">
            <option>--PILIH USER--</option>
          <?php  
              while ( $row_user = mysqli_fetch_array($data_user)) {

                if ($row_user['id_user'] == $row['id_username']) {
                  $selected = "selected";
                }else{
                  $selected = "";
                }
            ?>
              <option value="<?=$row_user['id_user']?>" <?php echo $selected ?>>
                <?=$row_user['nama_user']?>
              </option>
            <?php 
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Submit"></td>
      </tr>
      <?php } ?>
    </table>

  </form>
  </div>
  </div>

</body>
</html>