<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower"> 
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Login</title>
</head>
<body class="container">

	<article class="session">

		<h2 class="titre_session"> Log you for to access at your todo list or<a href="login.php"> to subscribe</a>.</h2>

		<form method="POST" class="form-inline">
			<section class="form-group">
				<label for="login">Login:</label>
				<input type="text" class="form-control" name="login">
			</section>
			<section class="form-group">
				<label for ="password">Password:</label>
				<input type="password" class="form-control" name="pwd">
			</section>
			<button type="submit" class="btn btn-primary">Connexion</button>
		</form>

	</article>
	
</body>
</html>