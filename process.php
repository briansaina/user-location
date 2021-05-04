<?php 



$mysqli = new mysqli('localhost', 'root', '', 'crudlocation') or die(mysqli_error($mysqli));


$name = '';
$location = '';
$update = false; 
$id = 0;

if(isset($_POST['save'])){
   $name =  $_POST['name'];
   $location = $_POST['location'];
   
   $mysqli -> query("INSERT INTO users('username', 'location') VALUES ($name, $location);") or die(mysqli_error($mysqli)); 

   $_SESSION['msg'] = 'record has been saved successfully';
   $_SESSION['msg_type'] = 'success';

}

if(isset($_GET['delete']){
   $id = $_GET['delete'];
   $mysqli -> query("DELETE FROM users WHERE 'id' = $id"; ) or die(mysqli_error($mysqli));
   
   $_SESSION['msg'] = 'record has been deleted';
   $_SESSION['msg_type'] = 'deleted';
}

if(isset($_GET['edit'])){
   $id = $_GET['edit']
   $update = true;
   $result = $mysqli->query("SELECT * FROM users WHERE id = $id") or die($mysqli->error());
   if(count($result)== 1){
      $row = $result->fetch_array();
      $name = $row['name'];
      $location = $row['location'];
   }

}

if(isset($_POST['update'])){
   $id = $_POST['id'];
   $name = $_POST['name'];
   $location = $_POST['location'];

   $mysqli->query("UPDATE users SET username = $name, location = $location WHERE id = $id") or die(mysqli_error($mysqli);); 

   $_SESSION['message'] = 'update done successfully';
   $_SESSION['msg_type'] = 'warning';

   header('location: index.php');

}
 



?> 