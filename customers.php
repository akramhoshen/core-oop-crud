<?php
require_once("customer.class.php");


if(isset($_POST["save"])){
    // $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $city=$_POST["city"];

    //File get
    $imgName=$_FILES["photo"]["name"];
    $tmp_name=$_FILES["photo"]["tmp_name"];
    $size=$_FILES["photo"]["size"];
    $type=$_FILES["photo"]["type"];

    //Size Convert to bytes to mb
    $kb=$size/1024;
    $mb=$kb/1024;

    //Validation
    if($type== "image/png" || $type== "image/jpg" || $type== "image/jpeg"){
        if($mb<=1){
            move_uploaded_file($tmp_name,"img/$imgName");
        }else{
            echo "File is too Large";
        }
    }else{
        echo "File format not valid. The valid format is PNG/JPG/JPEG";
    }

    $customer=new Customer("",$name,$email,$city, $imgName);
    $customer->save();
}

if(isset($_POST["update"])){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $city=$_POST["city"];

    //File get
    $imgName=$_FILES["photo"]["name"];
    $tmp_name=$_FILES["photo"]["tmp_name"];
    $size=$_FILES["photo"]["size"];
    $type=$_FILES["photo"]["type"];

    //Size Convert to bytes to mb
    $kb=$size/1024;
    $mb=$kb/1024;

    //Validation
    if($type== "image/png" || $type== "image/jpg" || $type== "image/jpeg"){
        if($mb<=1){
            move_uploaded_file($tmp_name,"img/$imgName");
        }else{
            echo "File is too Large";
        }
    }else{
        echo "File format not valid. The valid format is PNG/JPG/JPEG";
    }

    $customer=new Customer($id,$name,$email,$city, $imgName);
    $customer->update();
}

if(isset($_POST["search"])){
    $id=$_POST["id"];
    $row = Customer::find($id);
}

if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    Customer::delete($id);
}
echo "<h3>Data List</h3>";
Customer::index();
?>

<h3>Data Create</h3>
<form action="#" method="post" enctype="multipart/form-data">
    <div>
        Name<br>
        <input type="text" name="name">
    </div>
    <div>
        Email<br>
        <input type="text" name="email">
    </div>
    <div>
        City<br>
        <input type="text" name="city">
    </div>
    <div>
        Photo<br>
        <input type="file" name="photo" id="">
    </div>
    <div>
        <br>
        <input type="submit" value="Save" name="save">
    </div>
</form>


<h3>Data Delete</h3>

<form action="#" method="post">
    ID <input size="4" type="text" name="id" />
    <input type="submit" name="delete" value="Delete" />
</form>


<h3>Data Edit</h3>

Search <br>

<form action="#" method="post">
    <input type="text" name="id" placeholder="Search...">
    <input type="submit" name="search" value="GO">
</form>

<form action="#" method="post" enctype="multipart/form-data">
    <div>
        Id<br>
        <input type="text" name="id" value="<?php echo isset($row->id)?$row->id:""?>" readonly>
    </div>
    <div>
        Name<br>
        <input type="text" name="name" value="<?php echo isset($row->name)?$row->name:""?>">
    </div>
    <div>
        Email<br>
        <input type="text" name="email" value="<?php echo isset($row->email)?$row->email:""?>">
    </div>
    <div>
        City<br>
        <input type="text" name="city" value="<?php echo isset($row->city)?$row->city:""?>">
    </div>
    <div>
        Photo<br>
        <input type="file" name="photo" id="">
    </div>
    <div>
        <br>
        <input type="submit" value="update" name="update">
    </div>
</form>