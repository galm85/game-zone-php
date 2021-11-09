<?php



class PagesController extends MainController{


    public function index(){

        self::$data['title'] .= 'Home';

        $this->view('pages/home',self::$data);
    }


    public function about(){
        self::$data['title'] .= 'about';
        $this->view('pages/about',self::$data);
    }

    public function contact($value=null){

        echo "contact page <br> $value";

    }

    public function not_found(){
        echo '404 page not found';
    }

}