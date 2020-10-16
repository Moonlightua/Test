<?php
include "lib.php";

$title = clearData($_POST['title']);
$description = clearData($_POST['description']);
if(empty($title) or empty($description)){

}else{
	$res = addArticle($title,$description);
	if(!$res){
	echo 'Adding Error!';
	}else{
		header("Location: addArticles.php");
	}
}




?>
<!DOCTYPE html>

<html>
<head>
	<title>Add New Articles</title>
	<meta charset="utf-8" />
</head>
<body>

<h1>New Article</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	Article title:<br />
	<input type="text" name="title" /><br />
	Text:<br />
	<textarea name="description" cols="50" rows="5"></textarea><br />
	<br />
	<input type="submit" value="Add!" />

</form>

</body>
</html>


