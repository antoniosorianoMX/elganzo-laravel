<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de reportes</title>
	
</head>
<body>

	<div class="container">
		<h1>You have arrived. Felicidades.</h1>
		<h1>Bienvenido, {{ Auth::user()->name; }}</h1>
		<li><a href="logout">Cerrar sesión.</a></li>
	</div>
</body>
</html>
