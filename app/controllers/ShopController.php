<?php



class ShopController extends MainController{

  

    public function index($category,$sub=null){
        $url = $this->getUrl();
        
        if(count($url) <= 2){
           $this->getSubCategories($category);
        }else{   
          $this->getProducts($category,$sub);
        }
        
        
    }










   private function getSubCategories($main_category){
        
        $main = new Category();
        $main =  $main->single('category_url',$main_category);
        $sub = new Sub_category();
        $sub = $sub->where('main_category',$main->id);
        
        self::$data['title'] .= $main->category_title;
        self::$data['subs'] = $sub;
        self::$data['main'] = $main;
        $this->view('shop/categories',self::$data);
   }


   private function getProducts($category,$sub=null){
       
        $main = new Category();
        $main =  $main->single('category_url',$category);
        
        $sub_cat = new Sub_category();
        $sub_cat = $sub_cat->single('title',$sub);

        $product = new Product();
        $products = $product->query("SELECT * FROM products WHERE main_category = :main_category AND  sub_category = :sub_category",['main_category'=>$main->id ,'sub_category'=>$sub_cat->id]);

        self::$data['title'] .= $main->category_title;
        self::$data['sub'] = $sub_cat;
        self::$data['main'] = $main;
        self::$data['products'] = $products;

        $this->view('shop/products',self::$data);
   }


   private function getUrl(){
            
    $url = isset($_GET['url']) ? $_GET['url'] : 'Pages';
    $url = trim($url,'/');
    $url = filter_var($url,FILTER_SANITIZE_URL);
    $url = explode("/",$url);
    return $url;

}

    public function not_found(){
        echo '404 page not found';
    }

}