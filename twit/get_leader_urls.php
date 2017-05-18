<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_leader_urls($where,$start,$results_per_page) {
	global $db;

	$query = "SELECT COUNT( * ) AS cnt, url
		FROM tweet_urls
		WHERE tweet_urls.user_id IN	
			(SELECT user_id
			FROM leaders)
		$where
		GROUP BY tweet_urls.url
		ORDER BY cnt DESC 
		LIMIT $start, $results_per_page";

	return $db->select_array($query);
}
?>