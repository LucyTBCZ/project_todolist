<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower"> 
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Browse</title>
</head>
<body class="container">
	<!-- view de Browse-->

	<h2 class="titre_browse"> List of tasks </h2>

	<article>

		<ul class="list-group">

			<?php foreach ($elements as $task): ?> 
				<li class="list-group-item lien">
					<a href="read.php?id=<?= $task['elementId']; ?>"> <?php echo $task['elementName'];?>
						<span class="badge right"><?= $task['elementUserID']; ?>
						</span> 
					</a>
				</li>

			<?php endforeach; ?>

		</ul>

	</article>

</body>
</html>