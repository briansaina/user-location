<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>
<body>

<?php require_once 'process.php' ?>
 

<?php if(isset($_SESSION['message'])): ?>
     
    <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
        <?php echo $_SESSION['message'];
         unset($_SESSION['message']);
        ?>
    
    </div>
 
    <?php endif ?>


<div class="container">

<?php  
  $mysqli = new mysqli('localhost', 'root', '', 'crudlocation');
  $result = $mysqli -> query("SELECT * FROM users") or die(mysqli_error($mysqli));
  
  

?>


<div class="row justify-content-center">
 <table class = "table">
    <thead>
        <tr>
                <th>name</th>
                <th>location</th>
                <th colspan  ="2"> Action </th>
        </tr>
        <td><a href="index.html?edit = <?php echo $row['id'];?>"
         class ="btn btn-info">Edit</a></td>
         <td><a href="process.php?delete = <?php echo $row['id'];?>" 
         class = "btn btn-danger">Delete</a></td>
        <tr>
    </thead>

    <?php while ($row = $result -> fetch_assoc()): ?>
     
        <tr>
                <td> <?php echo $row['name']; ?></td>
                <td> <?php echo $row['location']; ?></td>
                <td></td>
        </tr>
    <?php endwhile ?>    
   
 </table>
 </div>

 
<div class = "row justify-content-center">
<form action="process.php" method = "POST">

<input name = "id" type = "hidden" value = <?php echo $id; ?> >

<div class="form-group"> 
    <label for="">Name</label> 
    <input type = "text" name="name" placeholder = "Enter your name" value = <?php echo $name; ?> class = "form-control">
</div>

<div class="form-group">
    <label for="">location</label>
    <input type = "text" name="location" placeholder = "input location" value = <?php echo $location; ?>class = "form-control">
</div>

<div class="form-group">
<?php if($update = true): ?>
    <button value = "save" name = "save" class = "btn btn-info">update</button>
<?php else:?>
    <button value = "save" name = "save" class = "btn btn-primary">save</button>
<?php endif ?>
</div>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</div>
</body>
</html>