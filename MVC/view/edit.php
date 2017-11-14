<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower"> 
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>EDIT</title>
</head>
<body>

<article class="session">

		<h2 class="titre_session">You can to edit your task.</h2>

		<form method="POST" class="form-inline">

			<section class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="nom">
			</section>
			<section class="form-group">
				<label for="description">Description:</label>
				<input type="text" name="descri">
			</section>
			<button type="submit" class="btn btn-warning" name="edit">EDIT</button>

		</form>

	</article>

</body>
</html>