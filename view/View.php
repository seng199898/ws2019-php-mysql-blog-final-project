<?php

function view($path, $data = []) {
	extract($data);
	include_once( $path );
}
