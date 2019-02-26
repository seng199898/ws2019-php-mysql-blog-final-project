<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CLibre+Baskerville:400,400italic,700">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>

<header>
	<h1>My Posts</h1>
	<div class="subtitle-bar">
		<p>Worldskill PHP Final Project</p>
		<form action="/" method="get">
			<input type="text" name="search" placeholder="Search something" value="<?= (request()->has('search'))? str(request()->input('search')) : ''?>">
			<input type="submit" value="Search">
		</form>
	</div>
</header>

<nav>
	<ul>
		<li><a href="/create">[+ Create a new post]</a></li>
	</ul>
</nav>

<main>
	<div class="sidebar">
		<?php if(isset($posts) && $posts): ?>

		<ul>
			<?php foreach($posts as $post): ?>
				<li>
					<a href="/post?id=<?= $post->id ?>"><?= $post->title ?></a>
					<p><?= $post->content ?></p>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php else: ?>

		<span>No any post.</span>

		<?php endif; ?>
	</div>

	<div class="note">

		<?php if(isset($postInfo) && $postInfo): ?>

		<h1><?= $postInfo->title ?></h1>
		<p class="info">
			<span><?= $postInfo->created_date ?> - </span>
			<a href="/edit?id=<?= $postInfo->id ?>">Edit</a>
			<span> - </span>
			<a href="/destroy?id=<?= $postInfo->id ?>">Delete</a></p>
		<p><?= $postInfo->content ?></p>

		<?php else: ?>

		<span>Please select a post from left side.</span>

		<?php endif; ?>
	</div>
</main>

<footer>
	<p>Copyright &copy; PeterChan 2019;</p>
</footer>
</body>
</html>