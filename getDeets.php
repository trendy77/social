<?php

//add_action( 'init', 'getDeets' );
//get_option('site_domain')
	
// function getDeets(){

echo $url = 'http://organisemybiz.com';	

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


