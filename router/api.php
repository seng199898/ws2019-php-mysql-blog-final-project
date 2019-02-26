<?php

Router::get('/', function() {
	view('index.html');
});

Router::notFound(function (){
	view('index.html');
});

Router::get('/api/posts', 'PostController@index');

Router::get('/api/post', 'PostController@show');

Router::post('/api/store', 'PostController@store');

Router::post('/api/update', 'PostController@update');

Router::get('/api/destroy', 'PostController@destroy');

Router::get('/api/categories', 'CategoryController@show');