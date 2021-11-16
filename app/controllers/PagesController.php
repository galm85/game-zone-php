<?php



class PagesController extends MainController{


    public function index(){

        $cart = new Cart();
        self::$data['cart'] = $cart->read_cart();

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
            
            if($message->validate($_POST)){
                
                $_POST['seen'] = 0;
                unset($_POST['submit']);

                $message->insert($_POST);
                $this->redirect('/');

            }else{

                self::$data['errors'] = $message->errors;
            }

        }
        
        self::$data['title'] .= "Contact";
        $this->view('pages/contact',self::$data);

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
            if($user->validate($_POST)){
                $_POST['rule'] = 'user';
                $_POST['image'] = 'noUser.png';
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



    public function not_found(){
        echo '404 page not found';
    }

}