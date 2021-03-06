<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_search_friends($where,$start,$results_per_page) {
	global $db;

	$query = "SELECT users.* 
		FROM users
		WHERE user_id in
			(SELECT user_id
			FROM friends)
		$where
		ORDER BY users.followers_count DESC
		LIMIT $start, $results_per_page";
	return $db->select_array($query);
}
?>