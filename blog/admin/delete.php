<?php 
require_once('conn.php');

	$id_article=$_GET['id_article'];
  	$sql = "DELETE 
            FROM 
              article
            WHERE 
            	article.id_article = '$id_article'";
    $gambar = "SELECT * FROM article WHERE article.id_article = '$id_article'";

    $data= mysqli_query($conn, $gambar);


    $row = mysqli_fetch_array($data); 
    $file_name = $row['image'];
    $source_upload = '../asset/img/';
	unlink($source_upload.$file_name);
	// echo $file_name;
    mysqli_query($conn, $sql);
	header('Location: list-post.php');
    
