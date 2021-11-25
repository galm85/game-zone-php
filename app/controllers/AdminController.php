<?php



class AdminController extends MainController{


    public function index(){

        if(!Auth::check_user()){
            $this->redirect('signin');
        }

        $product = new Product();
        self::$data['products'] = $product->findAll();
        
        $category = new Sub_category();
        self::$data['subs'] = $category->findAll();
        
        $message = new Message();

        
        $messages = $message->where('seen',0);
        self::$data['messages'] =  count($messages);


        

        self::$data['title'] .= 'Admin Panel';
        $this->view('admin/admin',self::$data);
    }


    public function products(){
        if(!Auth::check_user()){
            $this->redirect('signin');
        }
        $product = new Product();
        
        if(isset($_POST['submit']) && !empty($_POST['filter'])){
            
            self::$data['products'] = $product->where('main_category',$_POST['filter']);

        }else{

            self::$data['products'] = $product->findAll();
        }
        

        self::$data['title'] .= 'AP - Products';
        $this->view('admin/products',self::$data);
    }


    public function add_product(){

        if(isset($_POST['main_category'])){
          
            $category = str_replace('-',' ',$_POST['main_category']);
            $sub = new Sub_category();
            $subs = $sub->where('main_category',$category);
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
                $_POST['sale_price'] = !empty($_POST['sale_price']) ?   $_POST['sale_price'] : null;
                $_POST['created_by'] = Auth::get_user_name();
                $_POST['image'] = isset($_POST['image']) ? $_POST['image'] : 'noimage.png';
                unset($_POST['submit_form']);

                $query = "INSERT INTO products (main_category,sub_category,title,image,price,article,available,sale,sale_price,created_by) VALUES (:main_category,:sub_category,:title,:image,:price,:article,:available,:sale,:sale_price,:created_by)";
             
                $product->query($query,$_POST,'insert');
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

    public function delete_product($id){
        $product = new Product();
        
        if(isset($_POST['delete'])){
            $product->delete($id);
            $this->redirect('admin/products');
        }

        self::$data['product'] = $product->single('id',$id);
        self::$data['title'] .= 'Delete Product';
        $this->view('admin/deleteProduct',self::$data);

    }



    public function categories(){
        if(!Auth::check_user()){
            $this->redirect('signin');
        }

        $subs = new Sub_category();
        self::$data['subs'] = $subs->findAll();
        self::$data['title'] .= 'AP - Categories';
        $this->view('admin/categories',self::$data);
    }

    public function add_category(){



        if(count($_POST)>0){

            $sub = new Sub_category();

            if(isset($_FILES['image'])){ 
                $image = $sub->upload_image($_FILES['image']);
                if($image){
                    $_POST['image'] = $image;
                }
            };
            $_POST['main_category'] = str_replace('-',' ',$_POST['main_category']);
            $_POST['image'] = isset($_POST['image']) ? $_POST['image'] : 'no Image';
            $_POST['created_by'] = Auth::get_user_name();

           $sub->insert($_POST);
           $this->redirect('admin/categories');
        }



        $category = new Category();
        self::$data['platforms'] = $category->findAll();
        self::$data['title'] .= 'AP - Add Category';
        $this->view('admin/addSubCategory',self::$data);
    }


    public function messages(){

        $message = new Message();
        self::$data['messages'] = $message->findAll();
        self::$data['title'] .= 'AP Messages';
        $this->view('admin/messages',self::$data);
    }


    public function read_message($id){
        $message = new Message();
        $message->update($id,['seen'=>1]);
        self::$data['title'] .= 'AP Mail';
        self::$data['message'] = $message->single('id',$id);
        $this->view('admin/singleMessage',self::$data);
    }

    public function delete_message($id){
        
        $message = new Message();
        $message->delete($id);
        $this->redirect('admin/messages');
    }
    

    public function orders(){
        if(!Auth::check_user()){
            $this->redirect('signin');
        }

        $order = new Order();

        if(isset($_POST['filter']) && !empty($_POST['filter'])){
          
            $orders = $order->where('status',$_POST['filter']);
        }else{
            $orders = $order->query("SELECT * FROM orders ORDER BY created_at ASC");

        }

        if(isset($_POST['single_order']) && !empty($_POST['order_id'])){
            $orders = $order->where('id',$_POST['order_id']);
            
        }
        
        self::$data['orders'] = $orders;
        self::$data['title'] .= 'AP Orders';
        $this->view('admin/orders',self::$data);

    }

    public function single_order($id){
        
        $orderModel = new Order();
        $productModel = new Product();
        $userModel = new User();

        $order = $orderModel->single('id',$id);
        $cart = unserialize($order->cart);
        $items = [];

        foreach($cart as $row){
            $product = $productModel->single('id',$row->product_id);
            $product->qty = $row->qty;
            array_push($items,$product);
        }
        self::$data['user'] = $userModel->single('id',$order->user_id);
        self::$data['title'] .= 'Order';
        self::$data['order'] = $order;
        self::$data['items'] = $items;

        $this->view('admin/singleOrder',self::$data);

        


        

    }
       

    public function users(){
        $user = new User();
        self::$data['users'] = $user->where('rule','user');
        self::$data['admins'] = $user->where('rule','admin');
        self::$data['title'] .= 'AP Users';
        $this->view('admin/users',self::$data);
        
    }

}