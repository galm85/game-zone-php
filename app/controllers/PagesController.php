<?php



class PagesController extends MainController{


    public function index(){

       $product = new Product();
       self::$data['newproducts'] = $product->query("SELECT * FROM products WHERE sub_category=:sub_category ORDER BY created_at DESC LIMIT 6",['sub_category'=>'Games']);
       self::$data['saleproducts'] = $product->query("SELECT * FROM products WHERE sale=:sale AND sub_category=:sub_category ORDER BY created_at DESC LIMIT 6",['sale'=>1,'sub_category'=>'Games']);
        
        
        self::$data['title'] .= 'Home';
        $this->view('pages/home',self::$data);
    }


    public function about(){
        self::$data['title'] .= 'about';
        $this->view('pages/about',self::$data);
    }

    public function contact($value=null){

        if(isset($_POST['submit'])){
            $message = new Message();
            
           
                
                $_POST['seen'] = 0;
                unset($_POST['submit']);

                $message->insert($_POST);
                $this->redirect('/');

            
        }
        
        

    }


    public function signin(){
        
        self::$data['errors'] = '';
        self::$data['title'] .= 'Sign In';

        if(count($_POST) > 0){
            $user = new User();

            if($row = $user->single('email',$_POST['email'])){
                
                if(password_verify($_POST['password'],$row->password)){
                    Auth::signin($row);
                    $this->redirect('');
                }else{
                    self::$data['errors'] = 'wrong password';
                }

            }else{
                self::$data['errors'] = 'Wrong Enail';
            }

        }

        
        $this->view('pages/signin',self::$data);
    }


    public function register(){

        self::$data['errors'] = [];

        if(count($_POST) > 0){
           
            $user = new User();
           
            if(isset($_FILES['image'])){ 
               
                $image = $user->upload_image($_FILES['image']);
                if($image){
                    $_POST['image'] = $image;
                }
            };
            
            if($user->validate($_POST)){
                $_POST['rule'] = 'user';
                $_POST['image'] =  isset($_POST['image']) ?  $_POST['image'] : 'noUser.png';
                $_POST['password'] = $user->hash_password($_POST['password']);
                unset($_POST['password2']);
                $user->insert($_POST);
                $this->redirect('');
            
            }else{
                self::$data['errors'] = $user->errors;

            }
            

        }

        self::$data['title'] .= 'Register';
        $this->view('pages/register',self::$data);
    }



    public function logout(){

        Auth::logout();
        $this->redirect('');
    }

    
    public function profile(){
        
        if($id = Auth::get_user_id()){
           
            $userModel = new User();
            $user= $userModel->single('id',$id);

            $orderModel = new Order();
            $orders = $orderModel->where('user_id',$user->id);

            $productModel = new Product();
           
            $history = [];

            foreach($orders as $order){
                $cart = unserialize($order->cart);
                $items = [];

                foreach($cart as $row){
                    $product = $productModel->single('id',$row->product_id);
                    $product->qty = $row->qty;
                    array_push($items,$product);
                }
                $row = (object)[
                    'id'=> $order->id,
                    'cart'=>$items,
                    'total'=>$order->total_sum,
                    'status'=>$order->status,
                    'date'=>$order->created_at
                ];

                array_push($history,$row);

                
            }

            self::$data['user'] = $user;
            self::$data['orders'] = $history;
            self::$data['title'] .= $user->first_name.' '.$user->last_name;


            $this->view('pages/profile',self::$data);


        }else{
            echo 'no user';
        }
    }

    public function not_found(){
        echo '404 page not found';
    }

}