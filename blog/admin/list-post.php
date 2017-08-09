<?php 
require_once('conn.php');
        
        session_start();
    
    if (!empty($_SESSION['userdata'])) {
        $user_session = $_SESSION['userdata'];
    } else {
        $user_session = null;
        header('Location:login.php');
    }

    $limit = 2;

    if (!empty($_GET['page'])) {
        if ($_GET['page'] == 1) {
        $page = 0;
        }
        else{
            $page = ($_GET['page']-1)*$limit;
        }
    }else{
        $page = 0;
    }




    $sql = "SELECT 
              article.*, 
              user.nama_user 
            FROM 
              article,
              user 
            WHERE 
                article.id_username = user.id_user 
            LIMIT 
            $page,$limit
             ";

    $que = "SELECT 
                Count(id_article) 
            AS 
                jml 
            FROM article";

  $data_jml     =   mysqli_query($conn, $que);
  $data_list    =   mysqli_query($conn, $sql);
  $jml          =   mysqli_fetch_array($data_jml);

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
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            
        </div>
    <div class="menusidebar">
        <ul>
            <li><a href="list-post.php">Post</a></li>
            <li><a href="#">Media</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>

    <div class="content"> Post
    <form action="new-post.php">
    <button style="background: green;"><b>Add New Post</b></button>
    </form>
    <br>
    <form action="search.php" method="GET">
    <input class="trans" type="text" name="cari" placeholder="Cari Judul Dan User" size="100">
    <button>Search Post</button>
    </form>
    <br>

    <a href="#">All(<?php echo $jml['jml'] ?>)</a> | <a href="#">Published (<?php echo $jml['jml'] ?>)</a> | <a href="#"> Trash</a>
    <select>
        <option>Action</option>
        <option>Delete</option>
        <option>Edit</option>
    </select>
    <button>Aplly</button> &nbsp;
    <select>
        <option>Show All Date</option>
        <option>15-07-2017</option>
    </select>&nbsp;
    <select>
        <option>View All Categorys</option>
        <option>uncategoried</option>
    </select>&nbsp;
    <button>Filter</button>

    <table>
        <tr bgcolor="red">
            <td>
                <input type="checkbox" name="checkbox">
            </td>
            <td><a href="#">Title</a></td>
            <td>Author</td>
            <td>Categories</td>
            <td>Tags</td>
            <td>Comment</td>
            <td>Date</td>
        </tr>
        <?php while ($data= mysqli_fetch_array($data_list)) { ?>
        <tr>
            <td>
                <input type="checkbox" name="checkbox">
            </td>
            <td>
                <b>
                <a href="#"><?php echo $data['judul'] ?></a>
            </b>
                <br>
                <a href="edit.php?id_article=<?php echo $data['id_article'] ?>"  style="color:gold;">Edit</a> &nbsp;
                <a href="#">Quick Edit</a> &nbsp;
                <a href="delete.php?id_article=<?php echo $data['id_article'] ?>" style="color: red;">Trash</a> &nbsp;
                <a href="../detail-article.php">View</a> &nbsp;
            </td>
            <td>
                <b>
                <a href="#"><?php echo $data['nama_user'] ?></a>
            </b>
            </td>
            <td>
                <b>
            <a href="#">uncategoried</a>
            </b>
            </td>
            <td>-</td>
            <td>0</td>
            <td><?php echo $data['tgl_article'] ?></td>
        </tr>
        <?php } ?>
        <tr bgcolor="red">
            <td>
                <input type="checkbox" name="checkbox">
            </td>
            <td><a href="#">Title</a></td>
            <td>Author</td>
            <td>Categories</td>
            <td>Tags</td>
            <td>Comment</td>
            <td>Date</td>
        </tr>
 
    </table>
    
    <?php 
    $blog = "SELECT * FROM article";
         $cekQuery = mysqli_query($conn,$blog);
         $jumlahData = mysqli_num_rows($cekQuery);
         if ($jumlahData > $limit) {
         echo '<br/><div style="font-size:10pt;">Page : ';
         $a = explode(".", $jumlahData / $limit);
         $b = $a[0];
         
         if (@$a[1] > 0) {
         $c = $b + 1;
         } else {
         $c = $b;
         }
         
         for ($i = 1; $i <= $c; $i++) {
         echo '<a style="text-decoration:none;';
         if ($_GET['page'] == $i) {
         echo 'color:red';
         }
         echo '" href="?page=' . $i . '">' . $i . '</a>, ';
         }
         echo '</div>';
         }


     ?>

    

</div>
</div>

   
</body>

</html>