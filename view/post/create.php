<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

<header>
	<h1>Create Post</h1>
	<p>Creating a post</p>
</header>

<main class="mt-10">
	<div class="sidebar">
		<a href="/">&lt; Go back</a>
	</div>
	<div class="note">
		<form action="/store" method="post">
			<div>
				<label for="title"></label>
				<input type="text" id="title" name="title" placeholder="Title">
			</div>

			<div>
				<label for="content"></label>
				<textarea id="content" name="content" placeholder="Content"></textarea>
			</div>
			
			<div class="btns">
				<input type="submit" value="Create">
			</div>
		</form>
	</div>
</main>

<footer>
	<p>Copyright &copy; PeterChan 2019;</p>
</footer>
</body>
</html>