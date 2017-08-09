<?php  
  require_once('conn.php');

  $sql = "SELECT * FROM user";
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
  <form action="new-post.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Title</td>
        <td><input type="text" name="judul"></td>
      </tr>
      <tr>
        <td>
          Image
        </td>
        <td>
          <input type="file" name="gambar">
        </td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea name="desc"></textarea></td>
      </tr>
      <tr>
        <td>Username</td>
        <td>
          <select name="id_username">
            <option>--PILIH USER--</option>
          <?php  
              while ( $row = mysqli_fetch_array($data)) {
            ?>
              <option value="<?=$row['id_user']?>">
                <?=$row['nama_user']?>
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
    </table>
  </form>
  </div>
  </div>
</body>
</html>

<?php  
require_once('conn.php');
  $param = $_POST;
  $file_data = $_FILES;
  if (!empty($param['judul']) && !empty($param['desc'])) {
    $file_name = $_FILES['gambar']['name'];
    // insert data
    $tmp_url  = $file_data['gambar']['tmp_name'];
    $source_upload = '../asset/img/';
    // proses upload file
    if (move_uploaded_file($tmp_url, $source_upload.$file_name)) {
    // insert data

    $sql = "INSERT INTO article (judul, image, tgl_article, descripsi, id_username) VALUES('".$param['judul']."','".$file_name."', now(), '".$param['desc']."', '".$param['id_username']."')";
    $data   = mysqli_query($conn, $sql);

    header('Location: list-post.php');
    }
  }else{
    echo "Inputan anda tidak lengkap";
  }
?>