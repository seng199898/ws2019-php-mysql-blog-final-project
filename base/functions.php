<?php

function request() {
	return new Request();
}

function slug_encode( $str ){
   return preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
}

function slug_decode( $str ){
   return str_replace('-', ' ', $str);
}

function response($data, $status = 200) {
	echo json_encode( $data );
	http_response_code( $status );
	return true;
}

function excerpt($content) {
	$content = trim( strip_tags($content) );

	if (mb_strlen($content, 'utf-8') <= 300) {
		return $content;
	}

	return mb_substr($content, 0, 300, 'utf-8') . '...';
}

function redirect($url) {
	header("Location: {$url}");
}

function map($arr, $callback) {
	$result = [];
	foreach($arr as $elm) {
		$result[] = $callback( $elm );
	}
	return $result;
}