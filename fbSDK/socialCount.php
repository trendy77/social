<?php

function tp_social_count( $post_id, $flush_cache = false ) {
	
	if( $flush_cache || false === ( $like_count = get_transient('like_count_' . $post_id) ) ) {
		$url = get_permalink($post_id);
		$fb_like_count = ps_get_fb_count($url);
		$tweet_count = ps_get_tweet_count($url);
		$gplus_count = ps_get_google_plus_count($url);
		$pinterest_count = ps_get_pinterest_count($url);
		$like_count = $like_count + $like_count + $fb_like_count + $tweet_count + $gplus_count + $pinterest_count;
		// Cache for 1 hour
		set_transient('like_count_' . $post_id, $like_count, 60 * 60 * 1); 
	}
	return $like_count;
}

function ps_get_fb_count($url) {
	require 'fbsdk/facebook.php';
	$config = array(
	  'appId'  => $GLOBALS['fbappid'],
	  'secret' => $GLOBALS['fbscrt'],
	  'cookie' => false,
	);
	$facebook = new Facebook($config);
	$params = array(
		'method' => 'fql.query',
		'query' => 'SELECT url, normalized_url, share_count, like_count, comment_count, total_count, commentsbox_count, comments_fbid, click_count FROM link_stat WHERE url="' . $url . '"',
	);
	$result = $facebook->api($params);
	$result = ($result * 100);
	return intval( $result[0]['total_count'] );
}

function ps_get_tweet_count($url) {
	$result = json_decode( file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url) );
	return intval( $result->count );
}

function ps_get_google_plus_count($url) {
	
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_HTTPHEADER      => array('Content-type: application/json'),
		CURLOPT_POST            => true,
		CURLOPT_POSTFIELDS      => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.$url.'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]',
		CURLOPT_RETURNTRANSFER  => true,
		CURLOPT_SSL_VERIFYPEER  => false,
		CURLOPT_URL             => 'https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ', //Das ist ein allgemeiner Key, man muss keinen separaten erstellen
	));
	
	$res = curl_exec($ch);
	
	curl_close($ch);
	if( $res )
	{
		$json = json_decode($res,true);
		return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
	}
	return 0;

}

function ps_get_pinterest_count($url) {
	
	$result = file_get_contents('http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url=' . $url);
	$result = str_replace( 'receiveCount(', '', $result );
	$result = substr( $result, '', -1);
	$result = json_decode($result);
	return $result->count;
	
}