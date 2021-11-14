<?php


    class Product extends Database{

        protected $table = 'products';

        

        public function validate($data){
            $this->errors = [];
            
            if(empty($data['main_category'])){
                $this->errors['main_category'] = '* Please Insert Platform';    
            }

            if(empty($data['sub_category'])){
                $this->errors['sub_category'] = '* Please Insert Category';    
            }

            if(empty($data['title'])){
                $this->errors['title'] = '* Please Insert Product title';    
            }

            if(empty($data['price']) || !is_numeric($data['price']) ){
                $this->errors['price'] = '* Please Insert a valid Price';    
            }

            if(isset($data['sale']) && empty($data['sale_price'])){
                $this->errors['sale_price'] = '* this product is on sale please enter the sale price';
            }
            
            if(count($this->errors) > 0){
                return false;
            }

            
            
            return true;
        }


        public function upload_image($data){
            $file_name = $data['name'];
            $file_name = time() . '-' . $file_name;
            $tmp_name = $data['tmp_name'];
            $local_folder = './assets/images/';
            if(move_uploaded_file($tmp_name,$local_folder.$file_name)){
                return $file_name;
            }else{
  
                return false;
            }
            
        }
    }