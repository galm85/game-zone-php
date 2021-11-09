<?php



class ShopController extends MainController{


    public function index(){
      echo 'shop index';
    }


    public function products($category_id=null){
        echo "categories of product number $category_id";
    }

    public function product($value=null){

        echo "single product <br> $value";

    }

    

    

    

}