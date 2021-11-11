<?php

    class Helpers{

        public static function get_old_value($key,$default=null){
            
            if(isset($_POST[$key])){
                return $_POST[$key];
            }

            return $default;

        }


        


        
    }