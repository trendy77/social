<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_all_tweets($where,$start,$results_per_page) {
	global $db;

	$query = "SELECT tweets.tweet_id, tweets.created_at, tweets.tweet_text, tweets.retweet_count, 
		users.user_id, users.screen_name, users.name, users.profile_image_url
		FROM tweets, users
		WHERE tweets.user_id = users.user_id 
		$where
		ORDER BY tweets.created_at DESC 
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>