<?php

    class Auth{

        public static function signin($data){
            unset($data->password);
            $_SESSION['USER'] = $data; 
        }


        public static function initial_name(){
           
            if($_SESSION['USER']){
               
                $name = $_SESSION['USER']->first_name[0] . $_SESSION['USER']->last_name[0];
                $name = strtoupper($name);
                return $name;
            }
            
           
        }


        public static function logout(){
            
            if(isset($_SESSION['USER'])){
                unset($_SESSION['USER']);
            }
        }


        
    }