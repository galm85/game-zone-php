<?php


    class Message extends Database{

        protected $table = 'messages';

        public function validate($data){

            $this->errors = [];
            
            if(empty($data['name']) || !preg_match('/^[a-z A-Z]+$/',$data['name']) ){
                $this->errors['name']= ' * Please insert a valid Name';
            }

            if(empty($data['email']) || !filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                $this->errors['email']= '* Please insert a valid Email';
            }

            if(empty($data['phone']) || strlen($data['phone']) < 9 || strlen($data['phone']) >13 ) {
                $this->errors['phone']= ' * Please insert a valid Phone Number';
            }
            if(empty($data['message']) ) {
                $this->errors['message']= ' * Please insert a Message';
            }
            

            if(count($this->errors) == 0){
                return true;
            }

            return false;
        }

       
    }