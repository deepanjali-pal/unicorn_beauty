<?php
$insert = false;
if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server,$username,$password);

  if(!$con){
    die("connection to this database failed due to" .
    mysqli_connect_error());
  }
  //echo "success connecting data"

  $name = $_POST['name'];
  $email = $_POST['name'];
  $phone_no = $_POST['name']; 
  $serivce_name = $_POST['name'];
  $date = $_POST['name'];
  $time = $_POST['name'];
  $sqli = "INSERT INTO 
  `booking_ub`.`booking_ub`(`s.no`, `name`, `email`, `phone_no.`, `service name`, `date`, `time`) VALUES ('$s.no','$name', '$email', '$phone_no.', '$service_name', '$date', '$time');";
  //echo $sql;
  if($con->query($sql)== true){
   // echo "successfully inserted";
   $insert = true;
  }
  else{
    echo "ERROR: $sql <br>? $con->error";
  }
  $con->close();
}
?>


