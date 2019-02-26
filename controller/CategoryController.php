<?php

class CategoryController{
	public function show(){
		return response([
			'success' => true,
			'categories' => map( DB::table('categories')->select()->orderBy('id')->get(), function( $category ) {
				$category->slug = slug_encode( $category->category_name );
				return $category;
			}),
		]);
	}
}