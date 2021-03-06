<?php
// Copyright (c) 2013 Adam Green. All rights reserved.
// See http://140dev.com/download/license.txt for licensing of this code.

require('config.php');
require('oauth_lib.php');
$connection = get_connection();
require('db_lib.php');
$db = new db();

$query = "SELECT * 
	FROM engagement_account
	WHERE user_id = $engagement_user_id
	AND old_timeline_collected = '0000-00-00'";
$results = $db->select($query);
$row = mysqli_fetch_assoc($results);
if (mysqli_num_rows($results)==0) {
	print 'Old engagement timeline has already been collected';
	exit;
}

$max_id = 0;
while (true) {
	if ($max_id == 0) {
 		$connection->request('GET', $connection->url('1.1/statuses/user_timeline'), 
	      array('user_id' => $engagement_user_id,
	        'include_entities' => 'true',
	        'include_rts' => 'true',
	        'exclude_replies' => 'false',
	        'trim_user' => 'true',
	        'count' => 100));
	} else {
		--$max_id;
		
		$connection->request('GET', $connection->url('1.1/statuses/user_timeline'), 
	      array('user_id' => $engagement_user_id,
	        'include_entities' => 'true',
	        'include_rts' => 'true',
	      	'exclude_replies' => 'false',
	        'trim_user' => 'true',
	        'count' => 100,
	        'max_id' => $max_id));
	}			

	if ($connection->response['response'] == '[]') {
  	break;
  } 
  if ($connection->response['code'] != 200) {
  	break;			
	} 
	
	$results = json_decode($connection->response['response']);
  foreach($results as $tweet) {
    	
		$tweet_id = $tweet->id;
		$max_id = $tweet_id;
		
		if ($db->in_table('tweets',"tweet_id=$tweet_id")) {
			continue;
		}
		
    $tweet_text = $db->escape($tweet->text);
		$created_at = $db->date($tweet->created_at);
		$retweet_count = $tweet->retweet_count;		
		$user_id = $tweet->user->id;
	
		if (isset($tweet->retweeted_status)){
			$is_rt = 1;
			$tweet_text = $db->escape($tweet->retweeted_status->text);
			$retweet_count = 0;
			$retweet_user_id = $tweet->retweeted_status->user->id; 
			$entities = $tweet->retweeted_status->entities;
		} else {
			$is_rt = 0;
			$entities = $tweet->entities;
		}
		
		$db->insert('tweets',"tweet_id=$tweet_id,tweet_text='$tweet_text',created_at='$created_at',
			user_id=$user_id,is_rt=$is_rt,retweet_count=$retweet_count");
		
		if ($is_rt) {
			$db->insert('tweet_retweets',"tweet_id=$tweet_id,created_at='$created_at',
				source_user_id=$user_id, target_user_id=$retweet_user_id");
		}	

		if ($entities->hashtags) {
			foreach($entities->hashtags as $hashtag) {
				$tag = $hashtag->text;
				$db->insert('tweet_tags',"tweet_id=$tweet_id,user_id=$user_id, created_at='$created_at',
					tag='$tag'");
			}
		}
		if ($entities->user_mentions) {
			foreach($entities->user_mentions as $user_mention) {
				$target_user_id = $user_mention->id;
				$db->insert('tweet_mentions',"tweet_id=$tweet_id,created_at='$created_at',
					source_user_id=$user_id, target_user_id=$target_user_id");
			}
		}
		if ($entities->urls) {
			foreach($entities->urls as $url) {
				$url = $url->expanded_url;
				$db->insert('tweet_urls',"tweet_id=$tweet_id,created_at='$created_at',
					user_id=$user_id, url='$url'");
			}
		}		
	} 
}

$db->update('engagement_account','old_timeline_collected=now()',"user_id=$engagement_user_id");
?>