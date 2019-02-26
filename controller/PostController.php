<?php

class PostController{
	public function index(){
		$posts = DB::table('posts')->select(['title', 'content', 'created_date', 'updated_date', 'category_id']);

		// If user is searching something.
		if (request()->has('search')) {
			$posts->where(function ($query){
				$query->where( 'title', 'LIKE', "%" .request()->input('search'). "%" )
					  ->orWhere('content', 'LIKE', "%" .request()->input('search'). "%");
			});
		}

		// If user is searching in category.
		if (request()->has('category')) {
			$category = DB::table('categories')
						->select('id')
						->where('category_name', slug_decode( request()->input('category') ))
						->first();

			if ($category) {
				$posts->where('category_id', $category->id);
			}
		}

		// Post order
		if (request()->has('create') || request()->has('update')) {
			if (request()->has('create')) {
				if (request()->input('create') == 0) {
					$posts->orderBy('created_date');
				} else {
					$posts->orderBy('created_date',  'DESC');
				}
			} elseif (request()->has('update')) {
				if (request()->input('update') == 0) {
					$posts->orderBy('updated_date');
				} else {
					$posts->orderBy('updated_date',  'DESC');
				}
			}
		} else {
			$posts->orderBy('created_date', 'DESC');
		}

		// Posts data processing
		$posts = map( $posts->get(), function($post) {
			$post->slug = slug_encode( $post->title );
			$post->content = excerpt( $post->content );
			$post->category = DB::table('categories')->find('id', $post->category_id);
			$post->category->slug = slug_encode( $post->category->category_name );
			unset( $post->category_id );

			return $post;
		});

		return response([
			'success' => true,
			'posts' => $posts,
		]);
	}

	public function show(){
		if (request()->has('slug')) {
			$post = DB::table('posts')->select()->where( 'title', slug_decode( request()->input('slug') ) )->first();

			if ($post) {
				if (!request()->has('edit')) {
					$post->content = nl2br( $post->content );
				}

				$post->category = DB::table('categories')->find('id', $post->category_id);
				$post->category->slug = slug_encode( $post->category->category_name );

				$post->slug = slug_encode( $post->title );
				return response([
					'success' => true,
					'post' => $post
				]);
			} else {
				return response([
					'success' => false,
				], 404);
			}
		} else {
			return response([
				'success' => false
			], 400);
		}
	}

	public function create() {

	}

	public function store() {
		if (request()->has(['title', 'content', 'category'])) {
			if (strpos( request()->input('title') , '-') !== false) {
				return response([
					'success' => false
				], 400);
			}

			$res = DB::table('posts')->insert([
				'title' => request()->input('title'),
				'content' => request()->input('content'),
				'category_id' => request()->input('category'),
				'created_date' => date('Y-m-d H-i-s'),
				'updated_date' => date('Y-m-d H-i-s'),
			]);

			if($res)
				return response([
					'success' => true,
				]);
			else
				return response([
					'success' => false,
				], 500);
		} else {
			return response([
				'success' => false,
			], 400); // Bad request
		}
	}

	public function edit(){

	}

	public function update(){
		if (request()->has(['slug', 'title', 'content', 'category'])) {
			$result = DB::table('posts')->select('id')->where('title', slug_decode( request()->input('slug') ))->first();
			$res = DB::table('posts')->where('title', slug_decode( request()->input('slug') ))->update([
				'title' => request()->input('title'),
				'content' => request()->input('content'),
				'category_id' => request()->input('category'),
				'updated_date' => date('Y-m-d H-i-s')
			]);

			if($res)
				return response([
					'success' => true,
					'slug' => slug_encode( DB::table('posts')->select('title')->where('id', $result->id)->first()->title )
				]);
			else
				return response([
					'success' => false,
				], 500);
		} else {
			return response([
				'success' => false,
			], 400); // Bad request
		}
	}

	public function destroy(){
		if (request()->has('slug')) {
			$res = DB::table('posts')->where('title', slug_decode( request()->input('slug') ))->delete();
			return response([
				'success' => true,
			]);
		}
	}
}