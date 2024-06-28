<?php 
require_once("config.php");
class Customer {
    public $id;
    public $name;
    public $email;
    public $city;
    public $photo;

    public function __construct($id,$name,$email,$city,$photo){
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->city=$city;
        $this->photo=$photo;
    }

    public static function index()
    {   global $db;
        $r=$db->query("select id,name,email,city,photo from customers");
        while($row=$r->fetch_object()){
            echo $row->id." | ".$row->name." | ".$row->email." | ".$row->city." | <img src='img/" . $row->photo . "' width='40'> <br>";
        }
    }

    public function save(){
        global $db;
		$db->query("insert into customers(name,email,city,photo)values('$this->name','$this->email','$this->city','$this->photo')");
		return $db->insert_id;
    }

    public static function find($id){
        global $db;
		$result =$db->query("select id,name,email,city,photo from customers where id='$id'");
		$customer=$result->fetch_object();
		return $customer;
    }
 
    public function update(){
        global $db;
		$db->query("update customers set name='$this->name',email='$this->email',city='$this->city',photo='$this->photo' WHERE id='$this->id'");
    }
 
    public static function delete($id){
        global $db;
	    $db->query("delete from customers where id={$id}");
    }
}
?>