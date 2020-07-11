<?php
if (isset($_GET['id'])){
   require_once('Handle/database/db.php');
   $delete_id = $_GET['id'];
   $sql = "DELETE FROM employee WHERE id = '$delete_id'";
   if (mysqli_query($mysqli, $sql)){
       header("Location: view.php");
   } else {
       die('Delete failed'.mysqli_error($mysqli));
   }
}