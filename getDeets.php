<?php

//add_action( 'init', 'getDeets' );
//get_option('site_domain')
	
// function getDeets(){



	switch ($GLOBALS['IDENTIFIER']){
	
	case 'orgbiz':
		// fb app info
	update_option( 'fbappid', '1209167032497461','yes' );
	update_option( 'fbappRl','OrganiseBiz');
update_option( 'fbscrt', '5582cae3fbe217a121285381cbdf007c','yes' );
update_option( 'fbcltk', '45cb15817ca66a934d5923eea736ec43','yes');		// twitter from https://dev.twitter.com 
	update_option('twitRl', 'organisemybiz','yes');
	update_option( 'twitcnkey', "wTU8Ntmn3q5nN7OrwdXfBn7Xx" ,'yes');
	update_option( 'twitcnsrt', "fqlbIEnIHY4fEBmVoPnqIV7j5JN6doDuh4QLEVLjGmLb59jg9N" ,'yes');
	update_option( 'twitkey', "754663243465891840-FFZjZRlOT84GY0YTvoKugAkMcwW7YeT" ,'yes');
	update_option( 'twitscrt', "8mQiNYUIMGiCTqifFEiMJBIIrJkPLvd5ZybFFUdas1hhZ",'yes' );
			// gapps
	update_option( 'gappsTag', 'UA-84079763-3','yes' );
//	update_option( 'UTM', 'closed','yes' );

	break;
	
		case 'orgbizes':
	update_option( 'gappsTag', 'UA-84079763-10','yes' );
	update_option( 'fbappid', '1209167032497461','yes' );
	update_option( 'fbappRl','OrganiseBiz');
		update_option( 'fbscrt', '5582cae3fbe217a121285381cbdf007c','yes' );
		update_option('twitRl', 'organisemybiz');
	update_option( 'twitcnkey', "wTU8Ntmn3q5nN7OrwdXfBn7Xx" ,'yes');
	update_option( 'twitcnsrt', "fqlbIEnIHY4fEBmVoPnqIV7j5JN6doDuh4QLEVLjGmLb59jg9N" ,'yes');
	update_option( 'twitkey', "754663243465891840-FFZjZRlOT84GY0YTvoKugAkMcwW7YeT" ,'yes');
	update_option( 'twitscrt', "8mQiNYUIMGiCTqifFEiMJBIIrJkPLvd5ZybFFUdas1hhZ",'yes' );
	break;
	
	
	case 'tp':
	
update_option( 'fbappid', '1209167032497461','yes' );

update_option( 'gappsTag', 'UA-84079763-14','yes' );
//update_option( 'UTM', 'closed','yes' );
	break;
	
	
	case 'tpau':
	
update_option( 'fbappid', '1209167032497461','yes' );
update_option( 'gappsTag', 'UA-84079763-15','yes' );


	break;
	
	
	
	case 'vape':
	
update_option( 'fbappid', '1829696163961982','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-9','yes' );
//update_option( 'UTM', 'closed','yes' );
	break;
	
	case 'glo':
update_option( 'fbappid', '232122247192377','yes' );
update_option( 'fbscrt', '598188680454c7e4fe3ace0d5267ed1d','yes' );
update_option( 'fbcltk', '6013598acf467d04ee5115b4a27421de');
update_option( 'gappsTag', 'UA-84079763-13','yes' );
//update_option( 'UTM', 'closed','yes' );
	break;
	
	case 'gov':
	
update_option( 'fbappid', '1645038759139286','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-8','yes' );
//update_option( 'UTM', 'closed','yes' );
	break;


}



/// BELOW CODE INCLUDES SOCIAL COUNT FUNCIONS INCLUDiNG:

// 		GETVIRAL()
//function ps_get_pinterest_count($url)
//			ps_get_google_plus_count($url) 
//			ps_get_tweet_count
 //				PS_get_fb_count($url) {

function getViral(){
if ( false === ( $featured = get_transient( 'viral_posts' ) ) ) {
	
      $featured = new WP_Query(
	   array(
		'category' => 'featured',
		'posts_per_page' => 5
	   ));

	// Put the results in a transient. Expire after 12 hours.
	set_transient( 'viral_posts', $featured, 12 * HOUR_IN_SECONDS );
} 
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