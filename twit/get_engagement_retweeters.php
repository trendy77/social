<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_engagement_retweeters($where,$start,$results_per_page) {
	global $db, $engagement_user_id;

	$query = "SELECT COUNT( * ) AS cnt, users.* 
		FROM tweet_retweets, users
		WHERE tweet_retweets.source_user_id = users.user_id
		AND tweet_retweets.target_user_id = $engagement_user_id
		$where
		GROUP BY tweet_retweets.source_user_id
		ORDER BY cnt DESC 
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>