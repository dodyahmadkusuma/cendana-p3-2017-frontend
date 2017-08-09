
<?php  
require_once('conn.php');

	$id = $_GET['id_article'];
	$jdl = $_GET['judul'];
	$desc = $_GET['desc'];
	$user = $_GET['user'];

    // insert data
    $sql = "
    		UPDATE 
			    article 
			SET 
			    judul = '$jdl' ,
			    descripsi = '$desc',
			    id_username = '$user'
			WHERE 
				article.id_article = '$id'
			";
	mysqli_query($conn, $sql);

        header('Location: list-post.php');
?>