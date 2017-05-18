<?php

$fb = new Facebook\Facebook([
 'app_id' => get_option('fbappid'),
  'app_secret' => get_option('fbscrt'),
  'default_graph_version' => 'v2.9',
  ]);

$linkData = [
  'link' => echo home_url(),
  'message' => 'User provided message',
  ];
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/feed', $linkData, '{access-token}');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: ' . $graphNode['id'];