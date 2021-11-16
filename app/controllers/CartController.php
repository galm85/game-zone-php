<?php



class CartController extends MainController{


    public function add_to_cart($product_id){

        if(!isset($_SESSION['USER'])){
            $this->redirect('signin');
        }

        $cart = new Cart();
        $product = new Product();
        
        $user_id = $_SESSION['USER']->id;
        $product = $product->single('id',$product_id);
        
        $user_cart = $cart->single('user_id',$user_id);
        
        if($user_cart){
          $cart->add_to_cart($user_id,$product->id);
          Header('Location: '.$_SERVER['HTTP_REFERER']);
          Exit();   
        }else{
            
            $cart->create_cart($user_id,$product->id);
            Header('Location: '.$_SERVER['HTTP_REFERER']);
            Exit(); 

        }
    }

}