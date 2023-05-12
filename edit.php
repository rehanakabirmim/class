<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

   <link rel="stylesheet" href="css/fontawesome.min.css">
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>Document</title>
    
  
</head>
<body>
<?php
include 'classes.php';
$id=$_GET['id'];
$data=find ($id);
$data=$data->fetch_assoc();

if(isset($_POST['name'])){
    if(update($_POST,$id)){
        header('location:index.php');
    }
}
?>


<div class="container">
<form action="" method="POST">
    <div class="row">
        <div class="col-md-4 offset-md-4  border border-info rounded mt-4 p-2">
        
        <div class="form-group my-2">
            <label for="name">Student Name</label>
            <input id="name" type="text" name="name" placeholder="Strudent Name" class="form-control"value ="<?php echo $data["name"]?>">
        </div>
        <div class="form-group my-2">
            <label for="phone">Phone Number</label>
            <input id="phone" type="text" name="phone" placeholder="Phone Number" class="form-control"value ="<?php echo $data["phone"]?>">
        </div> 
        <div class="form-group my-2">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" placeholder="Email Address" class="form-control"value ="<?php echo $data["email"]?>">
        </div>
        <div class="form-group my-2">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control form-select">
                <option value="<?php  $data["status"]?>">
                <?php
                if($data["status"]==1){
                    echo 'Active';
                }
                else{
                    echo 'Inactive';   
                }
                ?>
            </option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
            
        </div>
        <div class="form-group my-2">
            <button class="btn btn-info">Save Info</button>
        </div>
    
    </div>
    



<script src="js/jqury.3.6.4.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script src="js/index.js"></script>
   
    <script>let table = new DataTable('#myTable');</script>


   
    

</body>
</html>