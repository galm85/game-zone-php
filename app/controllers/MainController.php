<?php

    class MainController{

        static public $data = ['title'=>'GameZone | '];

        public function view($view){
            extract(self::$data);
            
            if(file_exists('../app/views/'.$view.'.view.php')){
                require_once '../app/views/'.$view.'.view.php';
            }else{
                require_once '../app/views/pages/404.view.php';
            }
        }



        public function redirect($link){
            header('Location:'.ROOT."/".trim($link,'/'));
            exit();
        }

    }