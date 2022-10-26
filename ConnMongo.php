<?php 

class ConnMongo{
   
   private $conn='';
   private $col='';
   private $db='';
   private $dbs='';
   private $begin='';
   private $query='';


        public function __construct($col)
        {
          $this->col=$col;
        }
		public function MongoConnect($dbs) 
  		{
      $this->conn = new MongoClient("mongodb://username:password@ip หากมี:27017/");
   			$this->db= $this->conn->selectDB($dbs);
            $this->begin=$this->db->selectCollection($this->col);
            return  $this->begin;
          
		}	
       
        public function findWhere($filter,$document) {
          // find เฉพาะบางค่า 
          return $this->query=$this->begin->find($filter,$document);
         }
        public function findOne($filter) {
            // find record เดียว
             return $this->query=$this->begin->findOne($filter);
        }
        public function findAll($filter) {
          // find ทุกค่า 
          return $this->query=$this->begin->find($filter);
        }
        public function aggregate($filter) {
          // find เฉพาะบางค่า 
          return $this->query=$this->begin->aggregate($filter);
        }
        public function count() {
          // count จำนวนจาก find 
             return $this->query->count();
        }
        public function Sort($sort) {
          // เรียงตามลำดับ
              //return $this->query=$this->begin->sort($order);
         return $this->query->sort($sort);
        }
        public function Limit($limit) {
          
          return $this->query->limit($limit);
        }



        public function Update($filter,$document) {
          // update ข้อมูล
          return $this->query=$this->begin->update($filter,$document);
        }
        public function UpdateMulti($filter,$document,$oth) {
          // update ข้อมูล
          return $this->query=$this->begin->update($filter,$document,$oth);
        }
        public function Insert($document) {
          // update ข้อมูล
          return $this->query=$this->begin->insert($document);
        }
        public function Remove($document) {
          // update ข้อมูล
          return $this->query=$this->begin->remove($document);
        }

        

	}
?>