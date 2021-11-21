<?php


    class Cart extends Database{

        protected $table = 'carts';



        public function create_cart($user_id,$product_id){
            
            $cart_details = [];
           
            $item = (object)[
            'product_id'=>$product_id,
            'qty' => 1
           ];
           array_push($cart_details,$item);
           $cart_details = serialize($cart_details);
           $this->query("INSERT INTO carts (user_id,cart_details) VALUES (:user_id,:cart_details)",['user_id'=>$user_id,'cart_details'=>$cart_details] , 'insert');
        }


        public function add_to_cart($user_id,$product_id){

            $cart =  $this->single('user_id',$user_id);
            
            $cart_details = unserialize($cart->cart_details);
            $item = (object)[
                'product_id'=>$product_id,
                'qty'=>1,     
            ];
            array_push($cart_details,$item);
            $cart_details = serialize($cart_details);
            
            $this->query("UPDATE carts SET cart_details=:cart_details WHERE id=$cart->id",['cart_details'=>$cart_details],'update');
        }


        public function read_cart(){
            $product = new Product();
            $items =[];

            $cart = $this->single('user_id',$_SESSION['USER']->id);
            if($cart){

                $cart_items = unserialize($cart->cart_details);
                
                foreach($cart_items as $item){
                    $row = $product->single('id',$item->product_id);
                    $row->qty = $item->qty;
                    array_push($items,$row);
                }
                return $items;
            }else{
                return null;
            }

        }

        public function get_total_cart(){
            $items = $this->read_cart();
            $sum = 0;
            
            if($items){
                foreach($items as $item){
                    $sum = $sum + ($item->price * $item->qty);
                }
            }

            return $sum;
        }

        

    }