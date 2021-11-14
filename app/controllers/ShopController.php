<?php



class ShopController extends MainController{

  

    public function index($category,$sub=null,$product=null){
        $url = $this->getUrl();
        
        $count = count($url);
       
        switch($count){

            case 2:
                $this->getSubCategories($category);
                break;
            
            case 3:
                $this->getProducts($category,$sub);
                break;

            case 4:
                $this->getSingleProduct($category,$sub,$product);
                break;

            default:
                $this->redirect('/');

        }
        
       
    }



   private function getSubCategories($main_category){
        
        
        
        $sub = new Sub_category();
        $subs = $sub->where('main_category',$main_category);
        
        self::$data['title'] .= strtoupper($main_category);
        self::$data['subs'] = $subs;
        self::$data['header'] = strtoupper($main_category);
        
        $this->view('shop/categories',self::$data);
   }


   private function getProducts($category,$sub=null){
       
        
        $product = new Product();
        $products = $product->query("SELECT * FROM products WHERE main_category = :main_category AND  sub_category = :sub_category",['main_category'=>$category ,'sub_category'=>$sub]);

        self::$data['title'] .= strtoupper($category . ' '. $sub);
        self::$data['header'] = strtoupper($category . ' '. $sub);
        self::$data['products'] = $products;

        $this->view('shop/products',self::$data);
   }


   private function getSingleProduct($category,$sub,$product){
    
        $newproduct = new Product();
        $product = $newproduct->single('id',$product);

        self::$data['title'] .= $product->title;
        self::$data['product'] = $product;

        $this->view('shop/singleProduct',self::$data);

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