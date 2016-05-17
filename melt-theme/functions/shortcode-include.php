<?php
function include_file($atts) {
     //if filepath was specified
     extract(
          shortcode_atts(
               array(
                    'filepath' => 'NULL'
               ), $atts
          )
     );

     //BEGIN modified portion of code to accept query strings
     //check for query string of variables after file path
     if(strpos($filepath,"?")) {
          $query_string_pos = strpos($filepath,"?");
          //create global variable for query string so we can access it in our included files if we need it
          //also parse it out from the clean file name which we will store in a new variable for including
          global $query_string;
          $query_string = substr($filepath,$query_string_pos + 1);
          $clean_file_path = substr($filepath,0,$query_string_pos);
          //if there isn't a query string
     } else {
          $clean_file_path = $filepath;
     }
     //END modified portion of code

     //check if the filepath was specified and if the file exists
     if ($filepath != 'NULL' && file_exists(get_stylesheet_directory_uri() . "/" . $clean_file_path)){
          //turn on output buffering to capture script output
          ob_start();
          //include the specified file
          include(TEMPLATEPATH.$clean_file_path);
          //assign the file output to $content variable and clean buffer
          $content = ob_get_clean();
          //return the $content
          //return is important for the output to appear at the correct position
          //in the content
          return $content;
     }
}
//register the Shortcode handler
add_shortcode('include', 'include_file');