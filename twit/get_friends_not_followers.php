<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_friends_not_followers($start,$results_per_page) {
	global $db;

	$query = "SELECT users.* 
		FROM friends, users
		WHERE friends.user_id NOT IN 
			(SELECT user_id
			FROM followers)
		AND friends.user_id = users.user_id
		ORDER BY users.followers_count DESC
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>