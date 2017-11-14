<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower"> 
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>READ</title>
</head>
<body>

	<article>
		<h2 class="titre_session titre_accueil"> <?= $element["elementName"];?></h2>
		 <p class="titre_accueil read"><?= $element["elementDescription"]; ?></p>
	</article>


	<ul class='list-inline titre_browse read'>

		<li><button class="btn btn-default" onclick="location.href='edit.php?id=<?=$element["elementId"]?>'">Edit</a></button>
		</li>



		<li><button class="btn btn-default" onclick="location.href='delete.php?id=<?=$element['elementId']?>'"> Delete</a></button></li>

	</ul>

</body>
</html>