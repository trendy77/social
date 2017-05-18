<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_user_profile($user_id) {
	global $db;

	$query = "SELECT * 
		FROM users
		WHERE user_id = $user_id";

	return $db->select_array($query);
}
?>