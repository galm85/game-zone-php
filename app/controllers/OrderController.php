<?php



class OrderController extends MainController{


    public function checkout(){


        if(isset($_POST['add_order'])){
            $this->pay($_POST);
        }

        $cart = new Cart();

        self::$data['items'] = $cart->read_cart();
        self::$data['sum'] = $cart->get_total_cart();
        self::$data['title'] .= 'Order';
        $this->view('pages/checkout',self::$data);
    }


    public function pay($data){
        
        $user_id = $_SESSION['USER']->id;
        
        $cartModel = new Cart();
        $cart=$cartModel->single('user_id',$user_id);
        $cart_id = $cart->id;
        $cart = $cart->cart_details;
        
        if(isset($data['message'])){
            $message = $data['message'];
        }else{
            $message = '';
        }

        $order = [
            'user_id' => $user_id,
            'total_sum' => $cartModel->get_total_cart(),
            'cart'=> $cart,
            'status'=>'in_procces',
            'message'=>$message,
            'credit_card_type'=>$data['cc_type'],
            'credit_card_number'=>$data['cc_number'],
            'credit_card_digit'=>$data['cc_number_back'],
            'credit_card_valid'=>$data['valid_month'] . '-' . $data['valid_year'],
        ];

        $orderModel = new Order();

        $orderModel->insert($order);
        
        $cartModel->delete($cart_id);
        $this->redirect('/');
        
        

       
     
    }



    public function change_status(){
        $now = new DateTime();
        $now =  $now->format('Y-m-d H:i:s');

        $order = new Order();
        $order->update($_POST['id'],['status'=>$_POST['status'],'updated_at'=>$now]);
        $this->redirect('admin/orders');
    }

}