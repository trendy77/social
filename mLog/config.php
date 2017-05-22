<?php

$config = array("base_url" => "organisemybiz.com/mLog/login-with.php", 
        "providers" => array ( 
            "Google" => array ( 
                "enabled" => true,
                "keys"    => array ( "id" => "335499949742-sop1jqc84nu0lh48mpst0p5ojrhbbj3p.apps.googleusercontent.com", "secret" => "LQR_GScRQIEgd1qgmOr-kmNG" ), 
 
            ),
 
            "Facebook" => array ( 
                "enabled" => true,
                "keys"    => array ( "id" => "FACEBOOK_DEVELOER_KEY", "secret" => "FACEBOOK_SECRET" ),
                "scope" => "email, user_about_me, user_birthday, user_hometown"  //optional.              
            ),
 
            "Twitter" => array ( 
                "enabled" => true,
                "keys"    => array ( "key" => "TWITTER_DEVELOPER_KEY", "secret" => "TWITTER_SECRET" ) 
            ),
        ),
        // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
        "debug_mode" => true,
        "debug_file" => "debug.log",
    );