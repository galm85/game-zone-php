<?php



class Ps5Controller extends MainController{


    public function index(){

        $sub_cat = new Sub_category();
        self::$data['sub_categories'] = $sub_cat->where('main_category',1);
        $this->view('ps5/categories',self::$data);
       
    }


    public function games(){
       
        $product = new Product();
        $products = $product->where('sub_category',2);
        print_r($products);

    }


    

}