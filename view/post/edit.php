<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

<header>
	<h1>Edit post</h1>
	<p>Editing post <?= $post->title ?></p>
</header>

<main class="mt-10">
	<div class="sidebar">
		<a href="/post?id=<?= $post->id ?>">&lt; Go back</a>
	</div>
	<div class="note">
		<form action="/update?id=<?= $post->id ?>" method="post">
			<div>
				<label for="title"></label>
				<input type="text" id="title" name="title" placeholder="Tile" value="<?= $post->title ?>">
			</div>

			<div>
				<label for="content"></label>
				<textarea id="content" name="content"><?= $post->content ?></textarea>
			</div>
			
			<div class="btns">
				<a href="/destroy?id=<?= $post->id ?>" class="delete">Delete</a>
				<input type="submit" value="Edit">
			</div>
		</form>
	</div>
</main>

<footer>
	<p>Copyright &copy; PeterChan 2019;</p>
</footer>
</body>
</html>