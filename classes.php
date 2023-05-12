
<?php
 $mysql = new mysqli("localhost","root","","batch13");//hostname,username,password,databasename
// class ClassA{
//     public $result = 0;
//    public function __construct($a,$b)//construct method k call krte hy na just object toiri krlei hy.
//    {
//      $this->result = $a + $b;
//    }
//     public function mim($a){
//         $m=  " this result is:" .$a + $this->result ."<br>";
//         return $m;
//     }


//     public function mim1($b){
//         $m=  " this result is:" . $b - $this->result;
//         return $m;
//     }
// }
// $cls = new ClassA(50,60);
// echo $cls->mim(10);
// echo $cls->mim1(20);
// $cls->result;
//  echo $cls->mim(10);


//validation using function

function insert($name,$phone,$email,$status){
    global $mysql;
    if(check($phone)){
        return 'This phone number already exit';

    }
    else{
        $check= $mysql->query("INSERT INTO tbl_student(name,phone,email,status)
        VALUES(
            '$name',
            '$phone',
            '$email',
            '$status'
           
        )");
        if($check){
            return "Data Saved";
        }
        else{
            return "Data Not Saved";
        }
    }

    }
        
    function check($phone){
        global $mysql;
      
      $data=$mysql->query("SELECT * FROM tbl_student WHERE phone='$phone'"); 
      if($data->num_rows>0){
        return true;
      }
      else{
        return false;
      }
    }

function showAll(){
    global $mysql;
    $sql= $mysql->query("SELECT * FROM tbl_student");
    return $sql;
}
function delete($id){
    global $mysql;
    $sql= $mysql->query("DELETE FROM tbl_student WHERE student_id='$id'");
    return $sql;
}



function find($id){
    global $mysql;
    $sql= $mysql->query("SELECT * FROM tbl_student WHERE student_id='$id'");
    return $sql;
}


function update($all,$id){
    $name=$all['name'];
    $phone=$all['phone'];
    $email=$all['email'];
    $status=$all['status'];
    global $mysql;
    $sql= $mysql->query("UPDATE  tbl_student 
    SET name='$name',
    phone='$phone',
    email='$email',
    status='$status'
    WHERE student_id='$id'
    ");
    return $sql;
}
function active($id){
    global $mysql;
    return $mysql->query("UPDATE tbl_student SET status = '1' WHERE student_id='$id'");
}
function inactive($id){
    global $mysql;
    return $mysql->query("UPDATE tbl_student SET status = '2' WHERE student_id='$id'");
}
?>