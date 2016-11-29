<?php

header('Content-Type: text/html; charset=UTF-8');

require_once('lib/TwitterAppOAuth.php');



$API = 'search/tweets';

$connection = new TwitterAppOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

$params = array(
    'q' => '#ごちうさ -RT',
    'count' => 100,
    'result_type' => 'mixed',
    'include_entities' => true
    );

$tw_obj = $connection->get($API, $params);
$tw_arr = json_decode($tw_obj, true);

$i = 0;

foreach($tw_arr['statuses'] as $statuses) {

    if ( isset($statuses['entities'])) {
                // echo 'dasdsad';

        $url = $statuses['entities']['media'][0]['media_url'];
        // echo $url . '<br>';

        $data = file_get_contents($url);
        file_put_contents('pics/'.$i.'.jpg', $data);

        ++$i;
    }else {

    }
}