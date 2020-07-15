<?php
if(isset($_POST['update'])){
    require_once('Handle/database/db.php');
    $id = $_GET['id'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    $sql="UPDATE employee SET email='$email',age='$age',address='$address' WHERE id='$id'";

    $query=mysqli_query($mysqli,$sql);
    if ($query){
        header("Location:view.php");
    }else{
        die('problem'.mysqli_error($mysqli));
    }
}