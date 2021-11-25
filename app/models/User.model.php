<?php


    class User extends Database{

        protected $table = 'users';




        public function validate($data){

            $this->errors = [];
            
            if(empty($data['first_name']) || !preg_match('/^[a-z A-Z]+$/',$data['first_name']) ){
                $this->errors['first_name']= 'Please insert a valid First name';
            }

            if(empty($data['last_name']) || !preg_match('/^[a-z A-Z]+$/',$data['first_name']) ){
                $this->errors['last_name']= 'Please insert a valid Last name';
            }

            if(empty($data['email']) || !filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                $this->errors['email']= 'Please insert a valid Email';
            }

            if(empty($data['password']) || strlen($data['password']) < 6 ){
                $this->errors['password']= 'Password must be at least 6 charachters';
            }

            if($data['password'] != $data['password2']){
                $this->errors['password2'] = 'Password must be at least 6 charachters';
            }

            if($this->where('email',$data['email'])){
                $this->errors['email']= 'Email is allready exist';
            }

            if(count($this->errors) == 0){
                return true;
            }

            return false;
        }

        public function hash_password($str){

            $b_password = password_hash($str,PASSWORD_BCRYPT);
            return $b_password;
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