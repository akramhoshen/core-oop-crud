<?php 
interface ICustomer{
    public static function index();
    public function save();
    public function update();
    public function find($id);
    public function delete($id);
}

?>