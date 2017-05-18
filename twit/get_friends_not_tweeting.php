<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_friends_not_tweeting($start,$results_per_page) {
	global $db;

	$query = "SELECT users.* 
		FROM users
		WHERE last_tweet_date <= now() - interval 30 day
		AND user_id in
			(SELECT user_id
			FROM friends)
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>