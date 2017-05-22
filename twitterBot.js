// Written by Amit Agarwal @labnol on 31/07/2015

// Fill the Twitter Keys and then choose Run -> Start Bot

TWITTER_CONSUMER_KEY = "123";
TWITTER_CONSUMER_SECRET = "123";
TWITTER_ACCESS_TOKEN = "123";
TWITTER_ACCESS_SECRET = "123";
TWITTER_SEARCH_PHRASE = "filter:links labnol.org";

function Start_Bot() {

    var props = PropertiesService.getScriptProperties();

    props.setProperties({
        TWITTER_CONSUMER_KEY: TWITTER_CONSUMER_KEY,
        TWITTER_CONSUMER_SECRET: TWITTER_CONSUMER_SECRET,
        TWITTER_ACCESS_TOKEN: TWITTER_ACCESS_TOKEN,
        TWITTER_ACCESS_SECRET: TWITTER_ACCESS_SECRET,
        SINCE_TWITTER_ID: 0
    });

    var twit = new Twitter.OAuth(props);

    // Test Twitter authorization

    if (!twit.favorite("628053456071192576")) {
        throw new Error("Please check your Twitter access tokens");
        return;
    }

    ScriptApp.newTrigger("labnol_twitterBot")
        .timeBased()
        .everyMinutes(10)
        .create();

}

function labnol_twitterBot() {

    try {

        var props = PropertiesService.getScriptProperties(),
            twit = new Twitter.OAuth(props);

        if (twit.hasAccess()) {

            var tweets = twit.fetchTweets(
                TWITTER_SEARCH_PHRASE,
                function(tweet) {
                    // Skip tweets that contain sensitive content
                    if (!tweet.possibly_sensitive) {
                        return tweet.id_str;
                    }
                }, {
                    multi: true,
                    lang: "en", // Process only English tweets
                    count: 5, // Process 5 tweets in a batch
                    since_id: props.getProperty("SINCE_TWITTER_ID")
                });

            if (tweets) {

                props.setProperty("SINCE_TWITTER_ID", tweets[0]);

                for (var i = tweets.length - 1; i >= 0; i--) {

                    twit.retweet(tweets[i]);
                    twit.favorite(tweets[i]);

                    /* Wait between 10 seconds and 1 minute */
                    Utilities.sleep(Math.floor(Math.random() * 50000) + 10000);

                }
            }
        }

    } catch (f) {
        Logger.log("Error: " + f.toString());
    }

}