<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

function get_retweet_hours() {
	global $db;

	$query = "SELECT hour(created_at) AS tweet_hour, count(*) AS cnt
		FROM tweet_retweets
		GROUP BY hour(created_at)";

	return $db->select_array($query);
}
?>