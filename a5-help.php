<?php
/*
Plugin Name: My Plugin
*/

//Remember that a plugin php file needs to be put in /wp-content/plugins/ and it needs the comment as seen above in line 3 to be visible in the wordpress backend under "plugins".

/*
Good resources:
  https://www.wpbeaverbuilder.com/creating-wordpress-plugin-easier-think/

  https://www.youtube.com/watch?v=9GwrmbC94Es

  How To Create Your Own WordPress Shortcode - Part 1
  In this video you will learn how to create a basic WordPress Shortcode using the Shortcode API. Shortcode API: https://codex.wordpress.org/Shortcode... Download my PHP code: https://docs.google.com/document/d/1x... If you have questions please leave a comment below or contact me: Twitter: https://twitter.com/ieatwebsites Linkedin: https://www ...
  www.youtube.com


  If you have questions please ask me too.


  More good videos:
  https://www.youtube.com/watch?v=Z7QfH-s-15s
  https://www.youtube.com/watch?v=8AZ8GqW5iak&t=1009s

*/


// part 1, 2 of assignment 5

//how to create a filter:
function my_filter($content) {
  return "This is added before the content. " . $content . "This is added after the content.";
}
add_filter('the_content','my_filter'); // First parameter: "the_content" is a wordpress hook. Google "wordpress hooks" if you missed or did not fully understand this part in class. It means "before displaying the content of a post/page, first run the 'my_filter' function on the content. Whatever the my_filter function returns will be displayed as the post/page content. You can try adding these three lines to your plugin file to see the result.


/* 
Useful wordpress hooks:
  the_content
  comment_text
  wp_footer

*/


//You would add an action similarly to adding a filter:

add_action('put_wordpress_hook_name_here','put_function_name_you_created_here');




// Part 3: you can CURL to an external API like this. (same as example shown in class):

  $url = "http://put your own url to an api here";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result=curl_exec($ch);
  $result=json_decode($result, true);

  //$result stores an array of the results. try writing print_r($result) to see it.


//useful PHP functions you need:
  count() //counts how long an array is
  rand($min, $max); //get a random number between integer stored in $min and $max


  if an array has arrays within an array:
  
  $my_array = array(
    "data"=>
      array(
        "events"=> "Event description here"
      )
  );

  //you can get the value of an array within an array like this:
  echo $my_array['data']['events']; //outputs "Event description here

  //if it is indexed array instead of a key/value associative array, then: 
  $my_array[an integer here]

  //For example: 
  $my_array['data']['events'][0]['year']


//how to make a shortcode. You put the shortcode in the wordpress backend, when creating/editing a post. example:
[my_new_shortcode_name, my_shortcode_attribute="my attribute value"]


//in the plugin php file:
function my_function_name($attribute) {
  /*
    $attribute will be passed in from the shortcode. It will hold an array that looks like this:
    array("my_shortcode_attribute" => "my attribute value") 
  */

  echo $post_object->post_date; //holds the post date as a string



  /*
    //other useful PHP functions:
    turn a date string into a date object, so you can use it to do math. (add days to a date, see if a date is older than another date):
     $post_date = $post_object->post_date; //gets the date of a wordpress page or post that the shortcode is found in. (as a string)
     $dt = new DateTime($post_date); //turns the string into an object 

    $changed_date = $dt->add(new DateInterval('P1D')); // P1D = period of 1 day. Other examples: P2D = 2 days. Two seconds is PT2S. Six years and five minutes is P6YT5M.
  */

}

add_shortcode('my_new_shortcode_name', 'my_function_name'); // make it take effect


?>
