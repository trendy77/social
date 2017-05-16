

// $option 		(string) (required) Name of the option to update. Must not exceed 64 characters. A list of valid default options to update can be found at the Option Reference.
					//Default: None
// $newvalue 		(mixed) (required) The NEW value for this option name. This value can be an integer, string, array, or object.
					//Default: None
// $autoload		//(mixed) (optional) Whether to load the option when WordPress starts up. For existing options `$autoload` can only be updated using `update_option()` if `$value` is also changed. Accepts 'yes' or true to enable, 'no' or false to disable. For non-existent options, the default value is 'yes'.
				//	Default: null

				
				//add_action( 'init', 'getDeets' );

	
function getDeets(){
	
	$url = $_SERVER['SERVER_NAME'];				
	
	switch ($url){
	
	case 'http://trendypublishing.com':
	
update_option( 'fbappid', '1209167032497461','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-11','yes' );
update_option( 'UTM', 'closed','yes' );
	break;
	
	case 'http:///trendypublishing.com.au':
	
update_option( 'fbappid', '1209167032497461','yes' );
update_option( 'fbscrt', 'closed','yes' );

//same?
update_option( 'gappsTag', 'UA-84079763-11','yes' );
update_option( 'UTM', 'closed','yes' );
	break;
	
	
	case 'http://es.organisemybiz.com':
	
update_option( 'fbappid', '1209167032497461','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-10','yes' );
update_option( 'UTM', 'closed','yes' );
	break;
	
	
	
	case 'organisemybiz.com':
	update_option( 'IDENTIFIER', 'orgbiz','yes' );
update_option( 'fbappid', '1209167032497461','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-5','yes' );
update_option( 'UTM', 'closed','yes' );

	break;
	
	
	
	case 'http://vapedirectory.co':
	
update_option( 'fbappid', '1829696163961982','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-9','yes' );
update_option( 'UTM', 'closed','yes' );
	break;
	
	case 'http://globetravelsearch.com':
update_option( 'fbappid', '232122247192377','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-13','yes' );
update_option( 'UTM', 'closed','yes' );
	break;
	
	case 'http://govnews.info':
	
update_option( 'fbappid', '1645038759139286','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-84079763-8','yes' );
update_option( 'UTM', 'closed','yes' );
	break;

	case 'http://customkitsworldwide.com':
		
update_option( 'fbappid', '1863943023885616','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'UA-85225777-1','yes' );
update_option( 'UTM', 'closed','yes' );

	break;
	case 'http://es.customkitsworldwide.com':
	
update_option( 'fbappid', '1863943023885616','yes' );
update_option( 'fbscrt', 'closed','yes' );
update_option( 'gappsTag', 'closed','yes' );
update_option( 'UTM', 'closed','yes' );

	break;
		
	case 'http://fakenewsregistry.org/es':
	// dev deets @ TRUTHINEWS - pusher
  update_option( 'pushrappid', "339212");
  update_option( 'pushrkey', "3d10ef4455f46d0aa5b0",'yes' );
  update_option( 'pushrscrt', "872e998ae796efb76f40",'yes' );
		// truthinews twitter app
  update_option( 'twitcnkey', "2vOkc55DN1UbX6NJjJawC7UNM" ,'yes');
  update_option( 'twitcnsrt', "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V" ,'yes');
  update_option( 'twitkey', "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq" ,'yes');
update_option( 'twitscrt', "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5",'yes' );
		// fb app info
update_option( 'fbappid', '1883167178608105','yes' );
update_option( 'fbscrt', 'closed','yes' );
		// gapps
update_option( 'gappsTag', 'UA-84079763-6','yes' );
update_option( 'UTM', 'closed','yes' );
		// autopost?
update_option( 'IDENTIFIER', 'fnres','yes' );
	break;
	
	case 'http://fakenewsregistry.org':
// dev deets @ TRUTHINEWS - pusher
  update_option( 'pushrappid', "339212");
  update_option( 'pushrkey', "3d10ef4455f46d0aa5b0",'yes' );
  update_option( 'pushrscrt', "872e998ae796efb76f40",'yes' );
		// truthinews twitter app
  update_option( 'twitcnkey', "2vOkc55DN1UbX6NJjJawC7UNM" ,'yes');
  update_option( 'twitcnsrt', "tcXIP5xPmXqNRgmiLLBVoEfY1hyKiAaDhhbi4bzrmbB3Urdl6V" ,'yes');
  update_option( 'twitkey', "817542417788194816-RpuUbfOb3j8hm5v0HRny4XcQ4Ffv0Lq" ,'yes');
update_option( 'twitscrt', "6NL6sJ30NN14L36GiODkA69yvn352hnQtkCtttItGAeI5",'yes' );
		// fb app info
update_option( 'fbappid', '1883167178608105','yes' );
update_option( 'fbscrt', 'closed','yes' );
		// gapps
update_option( 'gappsTag', 'UA-84079763-11','yes' );
update_option( 'UTM', 'closed','yes' );
		// autopost?
update_option( 'IDENTIFIER', 'fnr','yes' );
	break;
			
}


