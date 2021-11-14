<?php



class AdminController extends MainController{


    public function index(){

        if(!Auth::check_user()){
            $this->redirect('signin');
        }

        self::$data['title'] .= 'Admin Panel';
        $this->view('admin/admin',self::$data);
    }


    public function products(){
        if(!Auth::check_user()){
            $this->redirect('signin');
        }

        $product = new Product();
        self::$data['products'] = $product->findAll();

        self::$data['title'] .= 'AP - Products';
        $this->view('admin/products',self::$data);
    }


    public function add_product(){

        if(isset($_POST['main_category'])){
            $sub = new Sub_category();
            $subs = $sub->where('main_category',$_POST['main_category']);
            self::$data['subs'] = $subs;
         
        }
        
        if(isset($_POST['submit_form'])){
            $product = new Product();
            
            
            if($product->validate($_POST)){
                
                if(isset($_FILES['image'])){ 
                    $image = $product->upload_image($_FILES['image']);
                    if($image){
                        $_POST['image'] = $image;
                    }
                };
              
                $_POST['available'] = isset($_POST['available'])? 1 : 0;
                $_POST['sale'] = isset($_POST['sale'])? 1 : 0;
                $_POST['sale_price'] = !empty($_POST['sale_price'])? $_POST['sale_price'] : NULL;
                $_POST['created_by'] = 'Gal Mizrahi';
                $_POST['image'] = isset($_POST['image']) ? $_POST['image'] : 'noimage.png';
                unset($_POST['submit_form']);
                print_r($_POST);
                $query = "INSERT INTO products (sub_category,main_category,title,image,price,available,sale,sale_price,created_by) VALUES (:sub_category,:main_category,:title,:image,:price,:available,:sale,:sale_price,:created_by)";
                
                $product->query($query,$_POST);
                $this->redirect('admin/products');

           }else{
               self::$data['errors'] = $product->errors;
           }
        }


        $category = new Category();
        $platforms = $category->findAll();



        self::$data['title'] .= 'AP - Add Products';
        self::$data['platforms'] = $platforms;
        $this->view('admin/addProduct',self::$data);
    }

    
       

}