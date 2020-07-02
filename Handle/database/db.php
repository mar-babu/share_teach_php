<?php
$mysqli = new mysqli('localhost','root','','test_db');

try{
    if (!$mysqli){
        echo "Connection Failed";
    }

}catch (Exception $exception){
    $exception->getMessage();
}