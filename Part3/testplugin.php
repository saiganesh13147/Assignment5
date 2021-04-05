<?php
/*
Plugin Name: testplugin

*/

//[promocode code='QWERTY']

function generate_promo($atts){
            
    extract(shortcode_atts(array('code' => 'AFGHWQ'), $atts));
        
    $post_date = $post_object->post_date; 
        
        
    $post_upd = strtotime($post_date);
    
    
    $today = time();
    
    $gap = $today - $post_upd;
    
    if($gap > 36000000000){
    
        return " Promo Expired";
    
    }
    else {
    
        return " $code Code is Valid ";
    }
    
    }
    
    add_shortcode('promocode','generate_promo');
    
    

?>