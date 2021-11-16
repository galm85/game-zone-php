<?php

    class Helpers{

        public static function get_old_value($key,$default=null){
            if(isset($_POST[$key])){
                return $_POST[$key];
            }
            return $default;
        }



        public static function get_date($date){
            return date("jS M, Y",strtotime($date));
        }


        public static function get_old_select($key,$value){
            if(isset($_POST[$key])){
                if($_POST[$key] == $value){
                    return 'selected';
                }
            }

            return $value;
        }
        
        public static function get_old_check($key){
            if(isset($_POST[$key])){
                return 'checked';
            }
        }

        
    }