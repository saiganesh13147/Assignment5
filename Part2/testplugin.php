<?php

/*
Plugin Name: testplugin

*/


function random_quote(){

 
    $url = "http://history.muffinlabs.com/date";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    $result = json_decode($result,true);
    
    $randomindex = rand(0, sizeof($result['data']['Events']) - 1);

    // print_r($result);
   
    echo $result['data']['Events'][$randomindex]['text'];
    
}
    random_quote();

   // add_action('wp_footer', 'random_quote');

?>