<?php


    class App{

        protected $controller = 'Pages';
        protected $method = 'index';
        protected $params = [];


        public function __construct(){
            $URL = $this->getUrl();
            

            // COntroller handle
            if(file_exists("../app/controllers/".ucfirst($URL[0])."Controller.php" )){
                $this->controller = ucfirst($URL[0]);
                unset($URL[0]);
            }

            require_once "../app/controllers/" . $this->controller ."Controller.php";
            $this->controller = $this->controller."Controller";
            $this->controller = new $this->controller();


            // method handle
            $URL = array_values($URL);
            
            if(isset($URL[0])){
                if(method_exists($this->controller,$URL[0])){
                    $this->method = $URL[0];
                    unset($URL[0]);
                }else{
                    require_once "../app/controllers/PagesController.php";
                    $this->controller = new PagesController();
                    $this->method = "not_found";
                }
            }

            // params handle
            $this->params = array_values($URL);

            call_user_func_array([$this->controller,$this->method],$this->params);
        

        }


        
        
        
        
        private function getUrl(){
            
            $url = isset($_GET['url']) ? $_GET['url'] : 'Pages';
            $url = trim($url);
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode("/",$url);
            return $url;
        
        }







    }