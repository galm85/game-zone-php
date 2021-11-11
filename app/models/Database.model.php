<?php


    class Database{

        public $errors = [];
        

        public function __construct(){
            if(!property_exists($this,'table')){
                $this->table = strtolower(get_class($this)).'s';
            }
            
        }

        

        private function connect(){
            try{
                $db = new PDO('mysql:host=localhost;dbname=gamezone','root','');
                return $db;
            }catch(PDOException $e){
                echo $e;
            }
        }

        public function query($query,$data=[],$type='fetch'){
            
            $db = $this->connect();
            $statement = $db->prepare($query);
            $check = $statement->execute($data);
            
            if($check && $type == 'fetch'){
                $results = $statement->fetchAll(PDO::FETCH_OBJ);
                return $results;
            }
            
            return $check;
        }

        /**
         * @param String $column - The column to search in the table
         * @param String $value - The value to search in the column
         * @return Array  all the records form the table
         */
        public function findAll(){
            $query = "SELECT * FROM $this->table";
            $data = $this->query($query);
            return $data;
        }


        /**
         *  
         * @return Array all the records where the value match the column
         */
        public function where($column,$value){
            $column = addslashes($column);
            $query = "SELECT * FROM $this->table WHERE $column = :value";
            $data = $this->query($query,['value'=> $value]);
            return $data;
        }


        /**
         * @param String $column - The column to search in the table
         * @param String $value - The value to search in the column
         * @return Object the first object in a table
         */
        public function single($column,$value){
            $column = addslashes($column);
            $query = "SELECT * FROM $this->table WHERE $column = :value";
            $data = $this->query($query,['value'=>$value]);
            if(isset($data[0])){
                return $data[0];
            }else{
                return false;
            }
        }



        /**
         * @param Array $data The array of data to insert to table
         * @return Boolean  if the insert works or not
         */
        public function insert($data){
            $keys = array_keys($data);
            $columns = implode(',',$keys);
            $values = implode(',:',$keys);
            
            $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";
            
            $data = $this->query($query,$data,'insert');
            echo $data; 
        }


        public function delete($id){
            $query = "DELETE FROM $this->table WHERE id = :id";
            $data = $this->query($query,['id'=>$id],'delete');
            return $data;
        }


        public function update($id,$data){
            $str = '';
            foreach($data as $key => $value){
                $str .= $key . '=:' . $key . ',';
            }

            $str = trim($str,',');
            
            $data['id'] = $id;
            $query = "UPDATE $this->table SET $str WHERE id=:id";

            $data = $this->query($query,$data,'update');
            return $data;
            
        }

    }

    
    