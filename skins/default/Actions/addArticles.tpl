<!DOCTYPE html>
<html>
<head>
	<title>Add New Articles</title>
	<meta charset="utf-8" />

</head>
<body>
<a href="admin/index.tpl" class="admin-font">Admin Panel</a>	<br>
<br>
<br>
<br>
<div class="question">New Article</div>
<form action="/module/Actions/addArticles.php" method="post" class="articles-list">
	<div class="add-textsize">Article title:</div><br/>
	<input type="text" name="title" style=" width: 616px;" /><br />
	<div class="add-textsize">Text:</div><br/>
	<textarea name="description" cols="50" rows="500" style="height:400px; width:900px;"></textarea>
	<br />
	<input type="submit" value="Add!" class="btn btn-sm animated-button thar-two"/><br>




</form>
</body>
</html>


