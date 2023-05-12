<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

   <link rel="stylesheet" href="css/fontawesome.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <title>Document</title>
    
  
</head>
<body>
    <?php
 include 'classes.php';

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(delete($id)){
    echo "Data Delete Success";
    header('location:index.php');
    }
    else{
        echo "Data Delete not Success";
    }
 }
 if(isset($_GET['inactiveID'])){
    $id = $_GET['inactiveID'];
    if(active($id)){
        echo "status updated";
        header("location: index.php");

    }
 }

 if(isset($_GET['activeID'])){
    $id = $_GET['activeID'];
    if(inactive($id)){
        echo "status updated";
        header("location: index.php");
        
    }
 }

?>



<div class="container">

    <div class="row">
        <div class="col-md-4  border border-info rounded mt-4 p-2">
        <form  method="POST">
          <?php 
           if(isset($_POST['name'])){

            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status=$_POST['status'];
            //validation start
            if($name===""){
                echo "Name field is Required";
            }
            else if($phone===""){
                echo "phone is Requied";
            }
            else if($email===""){
                echo "email is Requied";
            }
            else if($status===""){
                echo "status is Requied";
            }
            else{
               $report= insert($name,$phone,$email,$status);
               echo'<div class="alert alert-success"><strong>Success: '.$report.'</strong></div>';
            }
             }
          ?> 
        <div class="form-group my-2">
            <label for="name">Student Name</label>
            <input id="name" type="text" name="name" placeholder="Strudent Name" class="form-control">
        </div>
        <div class="form-group my-2">
            <label for="phone">Phone Number</label>
            <input id="phone" type="text" name="phone" placeholder="Phone Number" class="form-control">
        </div> 
        <div class="form-group my-2">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" placeholder="Email Address" class="form-control">
        </div>
        <div class="form-group my-2">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control form-select">
                <option value="">----Select Status----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
            
        </div>
        <div class="form-group my-2">
            <button class="btn btn-info">Save Info</button>
        </div>
        </form>
    </div>
    <div class="col-md-8 py-3 mt-5">
    <table id="myTable" class="table table-striped table-bordered border-primary ">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
            <?php
            $data=showAll();
            if($data->num_rows >0){
                $sl=1;
            while ($arrayData= $data->fetch_assoc()){?>
                <tr>
                <td><?php echo $sl;?></td>  
                
                <td><?php echo $arrayData["name"]?></td>
                <td><?php echo $arrayData["phone"]?></td>
                <td><?php echo $arrayData["email"]?></td>
        <td><?php  if($arrayData["status"] == 1){echo '<a href="index.php?activeID='.$arrayData["student_id"].'"class="btn btn-sm btn-success">Active</a>';}else
        {echo'<a href="index.php?inactiveID='.$arrayData["student_id"].'"class="btn btn-sm btn-warning">Inactive</a>';}
                ?></td>
             <td>
            <a href="edit.php?id=<?php echo $arrayData["student_id"]?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                    
             <button data-bs-toggle="modal" data-bs-target="#delete<?php echo $arrayData["student_id"]?>" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i></button>

                    </td>
                </tr>
                

<div class="modal fade" id="delete<?php echo $arrayData['student_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete Message?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="index.php?id=<?php echo $arrayData["student_id"]?>" class="btn  btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
                  
            <?php $sl++; 
            }
            }
            else{ ?>
                <tr>
                <td colspan="6" class="text-center bg-warning text-white">Data Not Found</td>
            </tr>
            <?php }
        ?>
            
             
            </tbody>
            <tfoot>
            <tr>
                    <th>#SL</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>status</th>
                    <th>Action</th>
                </tr> 
            </tfoot> 
        </table>  
        </div>
      
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