<?php

add_action( 'init', 'myGodDamnAutoPost' );

function myGodDamnAutoPost(){
require('APost.php');
	if( isset( $_POST['identifier'] ) ) {
    	
		$auth = get_current_user_id();
		prepPost($auth);
		
	if (!isset($_POST['tags'])) {
		$tags = get_hashTags($_POST['articleUrl']);
	}
		
	$postID = createPost($_POST['title'],$_POST['content'],$_POST['categories'],$_POST['source'],$tags);

	if (isset($_POST['image'])) {
		$imgUp = saveImage($_POST['image']);
		uploadAttachImage($imgUp, $postID);
		}	
	}
	}

	
function get_hashTags( $aurl ) {
	echo $tags = call_api( $aurl );
 }

function call_api($url){
$APPLICATION_ID = '4ecd9e16';
$APPLICATION_KEY ='be54f0e53443501357865cbc055538aa';
  $ch = curl_init('https://api.aylien.com/api/v1/hashtags');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
    'X-AYLIEN-TextAPI-Application-Key: ' . $APPLICATION_KEY,
    'X-AYLIEN-TextAPI-Application-ID: '. $APPLICATION_ID
  ));
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
  $response = curl_exec($ch);
  return json_decode($response);
} 